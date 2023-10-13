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
                        <h1>Verification <i class="fa fa-check"></i></h1>
                        <hr><br>

                        @if($message=Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                        @endif
                        
                        <div class="mt-4 container text-center">
                            <div class="row row-cols-4">
                                <div class="col border">Name</div>
                                <div class="col border">Email</div>
                                <div class="col border">Role</div>
                                <div class="col border">Action</div>
                            </div>
                            <div class="row">
                                <div class="col text-center border">
                                        @if($user = DB::select("SELECT * from users 
                                                                WHERE (role = 'Customer' OR role = 'CustomerService') 
                                                                AND status IS false"))
                                        @foreach($user as $User)
                                        <div class="row row-cols-4 mt-2">
                                            <div class="col" style="word-wrap: break-word;">{{$User->name}}</div>
                                            <div class="col" style="word-wrap: break-word;">{{$User->email}}</div>
                                            <div class="col" style="word-wrap: break-word;">{{$User->role}}</div>
                                            <div class="col" style="word-wrap: break-word;">
                                                <form action="{{ route('cs.storeVerif',$User->id) }}" method="post">
                                                    @csrf
                                                    @method("PATCH")
                                                    <div class="row g-0 row-cols-auto d-flex justify-content-center">
                                                        <button class="btn btn-outline-dark" type="submit">
                                                            <i class="fa fa-check"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="4">Empty Data!! Have a nice day :)</td>
                                        </tr>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>