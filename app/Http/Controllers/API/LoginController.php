<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    function index(){
		$user = DB::table("users")->get();
		return json_encode($user);
    }
    function login(Request $request){
		$username = $request->input('name');
		$password = $request->input('password');
	    $key   = "21Atien";
		if(Auth::attempt(["password"=>$password,"name"=>$username])){
		$user_id= Auth::user()->id;
	 	$data=JWT::encode($user_id, $key);
	 	$array = array("idToken" => $data);
			return response()->json($array,200);
		}else{
			$array = array("idToken" => null);
			return response()->json($array,400);
		}
	}
	function profile() {
        $token = request()->header("Authorization");
		$key ="21Atien";
		$user_id=JWT::decode($token, $key, array('HS256'));

		$user= User::find($user_id);
		$array = array("user" => $user);
		return response()->json($array,200);
	}
}
