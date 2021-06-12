<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordersdetails extends Model
{

            protected $fillable = [
        'order_id', 'product_id', 'quantity','unitcost', 'total',
    ];
    public  function  product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

}
