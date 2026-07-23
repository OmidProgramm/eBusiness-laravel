@extends("dashboard.layouts.master")

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}"> 
@endsection
@section('content')
    <div class="form-card">
        <h2 class="page-title">Create Category</h2>
    <form action="{{route('slider.update',['id'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label class="form-label" for="title">Title:</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $slider->title) }}">
        </div>

        <div class="form-group">
        <label class="form-label" for="image">Image:</label>
        <input class="form-control" type="file" id="image" name="image" placeholder="select image">
        </div>
        @if($slider->image)
            <img src="{{ asset('images/slider/'.$slider->image) }}" width="50" height="50" style="margin-left:50px">
        @endif

        <div class="form-group">
        <label class="form-label" for="description">Description:</label>
        <textarea class="form-control"
            id="description"
            name="description"
            placeholder="Write description.."
            >{{ old('description', $slider->description) }}
        </textarea>
        </div>
        <button type="submit" class="submitupdate" class="btn btn-success">Update Slider</button>
    </form>
    </div>
@endsection