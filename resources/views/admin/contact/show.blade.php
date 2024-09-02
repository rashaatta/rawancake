@extends('admin.layout.master')
@section('title') @endsection
@section('css') @endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard.contacts.index')}}">@langucw('contacts')</a></li>
    <li class="breadcrumb-item active">$entity->title</li>
@endsection

@section('content')
    @include('components.messagesAndErrors')
    <section id="basic-horizontal-layouts">
        <form class="form form-horizontal" action="" method="POST"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="custom-file-input" name="blob" id="blob" value="contacts" >
            <div class="card">
                <div class="card-header">
                    <div class=" text-right">
                        <a href="{{route('dashboard.contacts.index')}}" class="btn btn-default">{{trans('general.back')}}</a>
                    </div>
                    <div class=" ">
                        <label for="first-name">@lang('arabic content')</label>
                    </div>
                </div>
                <div class="row m-2">


                    {{-- arabic content --}}
                    <div class="col-12">
                        <div class="form-group row">

                            <div class="col-sm-9">

                                {{-- content --}}

                            </div>
                        </div>
                    </div>





                </div>


            </div>
{{-- english content --}}
             <div class="card">

                 <div class="card-header">
                     <div class="col-sm-3 col-form-label">
                         <label for="first-name">@lang('english content')</label>
                     </div>
                 </div>
                 <div class="col-12">
                     <div class="form-group row">

                         <div class="col">

                             {{-- content --}}

                         </div>
                     </div>
                 </div>
            </div>

            </div>
        </form>
    </section>

@endsection
@section('scripts')

@endsection
