@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderIndex.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createSlider'))
        <p class="createSession">{{session('createSlider')}}</p>
    @endif
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
                <td><img class="imageSlider" src="{{asset('images/slider/'.$item->image)}}"></td>
                <td>
                    <form action="{{route('slider.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
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