<div class="team-container">
@forelse ($category as $item)

    <div class="team-card">
        <div class="team-img">
            <a href="{{route('index.category')}}">
            <img src="{{ asset('images/category/'.$item->images) }}" alt="{{ $item->title }}">
            </a>
        </div>
        <div class="team-content">
            <h3>{{ $item->title }}</h3>
            <p class="btn-parent"><a class="btn btn-primary" href="{{route('index.category',['id'=>$item->id])}}">read more...</a></p>
        </div>
    </div>
@empty

<h4>empty</h4>

@endforelse
</div>