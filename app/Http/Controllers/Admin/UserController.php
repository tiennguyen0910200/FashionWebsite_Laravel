<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    function create(){
        $user = User::all();
        return view('admin.user.index',['user'=>$user]);
    }
    public function store(Request $request){
        $name=$request->name;
        $email=$request->email;
        $password=$request->password;
    
        $user= new User;
        $user->name= $name;
        $user->email= $email;
        $user->password= $password;
        $user->save(); 
        return redirect("admin/user");
    }
    public function destroy($id)
        {
            User::find($id)->delete();
             return redirect("admin/user");
        }
}
