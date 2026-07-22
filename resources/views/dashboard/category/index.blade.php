@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderIndex.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createCategory'))
        <p class="createSession">{{session('createCategory')}}</p>
    @endif
<div class="sliderDak">
    <table class="showSlider">
        <tr>
            <th>Title</th>
            <th>Images</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @forelse ($category as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td><img class="imageSlider" src="{{asset('images/category/'.$item->images)}}"></td>
                <td>
                    <form action="{{route('category.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
                <td>
                    <form action="{{route('category.edit',['id'=>$item->id])}}" method="GET">
                        <input type="submit" value="edit" class="edit">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>
     {{$category->links()}} 
     <div class="createSlider"><a href="{{route('category.create')}}">Create-Category</a></div>
</div>
@endsection