@extends('admin.layout.master')
@section('title') main-categories @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.banner.index')}}">@langucw('informations')</a></li>
    <li class="breadcrumb-item active">@langucw('sliders')</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="dt-action-buttons ">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('dashboard.banner.create')}}"  class="btn btn-site btn-site waves-effect waves-float waves-light">{{trans('general.create')}} </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('title')</th>
                                <th>@langucw('url')</th>
                                <th>@langucw('image')</th>
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
                ajax: "{{ route('dashboard.banner.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'url', name: 'url'},
                    {data: 'image', name: 'image',width:'10%'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });


    </script>



@endsection
