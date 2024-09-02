<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Http\Response;

class CartService
{
    public static function addToCart($request, $entity)
    {
        try {
            $data = array();
            $tax = 0;
            if (isLogged()) {
                $data['user_id'] = getLogged()->id;
                $carts = Cart::where('user_id', getLogged()->id)->get();
            } else {
                $temp_user_id = self::createTempUser($request);
                $data['temp_user_id'] = $temp_user_id;
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
            }
            $data['quantity'] = $request['quantity'] == null ? 1 : $request['quantity'];
            $data['price'] = $entity->Price;
            $data['Note'] = $request['note'] != null ? $request['note'] : '';

            $data['tax'] = $tax;
            $data['product_id'] = $entity->id;
            $data['OptID'] = ($request->data);
            $data['shipping_cost'] = 0;
            $data['address_id'] = 0;
            $data['discount'] = 0;
            if (count($carts) > 0) {
                $isexist = false;
                foreach ($carts as $item) {
                    if ($item->product_id == $entity->id && $item->OptID == $request->data) {
                        $item->quantity = $data['quantity'];
                        $item->Note = $request['note'] != null ? $request['note'] : '';
                        $item->save();
                        $isexist = true;
                        if ($request->productImage) {
                            $item->addMedia(storage_path('tmp/uploads/' . $request->productImage))->toMediaCollection('images');
                        }
                        break;
                    }
                }
                if (!$isexist) {
                    $newItem = Cart::create($data);
                    if ($request->productImage) {
                        $newItem->addMedia(storage_path('tmp/uploads/' . $request->productImage))->toMediaCollection('images');
                    }
                }
            } else {


                $carts = Cart::create($data);
                if ($request->image) {
                    MediaService::addMediaFromRequest($carts, 'image', 'images');
                }
            }
            return Response::HTTP_OK;
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            return Response::HTTP_INTERNAL_SERVER_ERROR;
        }
    }

    public static function createTempUser($request)
    {
        if (session()->has('temp_user_id')) {
            $temp_user_id = session()->get('temp_user_id');
        } else {
            $temp_user_id = bin2hex(random_bytes(10));
            session(['temp_user_id' => $temp_user_id]);
            session()->save();
        }
        return $temp_user_id;
    }

    public static function getCarts()
    {
        if (isLogged()) {
            return Cart::where('user_id', getLogged()->id)->get();
        } else if (session()->has('temp_user_id')) {
            $temp_user_id = session()->get('temp_user_id');
            return Cart::where('temp_user_id', $temp_user_id)->get();
        } else {
            return [];
        }
    }

    public static function getCount()
    {
        if (self::getCarts()) {
            return self::getCarts()->count();
        } else {
            return 0;
        }
    }

    public static function login($request)
    {
        if (isLogged()) {
            $user_id = getLogged()->id;
            if (session()->has('temp_user_id')) {
                $temp_user_id = session()->get('temp_user_id');
                $carts = Cart::where('temp_user_id', $temp_user_id)->get();
                foreach ($carts as $cart) {
                    if (Cart::where('user_id', getLogged()->id)->where('product_id', $cart->product_id)->exists()) {
                        $cart->forceDelete();
                    } else {
                        $cart->update(['user_id' => $user_id, 'temp_user_id' => null]);
                    }
                }
                session()->forget('temp_user_id');
            }
        }
    }

    public static function updateAmount($request)
    {

        $request = $request->all();

        if (isset($request['data']) && is_array($request['data'])) {
            $data = ($request['data']);
        } elseif (isset($request['data'])) {
            $data = json_decode($request['data']);
        }

        foreach ($data ?? [] as $item) {
            try {
                if (is_string($item)) {
                    $item = json_decode($item);
                }
                Cart::where('user_id', getLogged()->id)->where('id', $item->id)->update(['quantity' => $item->num]);

            } catch (\Exception $ex) {

            }
        }
    }


}
