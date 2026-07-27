@section('css')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/form.css') }}">
@endsection


<h2>Contact Section</h2>
@if(session('sendEmail'))
        <p class="session">{{session('sendEmail')}}</p>
    @endif
<div class="form-card">
    <form action="{{route('ajax-contact')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="fullName" class="form-label">fullName:</label>
            <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Your fullName" value="{{ old('fullName') }}" style="border:1px solid black">
        </div>
        @error('fullName')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
        <label class="form-label" for="email">email:</label>
        <input class="form-control" type="text" id="email" name="email" placeholder="your email" style="border:1px solid black">
        </div>
        @error('email')
            <p class="error">{{$message}}</p>
        @enderror

        <div class="form-group">
            <label class="form-label" for="comment">Comment:</label>
            <textarea class="form-control" style="resize: none; border:1px solid black"
                id="comment"
                name="comment"
                placeholder="Write comment.."
                >{{ old('comment') }}
            </textarea>
        </div>
        @error('comment')
            <p class="error">{{$message}}</p>
        @enderror
        <input type="submit" value="Send" class="btn btn-success">
    </form>
    
    </div>



