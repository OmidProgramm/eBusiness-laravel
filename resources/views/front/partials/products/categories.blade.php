<h5>Categories Side</h5>
<ul class="categories">
    @forelse ($category as $item)
        <li><a href="{{route('index.category',['id'=>$item->id])}}">{{$item->title}}</a></li>
    @empty
       <li><a href="#">Empty</a></li> 
    @endforelse
</ul>