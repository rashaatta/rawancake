<!-- Header Start -->
<div class="header-section header-transparent header-sticky-03">
    <div class="container position-relative">

        <div class="row align-items-center">
            <div class="col-lg-3 col-5">
                <!-- Header Logo Start -->
                <div class="header-logo-02 m-0">
                    <a href="{{route('home')}}"><img src="{{asset('assets/img/logo_small.png')}}" width="60" height="63"
                                                     alt="Logo"></a>
                </div>
                <!-- Header Logo End -->
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <!-- Header Menu Start -->
                @include('site.layout.menu-web')
                <!-- Header Menu End -->
            </div>
            <div class="col-lg-3 col-7">
                <!-- Header Meta Start -->
                <div class="header-meta">
                    <ul class="header-meta__action header-meta__action-03 d-flex justify-content-end">
                        <li>
                            <button class="action search-open"><i class="lastudioicon-zoom-1"></i></button>
                        </li>
                        <li>
                            <button class="action" onclick="offcanvasCart()" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasCart">
                                <i class="lastudioicon-shopping-cart-2"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
                                    id="cart_count">{{\App\Services\CartService::getCount()}}</span>
                            </button>
                        </li>
                        @if(isLogged())
                            <li class="notifactions-conatainer">
                                <button class="action  show-note">
                                    <i class="fa fa-bell"></i>
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
                                        id="notifications_count">{{getLogged()->unreadNotifications()->count()}}</span>
                                    @include('site.layout.notifications')
                                </button>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            @auth
                                <li><a class="action" href="{{route('myprofile.index')}}"><i
                                            class="lastudioicon-single-01-2"></i></a></li>
                            @else
                                <li><a class="action" href="{{route('login')}}"><i class="lastudioicon-single-01-2"></i></a>
                                </li>

                            @endauth
                        @else
                        @endif
                        <li class="d-lg-none">
                            <button class="action" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"><i
                                    class="lastudioicon-menu-8-1"></i></button>
                        </li>
                    </ul>
                </div>
                <!-- Header Meta End -->
            </div>
        </div>

    </div>
</div>
<!-- Header End -->




