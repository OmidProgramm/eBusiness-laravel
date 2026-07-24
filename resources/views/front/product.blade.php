@extends('layouts.masterFront')
@section('css')
<link rel="stylesheet" href="{{ asset('front/assets/css/product.css') }}">
@endsection
@section('content')
    
    <h1>Hello Laravel Product</h1></div>
   <div class="productContainer">
       <aside class="category-sidebar">
        {{-- @include('front.partials.products.products',['productRecent'=>$productRecent]) --}}
        </aside>
    <div class="card">
        <div class="card-img">
            <img src="{{ asset('images/product/'.$product->image) }}" alt="{{ $product->title }}">
        </div>
        <div class="card-body">
            <h3>{{$product->title}}</h3>
            <p>
                {{$product->content}}
            </p>
        </div>
    </div>
   </div>
   
@endsection