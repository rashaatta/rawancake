@extends('admin.layout.master')
@section('title')
    {{trans('general.products_report')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.product-options.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.products_report')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @include('components.date-range-input')
{{--                        <div class="dt-buttons">--}}
{{--                            <a onclick="event.preventDefault();exportExel();"--}}
{{--                               class="btn btn-success waves-effect waves-float waves-light">@langucw('export to--}}
{{--                                Excel') </a>--}}
{{--                        </div>--}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('image')</th>
                                <th>{{trans('general.name')}}</th>
                                <th>@langucw('category')</th>
                                <th>@langucw('price')</th>
                                <th>@langucw('quantity')</th>
                                <th>@langucw('total')</th>

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

        function exportExel() {
            window.location.href = "{{ route('dashboard.product-report.export-sales-report') }}?&from_date={{ \Request()->input('from_date') }}&to_date={{ \Request()->input('to_date') }}";
        }

        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.product-report.index') }}",
                    data: function (d) {
                        d.from_date = "{{ \Request()->input('from_date') }}";
                        d.to_date = "{{ \Request()->input('to_date') }}";
                        d.payment_method = $('.payment_method').val();
                        d.receiving_method = $('.receiving_method').val();
                    }
                },
                columns: [
                    {data: 'itemID', name: 'itemID'},
                    {data: 'Image', name: 'Image'},
                    {data: 'Name', name: 'Name'},
                    {data: 'Category', name: 'Category'},
                    {data: 'Price', name: 'Price'},

                    {data: 'Quantity', name: 'Quantity'},
                    {data: 'Total', name: 'Total'},

                ],
                order: [[0, "DESC"]],
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
