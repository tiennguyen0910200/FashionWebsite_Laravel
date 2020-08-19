<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Product;
class OrderController extends Controller
{
    function store($id){
        $response=200;
        $token = request()->header("Authorization");
		$key ="21Atien";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $cart=Cart::where("user_id",$user_id)->where("pro_id",$id)->first();
        if($cart){
            $product= Product::where("id",$id)->first();
            if($cart->quantity < $product->quantity){
                $cart->quantity= $cart->quantity+1;
                $cart->save();
            }
            else{
                $response=400;
                $cart->quantity= $cart->quantity;
                $cart->save();
            }
        }
        else{
            $cart = new Cart();
            $cart->user_id=$user_id;
            $cart->pro_id=$id;
            $product= Product::where("id",'=',$id)->first();
            if($product->quantity>=1){
                $cart->quantity=1;
                $cart->save();
            }else{
                $response=400;
            }
        }
        $carts=Cart::where("user_id",$user_id)->get();
        foreach($carts as $cart){
            $cart->products;
            $cart->user;
        }
        $array = array("cart" => $carts);
        return response()->json($array,$response);
        
    }
}
