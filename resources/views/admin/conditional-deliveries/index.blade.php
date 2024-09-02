@extends('admin.layout.master')
@section('title') {{trans('general.sub_categories')}} @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.conditional-deliveries.index')}}">{{trans('general.offers')}}</a></li>
    <li class="breadcrumb-item active">@langucw('index')</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="row">
                            <div class="form-group col-md-1 p-1">
                                <a href="{{route('dashboard.conditional-deliveries.create')}}"  class="btn btn-success">{{trans('general.create')}} </a>
                            </div>

                        </div>
                        Products
                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('title')</th>
                                <th> {{trans('general.products')}} </th>
                                <th>@langucw('zones')</th>
                                <th>@langucw('start date')</th>
                                <th>@langucw('end date')</th>
                                <th>@langucw('delivery')</th>
                                <th>@langucw('purchase value')</th>
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
                ajax: {
                    url: "{{ route('dashboard.conditional-deliveries.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'items', name: 'items'},
                    {data: 'zone_ids', name: 'zone_ids'},

                    {data: 'start_time', name: 'start_time'},
                    {data: 'end_time', name: 'end_time'},
                    {data: 'delivery', name: 'delivery'},
                    {data: 'purchase_value', name: 'purchase_value'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "language": {
                    "paginate": {
                        "previous": "@langucw('previous')",
                        "next": "@langucw('next')",
                        "first":      "@langucw('first')",
                        "last":       "@langucw('last')",
                    },
                    "search": "@langucw('search')",
                    "emptyTable":"@langucw('no data available in table')",
                    "infoEmpty":"@langucw('showing 0 to 0 of 0 entries')",
                    "info":   "@langucw('showing _START_ to _END_ of _TOTAL_ entries')",
                    "lengthMenu":     "Show _MENU_ entries",
                }
            });

        });

    </script>

@endsection
