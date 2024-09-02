<div id="billing-form">
    <h4 class="mb-4">@langucw('billing address')</h4>
    <div class="row row-cols-sm-2 row-cols-1 g-4">
        <div class="col">
            <label>{{trans('general.name')}}</label>
            <input class="form-field" type="text" name="name" id="name_input" value='{{ old('name')??$entity->name  }}' placeholder="{{trans('general.name')}}">
        </div>
        <div class="col">
            <label>@langucw('phone number')</label>
            <input class="form-field" type="text" id="phone_number" name="phone_number" value='{{ old('phone_number')??$entity->phone  }}' placeholder="@langucw('phone number')">
        </div>
        <div class="col">
            <label>@langucw('address')</label>
            <div class="select-wrapper">
            <select class="form-field" id="address" name="address">
                @foreach(\App\Models\Zones::select('*')->get() as $index=>$zone)
                    @php

                        if(isset($delivery_free) && $delivery_free){
                            $price_de=0;
                            }else if($conditional_deliverie??false!=false){
                                if(count($conditional_deliverie['zones'])<1){
                                    $price_de=$conditional_deliverie['delivery'];
                                }else if(in_array($zone->id, $conditional_deliverie['zones'])){

                                     $price_de=$conditional_deliverie['delivery'];
                                }else{
                                    $price_de=\App\Transformers\ZonesTransformer::getDelivery($zone);
                                }
                        }else{
                            $price_de=\App\Transformers\ZonesTransformer::getDelivery($zone);
                        }

                    @endphp
                    <option {{$zone->id==$entity->zone_id?'selected':''}} att_prise="{{$price_de}}" value="{{$zone->id}}">{{$zone['Addres'.getLang()]}}| {{number_format((float)$price_de, 2, '.', '')}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col">
            <label>@langucw('delivery time')</label>
            <x-flatpickr value="{{old('delivery_time')}}" name="delivery_time" show-time time-format="h:i"/>
        </div>
        <div class="col-sm-12">
            <label>@langucw('place')</label>
            <input class="form-field" type="text" id="place" name="place" value='{{ old('address')??$entity->address  }}' placeholder="@langucw('place')">
        </div>

        <div class="col-sm-12">
            <label>@langucw('notes')</label>
            <textarea class="form-control" name="notes" id="notes_textarea"
                      placeholder="@langucw('notes')">{{ old('notes')  }}</textarea>
        </div>
        <div class="col">
            <label>@langucw('your points balance')</label>
            <input disabled class="form-field" type="text" value="{{$totalpoint}}">
        </div>
        <div class="col">
            <label>@langucw('points you want to replace')</label>
            <div class=" ms-11 mt-2">
            @include('components.btn-number',['id'=>1,'quantity'=>0,'min'=>0,'max'=>$totalpoint])
            </div>
        </div>
        <div class="col-sm-12 d-flex flex-wrap gap-6">
            <div class="form-check m-0">
                <input class="form-check-input" type="checkbox" id="shiping_address" data-toggle-shipping="#shipping-form">
                <label class="form-check-label" for="shiping_address">@langucw('branch pickup')</label>
            </div>
        </div>

    </div>

</div>
 <div id="shipping-form" class="mt-md-8 mt-6">
     <label>@langucw('address')</label>
     <div class="select-wrapper">
         <select class="form-field" id="branch_pickup_s" name="branch_pickup_s">
             @foreach(\App\Models\Branche::select('*')->get() as $index=>$branch)
                 <option   value="{{$branch->id}}">{{$branch->getTitle()}}</option>
             @endforeach
         </select>
        </div>
 </div>
