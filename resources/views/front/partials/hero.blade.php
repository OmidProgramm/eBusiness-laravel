@forelse ($slider as $item)
    <!-- Carousel -->
    <div class="sliderCart">
        <div class="card">
            <img src="{{ asset('images/slider/'.$item->image) }}" alt={{$item->title}}  >
        </div>
        <div class="body">
            <h3>{{$item->title}}</h3>
            <p>{{$item->description}}</p>
        </div>
    </div>

@empty
    <h4>empty</h4>
@endforelse