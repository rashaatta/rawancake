<div  class="row row-cols-xl-3 row-cols-lg-2 row-cols-sm-2 row-cols-1 mb-n50">
    @foreach($products??[] as $product)
        @php
        $discount=app()->make(\App\Services\DiscountService::class)->getDiscountByItem($product);
        $endDate= app()->make(\App\Services\DiscountService::class)->getDiscountEndDateByItem($product);
        @endphp

        @include('components.product',[
            'discount'=>$discount,
            'endDate'=>$endDate,

                ])
    @endforeach
</div>
@include('components.page-show',['products'=>$products])
{{-- paginations --}}
{{--withQueryString()->--}}
<div att_last="{{$products->lastPage()}}" id="product_links">
    @if($products->lastPage() > 1)
        <div id="products" class="shop-bottombar">
            {{ $products->onEachSide(1)->links() }}
        </div>
    @endif
</div>








