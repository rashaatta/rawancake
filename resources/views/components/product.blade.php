@if($product)
    <div class="col mb-50">
        <!-- Product Item Start -->
        <div class="product-item text-center">
            @php $offer=$product?->offerActive->last(); @endphp
            @if($offer)
                <div class="product-item__badge">{{$genralSetting->getCurrency()}} {{$product->price()}}</div>
            @endif
            @if($discount>0)
                <div class="product-item__badge">{{trans('general.discount')}} {{$discount}}</div>
            @endif

            <div class="product-item__image border w-100">
                <a href="{{route('products.show',$product)}}"><img width="350" height="350"
                                                                   src="{{asset($product->getFirstMediaUrl('products', 'medium'))}}"
                                                                   alt="Product"></a>
                <ul class="product-item__meta">
                    <li class="product-item__meta-action">
                        <a class="shadow-1 labtn-icon-quickview" onclick="quickview({{$product->id}})"
                           data-bs-tooltip="tooltip" data-bs-placement="top" title="@langucw('quick view')"></a>
                    </li>
                    <li class="product-item__meta-action">
                        <a class="shadow-1 labtn-icon-wishlist" @if(isLogged())onclick="addToFavorite({{$product->id}})"
                           @endif data-bs-tooltip="tooltip"></a>
                    </li>
                </ul>
            </div>
            <div class="product-item__content pt-5">
                <h5 class="product-item__title"><a
                        href="{{route('products.show',$product)}}">{{$product->getTitle()}}</a></h5>
                <span class="product-item__price">{{$genralSetting->getCurrency()}} {{$product->Price}}</span>

            </div>
        </div>
        <!-- Product Item End -->
    </div>
@endif







