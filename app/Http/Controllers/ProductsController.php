<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Order_Product;
use Auth;
use Request;

class ProductsController extends Controller
{
    //

	public function __construct()
    {
        $this->middleware('auth');
    }

    protected function products()
    {
        return view('products.common', ['products' => Product::all()]);
    }

    protected function men_products()
    {
        return view('products.common', ['products' => Product::where('type',1)->get()]);
    }

    protected function women_products()
    {
        return view('products.common', ['products' => Product::where('type',2)->get()]);
    }

    protected function kids_products()
    {
        return view('products.common', ['products' => Product::where('type',3)->get()]);
    }

    protected function addtoCart(Request $request)
    {   

        $prod_id = Request::get('prod_id');
    	$quantity = Request::get('quantity');
    	$size = Request::get('size');
        $total = 0;
        $prod = Product::find($prod_id);
        $order = Order::firstOrNew(['cust_id' => Auth::id()],['ordered' => false]);
        $order->save();
        if($order){
            $total = $order->total;

        }
        $id = $order->id;
        
        if(!is_null($prod)){
            // $order = Order::firstOrNew(['cust_id' => Auth::id()],['ordered' => false]);

            $op = new Order_Product();
            $op->cust_id = Auth::id();
            $op->product_id = $prod_id;
            $op->quantity = $quantity;
            $op->size = $size;
            $op->cost = $prod->price * $quantity;
            $order->total = $order->total + $op->cost;
            $order->order_products()->save($op);
            
            $total = $order->total;
        }
        $items = $order->order_products->count();
        return json_encode([$total, $id, $items]);
    }

    

 //    public function update(Request $request, $id)
	// {	
	// 	$quantity = Request::get('quantity');
 //    	$size = Request::get('size');
	//     $crud = O::findOrFail($id);
	//     $crud->color = $request->color;
	//     $crud->save();

 //  		return response(null, Response::HTTP_OK);
	// }
	

 //    public function store(Request $request)
 //    {
 //        $this->validate($request, [
 //            'name'        => 'required|max:255',
 //            'description' => 'required',
 //        ]);
 
 //        $task = Task::create([
 //            'name'        => request('name'),
 //            'description' => request('description'),
 //            'user_id'     => Auth::user()->id
 //        ]);
 
 //        return response()->json([
 //            'task'    => $task,
 //            'message' => 'Success'
 //        ], 200);
 //    }


}
