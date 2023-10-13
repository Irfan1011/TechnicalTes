@extends('CDN')
@section('content')

<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold">Technical Tes</a>
        <div class="d-flex justify-content-end">
            <div class="hidden fixed sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                @if (Route::has('register'))
                <a class="btn btn-outline-dark me-2" href="{{route('register')}}" role="button">Register</a>
                @endif
                <a class="btn btn-outline-dark me-2" href="{{route('login')}}" role="button">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="body">
    <div class="container min-vh-100 align-items-center">
        @if($message=Session::get('success'))
        <div class="alert text-center fw-bold" style="padding-top:65px; color:ffffff; text-shadow: 2px 2px #FF0000;">
            <p>{{$message}}</p>
        </div>
        @endif
    </div>
</div>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="https://store.sirclo.com/blog/wp-content/uploads/2022/06/shopping-bag-cart-1024x576.jpg" class="d-block w-100" alt="Gambar 1">
        </div>
        <div class="carousel-item">
        <img src="https://store.sirclo.com/blog/wp-content/uploads/2022/06/shopping-bag-cart-1024x576.jpg" class="d-block w-100" alt="Gambar 2">
        </div>
        <div class="carousel-item">
        <img src="https://store.sirclo.com/blog/wp-content/uploads/2022/06/shopping-bag-cart-1024x576.jpg" class="d-block w-100" alt="Gambar 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
body {
    background: url("https://media.suara.com/pictures/970x544/2020/07/26/92303-ilustrasi-olshop-online-shop-toko-online.jpg") no-repeat center center fixed;
    background-size: cover;
    background-attachment: fixed;
}
</style>