@extends('dashboard.layouts.master')
@section('css')
 <link rel="stylesheet" href="{{ asset('admin/assets/css/showSeo.css') }}">
@endsection
@section('content')
    @php
        use Illuminate\Support\Str;
    @endphp
    <h3>Seo Show</h3>
     @if(session('deleteteSeo'))
        <p class="deleteteSeo">{{session('deleteteSeo')}}</p>
    @endif
    <table class="showSeo">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Keywords</th>
            <th>Description</th>
            <th>Delete</th>
        </tr>
        @forelse ($seo as $item)
            <tr>
                <td>{{$item->title}}</td>
                <td>{{$item->author}}</td>
                <td>{{Str::limit($item->keywords,20)}}</td>
                <td>{{ Str::limit($item->description, 20) }}</td>
                <td class="deleteSeo">
                    <form action="{{route('delete.Seo',['id'=>$item->id])}}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No Data</td>
            </tr>
        @endforelse
    </table>

@endsection