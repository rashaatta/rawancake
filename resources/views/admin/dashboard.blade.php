@extends('admin.layout.master')

@section('title')@langucw('Dashboard') @endsection
@section('css') @endsection
@php
    $ipObj = app()->make(\App\Services\IpApiAdapter::class, ['ip' => null]);
//     $ipObj->getIpInfo();
    $countryCode = $ipObj->getCountryCode();
    @endphp
@section('content')
    {{$countryCode}}

    @if(Admin()->can('users view'))
        {{-- online users --}}
        <div class="col-xl-2 col-md-4 col-sm-6">
            <div class="card text-center">
                <a>
                    <div class="card-body">
                        <div class="avatar bg-light-success p-50 mb-1">
                            <div class="avatar-content">
                                <i class='fas fa-plug fa-xl '></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder">{{ $countOfOnlineUsers }}</h2>
                        <p class="card-text">@langucw('online users')</p>
                    </div>
                </a>
            </div>
        </div>
        {{-- online users last 24 hours --}}

            <div class="col-xl-2 col-md-4 col-sm-6">
                <div class="card text-center">
                    <a>
                        <div class="card-body">
                            <div class="avatar bg-light-success p-50 mb-1">
                                <div class="avatar-content">
                                    <i class='fas fa-plug fa-xl '></i>
                                </div>
                            </div>
                            <h2 class="font-weight-bolder">{{ $countOfOnlineUsersLast24Hours }}</h2>
                            <p class="card-text">@langucw('online users last 24 hours')</p>
                        </div>
                    </a>
                </div>
            </div>

    @endif

    <div class="row">
        {{-- registered users --}}
        @if(Admin()->can('users view'))
            <div class="col-lg-2 col-sm-6 col-12">
                @include('components.statistics.registered_user')
            </div>
        @endif
        {{-- completed sales --}}
        @if(Admin()->can('sales report view'))
            <div class="col-lg-2 col-sm-6 col-12">
                @include('components.statistics.sales')
            </div>
        @endif









    </div>


@endsection
@section('scripts')


@endsection
