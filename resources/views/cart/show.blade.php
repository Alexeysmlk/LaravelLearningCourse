@extends('layouts.shop')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Your cart</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="{{route('index.catalog')}}">Catalog</a></li>
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <h4 >Picture</h4>
                </div>
                <div class="col-md-6">
                    <h4>Name and description</h4>
                </div>
                <div class="col-md-2" style="text-align: center">
                    <h4>Count</h4>
                </div>
                <div class="col-md-2" style="text-align: center">
                    <h4>Total price</h4>
                </div>
            </div>
            @foreach($products as $product)
                <div class="row" style="margin-bottom: 40px; display: flex; align-items: center">
                    <div class="col-md-2">
                        <img src="{{$product->img}}" alt="Image of product">
                    </div>
                    <div class="col-md-6">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->description}}</p>
                    </div>
                    <div class="col-md-2" style="text-align: center">
                        <span>{{$cart[$product->id]}}</span>
                    </div>
                    <div class="col-md-2" style="text-align: center">
                        <span>{{$cart[$product->id]*$product->pagePrice}}</span>
                    </div>
                </div>
            @endforeach
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
