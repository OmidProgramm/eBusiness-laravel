@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createCategory'))
        <p class="createSession">{{session('createCategory')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>Title</th>
            <th>Images</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @forelse ($category as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td><img class="table-image" src="{{asset('images/category/'.$item->images)}}"></td>
                <td>
                    <form action="{{route('category.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
                <td>
                    <form action="{{route('category.edit',['id'=>$item->id])}}" method="GET">
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
     {{$category->links()}} 
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('category.create')}}">Create-Category</a></div>
</div>
@endsection