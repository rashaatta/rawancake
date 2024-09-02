@extends('site.layout.master')
@section('title')
    {{trans('general.products')}}
@endsection
@section('css') @endsection
@section('breadcrumb')
    <li><a href="{{route('home')}}">@langucw('home')</a></li>
    <li><a href="{{route('products.index')}}">@langucw('Product')</a></li>
    <li>@langucw('show')</li>
@endsection
@section('content')
    @php
        $options=$product->optionDetil->groupBy('POptID');
    @endphp

    <div class="section section-margin-top section-padding-03">
        <div class="container">
            <div class="row">
                @include('site.products.product-image')
                @include('site.products.product-details')
            </div>
            <!-- Product Section Strat -->
            @include('site.products.related-product-widget',['product'=>$product])
            <!-- Product Section End -->
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/jquery.zoom.js')}}"></script>
    <script>
        let uploadedDocumentMap = {};
        Dropzone.options.productDropzone = {
            url: '{{ route('cart.storeMedia') }}',
            maxFilesize: 10, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.txt,.docx,.doc,.pdf',
            maxFiles: 1,
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" id="productImage" name="image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove();
                let name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="image"][value="' + name + '"]').remove();
            },
            init: function () {
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }
                return _results
            }
        }

        $(function () {
            $('#zoom').zoom();
            $('.review-rating-bg').on('click', function (e) {
                var bcr = this.getBoundingClientRect();
                var n = (e.clientX - bcr.left) / bcr.width;
                var nR = Math.round(n * 5);
                if (nR < 1) {
                    nR = 1;
                } else if (nR > 5) {
                    nR = 5;
                }
                @if( isLogged() && !getLogged()->hasRated($product))
                AddToRate('{{$product->id}}', nR)
                @elseif(!isLogged())
                toastr.info("@langucw('you must log in first')");
                @else
                toastr.info("@langucw('you have voted before')");
                @endif
            });
            let image = $('#imageModalId img');
            $('#imageModalId').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);

                let rul = button.data('url');
                console.log(rul);
                image.attr('src', rul);
            });
        });
    </script>
@endpush
