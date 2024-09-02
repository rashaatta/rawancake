@extends('site.layout.master',['show_slider'=>false,'title'=>$page->title])
@section('title', __($page->title))
@section('css') @endsection
@section('breadcrumb')
    <li><a href="{{route('home')}}">@langucw('home')</a></li>
    <li> {{__($page->title)}} </li>
@endsection
@section('content')
    <div class="section-padding-03 contact-section2 contact-section2_bg">
        <div class="container custom-container">
            <div class="has-padding page-content">{!! $page->getTranslation('content', app()->getLocale()) !!}</div>
        </div>
    </div>
@endsection
@section('scripts') @endsection
