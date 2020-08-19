<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    function index(){
    	$product = DB::table("products")->get();
    	//return $posts;
    	return json_encode($product);
    }
    function store(Request $request){
    	$name = $request->input('name');
        $image = $request->input('image');
        $price =$request->input('price');
        $oldPrice=$request->input('oldPrice');
        $description = $request->input('description');
    	
    	DB::table("products")->insert([
    		"name" => $name,
            "image" => $image,
            "price" => $price,
            "oldPrice" => $oldPrice,
            "description" => $description,
    		
    	]);
    	$responseData = array("data"=>null);
    	return response()->json($responseData,200);
    }
    function detail($id){        
        $detail = DB::table("products")->where('id',$id)->get();
        return $detail;
    }
}
