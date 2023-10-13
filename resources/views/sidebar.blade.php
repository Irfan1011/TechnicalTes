@extends('CDN')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-2 p-0 bg-dark min-vh-80 d-flex flex-coloumn justify-content-between">
            <nav id="sidebar" class="d-md-block bg-dark text-white">
                <div class="position-sticky">
                    <ul class="nav nav-pills flex-column mt-4">
                        @php
                            $user = Auth::user()->role;
                            $userId = Auth::user()->id;
                        @endphp

                        @if($user === "Administrator")
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('admin.index') }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-home me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('admin.edit',$userId) }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-user me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Profile</span>
                            </a>
                        </li>
                        @elseif($user === "Customer")
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('customer.index') }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-home me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('customer.edit',$userId) }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-user me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('customer.cart') }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-shopping-cart me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Cart</span>
                            </a>
                        </li>
                        @elseif($user === "CustomerService")
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('cs.index') }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-home me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('cs.edit',$userId) }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-user me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Profile</span>
                            </a>
                        </li>
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="{{ route('cs.verif') }}" class="nav-link d-flex text-white align-items-center">
                                <i class="fs-5 fa fa-check me-2"></i>
                                <span class="fs-4 d-none d-md-inline">Verification</span>
                            </a>
                        </li>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item py-2 py-sm-0 py-md-2">
                            <a href="#" class="nav-link d-flex text-white align-items-center">
                                <button type="submit" class="nav-link d-flex text-white align-items-center">
                                    <i class="fs-5 fa fa-sign-out me-2"></i>
                                    <span class="fs-4 d-none d-md-inline">Logout</span>
                                </button>
                            </a>
                        </li>
                        </form>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="col-12 col-md-10 p-0">
            @yield('sidebar')
        </div>
    </div>
</div>

<style>
    .nav-pills li a:hover {
        background-color: green;
    }
</style>
