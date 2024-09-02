@extends('admin.layout.master')
@section('title') main-categories @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.zones.index')}}">@langucw('informations')</a></li>
    <li class="breadcrumb-item active">@langucw('pages')</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="dt-action-buttons ">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('dashboard.zones.create')}}"  class="btn btn-site btn-site waves-effect waves-float waves-light">{{trans('general.create')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('AddresAr')</th>
                                <th>@langucw('AddresEn')</th>
                                <th>{{trans('general.action')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.zones.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'AddresAr', name: 'AddresAr'},
                    {data: 'AddresEn', name: 'AddresEn'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>



@endsection
