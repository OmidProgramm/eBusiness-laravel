@extends('dashboard.layouts.master')

@section('content')
    <div class="form-card">
        <h2 class="page-title">Create Team</h2>
    @if(session('createCategory'))
        <p class="session">{{session('createCategory')}}</p>
    @endif
    
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label" for="title">Title:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Your title" value="{{ old('title') }}">
        </div>
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label class="form-label" for="images">Images:</label>
            <input class="form-control" type="file" id="images" name="images" placeholder="select images">
        </div>
        @error('images')
            <p class="error">{{$message}}</p>
        @enderror
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
@endsection