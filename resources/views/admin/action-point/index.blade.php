@extends('admin.layout.master')
@section('title') {{trans('general.sub_categories')}} @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.point-settings.index')}}">@langucw('point settings')</a></li>
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


                    </div>

                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>{{trans('general.name')}}</th>
                                <th>@langucw('points')</th>
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
                    url: "{{ route('dashboard.point-settings.index') }}"
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'point', name: 'point'},

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
