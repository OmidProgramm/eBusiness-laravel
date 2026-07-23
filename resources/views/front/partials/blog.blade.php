<div class="team-container">
@forelse ($category as $item)

    <div class="team-card">
        <div class="team-img">
            <img src="{{ asset('images/category/'.$item->images) }}" alt="{{ $item->title }}">
        </div>
        <div class="team-content">
            <h3>{{ $item->title }}</h3>
            <p class="btn-parent"><a class="btn btn-primary" href="#">{{ $item->title }}</a></p>
        </div>
    </div>
@empty

<h4>empty</h4>

@endforelse
</div>