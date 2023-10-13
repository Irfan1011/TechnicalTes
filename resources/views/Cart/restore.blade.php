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
                                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-md m-2 text-white" style="color:#ebff0d"><i class="fa fa-arrow-left fw-bold"> Back</i></a>
                            </form>
                        </div>

                        @php
                            $product = DB::select('SELECT * FROM products
                                        WHERE deleted_at is not NULL');
                        @endphp

                        <div class="container">
                            <div class="row">
                                @foreach ($product as $Product)
                                    <div class="col-md-4 mb-4">
                                        <div class="card" style="width: 18rem;">
                                            <form class="mb-0" action="{{ route('cart.restore',$Product->uuid) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="photo" value="{{ $Product->photo }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="product_name" value="{{ $Product->product_name }}">
                                                <input type="hidden" name="price" value="{{ $Product->price }}">
                                                <img src="{{ $Product->photo }}" class="card-img-top" alt="{{ $Product->product_name }}" style="width: 100%; height: 200px; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $Product->product_name }}</h5>
                                                    <p>Rp.{{ $Product->price }}</p>
                                                    <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque odio repellat voluptatum eveniet ad fuga!</p>
                                                    @if($Product->deleted_at != NULL)
                                                        <button type="submit" class="btn btn-primary" disabled>Add to Cart</button> 
                                                        <button type="submit" class="btn btn-warning">Restore</button>
                                                    @else
                                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
