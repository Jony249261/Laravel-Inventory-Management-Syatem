<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        protected $fillable = [
        'order_date', 'order_status', 'total_products','sub_total', 'vat', 'total','payment_status', 'pay', 'due','customer_id',
    ];

    public  function  customer(){
       return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public  function orderdetails(){
        return $this->hasMany(Ordersdetails::class,'order_id','id');
    }


}
