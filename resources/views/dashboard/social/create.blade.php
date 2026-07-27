@extends('dashboard.layouts.master')

@section('content')
<div class="form-card">
    <h2 class="page-title">Create Info</h2>
    @if(session('createSocial'))
        <p class="session">{{session('createSocial')}}</p>
    @endif
    @if(session('deleteSocial'))
        <p class="session">{{session('deleteSocial')}}</p>
    @endif

    <form action="{{route('social.store')}}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label" for="description">Description:</label>
            <textarea class="form-control"
                id="description"
                name="description"
                placeholder="Write description.."
                >{{ old('description') }}
            </textarea>
        </div>
        @error('description')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label for="facebook" class="form-label">facebook:</label>
            <input class="form-control" type="text" id="facebook" name="facebook" placeholder="Your facebook" value="{{ old('facebook') }}">
        </div>
        @error('facebook')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="instagram">instagram:</label>
        <input class="form-control" type="text" id="instagram" name="instagram" placeholder="your instagram">
        </div>
        @error('instagram')
            <p class="error">{{$message}}</p>
        @enderror

         <div class="form-group">
            <label for="twitter" class="form-label">twitter:</label>
            <input class="form-control" type="text" id="twitter" name="twitter" placeholder="Your twitter" value="{{ old('twitter') }}">
        </div>
        @error('twitter')
            <p class="error">{{$message}}</p>
        @enderror
         <div class="form-group">
            <label for="linkedin" class="form-label">linkedin:</label>
            <input class="form-control" type="text" id="linkedin" name="linkedin" placeholder="Your linkedin" value="{{ old('linkedin') }}">
        </div>
        @error('linkedin')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
 
@endsection
