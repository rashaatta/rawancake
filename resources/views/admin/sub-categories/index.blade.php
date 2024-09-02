@extends('admin.layout.master')
@section('title')
    {{trans('general.sub_categories')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a
            href="{{route('dashboard.sub-categories.index')}}">{{trans('general.products_categories')}}</a></li>
    <li class="breadcrumb-item active">{{trans('general.sub_categories')}}</li>
@endsection
@section('content')
    <section id="responsive-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="short_title_en">{{trans('general.categories')}}</label>
                                <select name="CatID" autocomplete="off" id="CatID"
                                        class="select2 w-100 main_categories">
                                    @foreach($main_categories ??[] as $category)
                                        <option value="{{$category->id}}">{{$category->Name}}
                                            | {{$category->NameEN}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>{{trans('general.id')}}</th>
                                <th>@langucw('main category')</th>
                                <th>@langucw('the image')</th>
                                <th>@langucw('section title ar')</th>
                                <th>@langucw('section title en')</th>
                                <th>@langucw('ShortcutName')</th>
                                <th>@langucw('ShortcutNameEN')</th>
                                <th>@langucw('Visible')</th>
{{--                                <th>{{trans('general.action')}}</th>--}}
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
                    url: "{{ route('dashboard.sub-categories.index') }}",
                    data: function (d) {
                        d.mainCategories = $('.main_categories').val()
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'CatID', name: 'CatID'},
                    {data: 'image', name: 'image'},
                    {data: 'Name', name: 'name'},
                    {data: 'NameEN', name: 'NameEN'},
                    {data: 'ShortcutName', name: 'ShortcutName'},
                    {data: 'ShortcutNameEN', name: 'ShortcutNameEN'},
                    {data: 'Visible', name: 'Visible'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
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
            $(".main_categories").change(function () {
                table.draw();
            });
        });

        var select_box_element = document.querySelector('#CatID');

        dselect(select_box_element, {
            search: true
        });


    </script>

@endsection
