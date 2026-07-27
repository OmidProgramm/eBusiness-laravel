@extends('dashboard.layouts.master')

@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
     @if(session('createSocial'))
        <p class="session">{{session('createSocial')}}</p>
    @endif
     @if(session('deleteSocial'))
        <p class="session">{{session('deleteSocial')}}</p>
    @endif
<div>
    <table class="admin-table">
        <tr>
            <th>Description</th>
            <th>Facebook</th>
            <th>Instagram</th>
            <th>Twitter</th>
            <th>Linkedin</th>
            <th>Delete</th>
            
        </tr>
    
        @forelse ($social as $item)
            <tr>
                <td>{{ Str::limit($item->description, 20) }}</td>
                <td>{{$item->facebook}}</td>
                <td>{{$item->instagram}}</td>
                <td>{{$item->twitter}}</td>
                <td>{{$item->linkedin}}</td>
                <td>
                    <form action="{{route('social.destroy',['id'=>$item->id])}}" method="POST">
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
     <div class="btn-parent"><a class="btn btn-primary" href="{{route('social.create')}}">Create-Social</a></div>
</div>
@endsection