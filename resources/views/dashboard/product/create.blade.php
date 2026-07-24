@extends('dashboard.layouts.master')

@section('content')
<div class="form-card">
    <h2 class="page-title">Create Product</h2>
    @if(session('createProduct'))
        <p class="session">{{session('createProduct')}}</p>
    @endif

    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
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
            <label class="form-label" for="content">Content:</label>
            <textarea class="form-control"
                id="content"
                name="content"
                placeholder="Write content.."
                >{{ old('content') }}
            </textarea>
        </div>
        @error('content')
            <p class="error">{{$message}}</p>
        @enderror

        <label class="form-lable" for="category_id">Category</label>
        <select class="form-control" id="category" name="category_id">
            @forelse ($category as $id => $title)
                <option value="{{$id}}" >{{$title}}</option>
            @empty
                <option value="">Empty</option>
            @endforelse
        </select>
        @error('category_id')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
    
@endsection
