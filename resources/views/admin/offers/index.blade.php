@extends('admin.layout.master')
@section('title')
    {{trans('general.offers')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.offers.index')}}">{{trans('general.offers_and_discounts')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.offers')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('dashboard.offers.create')}}"
                           class="btn btn-success">{{trans('general.create')}} </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('product')</th>
                                <th>@langucw('begin date')</th>
                                <th>@langucw('end date')</th>
                                <th>@langucw('fixed discount')</th>
                                <th>@langucw('relative discount')</th>
                                <th>@langucw('new price')</th>
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
                    url: "{{ route('dashboard.offers.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'ItemID', name: 'ItemID'},
                    {data: 'BeginDate', name: 'BeginDate'},
                    {data: 'EndDate', name: 'EndDate'},
                    {data: 'FixedDiscount', name: 'FixedDiscount'},
                    {data: 'RelativeDiscount', name: 'RelativeDiscount'},
                    {data: 'NewPrice', name: 'NewPrice'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
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
