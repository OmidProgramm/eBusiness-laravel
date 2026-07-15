@extends("dashboard.layouts.master")

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
@endsection
@section('content')
    
    <form action="{{route('slider.update',['id'=>$slider->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $slider->title) }}">

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" placeholder="select image">
        @if($slider->image)
            <img src="{{ asset('images/slider/'.$slider->image) }}" width="50" height="50" style="margin-left:50px">
        @endif

        <label for="description">Description:</label>
        <textarea
            id="description"
            name="description"
            placeholder="Write description.."
            >{{ old('description', $slider->description) }}
        </textarea>
        <button type="submit" class="submitupdate">Update Slider</button>
    </form>
@endsection