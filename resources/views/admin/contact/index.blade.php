@extends('admin.layout.master')
@section('title') main-categories @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.contacts.index')}}">@langucw('informations')</a></li>
    <li class="breadcrumb-item active">@langucw('contacts')</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card ">

                    <div class="card-datatable p-3">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>{{trans('general.name')}}</th>
                                <th>@langucw('email')</th>
                                <th>@langucw('phone')</th>
                                <th>@langucw('date')</th>
                                <th>@langucw('is readed')</th>
                                <th>@langucw('is replayed')</th>
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
                ajax: "{{ route('dashboard.contacts.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'Name', name: 'Name'},
                    {data: 'EMail', name: 'EMail'},
                    {data: 'Phone', name: 'Phone'},
                    {data: 'Date', name: 'Date'},
                    {data: 'IsReaded', name: 'IsReaded'},
                    {data: 'IsReplayed', name: 'IsReplayed'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>



@endsection
