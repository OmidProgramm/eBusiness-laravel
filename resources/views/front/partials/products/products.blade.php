<aside class="category-sidebar">
            @forelse($productRecent as $item)
                <div class="category-card">
                    <a href=""><img src="{{ asset('images/product/'.$item->image) }}" alt="{{ $item->title }}"></a>
                    <h4><a href="#">{{ $item->title }}</a></h4>
                </div>
            @empty
                <p>No Category</p>
            @endforelse
        </aside>