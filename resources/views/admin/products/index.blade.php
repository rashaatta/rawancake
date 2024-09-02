@extends('admin.layout.master')
@section('title')
    {{trans('general.products')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.products.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.products')}}</li>
@endsection
@section('content')
    @include('components.messagesAndErrors')
    <div class="row">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group row">
                            <label class="col-sm-1 control-label"
                                   for="short_title_en">{{trans('general.categories')}}</label>
                            <div class="col-sm-10">
                                <select name="CatID" autocomplete="off" id="CatID" class="select2 sub_categories">
                                    @foreach($sub_categories ??[] as $category)
                                        <option value="{{$category->id}}">{{$category->Name}}
                                            | {{$category->NameEN}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable">
                            <table class="table table-bordered data-table">
                                <thead>
                                <tr>
                                    <th>{{trans('general.id')}}</th>
                                    <th>@langucw('main category')</th>
                                    <th>@langucw('the image')</th>
                                    <th>@langucw('section title ar')</th>
                                    <th>@langucw('section title en')</th>
                                    <th>@langucw('Description')</th>
                                    <th>@langucw('DescriptionEN')</th>
                                    <th>@langucw('price')</th>
                                    <th>{{trans('general.action')}}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
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
                ajax: {
                    url: "{{ route('dashboard.products.index') }}",
                    data: function (d) {
                        d.subCategories = $('.sub_categories').val()
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'CatID', name: 'CatID'},
                    {data: 'image', name: 'image'},
                    {data: 'Name', name: 'name'},
                    {data: 'NameEN', name: 'NameEN'},
                    {data: 'Description', name: 'Description'},
                    {data: 'DescriptionEN', name: 'DescriptionEN'},
                    {data: 'Price', name: 'Price'},
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
            $(".sub_categories").change(function () {
                table.draw();
            });
        });
        var select_box_element = document.querySelector('#CatID');
        dselect(select_box_element, {
            search: true
        });
    </script>

@endsection
