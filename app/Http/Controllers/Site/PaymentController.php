<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\ShowPaymentFormRequest;
use App\Http\Requests\Site\StorePaymentRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingInfo;
use App\Models\Zones;
use App\Repositories\GenralSettingRepository;
use App\Services\ActionPointService;
use App\Services\CartService;
use App\Services\ConditionalDeliverieService;
use App\Services\CouponsService;
use App\Services\OrderService;
use App\Services\Payment\PaytabsConfig;
use App\Services\Payment\PaytabsService;
use App\Services\v_tech\POSIntegrationService;
use App\Transformers\ZonesTransformer;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MongoDB\Driver\Session;

class PaymentController extends Controller
{
    public function __construct(public GenralSettingRepository $genralSettingRepository)
    {
    }

    public function showPaymentForm(Request $request, ShippingInfo $entity)
    {
        session_start();
        $_SESSION["shipping_infos"] =$entity->id;
        $delivery_price = ZonesTransformer::getDelivery($entity->zone);
        $delivery_first_order=$this->genralSettingRepository->getDeliveryFirstOrderActive();
        $delivery_free=false;
        if(getLogged() && $delivery_first_order && getLogged()->order()->count()==0)
            {
                $delivery_price=0;
                $delivery_free=true;
            }
        $carts = CartService::getCarts();
        $conditional_deliverie=ConditionalDeliverieService::isConditionalDeliverie($carts);
        if (count($carts) <= 0) {
            abort(404);
        }
        return view('site.payment.chose_payment_method', [
            'carts' => $carts,
            'currency' => $this->genralSettingRepository->getCurrency(),
            'coupona_active' => $this->genralSettingRepository->getCouponActive(),
            'delivery_first_order' => $delivery_first_order,
            'delivery_price' => $delivery_price,
            'delivery_free' => $delivery_free,
            'conditional_deliverie'=>$conditional_deliverie,
            'entity' => $entity
        ]);
    }
    public function redirectToPaymentGateway(StorePaymentRequest $request)
    {



        $paymentOrder = OrderService::storeFromRequest($request);
        if ($paymentOrder) {
            $special=app()->make(\App\Repositories\CartRepository::class)->checkIsSpecialInCart();
            $payment_method=$request->payment_method;
            if($special){
                $payment_method='payment_by_credit_card';
            }
            //redirect to payment page accoring to given preferred method
            switch ($payment_method) {
                case 'cash_on_delivery':
                  foreach(CartService::getCarts() as $cart){
                        $cart->delete();
                    }
                  try{
                      $point=ActionPointService::getActionPoint('purchase_points');
                      if($point>0){
                          getLogged()->chargePoints($point, 'new purchase points order no ='.$paymentOrder->id);
                      }
                  }catch (\Exception $ex){

                  }



                    return redirect()->route('order.show', $paymentOrder);
                case 'payment_by_credit_card':
                    $plugin = new PaytabsService();
                    $data = $plugin->getDataByOrderId($paymentOrder);
                    $response = $plugin->send_api_request('payment/request', $data, 'POST');
                    $redirect_url=$response["redirect_url"];
                    return redirect($redirect_url);/* Redirect browser */
            }
        }
    }
    public function redirectToPaymentGatewayError(Request $request){
        $plugin = new PaytabsService();
        $response_data =$request->all();
        $is_valid = $plugin->is_valid_redirect($response_data);
        $id=str_replace("'", '', $response_data['cartId']);
        $order= Order::find($id);

        if (!$is_valid) {
            if($order->orderCoupon){
                $order->orderCoupon->coupon->decreaseCoupon();
                $order->orderCoupon->delete();
            }

            foreach ($order->order_details as $item){
                $item->forceDelete();
            }

            $order->order_details()->delete();

            $order->delete();
            return redirect()->back()->with('message', __('Payment failed'));
        }
         $is_success = $response_data['respStatus'] === 'A';
        if ($is_success) {
            $order->PaymentNo=$response_data['tranRef'];
            $order->PaymentData=$response_data['respCode'];
            $order->PaymentStatus=$response_data['respStatus'];
            $order->save();

            $point=ActionPointService::getActionPoint('purchase_points');
            if($point>0){
                $order->user->chargePoints($point, 'new purchase points order no ='.$order->id);
            }
            foreach(Cart::where('user_id',$order->UserID)->get() as $cart){
                $cart->delete();
            }
            return redirect()->route('order.show', $order)->with('message', __('Payment succeed'));
        } else {
                if($order){

                    foreach ($order->order_details as $item){
                        $item->forceDelete();

                    }
                    $order->PaymentNo=$response_data['tranRef'];
                    $order->PaymentData=$response_data['respCode'];
                    $order->PaymentStatus=$response_data['respStatus'];
                    if($order->orderCoupon){
                        $order->orderCoupon->coupon->decreaseCoupon();
                        $order->orderCoupon->delete();
                    }
                    $order->save();
                   // $order->order_details()->delete();
                    $order->delete();


                }
            session_start();
            return redirect()->route('payment.show_payment_form',$_SESSION["shipping_infos"])->with('message', __('Payment failed'));
        }
    }

}
