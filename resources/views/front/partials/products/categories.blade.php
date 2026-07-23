<h5>Categories</h5>
<ul>
    @forelse ($category as $item)
        <li><a href="{{route('index.category')}}">{{$item->title}}</a></li>
    @empty
       <li><a href="#">Empty</a></li> 
    @endforelse
</ul>