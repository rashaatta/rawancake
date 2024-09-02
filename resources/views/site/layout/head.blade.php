<meta charset="utf-8">
<meta content="{{ csrf_token() }}" name="csrf-token">
<meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="Cake&#39;s Dream is Beautiful Template " name="description">
<meta content="" name="author">
{!! SEO::generate(false) !!}
<link href="{{asset('site/assets/images/favicon-32x32.png')}}" rel="shortcut icon">
<title>@langucw('rwan cacke')</title>

@php  $verastion=\Config::get('core.setting.verastion','0'); @endphp
    <!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('site/bakerfresh/assets/images/favicon.png')}}">

<!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

<!-- Font CSS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Allura&family=Handlee&family=Inter:wght@300;400;500;600;700&family=Comfortaa:wght@300;400;500;600;700&family=Montaga&family=Pacifico&family=Fredericka+the+Great&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Yellowtail&display=swap"
    rel="stylesheet">

<!-- Vendor CSS (Bootstrap & Icon Font) -->
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/vendor/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/vendor/lastudioicons.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/vendor/dliconoutline.css')}}">

<!-- Plugins CSS (All Plugins Files) -->
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/swiper-bundle.min.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/ion.rangeSlider.min.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/lightgallery-bundle.min.css')}}">
<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/magnific-popup.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>

<!-- Style CSS -->
{{--<link rel="stylesheet" href="{{asset('site/bakerfresh/assets/css/style.css')}}?v=2">--}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
@vite('resources/css/style.css')
@if(getLang() != 'En')
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600&family=Nunito+Sans:opsz,wght@6..12,400;6..12,600;6..12,700&display=swap"
      rel="stylesheet">
  @vite('resources/css/style-rtl.css')
{{--  <link rel="stylesheet" href="{{asset('assets/css/rtl_bootstrap.css')}}?v=1">--}}
@endif
<script src="{{asset('site/assets/javascripts/modernizr.custom.js')}}"></script>
<script src="{{asset('js/app.js?v=3.8')}}"></script>

<script src="{{asset('js/clipboard.js?v=2')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@include('components.cart.head-script')
@include('flatpickr::components.style')
@include('flatpickr::components.script')
@include('sweetalert::alert')
@stack('css')
