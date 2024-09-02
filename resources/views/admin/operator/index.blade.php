@extends('admin.layout.master')
@section('title')
    {{trans('general.operator')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.operator.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.operator')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('dashboard.operator.create')}}"
                           class="btn btn-success">{{trans('general.create')}} </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>{{trans('general.name_ar')}}</th>
                                <th>{{trans('general.name_en')}}</th>
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
            $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('dashboard.operator.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name_ar', name: 'name_ar'},
                    {data: 'name_en', name: 'name_en'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
