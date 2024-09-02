@extends('admin.layout.master')
@section('title') {{trans('general.users')}} @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.user-admin.index')}}">@langucw('user admin')</a></li>
    <li class="breadcrumb-item active">@langucw('user admin')</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        @if(authorizeCheck('users admin create'))
                            <div class="card-header border-bottom">
                                <a href="{{route('dashboard.user-admin.create')}}"  class="btn btn-success">{{trans('general.create')}} </a>
                            </div>
                        @endif

                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>{{trans('general.name')}}</th>
                                <th>@langucw('email')</th>
                                <th>@langucw('avatar')</th>
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
                    url: "{{ route('dashboard.user-admin.index') }}",
                    data: {

                    }
                },
                columns: [
                    {data: 'id', name: 'id'},

                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'avatar', name: 'avatar'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[ 1, "asc" ]],
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
            $(".filter_by").change(function(){
                table.draw();
            });
        });

    </script>

@endsection
