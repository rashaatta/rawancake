<!DOCTYPE html>
<html class="no-js" lang="{{ \Config::get('app.locale') == 'en' ? 'en' : 'ar' }}"
      dir="{{ \Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
<head>
    @php  $verastion=\Config::get('setting.verastion'); @endphp
    @include('site.layout.head')
    @include('components.head-script')
</head>
<body dir="{{ \Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }};"
      style="direction: {{ \Config::get('app.locale') == 'en' ? 'ltr' : 'rtl' }}">
{{--form used by js to delete resource on backend--}}
<form style='display: none;' id='delete-form' action="" method="post">@csrf<input type="hidden" name="_method"
                                                                                  value="post"></form>
@include('site.layout.header')
@include('site.layout.search')
<!-- offcanvas Menu Start -->
@include('site.layout.menu')
<!-- offcanvas Menu End -->
<!-- Offcanvas Cart Start  -->
@include('components.offcanvas-cart')
<!-- Offcanvas Cart End -->
@if(!isset($home))
    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="breadcrumb_title">@yield('title')</h1>
                        <ul class="breadcrumb_list">
                            @yield('breadcrumb')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->
@endif
@yield('content')
@include('site.layout.footer')
@include('site.layout.footer-scripts')
</body>
</html>
