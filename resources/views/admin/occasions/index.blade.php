@extends('admin.layout.master')
@section('title') main-categories @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.occasions.index')}}">@langucw('occasions')</a></li>
    <li class="breadcrumb-item active">@langucw('occasions')</li>
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
                                <a href="{{route('dashboard.occasions.create')}}"  class="btn btn-site btn-site waves-effect waves-float waves-light">{{trans('general.create')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('title ar')</th>
                                <th>@langucw('title en')</th>
                                <th>@langucw('description ar')</th>
                                <th>@langucw('description en')</th>
                                <th>@langucw('date')</th>
                                <th>@langucw('active')</th>
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
                ajax: "{{ route('dashboard.occasions.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title_ar', name: 'title_ar'},
                    {data: 'title_en', name: 'title_en'},
                    {data: 'description_ar', name: 'description_ar'},
                    {data: 'description_en', name: 'description_en'},
                    {data: 'date', name: 'date'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>



@endsection
