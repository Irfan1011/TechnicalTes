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
                        <h1>Cart <i class="fa fa-shopping-cart"></i></h1>
                        <hr><br>

                        @if($message=Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                        @endif

                        <div class="col col-8 mt-2">
                            <form>
                                <a href="{{route('cart.create')}}" class="btn btn-primary btn-md m-2 text-white"><i class="fa fa-plus fw-bold"> Add Cart</i></a>
                                <a href="{{route('cart.showRestore')}}" class="btn btn-dark btn-md m-2 text-white"><i class="fa fa-shopping-cart fw-bold"> Restore Product</i></a>
                                @if($products = DB::select('SELECT * FROM Products
                                                            WHERE deleted_at is NULL'))
                                <!-- @foreach($products as $product)
                                <form action="{{ route('transaction.store',$product->uuid) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-md m-2 text-white"><i class="fa fa-money fw-bold"> Buy Now</i></button>
                                </form>
                                @endforeach -->
                                @endif
                            </form>
                            <form action="{{ route('search') }}" method="GET">
                                <label class="form-label">Search</label>
                                <input type="text" id="search" name="search" placeholder="Search Product"
                                    style="border-radius:10px; border: 1px solid black;">
                                </br>
                            </form>
                        </div>

                        <div class="container">
                            <div class="row justify-content-center">
                                @if(count($cart))
                                @foreach ($cart as $product)
                                <div class="col-md-4 mb-4">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <img src="{{ $product->photo }}" class="card-img-top" alt="{{ $product->product_name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                            <h5 class="card-title">{{ $product->product_name }}</h5>
                                            <p>Rp.{{ $product->price }}</p>
                                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi reprehenderit quia incidunt ipsa sint cumque?</p>
                                        </div>
                                        <form class="ms-3" action="{{ route('cart.destroy',$product->uuid) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Remove</button>
                                        </form>
                                        <form class="ms-3" action="{{ route('cart.destroyPermanent',$product->uuid) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete Permanent</button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div align="center">Not Found</div>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>