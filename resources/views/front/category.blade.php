@extends('layouts.masterFront')
@section('css')
<link rel="stylesheet" href="{{ asset('front/assets/css/category.css') }}">
@endsection
@section('seo')
    {{-- ============== Header ============== --}}
    {{-- @include('front.partials.seo',['data'=>$seo]) --}}
    {{-- <title>{{$seo->title}}</title>
    <meta content="{{$seo->description}}" name="description">
    <meta content="{{$seo->keywords}}" name="keywords">
    <meta content="{{$seo->author}}" name="author">
    <meta content="index, follow" name="robots">

     SEO Telegram Meta Tag 
    <meta property="og:title" content="{{$seo->title}}" />
    <meta property="og:site_name" content="{{$seo->title}}"/>
    <meta property="og:description" content="{{$seo->description}}" />
    <meta property="og:keywords" content="{{$seo->keywords}}" />
    <meta property="og:image" content="Link to your logo" /> --}}
    {{-- ============== End Header ============== --}}
@endsection

@section('content')
    
    <h1>Hello Laravel Category</h1></div>
    {{-- ============== Header ============== --}}
        @include('front.partials.header')
    {{-- ============== End Header ============== --}}
    {{-- ============== Search Option ============== --}}
        @include('front.partials.products.search')
    {{-- ============== End Search Option ============== --}}
    {{-- ============== Start Section ============== --}}
    <section class="shop-section">

    {{-- ============== Left Side ============== --}}
    {{-- ============== Sidebar  ============== --}}
    <aside class="category-sidebar">
    {{-- ============== Recent  ============== --}}
        @include('front.partials.products.products',['productRecent'=>$productRecent])
    {{-- ============== End Recent  ============== --}}
    {{-- ============== Categories  ============== --}}
        @include('front.partials.products.categories',['category'=>$category])
    {{-- ============== End Categories  ============== --}}
    </aside>
 {{-- ============== End Left Side ============== --}}

 {{-- ============== Right Side ============== --}}
 {{-- ============== All Productse ============== --}}

 {{-- ============== End All Productse ============== --}}
        @include('front.partials.products.allProducts',['products'=>$products])
    </section>
    

   

    {{-- ============== Footer ============== --}}
        @include('front.partials.footer',['info'=>$info,"social"=>$social])
    {{-- ============== End Footer ============== --}}
   
@endsection