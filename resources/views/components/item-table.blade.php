<div class="list-group"  style="overflow:scroll; height:90px;">
    @if ($items)
    @foreach ($items as $item)
            <a target="_blank" href="{{route('products.show',$item)}}" class="list-group-item list-group-item-action ">{{$item->getTitle()}}</a>
    @endforeach
</div>
@endif
