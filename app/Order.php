<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    function products(){
        return $this->hasMany("App\Product","id","pro_id");
    }
    public function user(){
        return $this->hasOne("App\User","id","user_id");
    }
    public function cart(){
        return $this->hasOne("App\Cart","id","cart_id");
    }
}
