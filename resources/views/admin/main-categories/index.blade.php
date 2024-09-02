@extends('admin.layout.master')
@section('title')
    {{trans('general.categories')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.main-categories.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.categories')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered data-table">
                        <thead>
                        <tr>
                            <th>{{trans('general.id')}}</th>
                            <th>@langucw('the image')</th>
                            <th>@langucw('section title ar')</th>
                            <th>@langucw('section title en')</th>
                            <th>@langucw('ShortcutName')</th>
                            <th>@langucw('ShortcutNameEN')</th>
                            <th>@langucw('Visible')</th>
                            <th style="width: 10%">{{trans('general.action')}}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
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
                ajax: "{{ route('dashboard.main-categories.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'Name', name: 'name'},
                    {data: 'NameEN', name: 'NameEN'},
                    {data: 'ShortcutName', name: 'ShortcutName'},
                    {data: 'ShortcutNameEN', name: 'ShortcutNameEN'},
                    {data: 'Visible', name: 'Visible'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>

@endsection
