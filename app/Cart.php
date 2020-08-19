<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    function products(){
        return $this->hasMany("App\Product","id","pro_id");
    }
    public function user(){
        return $this->hasOne("App\User","id","user_id");
    }
}
