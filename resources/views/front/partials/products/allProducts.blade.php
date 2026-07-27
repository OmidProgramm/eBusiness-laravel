 <main class="products-content">
            @forelse($products as $product)
                <div class="product-card">
                    <img src="{{ asset('images/product/'.$product->image) }}" alt="{{ $product->title }}">

                    <div class="product-body">
                        <h3>{{ $product->title }}</h3>

                        <p>{{ \Illuminate\Support\Str::limit($product->content,320) }}</p>

                        <div class="product-footer">
                            <span>{{ $product->category->title }}</span>
                            <span><a class="rMore" href="{{route('index.product',['title'=>$product->title,'id'=>$product->id])}}">Read more...</a></span>

                            <span>{{ $product->created_at->format('Y-m-d') }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <p>No Product</p>
            @endforelse
        </main>