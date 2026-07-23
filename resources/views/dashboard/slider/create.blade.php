@extends('dashboard.layouts.master')

@section('content')
<div class="form-card">
    <h2 class="page-title">Create Slider</h2>
    @if(session('createSlider'))
        <p class="session">{{session('createSlider')}}</p>
    @endif

    <form action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Title:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Your title" value="{{ old('title') }}">
        </div>
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="image">Image:</label>
        <input class="form-control" type="file" id="image" name="image" placeholder="select image">
        </div>
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control"
                id="description"
                name="description"
                placeholder="Write description.."
                >{{ old('description') }}
            </textarea>
        </div>
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
@endsection
