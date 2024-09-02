<div  class="quickview-product-modal modal fade" id="exampleProductModal">
    <div class="modal-dialog modal-dialog-centered mw-100">
        <div class="container">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  >
                    <i  class="lastudioicon lastudioicon-e-remove"></i>
                </button>

                <div class="modal-body">
                    <!-- Single Product Top Area Start -->



                    <div class="row">
                        <div class="col-lg-6 offset-lg-0 col-md-10 offset-md-1">

                            <!-- Product Details Image Start -->
                            <div class="product-details-img d-flex overflow-hidden flex-row">

                                <!-- Single Product Image Start -->
                                <div class="single-product-vertical-tab swiper-container order-2">

                                    <div class="swiper-wrapper">
                                        <a class="swiper-slide h-auto" >
                                            <img class="w-100" src="{{asset($product->getFirstMediaUrl('products','large'))??''}}?v={{now()}}" alt="Product">
                                        </a>
                                        @if( $product->getMedia('attached_products') )
                                            @foreach (!empty('attached_products') ? $product->getMedia('attached_products') : $product->media ?? [] as $media)
                                                <a class="swiper-slide h-auto" >
                                                    <img class="w-100" src="{{$media->getUrl('large')??''}}?v={{now()}}" alt="Product">
                                                </a>

                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <!-- <div class="swiper-pagination d-none"></div> -->
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->

                                    @if(getLang() == 'En')
                                        <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-right"></i></div>
                                        <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-left"></i></div>
                                    @else
                                        <div class="swiper-button-vertical-next swiper-button-next"><i class="lastudioicon-arrow-left"></i></div>
                                        <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-arrow-right"></i></div>
                                    @endif



                                    <!-- Next Previous Button End -->

                                </div>
                                <!-- Single Product Image End -->

                                <!-- Single Product Thumb Start -->

                                <!-- Single Product Thumb End -->
                                <div class="product-thumb-vertical overflow-hidden swiper-container order-1">

                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="{{asset($product->getFirstMediaUrl('products','small'))??''}}?v={{now()}}" alt="Product">
                                        </div>
                                        @if( $product->getMedia('attached_products') )
                                            @foreach (!empty('attached_products') ? $product->getMedia('attached_products') : $product->media ?? [] as $media)
                                                <div class="swiper-slide">
                                                    <img src="{{$media->getUrl('large')??''}}?v={{now()}}" alt="Product">
                                                </div>

                                            @endforeach
                                        @endif
                                    </div>

                                    <!-- Swiper Pagination Start -->
                                    <!-- <div class="swiper-pagination d-none"></div> -->
                                    <!-- Swiper Pagination End -->

                                    <!-- Next Previous Button Start -->
                                    <!--
                                        <div class="swiper-button-vertical-next  swiper-button-next"><i class="lastudioicon-right-arrow"></i></div>
                                        <div class="swiper-button-vertical-prev swiper-button-prev"><i class="lastudioicon-left-arrow"></i></div>
                                    -->
                                    <!-- Next Previous Button End -->

                                </div>
                            </div>
                            <!-- Product Details Image End -->

                        </div>
                        <div class="col-lg-6">

                            <!-- Product Summery Start -->
                            <div class="product-summery position-relative">

                                <!-- Product Head Start -->
                                <div class="product-head mb-3">

                                    <!-- Price Start -->
                                    <span class="product-head-price">

                                        @if($offer)
                                        <del style="color: #0a0a0a"> {{$product->Price}}</del>  {{$product->price()}}
                                        @else
                                        {{$product->price()}}
                                        @endif
                                       </span>
                                    <!-- Price End -->
                                    @if($discount>0)
                                        <p>{{trans('general.discount')}} {{$discount}} %</p>
                                    @endif
                                    @if($endDate)
                                        <p>@include('components.count-down',['end_time'=>$endDate])</p>
                                    @endif
                                </div>
                                <!-- Product Head End -->

                                <!-- Description Start -->
                                <p class="desc-content">{{$product->getDescription()}}</p>
                                <!-- Description End -->

                                @php $options=$product->optionDetil->groupBy('POptID'); @endphp
                                @include('components.product-option-detil',['options'=>$options])
                                @include('components.product-special-image')



                                <!-- Product Quantity, Cart Button, Wishlist and Compare Start -->
                                <ul class="product-cta">

                                    <li>
                                        <!-- Cart Button Start -->
                                        <div class="cart-btn">
                                            <div class="add-to_cart">
                                                <a class="btn btn-dark btn-hover-primary" onclick="addToCart({{$product->id}})">@langucw('add to cart')</a>
                                            </div>
                                        </div>
                                        <!-- Cart Button End -->
                                    </li>
                                    <li>
                                        <!-- Action Button Start -->
                                        <div class="actions">
                                            <a @if(isLogged())onclick="addToFavorite({{$product->id}})" @endif title="Compare" class="action compare"><i id="favorite_{{$product->id}}" class="favorite_{{$product->id}}  @if(isLogged()){{getLogged()->hasFavorite($product)?'lastudioicon-heart-1':'lastudioicon-heart-2'}} @else lastudioicon-heart-1 @endif"></i></a>

                                        </div>
                                        <!-- Action Button End -->
                                    </li>
                                </ul>
                                <!-- Product Quantity, Cart Button, Wishlist and Compare End -->

                                <!-- Product Meta Start -->
                                <ul class="product-meta">

                                    <li class="product-meta-wrapper">
                                        <span class="product-meta-name">@langucw('category'):</span>
                                        <span class="product-meta-detail">
                                            <a >{{$product->subCategory->getName()}} </a>

                                        </span>
                                    </li>

                                </ul>
                                <!-- Product Meta End -->

                                <!-- Product Shear Start -->
                                @include('components.share')
                                <!-- Product Shear End -->

                            </div>
                            <!-- Product Summery End -->

                        </div>
                    </div>
                    <!-- Single Product Top Area End -->
                </div>
            </div>
        </div>
    </div>

</div>

@php  $verastion=\Config::get('core.setting.verastion','0');




@endphp
    <!-- Vendors JS -->

@if(strpos($_SERVER['HTTP_HOST'],'products')>0)

<script src="{{asset('site/bakerfresh/assets/js/main.js')}}?v={{ $verastion }}"></script>
<script src="{{asset('js/jquery.countdown.js')}}?v={{ $verastion }}"></script>
@else
   <script src="{{asset('site/bakerfresh/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
   <script src="{{asset('site/bakerfresh/assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
   <script src="{{asset('site/bakerfresh/assets/js/vendor/bootstrap.bundle.min.js?v=1')}}"></script>

   <!-- Plugins JS -->
   <script src="{{asset('site/bakerfresh/assets/js/swiper-bundle.min.js')}}"></script>
   <script src="{{asset('site/bakerfresh/assets/js/countdown.min.js')}}"></script>
   <script src="{{asset('site/bakerfresh/assets/js/ion.rangeSlider.min.js')}}"></script>
   <script src="{{asset('site/bakerfresh/assets/js/lightgallery.min.js')}}"></script>
   <!-- Activation JS -->
   <script src="{{asset('site/bakerfresh/assets/js/main.js')}}?v={{ $verastion }}"></script>
@endif









