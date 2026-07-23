@extends('dashboard.layouts.master')

@section('content')
    <div class="form-card">
        <h2 class="page-title">Create Team</h2>
    @if(session('createTeam'))
        <p class="session">{{session('createTeam')}}</p>
    @endif
    <form action="{{route('team.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label class="form-label" for="fullName">Full Name:</label>
        <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Your fullName" value="{{ old('fullName') }}">
        </div>
        @error('fullName')
            <p class="error">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label class="form-label" for="image">Image:</label>
            <input class="form-control" type="file" id="image" name="image" placeholder="select image">
        </div>
        @error('image')
            <p class="error">{{$message}}</p>
        @enderror
        <div class="form-group">
            <label class="form-label" for="caption">Caption:</label>
            <input class="form-control" type="text" id="caption" name="caption" placeholder="Write caption.." value="{{ old('caption') }}">
        </div>
        @error('caption')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label class="form-label" for="facebook">Facebook:</label>
            <input class="form-control" type="text" id="facebook" name="facebook" placeholder="Your facebook" value="{{ old('facebook') }}">
            </div>
        @error('facebook')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="instagram">Instagram:</label>
        <input class="form-control" type="text" id="instagram" name="instagram" placeholder="Your instagram" value="{{ old('instagram') }}">
        </div>
        @error('instagram')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="twitter">Twitter:</label>
        <input class="form-control" type="text" id="twitter" name="twitter" placeholder="Your twitter" value="{{ old('twitter') }}">
        </div>
        @error('twitter')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
    
@endsection