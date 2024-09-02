<div class="col-lg-4 col-12 mb-30">
    <div class="cart-totals">
        <div class="cart-totals-inner">
            <h4 class="title">@langucw('cart totals')</h4>
            <table class="table bg-transparent">
                <tbody>
                @php
                    $total=app()->make(\App\Repositories\CartRepository::class)->getTotalPrice($carts??[]);
                @endphp
                <tr class="subtotal">
                    <th class="sub-title">@langucw('subtotal')</th>
                    <td class="amount"><span class="subtotal subtotal_amount">{{(float)$total}}</span></td>
                    <td>{{$genralSetting->getCurrency()}}</td>
                </tr>

                </tbody>
            </table>
        </div>

        @if(isLogged())
            <button type="button" onclick="nextRoute('{{Route('shipping_info.index')}}')"    class="btn btn-dark btn-hover-primary rounded-0 w-100">@langucw('proceed to checkout')</button>
        @else
            <a href="{{Route('login')}}"    class="btn btn-dark btn-hover-primary rounded-0 w-100">@langucw('login')</a>
        @endif
    </div>
</div>
