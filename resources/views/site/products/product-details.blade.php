<div class="col-lg-6">
    <!-- Product Summery Start -->
    <div class="product-summery position-relative">

        <!-- Product Head Start -->
        <div class="product-head mb-3">
            <span
                class="product-head-price">{{$product->price()}} {{$genralSetting->getCurrency()}}</span>
            <div class="review-rating">
                <span id="" class="review-rating-bg">
                    <span class="review-rating-active"
                          style="width: {{$product->getPercentage()}}%"></span>
                </span>

                <a href="#/" class="review-rating-text">({{$product->getRateCount()}}
                    @langucw('review'))</a>
            </div>
        </div>
        <!-- Product Head End -->

        <!-- Description Start -->
        <p class="desc-content">{{$product->getTitle()}}</p>
        <p class="desc-content">{{$product->getDescription()}}</p>
        <!-- Description End -->

        <div class="col-md-12" >
            <div class="form-group">
                <label for="note"  class="required">@langucw('note')</label>
                <input class="form-control" type="text" id="note" name="note" value="">
            </div>
        </div>

        @if($discount>0)
            <div class="product-item__badge2">{{trans('general.discount')}} {{$discount}} %</div>
        @endif
        @if($endDate)
            <p>@include('components.count-down',['end_time'=>$endDate])</p>
        @endif
        @include('components.product-option-detil',['options'=>$options])
        @include('components.product-special-image')

        <!-- Product Quantity, Cart Button, Wishlist and Compare Start -->
        <ul class="product-cta">
            <li>
                <!-- Cart Button Start -->
                <div class="cart-btn">
                    <div class="add-to_cart">
                        <a class="btn btn-primary" onclick="addToCart({{$product->id}})">
                            @langucw('add to cart')</a>
                    </div>
                </div>
                <!-- Cart Button End -->
            </li>
            <li>
                <!-- Action Button Start -->
                <div class="actions">
                    @if(getLogged())
                        <a onclick="addToFavorite({{$product->id}})" title="Wishlist"
                           class="action  wishlist "><i id="favorite_{{$product->id}}"
                                                        class="favorite_{{$product->id}} @if(isLogged()){{getLogged()->hasFavorite($product)?'lastudioicon-heart-1':'lastudioicon-heart-2'}} @else lastudioicon-heart-1 @endif"></i></a>
                    @endif

                </div>
                <!-- Action Button End -->
            </li>
        </ul>
        <!-- Product Quantity, Cart Button, Wishlist and Compare End -->

        <!-- Product Meta Start -->
        <ul class="product-meta">

            <li class="product-meta-wrapper">
                <span class="product-meta-name">@langucw('main category'):</span>
                <span class="product-meta-detail">
                                    <a>{{$product->subCategory->mainCategory($product->subCategory->CatID)->getName()}}</a>
                                </span>
            </li>
            <li class="product-meta-wrapper">
                <span class="product-meta-name">@langucw('category'):</span>
                <span class="product-meta-detail">
                                    <a>{{$product->subCategory->getName()}}</a>
                                </span>
            </li>


            <li class="product-meta-wrapper">
                <span class="product-meta-name">@langucw('views'):</span>
                <span class="product-meta-detail">
                                    <a>{{$product->Views}}</a>
                                </span>
            </li>
        </ul>
        <!-- Product Meta End -->

        <!-- Product Shear Start -->
        <div class="product-share">
            @include('components.share')
        </div>
        <!-- Product Shear End -->

    </div>
    <!-- Product Summery End -->

</div>
