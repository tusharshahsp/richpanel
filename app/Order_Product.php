<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    //
    protected $table = "order_products";

    protected $fillable = [
        'cust_id', 'order_id', 'product_id','quantity','cost'
    ];


    public function product()
    {
        return $this->hasOne('App\Product','id','product_id');
    }
   

}
