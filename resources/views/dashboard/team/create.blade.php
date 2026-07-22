@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderCreate.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/assets/css/aboutCreate.css') }}"> 
@endsection
@section('content')
    <h1>Team Create</h1>
    @if(session('createTeam'))
        <p class="createSession">{{session('createTeam')}}</p>
    @endif
    <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" placeholder="Your fullName" value="{{ old('fullName') }}">
        @error('fullName')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" placeholder="select image">
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="caption">Caption:</label>
        <input type="text" id="caption" name="caption" placeholder="Write caption..">
        @error('caption')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook" placeholder="Your facebook" value="{{ old('facebook') }}">
        @error('facebook')
            <p class="error">{{$message}}</p>
        @enderror
        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram" placeholder="Your instagram" value="{{ old('instagram') }}">
        @error('instagram')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="twitter">Twitter:</label>
        <input type="text" id="twitter" name="twitter" placeholder="Your twitter" value="{{ old('twitter') }}">
        @error('twitter')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit">
    </form>
    <div class="createAbout"><a href="{{route('team.index')}}">About-index</a></div>
@endsection