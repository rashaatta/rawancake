@extends('admin.layout.master')
@section('title')
    {{request()->query('type') == 'section'? trans('general.discount_on_a_section'): trans('general.discount_on_a_product')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.discounts.index')}}">{{trans('general.offers_and_discounts')}}</a></li>
    <li class="breadcrumb-item active">{{request()->query('type') == 'section'? trans('general.discount_on_a_section'): trans('general.discount_on_a_product')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('dashboard.discounts.create',['type'=>$type??'section'])}}"
                           class="btn btn-success">{{trans('general.create')}} </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@if($type=='section')
                                        {{trans('general.categories')}}
                                    @else
                                        {{trans('general.products')}}
                                    @endif</th>
                                <th>@langucw('beginning of reservation')</th>
                                <th>@langucw('end of reservation')</th>
                                <th>@langucw('beginning of receipt')</th>
                                <th>@langucw('end of receipt')</th>
                                <th>{{trans('general.discount')}}</th>
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
                    url: "{{ route('dashboard.discounts.index',['type'=>$type??'section']) }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Cats', name: 'Cats'},
                    {data: 'BeginDate', name: 'BeginDate'},
                    {data: 'EndDate', name: 'EndDate'},
                    {data: 'BeginDelivery', name: 'BeginDelivery'},
                    {data: 'EndDelivery', name: 'EndDelivery'},
                    {data: 'Value', name: 'Value'},
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
