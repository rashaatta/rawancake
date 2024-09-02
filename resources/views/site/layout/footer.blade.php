<!-- Footer Strat -->
@php $generalInfo=\App\Services\GeneralInfoService::getGeneralInfo(); @endphp
<div class="footer-section dark-footer">

    <!-- Footer Widget Section Strat -->
    <div class="footer-widget-section pb-0">
        <div class="container custom-container">
            <div class="row gy-8">

                <div class="col-md-3">
                    <!-- Footer Widget Section Strat -->
                    <div class="footer-widget">
                        <div class="footer-widget__logo">
                            <a class="logo-dark" href="{{route('home')}}"><img
                                        src="{{asset('assets/img/logo_small.png')}}" alt="Logo"></a>
                            <a class="logo-white d-none" href="{{route('home')}}"><img
                                        src="{{asset('assets/img/logo_small.png')}}" style="height: 100px !important;"
                                        alt="Logo"></a>
                        </div>
                        <div class="footer-widget__social">
                            {{--  link Facebook--}}
                            @if($generalInfo->Facebook)
                                <a target="_blank" href="{{$generalInfo->Facebook}}"><i
                                            class="lastudioicon-b-facebook"></i></a>
                            @endif
                            {{--  link Twitter--}}
                            @if($generalInfo->Twitter)
                                <a target="_blank" href="{{$generalInfo->Twitter}}"><i
                                            class="lastudioicon-b-twitter"></i></a>
                            @endif
                            {{--  link Pinterest--}}
                            @if($generalInfo->Pinterest)
                                <a target="_blank" href="{{$generalInfo->Pinterest}}"><i
                                            class="lastudioicon-b-pinterest"></i></a>
                            @endif
                            {{--  link Instagram--}}
                            @if($generalInfo->Instagram)
                                <a target="_blank" href="{{$generalInfo->Instagram}}"><i
                                            class="lastudioicon-b-instagram"></i></a>
                            @endif
                            {{--  link YouTube--}}
                            @if($generalInfo->YouTube)
                                <a target="_blank" href="{{$generalInfo->YouTube}}"><i
                                            class="lastudioicon-b-youtube"></i></a>
                            @endif
                            {{--  link FourSquare--}}
                            @if($generalInfo->FourSquare)
                                <a target="_blank" href="{{$generalInfo->FourSquare}}"><i
                                            class="lastudioicon-b-foursquare"></i></a>
                            @endif
                            {{--  link Tumblr--}}
                            @if($generalInfo->Tumblr)
                                <a target="_blank" href="{{$generalInfo->Tumblr}}">
                                    <i class="lastudioicon-b-tumblr"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                    <!-- Footer Widget Section End -->
                </div>
                <div class="col-md-3">
                    <!-- Footer Widget Strat -->
                    <div class="footer-widget flex-grow-1">
                        <h4 class="footer-widget__title-02">Services</h4>
                        <ul class="footer-widget__link">
                            <li><a href="{{route('favorites.index')}}"><span>@langucw('wishlist')</span></a></li>
                            <li><a
                                        href="{{route('page.show', ['routeName' => 'howToOrder'])}}"><span>@langucw('how to order')</span></a>
                            </li>
                            <li><a href="{{route('page.show', ['routeName' => 'ourStory'])}}"><span>@langucw('our story')</span></a>
                            </li>
                            <li><a
                                        href="{{route('page.show', ['routeName' => 'privacyPolicy'])}}"><span>@langucw('privacy policy')</span></a>
                            </li>
                            <li><a
                                        href="{{route('page.show', ['routeName' => 'termsAndConditions'])}}"><span>@langucw('terms and conditions')</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Footer Widget End -->
                </div>
                <div class="col-md-2">
                    <!-- Footer Widget Strat -->
                    <div class="footer-widget flex-grow-1">
                        <h4 class="footer-widget__title-02">{{trans('general.support')}}</h4>
                        <ul class="footer-widget__link">
                            <li><a href="{{route('contact_us.show')}}"><span>@langucw('contact')</span></a></li>
                            <li><a href="{{route('our_branches.show')}}">@langucw('our branches')</a></li>
                            <li><a href="{{route('page.show', ['routeName' => 'about'])}}">@langucw('about')</a></li>
                            <li><a target="_blank" href="https://careers.rawancake.jo/">@langucw('careers')</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Footer Widget Newsletter Strat -->
                    <div class="footer-widget">
                        <div class="footer-widget__newsletter ms-lg-auto">
                            <h4 class="footer-widget__title-02">@langucw('newsletters')</h4>

                            <div class="position-relative mt-3">
                                <form action="#">
                                    <input class="footer-widget__fild subscription-email" name="email" type="email"
                                           value="{{ old('email')  }}" placeholder="@langucw('your email')">
                                    <button class="footer-widget__btn btn btn-secondary subscription-btn">
                                        @langucw('subscription')
                                    </button>
                                </form>
                            </div>

                            <div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm dropdown-toggle lang-padding"
                                            style="padding-left: 0!important;"
                                            id="footerSelectLanguage" data-bs-toggle="dropdown" aria-expanded="false"
                                            data-bs-dropdown-animation>

                                    <span class="d-flex align-items-center">
                                        <img class="avatar avatar-xss avatar-circle me-2"
                                             src="{{asset('assets/img/flags/'.getLang().'.svg')}}"
                                             alt="" width="16"/><span style="color: #858585 !important;">
                                            @if(getLang() =='En')
                                                @langucw('english')
                                            @else
                                                @langucw('arabic')
                                            @endif
                                        </span>
                                    </span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="footerSelectLanguage">
                                        <a class="dropdown-item" style="color: #858585 !important; text-align: start;"
                                           href="{{route('app.change_language',['lang'=>'ar'])}}">
                                            <img class="avatar avatar-xss avatar-circle me-2"
                                                 src="{{asset('assets/img/flags/Ar.svg')}}"
                                                 alt="" width="16"/>@langucw('arabic')</a>
                                        <a class="dropdown-item" style="color: #858585 !important; text-align: start;"
                                           href="{{route('app.change_language',['lang'=>'en'])}}">
                                            <img class="avatar avatar-xss avatar-circle me-2"
                                                 src="{{asset('assets/img/flags/En.svg')}}"
                                                 alt="" width="16"/>@langucw('english')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Newsletter End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Widget Section End -->

    <!-- Footer Copyright Strat -->
    <div class="footer-copyright">
        <div class="container custom-container">
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col order-2 order-md-1">
                    <!-- Footer Copyright Text Strat -->
                    <div class="footer-copyright-text">

                        <p>&copy; {{date('Y')}} <strong> @langucw('All Rights Reserved') </strong> @langucw('rwan
                            cacke') </p>
                    </div>
                    <!-- Footer Copyright Text End -->
                </div>
                <div class="col order-1 order-md-2">
                    <!-- Footer Payment Icon Start -->
                    <ul class="footer-payment">

                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                                 viewBox="0 0 30 30">
                                <path fill="currentColor"
                                      d="M24.485 13.714s.395 1.938.484 2.344H23.23l.834-2.266c-.01.016.171-.475.275-.777l.146.699zM30 5.834v18.333a2.501 2.501 0 0 1-2.5 2.5h-25a2.502 2.502 0 0 1-2.5-2.5V5.833a2.501 2.501 0 0 1 2.5-2.5h25a2.501 2.501 0 0 1 2.5 2.5zM7.943 18.916l3.291-8.083H9.021l-2.047 5.52-.224-1.118-.73-3.72c-.12-.515-.489-.661-.947-.682h-3.37l-.036.161c.772.19 1.512.49 2.197.89l1.865 7.032h2.214zm4.917.01l1.312-8.093H12.08l-1.307 8.093h2.088zm7.286-2.645c.01-.922-.552-1.625-1.755-2.203-.734-.37-1.182-.62-1.182-1 .01-.345.38-.7 1.203-.7a3.585 3.585 0 0 1 1.557.308l.187.088.287-1.75a5.206 5.206 0 0 0-1.875-.344c-2.068 0-3.521 1.105-3.531 2.677-.016 1.161 1.041 1.807 1.833 2.197.807.396 1.084.656 1.084 1.005-.01.542-.656.791-1.255.791-.834 0-1.282-.13-1.964-.432l-.276-.13-.291 1.818c.489.224 1.396.422 2.333.432 2.197.005 3.63-1.084 3.646-2.76l-.001.003zm7.354 2.645l-1.688-8.093h-1.62c-.5 0-.88.146-1.094.672l-3.11 7.422h2.198s.359-1 .438-1.213h2.688c.062.287.25 1.213.25 1.213H27.5z"></path>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="none"
                                 viewBox="0 0 30 30">
                                <path fill="currentColor"
                                      d="M25.151 23.037c0 .354-.239.61-.583.61-.354 0-.583-.272-.583-.61 0-.339.229-.61.583-.61.344 0 .583.271.583.61zm-16.188-.61c-.37 0-.583.271-.583.61 0 .338.214.61.583.61.339 0 .568-.256.568-.61-.006-.339-.23-.61-.568-.61zm6.12-.015c-.28 0-.453.182-.495.453h.995c-.047-.297-.229-.453-.5-.453zm5.615.015c-.354 0-.567.271-.567.61 0 .338.214.61.567.61.354 0 .583-.256.583-.61 0-.339-.23-.61-.583-.61zm5.515 1.36c0 .016.016.026.016.057 0 .016-.015.026-.015.057-.016.016-.016.026-.027.041-.016.016-.026.027-.057.027-.016.015-.026.015-.057.015-.016 0-.026 0-.057-.015-.016 0-.027-.016-.042-.027-.015-.016-.026-.026-.026-.04-.016-.027-.016-.042-.016-.058 0-.026 0-.041.016-.057 0-.027.016-.042.026-.057.016-.016.027-.016.042-.027.026-.016.04-.016.057-.016.026 0 .041 0 .057.016.026.015.041.015.057.027.016.01.01.03.026.057zm-.114.073c.026 0 .026-.016.041-.016.016-.016.016-.026.016-.041 0-.015 0-.027-.016-.042-.015 0-.026-.016-.057-.016H26v.182h.041v-.073h.016l.057.073h.041l-.056-.067zM30 5.886V24.22a2.5 2.5 0 0 1-2.5 2.5h-25a2.5 2.5 0 0 1-2.5-2.5V5.886a2.501 2.501 0 0 1 2.5-2.5h25a2.501 2.501 0 0 1 2.5 2.5zm-26.666 7.27a7.216 7.216 0 0 0 7.213 7.213 7.27 7.27 0 0 0 3.984-1.202c-3.797-3.088-3.77-8.917 0-12.006a7.224 7.224 0 0 0-3.984-1.203c-3.979-.004-7.213 3.229-7.213 7.198zM15 18.824c3.672-2.865 3.656-8.448 0-11.328-3.656 2.88-3.672 8.468 0 11.328zm-7.412 3.974c0-.453-.297-.75-.766-.766-.24 0-.495.073-.666.338-.125-.214-.339-.338-.636-.338a.662.662 0 0 0-.552.28v-.228H4.54v1.912h.427c0-.985-.13-1.573.469-1.573.531 0 .427.531.427 1.573h.412c0-.954-.13-1.573.468-1.573.532 0 .427.52.427 1.573h.427v-1.198h-.01zm2.34-.714h-.412v.229a.753.753 0 0 0-.61-.281c-.536 0-.948.427-.948 1.005 0 .583.412 1.005.948 1.005.271 0 .469-.1.61-.282V24h.411v-1.916zm2.109 1.333c0-.78-1.193-.427-1.193-.792 0-.297.62-.25.964-.057l.171-.338c-.489-.318-1.573-.313-1.573.427 0 .744 1.193.432 1.193.78 0 .33-.703.303-1.078.042l-.182.328c.583.396 1.698.313 1.698-.39zm1.844.484l-.115-.354c-.197.108-.635.228-.635-.214v-.864h.682v-.386h-.682V21.5h-.428v.583h-.396v.38h.396v.87c0 .918.901.75 1.178.568zm.691-.697h1.433c0-.844-.385-1.178-.906-1.178-.553 0-.948.412-.948 1.005 0 1.068 1.177 1.245 1.76.74l-.197-.312c-.407.333-1.021.301-1.142-.255zm3.08-1.12c-.24-.104-.605-.094-.792.229v-.229h-.427v1.912h.427v-1.078c0-.605.495-.526.667-.438l.124-.396zm.551.953c0-.595.605-.787 1.079-.438l.197-.339c-.604-.473-1.703-.213-1.703.781 0 1.032 1.166 1.24 1.703.781l-.197-.338c-.48.338-1.079.136-1.079-.448zm3.474-.953h-.428v.229c-.432-.573-1.557-.25-1.557.724 0 1 1.166 1.286 1.557.723V24h.428v-1.916zm1.755 0c-.125-.063-.573-.15-.791.229v-.229h-.412v1.912h.412v-1.078c0-.573.468-.537.666-.438l.125-.396zm2.099-.776h-.412v1.005c-.427-.567-1.557-.265-1.557.724 0 1.01 1.172 1.28 1.557.723V24h.412v-2.692zm.396-3.911v.24h.042v-.24h.098v-.042h-.24v.042h.1zm.344 6.447c0-.026 0-.057-.015-.084-.016-.016-.027-.04-.042-.057-.015-.016-.04-.026-.057-.041-.026 0-.057-.016-.083-.016-.016 0-.042.016-.073.016a.313.313 0 0 0-.058.041c-.026.015-.04.041-.04.057-.017.027-.017.058-.017.084 0 .016 0 .041.016.073 0 .016.016.041.041.057a.163.163 0 0 0 .058.041.147.147 0 0 0 .073.015c.026 0 .057 0 .083-.015.016-.015.041-.026.057-.04.016-.016.027-.042.042-.058.015-.03.015-.057.015-.073zm.166-6.494h-.073l-.083.182-.083-.182h-.074v.281h.042v-.214l.083.182h.057l.073-.182v.214h.058v-.281zm.23-4.194c0-3.969-3.235-7.202-7.214-7.202a7.26 7.26 0 0 0-3.984 1.202c3.755 3.09 3.813 8.933 0 12.006a7.208 7.208 0 0 0 11.197-6.006z"></path>
                            </svg>
                        </li>

                    </ul>
                    <!-- Footer Payment Icon End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Footer Copyright End -->

</div>
<!-- Footer End -->

<div id="modal_product"></div>
{{--@include('site.layout.modal.exampleProductModal')--}}
{{--@include('site.layout.modal.modalCart')--}}
{{--@include('site.layout.modal.modalWishlist')--}}
@include('site.layout.modal.modalNotifications')

