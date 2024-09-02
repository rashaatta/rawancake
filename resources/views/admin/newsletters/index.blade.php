@extends('admin.layout.master')
@section('title') main-categories @endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.newsletters.index')}}">@langucw('newsletters')</a></li>
    <li class="breadcrumb-item active">@langucw('the list')</li>
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
                                <a href="{{route('dashboard.newsletters.export-newsletters')}}"  class="btn btn-site btn-site waves-effect waves-float waves-light">@langucw('export to Excel') </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-datatable">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('EMail')</th>

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
                ajax: "{{ route('dashboard.newsletters.index') }}",
                columns: [
                    {data: 'id', name: 'id',width:'20%'},
                    {data: 'EMail', name: 'EMail'},
                ]
            });
        });

    </script>



@endsection
