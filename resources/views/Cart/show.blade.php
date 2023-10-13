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
                            $product = DB::select('SELECT * FROM products');
                            $bajuKaos = false;
                            $celanaSantai = false;
                            $celanaPendek = false;
                            foreach ($product as $Product) {
                                if ($Product->product_name == 'Baju Kaos') {
                                    $bajuKaos = true;
                                } else if ($Product->product_name == 'Celana Santai') {
                                    $celanaSantai = true;
                                } else if ($Product->product_name == 'Celana Pendek') {
                                    $celanaPendek = true;
                                }
                            }
                        @endphp

                        <div class="container">
                            <div class="row">
                                @if (!$bajuKaos)
                                <div class="col-md-4 mb-4">
                                    <div class="card" style="width: 18rem;">
                                        <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="photo" value="https://popularitas.com/wp-content/uploads/2021/11/baju_kaos.jpeg">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="product_name" value="Baju Kaos">
                                            <input type="hidden" name="price" value="20000">
                                            <img src="https://popularitas.com/wp-content/uploads/2021/11/baju_kaos.jpeg" class="card-img-top" alt="Baju Kaos" style="width: 100%; height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">Baju Kaos</h5>
                                                <p>Rp.20.000</p>
                                                <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi reprehenderit quia incidunt ipsa sint cumque?</p>
                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                @if (!$celanaSantai)
                                <div class="col-md-4 mb-4">
                                    <div class="card" style="width: 18rem;">
                                        <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="photo" value="https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/443401/item/goods_30_443401.jpg?width=494">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="product_name" value="Celana Santai">
                                            <input type="hidden" name="price" value="70000">
                                            <img src="https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/443401/item/goods_30_443401.jpg?width=494" class="card-img-top" alt="Celana Santai" style="width: 100%; height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">Celana Santai</h5>
                                                <p>Rp.70.000</p>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe earum aspernatur, dolorum tempore voluptas ex!</p>
                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif

                                @if (!$celanaPendek)
                                <div class="col-md-4 mb-4">
                                    <div class "card" style="width: 18rem;">
                                        <form action="{{ route('cart.store') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="photo" value="https://areioutdoorgear.co.id/wp-content/uploads/2023/02/3-17.jpg">
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="product_name" value="Celana Pendek">
                                            <input type="hidden" name="price" value="75000">
                                            <img src="https://areioutdoorgear.co.id/wp-content/uploads/2023/02/3-17.jpg" class="card-img-top" alt="Celena Pendek" style="width: 100%; height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">Celana Pendek</h5>
                                                <p>Rp.75.000</p>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet voluptate, repellat vero consequuntur impedit omnis!</p>
                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>