@extends('layouts.masterFront')
@section('seo')
    {{-- ============== Header ============== --}}
    {{-- @include('front.partials.seo',['data'=>$seo]) --}}
    <title>{{$seo->title}}</title>
    <meta content="{{$seo->description}}" name="description">
    <meta content="{{$seo->keywords}}" name="keywords">
    <meta content="{{$seo->author}}" name="author">
    <meta content="index, follow" name="robots">

    {{-- SEO Telegram Meta Tag --}}
    <meta property="og:title" content="{{$seo->title}}" />
    <meta property="og:site_name" content="{{$seo->title}}"/>
    <meta property="og:description" content="{{$seo->description}}" />
    <meta property="og:keywords" content="{{$seo->keywords}}" />
    <meta property="og:image" content="Link to your logo" />
    {{-- ============== End Header ============== --}}
@endsection

@section('content')
    
    <h1>Hello Laravel Project</h1></div>
    {{-- ============== Header ============== --}}
        @include('front.partials.header')
    {{-- ============== End Header ============== --}}

    {{-- ============== hero Section ============== --}}
        @include('front.partials.hero')
    {{-- ============== End hero Section ============== --}}

    {{-- ============== Main ============== --}}

    {{-- ============== About Section ============== --}}
        @include('front.partials.about')
    {{-- ============== End About Section ============== --}}


    {{-- ============== Team Section ============== --}}
        @include('front.partials.team')
    {{-- ============== End Team Section ============== --}}

    {{-- ============== Portfolio Section ============== --}}
        @include('front.partials.portfolio')
    {{-- ============== End Portfolio Section ============== --}}

    {{-- ============== Blog Section ============== --}}
        @include('front.partials.blog')
    {{-- ============== End Blog Section ============== --}}

    {{-- ============== Contact Section ============== --}}
        @include('front.partials.Contact')
    {{-- ============== End Contact Section ============== --}}

    {{-- ============== End Main ============== --}}

    {{-- ============== Footer ============== --}}
        @include('front.partials.footer',['info'=>$info,"social"=>$social])
    {{-- ============== End Footer ============== --}}
   
@endsection