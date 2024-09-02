@extends('admin.layout.master')
@section('title')
    {{trans('general.coupons')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.coupons.index')}}">{{trans('general.offers_and_discounts')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.coupons')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <a href="{{route('dashboard.coupons.create')}}"
                           class="btn btn-success">{{trans('general.create')}} </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('serial')</th>
                                <th>@langucw('usage limit')</th>
                                <th>@langucw('number of users')</th>
                                <th>@langucw('fixed discount')</th>
                                <th>@langucw('relative discount')</th>
                                <th>@langucw('expiration_date')</th>
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
                    url: "{{ route('dashboard.coupons.index') }}"

                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Serial', name: 'Serial'},
                    {data: 'UsedLimit', name: 'UsedLimit'},
                    {data: 'UsedCount', name: 'UsedCount'},
                    {data: 'FixedDiscount', name: 'FixedDiscount'},
                    {data: 'RelativeDiscount', name: 'RelativeDiscount'},
                    {data: 'Expiration', name: 'Expiration'},
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
