@extends('layouts.masterFront')
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
    
    <h1>Hello Laravel Product</h1></div>
    {{-- ============== Header ============== --}}
        @include('front.partials.header')
    {{-- ============== End Header ============== --}}


    {{-- ============== Left Side ============== --}}
    
    {{-- ============== Search Option ============== --}}
        @include('front.partials.products.search')
    {{-- ============== End Search Option ============== --}}

    {{-- ============== Recent  ============== --}}
        @include('front.partials.products.products')
    {{-- ============== End Recent  ============== --}}
    {{-- ============== Categories  ============== --}}
        @include('front.partials.products.categories',['category'=>$category])
    {{-- ============== End Categories  ============== --}}

    {{-- ============== End Left Side ============== --}}

    {{-- ============== Footer ============== --}}
        @include('front.partials.footer')
    {{-- ============== End Footer ============== --}}
   
@endsection