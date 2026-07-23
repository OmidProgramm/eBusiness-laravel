@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('deleteTeam'))
        <p class="session">{{session('deleteTeam')}}</p>
    @endif
     @if(session('updatedTeam'))
        <p class="session">{{session('updatedTeam')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>FullName</th>
            <th>Caption</th>
            <th>Image</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        @forelse ($team as $item)
            <tr>
                <td>{{$item->fullName}}</td>
                <td>{{ Str::limit($item->caption, 20) }}</td>
                <td><img class="table-image" src="{{asset('images/team/'.$item->image)}}"></td>
                <td>{{ Str::limit($item->facebook, 20) }}</td>
                <td>{{ Str::limit($item->instagram, 20) }}</td>
                <td>{{ Str::limit($item->twitter, 20) }}</td>
                <td>
                    <form action="{{route('team.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-delete btn-sm">
                    </form>
                </td>
                <td>
                    <form action="{{route('team.edit',['id'=>$item->id])}}" method="GET">
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
     {{$team->links()}} 
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('team.create')}}">Create-Team</a></div>
</div>
@endsection