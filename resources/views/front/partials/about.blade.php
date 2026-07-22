@php
    use Illuminate\Support\Str;
@endphp
@if ($about)
<div class="aboutcart">
    <div class="abautimage">
        <img src="{{ asset('images/about/'.$about->image) }}" alt="">
    </div>
    <div class="aboutbody">
        <h3>{{$about->title}}</h3>
        <p>{{Str::limit($about->description, 200)}}</p>
    </div>
</div>
@else
<p>empty</p>
@endif