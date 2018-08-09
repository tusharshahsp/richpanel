<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Order_Product;
use Request;
class OrderController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function showplaceorder(Request $request){
    	$order_id = Request::get('order_id');
    	return view('orders.order_details',['order' => Order::find($order_id)]);
    }
}
