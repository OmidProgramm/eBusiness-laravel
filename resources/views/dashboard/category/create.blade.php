@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderCreate.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
@endsection
@section('content')
    <h1>Category Create</h1>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" placeholder="Your title" value="{{ old('title') }}">
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" placeholder="select image">
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit">
    </form>
@endsection