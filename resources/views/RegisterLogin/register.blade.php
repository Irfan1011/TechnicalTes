@extends('CDN')
@section('content')

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card text-dark bg-light m-5 shadow" style="max-width: 800px;">
        <div class="card-header fw-bold">Register</div>
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
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus autocomplete="name" />
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Example@gmail.com" required autocomplete="username" />
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="Customer" <?= old('role') == "Customer" ? "selected" : ""?>> Customer</option>
                        <option value="CustomerService" <?= old('role') == "CustomerServices" ? "selected" : ""?>>Customer Service</option>
                    </select>
                </div>
                <div class="row g-0 row-cols-2">
                    <div class="col">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <div class="col text-end">
                        <button class="btn btn-outline-dark me-2" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
