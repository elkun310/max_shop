<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table="comment";
    public function product()
    {
        return $this->belongsTo('App\models\product', 'product_id', 'id');
    }
}
