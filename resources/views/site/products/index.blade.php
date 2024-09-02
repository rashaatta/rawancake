@extends('site.layout.master')
@section('title')
    {{trans('general.products')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li ><a href="{{route('home')}}">@langucw('home')</a></li>
    <li >@langucw('Product') </li>


@endsection
@section('content')

    <!-- Product Section Start -->
    <div class="shop-product-section sidebar-left overflow-hidden">
        <div class="container">
            <div class="row flex-md-row-reverse">
                <div class="col-md-8 section-padding-04">
                    <!-- Shop Top Bar Start -->
                    <div class="shop-topbar">

                        <div id="current_page" class="shop-topbar-item shop-topbar-left">
                                @include('components.page-show',['show'=>true])
                        </div>



                    </div>
                    <!-- Shop Top Bar End -->
                    <!-- Product Section Start -->
                    <div id="data-container">
                    @include('site.products.index-block')
                    </div>



                    <!-- Product Section End -->

                </div>
                <div class="col-md-4">
                    <div class="sidebars">
                        <div class="sidebars_inner">
                            <!-- Search Widget Start -->
{{--                            action="{{route('products.index',[$main_category->id??'',$sub_category])}}"--}}

                          <form class="sidebars_search"  >
                              <input type="hidden" id="sub_category" class="sub_category" name="sub_category" value="{{$sub_category}}">
                              <input type="hidden" id="main_category" class="main_category" name="main_category" value="{{$main_category->id??null}}">
                              <input type="hidden" id="page" name="page" value="{{$page??0}}">
                              <input name="search" value="{{$search??''}}"   class="sidebars_search__input" type="text" placeholder="Search…">
                              <button  class="sidebars_search__btn"><i apply-filter main_category="{{$main_category->id??null}}" sub_category="{{$sub_category?$sub_category->id:''}}" class="lastudioicon-zoom-1"></i></button>
                          </form>

                          <!-- Search Widget End -->

                          <!-- Category Widget Start -->
                          <div class="sidebars_widget">
                              <h3 class="sidebars_widget__title">@langucw('category')</h3>
                              @include('site.products.sidebars-widget-category')
                          </div>
                          <!-- Category Widget End -->

                          <!-- Price Filter Widget Start -->
{{--                          <div class="sidebars_widget">--}}
{{--                              <h3 class="sidebars_widget__title">Price Filter</h3>--}}
{{--                              <div class="range-slider">--}}
{{--                                  <input type="text" class="js-range-slider" value="" />--}}
{{--                              </div>--}}
{{--                              <div class="extra-controls">--}}
{{--                                  <button class="extra-controls_btn">Filter</button>--}}
{{--                                  <div class="extra-controls_filter">--}}
{{--                                      <label>Price: </label>--}}
{{--                                      <input type="text" class="js-input-from" value="0" /> - <input type="text" class="js-input-to" value="0" />--}}
{{--                                  </div>--}}
{{--                              </div>--}}
{{--                          </div>--}}
                          <!-- Price Filter Widget End -->


                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Product Section End -->

  <!-- Scroll Top Start -->
  <a href="#/" class="scroll-top" id="scroll-top">
      <i class="lastudioicon-up-arrow"></i>
  </a>
  <!-- Scroll Top End -->




@endsection

@push('scripts')


  <script>

  </script>
@endpush
