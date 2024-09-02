@extends('admin.layout.master')
@section('title') @endsection
@section('css') @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.zones.index')}}">@langucw('zones')</a></li>
    <li class="breadcrumb-item active">@langucw('show')</li>
@endsection

@section('content')
    @include('components.messagesAndErrors')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" action="" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="custom-file-input" name="blob" id="blob" value="zones">
            <div class="card">
                <div class="card-header">

                </div>

                <div class="row m-2">
                    {{-- AddresAr --}}
                    <div class="col-5">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="first-name">@lang('AddresAr')</label>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="text" class="form-control" name="AddresAr"
                                       value='{{ old('AddresAr')??$entity->AddresAr }}'
                                       placeholder="@lang('AddresAr')"/>
                            </div>
                        </div>
                    </div>
                    {{-- AddresEn --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="first-name">@lang('AddresEn')</label>
                            </div>
                            <div class="col-sm-9">
                                <input disabled type="text" class="form-control" name="AddresEn"
                                       value='{{ old('AddresEn')??$entity->AddresEn }}'
                                       placeholder="@lang('AddresEn')"/>
                            </div>
                        </div>
                    </div>




                </div>

                <div class="row m-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th class="w-25" scope="col">@langucw('today')</th>
                            <th class="w-25" scope="col">@langucw('delivery price')</th>
                            <th class="w-25" scope="col"></th>
                            <th class="w-25" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>@langucw('saturday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.0')??$deliveries[0] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td class="w-50">@langucw('sunday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.1')??$deliveries[1] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td class="w-50">@langucw('monday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.2')??$deliveries[2] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td class="w-50">@langucw('tuesday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.3')??$deliveries[3] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td class="w-50">@langucw('wednesday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.4')??$deliveries[4] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>

                            <th scope="row">6</th>
                            <td class="w-50">@langucw('thursday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.5')??$deliveries[5] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td class="w-50">@langucw('friday')</td>
                            <td><input disabled type="text" class="form-control" name="delivery[]"
                                       value='{{ old('delivery.6')??$deliveries[6] }}'
                                       placeholder="@lang('delivery price')"/></td>
                            <td></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>

        </form>

        <div class="card">
            <div class="card-header">

            </div>
            <div class="row m-2">
                <div class="col-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">@langucw('start time')</th>
                            <th scope="col">@langucw('end time')</th>
                            <th scope="col">@langucw('delivery')</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($entity->zoneOptions as $index=>$item)
                            <tr>
                                <th scope="row">{{$index+1}}</th>
                                <td>{{$item->start_time}}</td>
                                <td>{{$item->end_time}} </td>
                                <td>{{$item->delivery}}</td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <script>
        function divAddFun() {
            $("#div_add").show();
        }

        function divhidFun() {
            $("#div_add").hide();
        }


    </script>
@endsection
