@extends('layouts.masterFront')
@section('css')
<link rel="stylesheet" href="{{ asset('front/assets/css/product.css') }}">
@endsection
@section('content')
    
    <h1>Hello Laravel Product</h1></div>
   <div class="productContainer">
        <aside class="product-sidebar">
            @forelse($productRecent as $item)
                <div class="product-card">
                    <a href="{{route('index.product',['title'=>$item->title,'id'=>$item->id])}}"><img src="{{ asset('images/product/'.$item->image) }}" alt="{{ $item->title }}"></a>
                    <h4><a href="{{route('index.product',['title'=>$item->title,'id'=>$item->id])}}">{{ $item->title }}</a></h4>
                </div>
            @empty
                <p>No Category</p>
            @endforelse
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
   {{-- ============== Footer ============== --}}
        @include('front.partials.footer',['info'=>$info,"social"=>$social])
    {{-- ============== End Footer ============== --}}
   
@endsection