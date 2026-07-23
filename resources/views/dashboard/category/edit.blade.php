@extends('dashboard.layouts.master')

@section('content')
    <div class="form-card">
        <h2 class="page-title">Edit Category</h2>
    @if(session('editCategory'))
        <p class="session">{{session('editCategory')}}</p>
    @endif
    
    <form action="{{route('category.update',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="form-label" for="title">Title:</label>
            <input class="form-control" type="text" id="title" name="title" placeholder="Your title" value="{{ old('title', $category->title) }}">
        </div>
        @error('title')
            <p class="error">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label class="form-label" for="image">Image:</label>
            <input class="form-control" type="file" id="image" name="image" placeholder="select image">
            @if($category->images)
            <img src="{{ asset('images/category/'.$category->images) }}" width="50" height="50" style="margin-left:50px">
        @endif
        </div>
        
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
@endsection