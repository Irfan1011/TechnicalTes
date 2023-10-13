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

                        @if($transaction = DB::select('SELECT * FROM transactions'))
                        @foreach($transaction as $Transaction)

                        @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>