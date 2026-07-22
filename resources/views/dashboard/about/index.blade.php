@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createAbout'))
        <p class="session">{{session('createAbout')}}</p>
    @endif
<div>
    <table class="admin-table">
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
                <td><img class="table-image" src="{{asset('images/about/'.$item->image)}}"></td>
                <td >
                    <form action="{{route('about.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-edit btn-sm">
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
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('about.create')}}">Create-About</a></div>
</div>
@endsection