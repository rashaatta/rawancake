@extends('admin.layout.master')
@section('title')
    {{trans('general.sub_options')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('dashboard.product-options.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.product_options')}}</li>
    <li class="breadcrumb-item active">{{trans('general.sub_options')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group row">
                            <div class="col-sm-6">
                            <label class="col-sm-2 control-label lbl-parent"
                                   for="short_title_en">{{trans('general.sub_options')}}</label>
                            <div>
                                <select name="OptID" autocomplete="off" id="OptID" class="select2 basic_options w-100">
                                    @foreach($basic_options ??[] as $option)
                                        <option value="{{$option->id}}">{{$option->Name}}
                                            | {{$option->NameEN}} </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('the image')</th>
                                <th>{{trans('general.name_ar')}}</th>
                                <th>{{trans('general.name_en')}}</th>
                                <th>{{trans('general.available')}}</th>
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
                    url: "{{ route('dashboard.product-sub-options.index') }}",
                    data: function (d) {
                        d.basic_options = $('.basic_options').val()
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'Name', name: 'name'},
                    {data: 'NameEN', name: 'NameEN'},
                    {data: 'Available', name: 'Available'},
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
            $(".basic_options").change(function () {
                table.draw();
            });
        });

        var select_box_element = document.querySelector('#OptID');

        dselect(select_box_element, {
            search: true
        });


    </script>

@endsection
