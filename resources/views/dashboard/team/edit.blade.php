@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderCreate.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
 <link rel="stylesheet" href="{{ asset('admin/assets/css/aboutCreate.css') }}"> 
@endsection
@section('content')
    <h1>Team Edit</h1>
    <form action="{{route('team.update',['id'=>$team->id])}}" method="POST" enctype="multipart/form-data">
        
        @csrf
        @method('put')
        
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" placeholder="Your fullName" value="{{ old('fullName', $team->fullName) }}">
        @error('fullName')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" placeholder="select image">
        @if($team->image)
            <img src="{{ asset('images/team/'.$team->image) }}" width="50" height="50" style="margin-left:50px">
        @endif
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="caption">Caption:</label>
        <input type="text" id="caption" name="caption" placeholder="Write caption.." value="{{ old('caption', $team->caption) }}">
        @error('caption')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook" placeholder="Your facebook" value="{{ old('facebook', $team->facebook) }}">
        @error('facebook')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram" placeholder="Your instagram" value="{{ old('instagram', $team->instagram) }}">
        @error('instagram')
            <p class="error">{{$message}}</p>
        @enderror

        <label for="twitter">Twitter:</label>
        <input type="text" id="twitter" name="twitter" placeholder="Your twitter" value="{{ old('twitter', $team->twitter) }}">
        @error('twitter')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit">
    </form>
    <div class="createAbout"><a href="{{route('team.index')}}">About-index</a></div>
@endsection