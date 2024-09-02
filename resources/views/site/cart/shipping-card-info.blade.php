<div class="card" style="width: 20rem;">
    <div class="card-body">
        <label>
        <input type="radio" _href="{{route('payment.show_payment_form',$info)}}" name="address_id" value="{{$info->id}}">
        <h6 class="card-title">@langucw('title') : <span style="word-break: break-all;" id="title_{{$info->id}}">{{$info->title}}</span></h6>
        <h6 class="card-subtitle mb-2 text-muted">{{trans('general.name')}} :<span style="word-break: break-all;" id="name_{{$info->id}}">{{$info->name}}</span>
        </h6>
        <h6 class="card-subtitle mb-2 text-muted">@langucw('the region') :<span id="zone_{{$info->id}}"
                                                                                att="{{$info->zone_id}}">{{$info->zone['Addres'.getLang()]}}</span>
        </h6>
        <h6 class="card-subtitle mb-2 text-muted">@langucw('number') :<span
                id="phone_{{$info->id}}">{{$info->phone}}</span></h6>
        <h6 class="card-subtitle mb-2 text-muted">@langucw('address') :<span style="word-break: break-all;"
                id="shipping_info_text_{{$info->id}}">{{$info->address}}</span></h6>
        <a onclick="update({{$info->id}})" class="card-link ">{{trans('general.update')}}</a>
        <a onclick="deleteItem('{{route('shipping_info.delete',$info)}}')" class="card-link">@langucw('delete')</a>
        </label>
    </div>
    </div>








