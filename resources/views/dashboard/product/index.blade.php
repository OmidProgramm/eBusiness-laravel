@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createProduct'))
        <p class="session">{{session('createProduct')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Category</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    
        @forelse ($product as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{ Str::limit($item->content, 20) }}</td>
                <td><img class="table-image"  src="{{asset('images/product/'.$item->image)}}"></td>
                <td>{{$item->category->title}}</td>
                <td>
                    <form action="{{route('product.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
                <td>
                    <form action="{{route('product.edit',['id'=>$item->id])}}" method="GET">
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
    {{-- {{$product->links()}} --}}
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('product.create')}}">Create-Product</a></div>
</div>
@endsection