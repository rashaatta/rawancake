@extends('admin.layout.master')
@section('title') @endsection
@section('css') @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.branches.index')}}">@langucw('branches')</a></li>
    <li class="breadcrumb-item active">{{trans('general.create')}}</li>
@endsection

@section('content')
    @include('components.messagesAndErrors')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" action="{{route('dashboard.branches.update',$entity)}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="custom-file-input" name="blob" id="blob" value="branches" >
            <div class="card">
                <div class="card-header">

                </div>

                <div class="row m-2">
                    {{-- AddresAr --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">
                                <label for="first-name">@lang('AddresAr')</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="AddresAr" value='{{ old('AddresAr')??$entity->AddresAr }}' placeholder="@lang('AddresAr')" />
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
                                <input type="text" class="form-control" name="AddresEn" value='{{ old('AddresEn')??$entity->AddresEn }}' placeholder="@lang('AddresEn')" />
                            </div>
                        </div>
                    </div>






                </div>

                <div class="col-3 mb-3">
                    <button type="submit" class="btn btn-danger">{{trans('general.update')}}</button>

                </div>
            </div>

        </form>
    </section>

@endsection
@section('scripts')

@endsection
