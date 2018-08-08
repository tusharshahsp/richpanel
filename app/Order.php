<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

    protected $fillable = [
        'cust_id', 'op_id', 'total','ordered','payment','address'
    ];
    

     public function order_products()
    {
        return $this->hasMany('App\Order_Product','order_id');
    }
}
