@extends('admin.layout.master')
@section('title')
    {{trans('general.sales_report')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="#">{{trans('general.requests')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.sales_report')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        @include('components.date-range-input')
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>@langucw('payment method')</label>
                                <select name="payment_method" autocomplete="off" id="payment_method"
                                        class="select2 payment_method  w-100">
                                    <option value="all">@langucw('all')</option>
                                    <option value="cash_on_delivery">@langucw('cash on delivery')</option>
                                    <option value="electronic_payment">@langucw('electronic payment')</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label>@langucw('receiving method')</label>
                                <select name="receiving_method" autocomplete="off" id="receiving_method"
                                        class="select2 receiving_method w-100">
                                    <option value="all">@langucw('all')</option>
                                    <option value="personal_pickup">@langucw('personal pickup')</option>
                                    <option value="delivery_address">@langucw('delivery address')</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4" >
                                <div  style="margin-top: 2rem">
                                    <a onclick="event.preventDefault();exportExel();"
                                       class="btn btn-success float-right">@langucw('export to Excel') </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('source')</th>
                                <th>@langucw('payment method')</th>
                                <th>{{trans('general.name')}}</th>
                                <th>@langucw('phone')</th>
                                <th>@langucw('address')</th>
                                <th>@langucw('delivery time')</th>
                                <th>@langucw('the amount required')</th>
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

        function exportExel() {

            window.location.href = "{{ route('dashboard.sales-report.export-sales-report') }}?payment_method=" + $('#payment_method').val() + "&receiving_method=" + $('#receiving_method').val() + "&from_date={{ \Request()->input('from_date') }}&to_date={{ \Request()->input('to_date') }}";

        }


        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.sales-report.index') }}",
                    data: function (d) {
                        d.from_date = "{{ \Request()->input('from_date') }}";
                        d.to_date = "{{ \Request()->input('to_date') }}";
                        d.payment_method = $('.payment_method').val();
                        d.receiving_method = $('.receiving_method').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Source', name: 'Source'},
                    {data: 'PaymentMethod', name: 'PaymentMethod'},
                    {data: 'Name', name: 'Name'},
                    {data: 'Phone', name: 'Phone'},
                    {data: 'address', name: 'address'},
                    {data: 'DeliveryTime', name: 'DeliveryTime'},
                    {data: 'Total', name: 'Total'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
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
            $(".payment_method").change(function () {
                table.draw();
            });
            $(".receiving_method").change(function () {
                table.draw();
            });
        });

    </script>

@endsection
