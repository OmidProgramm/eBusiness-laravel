@extends('dashboard.layouts.master')
@section('title')
Admin
@endsection
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/seo.css') }}">
@endsection
@section('content')
    @if(session('createSeo'))
        <p class="createSeo">{{session('createSeo')}}</p>
    @endif

<h2>Seo Form</h2>
<div class="responsive-form">

 <form action="{{route('admin.seo.store')}}" method="POST">
    @csrf
   <label for="title">Title:</label>
   <input type="text" id="title" name="title" placeholder="Your title" value="{{ old('title') }}">
   @error('title')
    <p class="errorSeo">{{$message}}</p>
   @enderror

   <label for="author">Author:</label>
   <input type="text" id="author" name="author" placeholder="Your author" value="{{ old('author') }}">
    @error('author')
    <p class="errorSeo">{{$message}}</p>
   @enderror

    <label for="keywords">Keywords:</label>
    <textarea id="keywords" name="keywords" placeholder="Write keywords..">
        {{ old('keywords') }}
    </textarea>
    @error('keywords')
    <p class="errorSeo">{{$message}}</p>
   @enderror

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Write description..">
      {{ old('description') }}
    </textarea>
    @error('description')
    <p class="errorSeo">{{$message}}</p>
   @enderror

    <input type="submit" value="Submit">
 </form>
</div>
  <p class="detailsSeo"><a href="{{route('details.show')}}">show Seo Details</a></p>

@endsection

