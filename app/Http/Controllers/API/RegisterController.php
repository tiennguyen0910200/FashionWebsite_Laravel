<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function index(){
		$user = DB::table("users")->get();
		return json_encode($user);
    }
    function register(Request $request){
        $name= $request->input("name");
        $email= $request->input("email");
        $password= $request->input("password");
        $data=User::where("email",'=',$email)->value("email");
        if($data){
            $responseData = array("data"=>null);
            return response()->json($responseData, 400);
        }
        else{
            $user = new User;
            $user->name=$name;
            $user->email=$email;
            $user->password=Hash::make("$password");
            $user->save();
            $responseData = array("data"=>$user);
            return response()->json($responseData, 200);
        }
    }
}
