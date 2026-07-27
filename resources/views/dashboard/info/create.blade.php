@extends('dashboard.layouts.master')

@section('content')
<div class="form-card">
    <h2 class="page-title">Create Info</h2>
    @if(session('createInfo'))
        <p class="session">{{session('createInfo')}}</p>
    @endif

    <form action="{{route('info.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="info" class="form-label">info:</label>
            <input class="form-control" type="text" id="info" name="info" placeholder="Your info" value="{{ old('info') }}">
        </div>
        @error('info')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="phone">Phone:</label>
        <input class="form-control" type="text" id="phone" name="phone" placeholder="your phone">
        </div>
        @error('phone')
            <p class="error">{{$message}}</p>
        @enderror

         <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input class="form-control" type="text" id="email" name="email" placeholder="Your email" value="{{ old('email') }}">
        </div>
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

         <label class="form-lable" for="work">Work</label>
        <select class="form-control" id="work" name="work">
            <option value="9-13">9 - 13</option>
            <option value="9-17">9 - 17</option>
            <option value="10-18">10 - 18</option>
        </select>
        @error('work')
            <p class="error">{{$message}}</p>
        @enderror

        <input type="submit" value="Submit" class="btn btn-success">
    </form>
    </div>
@endsection
