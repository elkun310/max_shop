<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class user_cart extends Model
{
    protected $table = "cart";
    public function detail_cart()
    {
        return $this->hasMany('App\models\detailcart', 'cart_id', 'id');
    }
}
