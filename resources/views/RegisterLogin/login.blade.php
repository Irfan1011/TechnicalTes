@extends('CDN')
@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card text-dark bg-light m-5 shadow" style="max-width: 600px;">
        <div class="card-header fw-bold">Login</div>
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
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Example@gmail.com" required autocomplete="username" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
                
                <div class="row g-0 row-cols-2">
                    <div class="col">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                            {{ __('Don\'t have an account? Register here.') }}
                        </a>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-outline-dark me-2" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
