@extends('site.layout.master')
@section('title')@endsection
@section('css') @endsection
@section('breadcrumb') @endsection
@php $home='home'; @endphp
@section('content')
    <!-- Slider Section Strat -->
    @include('components.slider')
    <!-- Slider Section End -->

    <!-- Product Section Strat -->
    @include('site.home.new-products-widget')
    <!-- Product Section End -->

    {{--        flash-sale--}}
    @include('site.home.flash-sale-widget')

    {{--        Discount--}}
    @include('components.discount-item')


    @include('components.condition-deliverie')
    <!-- Youtube Strat -->
    <div class="featured-products section-padding-03">
        <div class="container">


            <div class="row mb-n30">
                <div class="col-md-3 mb-30">
                    <!-- Featured Products Item Content Strat -->
                    <div class="featured-product-item__content">
                        <h4 class="featured-product-item__title">Delicious</h4>
                        <p>Aliqua id fugiat nostrud irure ex duis ea quis id Sunt qui esse pariatur duis deserunt mollit
                            dolore</p>
                    </div>
                    <!-- Featured Products Item Content End -->
                    <!-- Featured Products Item Content Strat -->
                    <div class="featured-product-item__content">
                        <h4 class="featured-product-item__title">Chocolate</h4>
                        <p>Aliqua id fugiat nostrud irure ex duis ea quis id Sunt qui esse pariatur duis deserunt mollit
                            dolore</p>
                    </div>
                    <!-- Featured Products Item Content End -->

                </div>
                <div class="col-md-6 mb-30">

                    <!-- Featured Products Item Image Strat -->
                    <div class="featured-product-item__image v-c">
                        <iframe width="100%" height="330"
                                src="https://www.youtube.com/embed/lC1jv_xWZwk?si=hRbpV_4y1bkbExvx"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>

                    </div>
                    <!-- Featured Products Item Image End -->

                </div>
                <div class="col-md-3 mb-30">
                    <!-- Featured Products Item Content Strat -->
                    <div class="featured-product-item__content text-lg-end">
                        <h4 class="featured-product-item__title">Flavor</h4>
                        <p>Aliqua id fugiat nostrud irure ex duis ea quis id Sunt qui esse pariatur duis deserunt mollit
                            dolore</p>
                    </div>
                    <!-- Featured Products Item Content End -->
                    <!-- Featured Products Item Content Strat -->
                    <div class="featured-product-item__content text-lg-end">
                        <h4 class="featured-product-item__title">Species</h4>
                        <p>Aliqua id fugiat nostrud irure ex duis ea quis id Sunt qui esse pariatur duis deserunt mollit
                            dolore</p>
                    </div>
                    <!-- Featured Products Item Content End -->

                </div>
            </div>
        </div>
    </div>

    <!-- Youtube End -->

    <!-- Best Service Section Strat -->
    <div class="best-service">

        <!-- Section Title Strat -->
        <div class="section-title-04 text-center">
            <h5 class="section-title-04__sub-title">Best service</h5>
            <h2 class="section-title-04__title">Best service</h2>
        </div>
        <!-- Section Title End -->

        <div class="container">
            <div class="row gx-xxl-10 mb-n30">
                <div class="col-lg-6 col-12 mb-30">

                    <!-- Section Title Strat -->
                    <div class="best-service-image">
                        <div class="best-service-image__image"
                             style="background-image: url({{asset('site/bakerfresh/assets/images/best-service-image.jpg')}});"></div>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-lg-6 col-12 mb-30">
                    <div class="row g-6">
                        <div class="col-sm-6">

                            <!-- Best Service Strat -->
                            <div class="best-service-item">
                                <div class="best-service-item__sub-title">01.</div>
                                <h4 class="best-service-item__title">Custom shape</h4>
                                <p class="best-service-item__desc">Nulla Lorem mollit cupidatat irure. Laborum magna
                                    nulla duis ullamco.</p>
                            </div>
                            <!-- Best Service End -->

                        </div>
                        <div class="col-sm-6">

                            <!-- Best Service Strat -->
                            <div class="best-service-item">
                                <div class="best-service-item__sub-title">02.</div>
                                <h4 class="best-service-item__title">Free shipping</h4>
                                <p class="best-service-item__desc">Nulla Lorem mollit cupidatat irure. Laborum magna
                                    nulla duis ullamco.</p>
                            </div>
                            <!-- Best Service End -->

                        </div>
                        <div class="col-sm-6">

                            <!-- Best Service Strat -->
                            <div class="best-service-item">
                                <div class="best-service-item__sub-title">03.</div>
                                <h4 class="best-service-item__title">new design</h4>
                                <p class="best-service-item__desc">Nulla Lorem mollit cupidatat irure. Laborum magna
                                    nulla duis ullamco.</p>
                            </div>
                            <!-- Best Service End -->

                        </div>
                        <div class="col-sm-6">

                            <!-- Best Service Strat -->
                            <div class="best-service-item">
                                <div class="best-service-item__sub-title">04.</div>
                                <h4 class="best-service-item__title">high-quality service</h4>
                                <p class="best-service-item__desc">Nulla Lorem mollit cupidatat irure. Laborum magna
                                    nulla duis ullamco.</p>
                            </div>
                            <!-- Best Service End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Best Service Section End -->

    <!-- Product List Section Strat -->
    <div class="section-padding-01">
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mb-n50">
                <div class="col mb-50">

                    <!-- Product List Section Strat -->
                    @include('site.home.special-widget')
                    <!-- Product List Section End -->

                </div>
                <div class="col mb-50">

                    <!-- Product List Section Strat -->
                    @include('site.home.best-sellers-widget')
                    <!-- Product List Section End -->

                </div>
                <div class="col mb-50">

                    <!-- Product List Section Strat -->
                    @include('site.home.most-viewed-widget')
                    <!-- Product List Section End -->

                </div>
            </div>
        </div>
    </div>
    <!-- Product List Section End -->

    <!-- Event Section Strat -->
    <div class="event">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="event_image">
                        <img src="{{asset('site/bakerfresh/assets/images/event/event-01.jpg')}}" alt="Event-Image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="event_content">
                        <span class="event_subtitle">New Event</span>
                        <h2 class="event_title">10K+ client</h2>
                        <span class="event_discount">sale up to 50%</span>
                        <p class="event_text">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui
                            esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure
                            tempor</p>
                        <a href="shop-checkout.html" class="btn btn-outline-dark btn-hover-secondary rounded-pill">purchase
                            now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Section End -->
    <!-- Scroll Top Start -->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="lastudioicon-up-arrow"></i>
    </a>
    <!-- Scroll Top End -->

@endsection
@section('scripts')
@endsection
