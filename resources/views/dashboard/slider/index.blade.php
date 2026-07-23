@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createSlider'))
        <p class="session">{{session('createSlider')}}</p>
    @endif
<div>
    <table class="admin-table">
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
                <td><img class="table-image"  src="{{asset('images/slider/'.$item->image)}}"></td>
                <td>
                    <form action="{{route('slider.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
                <td>
                    <form action="{{route('slider.edit',['id'=>$item->id])}}" method="GET">
                        <input type="submit" value="edit" class="btn btn-edit btn-sm">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>
     {{$slider->links()}} 
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('slider.create')}}">Create-Slider</a></div>
</div>
@endsection