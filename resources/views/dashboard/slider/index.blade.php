@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderIndex.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
<div class="sliderDak">
    <table class="showSlider">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @forelse ($slider as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{ Str::limit($item->description, 20) }}</td>
                <td><img class="imageSlider" src="{{$item->image}}"></td>
                <td>delete</td>
                <td>update</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>
     {{$slider->links()}} 
     <div class="createSlider"><a href="{{route('slider.create')}}">Create-Slider</a></div>
</div>
@endsection