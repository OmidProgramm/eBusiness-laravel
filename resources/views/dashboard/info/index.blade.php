@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createInfo'))
        <p class="session">{{session('createInfo')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>Info</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Work</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
    
        @forelse ($infos as $item)
            <tr>
                <td>{{$item->info}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->work}}</td>
                <td>
                    <form action="{{route('info.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
                <td>
                    <form action="{{route('info.edit',['id'=>$item->id])}}" method="GET">
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
     {{$infos->links()}} 
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('info.create')}}">Create-Info</a></div>
</div>
@endsection