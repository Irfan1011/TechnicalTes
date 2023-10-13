@extends('CDN')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="bg-dark col-auto col-md-2 min-vh-100">
            <div class="bg-dark p-0">
                @include('sidebar')
            </div>
        </div>
        <div class="col p-4">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <h1>Profile <i class="fa fa-user"></i></h1>
                        <hr><br>

                        <!-- Edit Profile -->
                        <div class="card text-dark bg-light ms-5 me-5 shadow" style="max-width: 1500px;">
                            <div class="card-header fw-bold">Edit Profile</div>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="card-body">
                                <form action="{{ route('cs.update',$user->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input id="email" class="form-control" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="current_password">Current Password</label>
                                        <input id="current_password" class="form-control" type="password" name="current_password" required autocomplete="username" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">New Password</label>
                                        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>
                                    <div class="row g-0 row-cols-auto">
                                        <button class="btn btn-outline-dark me-2 ms-auto" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Delete Profile Button -->
                        <form action="{{ route('cs.destroy', $user->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div class="row g-0 row-cols-auto me-5 mt-3 d-flex justify-content-center">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Delete This Account?')">
                                    <i class="fa fa-trash"></i> Delete Account
                                </button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>