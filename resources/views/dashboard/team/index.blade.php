@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/sliderIndex.css') }}">
@endsection

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createTeam'))
        <p class="createSession">{{session('createTeam')}}</p>
    @endif
<div class="sliderDak">
    <table class="showSlider">
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
                <td><img class="imageSlider" src="{{asset('images/team/'.$item->image)}}"></td>
                <td>{{ Str::limit($item->facebook, 20) }}</td>
                <td>{{ Str::limit($item->instagram, 20) }}</td>
                <td>{{ Str::limit($item->twitter, 20) }}</td>
                <td>
                    <form action="{{route('team.destroy',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
                <td>
                    <form action="{{route('team.edit',['id'=>$item->id])}}" method="GET">
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
     {{$team->links()}} 
     <div class="createSlider"><a href="{{route('team.create')}}">Create-Team</a></div>
</div>
@endsection