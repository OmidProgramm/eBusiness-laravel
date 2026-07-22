@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderIndex.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createAbout'))
        <p class="createSession">{{session('createAbout')}}</p>
    @endif
<div class="sliderDak">
    <table class="showSlider">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Delete</th>
            
        </tr>
        @forelse ($about as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{ Str::limit($item->description, 20) }}</td>
                <td><img class="imageSlider" src="{{asset('images/about/'.$item->image)}}"></td>
                <td>
                    <form action="{{route('about.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
                
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>
     {{$about->links()}} 
     <div class="createSlider"><a href="{{route('about.create')}}">Create-About</a></div>
</div>
@endsection