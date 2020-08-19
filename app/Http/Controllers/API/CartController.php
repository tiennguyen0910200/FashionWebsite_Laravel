<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\Cart;
use App\User;
use App\Product;
class CartController extends Controller
{
    function index(){
        $token = request()->header("Authorization");
		$key ="21Atien";
        $user_id=JWT::decode($token, $key, array('HS256'));//lay id cuar usser dẫ đang nhap 
        $carts=Cart::where("user_id",$user_id)->get();//tim cart  nào của user đó thì lấy ra
        foreach($carts as $cart){
            $cart->products;//lấy  dữ liêu của product dựa vao fuction viet o model
            $cart->user;
        }
        $array = array("cart" => $carts);
		return response()->json($array,200);// lấy được rồi trả về mảng cart dạng json
    }
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
    function total(){
        $token = request()->header("Authorization");
		$key ="21Atien";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $carts=Cart::where("user_id",$user_id)->get();
        $sum= 0;
        foreach($carts as $cart){
            $cart->products;
            $cart->user;
            $sum+= $cart->quantity * $cart->products[0]->price;
        }
        $array = array("cart" => $sum);
		return response()->json($array,200);
    }

    function increase($id){
     //$response=200;
        $token = request()->header("Authorization");
		$key ="21Atien";
        $user_id=JWT::decode($token, $key, array('HS256'));
        $cart=Cart::where("id",$id)->first();
        $qtt=Cart::where('id','=',$id)->value("quantity");
        $pid=Cart::where('id','=',$id)->value("pro_id");
        $qtt_pro=Product::where('id','=',$pid)->value('quantity');
       //echo  $qtt_pro;
       if($qtt_pro > $qtt)
       $cart->quantity=$qtt+1;
       else{
           $cart->quantity= $qtt_pro;
           $response=400;
       }
           $cart->save();
           $carts=Cart::where("user_id",'=',$user_id)->get();
      
        foreach($carts as $cart){
            $cart->products;
            $cart->user;
            
        }
        $array= array("cart"=>$carts);
        return response()->json($array,200);
    }
    function reduction($id){
        $token = request()->header("Authorization");
		$key ="21Atien";
        $user_id=JWT::decode($token, $key, array('HS256'));
       $cart=Cart::where("id",$id)->first();
       $cquantity = Cart::where("id",$id)->value("quantity");
        if($cquantity> 1){
            $cart->quantity = $cquantity-1;
            $cart->save();
        }else if($cquantity==1)
            $cart->delete();
       $carts=Cart::where("user_id",'=',$user_id)->get();
       foreach($carts as $cart){
        $cart->products;
        $cart->user;
    }
    $array = array("cart" => $carts);
    return response()->json($array,200);
    }

    function destroy($id){
     
            $token = request()->header("Authorization");
            $key ="21Atien";
            $user_id=JWT::decode($token, $key, array('HS256'));
            $cart=Cart::where("user_id","=",$user_id)->where("id","=",$id)->first();
            $cart->delete();
            $carts=Cart::where("user_id",$user_id)->get();
            foreach($carts as $cart){
                $cart->products;
                $cart->user;
            }
        $array = array("cart" => $carts);
        return response()->json($array,200);

    }
}  