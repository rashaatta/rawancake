@extends('admin.layout.master')
@section('title')
    {{request()->query('action') == 'NewOrder'? trans('general.requests_new'):(request()->query('action') == 'AcceptedOrder'? trans('general.requests_accepted'):trans('general.requests_rejected'))}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="#">{{trans('general.requests')}}</a></li>
    <li class="breadcrumb-item active">{{request()->query('action') == 'NewOrder'? trans('general.requests_new'):(request()->query('action') == 'AcceptedOrder'? trans('general.requests_accepted'):trans('general.requests_rejected'))}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th>@langucw('order number')</th>
                        <th>@langucw('source')</th>
                        <th>{{trans('general.name')}}</th>
                        <th>@langucw('phone number')</th>
                        <th>@langucw('adress')</th>
                        <th>@langucw('order time')</th>
                        <th>@langucw('delivery time')</th>
                        <th>@langucw('the required amount')</th>
                        <th>{{trans('general.action')}}</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.orders.index',['action'=>\Request()->input('action')]) }}",
                    data: function (d) {

                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Source', name: 'Source'},
                    {data: 'Name', name: 'Name'},
                    {data: 'Phone', name: 'Phone'},
                    {data: 'ZoneID', name: 'ZoneID'},
                    {data: 'OrderDate', name: 'OrderDate'},
                    {data: 'DeliveryTime', name: 'DeliveryTime'},
                    {data: 'Total', name: 'Total'},

                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[0, "desc"]],
                "language": {
                    "paginate": {
                        "previous": "@langucw('previous')",
                        "next": "@langucw('next')",
                        "first": "@langucw('first')",
                        "last": "@langucw('last')",
                    },
                    "search": "@langucw('search')",
                    "emptyTable": "@langucw('no data available in table')",
                    "infoEmpty": "@langucw('showing 0 to 0 of 0 entries')",
                    "info": "@langucw('showing _START_ to _END_ of _TOTAL_ entries')",
                    "lengthMenu": "Show _MENU_ entries",
                }
            });

        });

    </script>

@endsection
