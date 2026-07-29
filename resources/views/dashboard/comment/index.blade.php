@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('deleteComment'))
        <p class="session">{{session('deleteComment')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>FullName</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Product</th>
            <th>Delete</th>  
        </tr>
    
        @forelse ($comments as $item)
            <tr>
                <td>{{$item->fullName}}</td>
                <td>{{$item->email}}</td>
                <td>{{ Str::limit($item->comment, 20) }}</td>
                <td>{{$item->product->title}}</td>
                <td>
                    <form action="{{route('comment.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>
    
</div>
@endsection