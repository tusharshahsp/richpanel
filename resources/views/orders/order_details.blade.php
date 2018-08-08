@extends('layouts.app')
@section('content')
	<div class="container">
        <div class="row">
            <div class="col-md-1" style="background-color:#DCD6DC; font-size: 1.3em; display: flex; justify-content: flex-right; align-items: flex-end;">Sr. No.</div>
            <div class="col-md-1" style="background-color:#DCD6DC; font-size: 1.3em; display: flex; justify-content: flex-right; align-items: flex-end;">Item</div>
            <div class="col-md-6" style="background-color:#DCD6DC; font-size: 2.2em; ">Description</div>
            <div class="col-md-1" style="background-color:#DCD6DC; font-size: 1.3em; display: flex; justify-content: flex-right; align-items: flex-end;">Size</div>
            <div class="col-md-1" style="background-color:#DCD6DC; font-size: 1.3em; display: flex; justify-content: flex-right; align-items: flex-end;">Quantity</div>
            <div class="col-md-2" style="background-color:#DCD6DC; font-size: 1.3em; display: flex; justify-content: flex-right; align-items: flex-end;">Prize</div>
        </div>
        <div class="col-md-12">
        <hr style="padding-top:0"><hr style="padding-bottom: 0">
        </div>
        	@foreach($order->order_products()->orderBy('created_at')->get() as $key => $op)
            <div class="row">
                <div class="col-md-1" style="background-color:#DCD6DC;">{{$key+1}}</div>
                <div class="col-md-1" >{{$op->product->product_name}}</div>
                <div class="col-md-6" >{{$op->product->description}}</div>
                <div class="col-md-1" >{{$op->size}}</div>
                <div class="col-md-1" >{{$op->quantity}}</div>
                <div class="col-md-2" style="background-color:#DCD6DC;">{{$op->quantity}} x {{$op->product->price}} = Rs. {{$op->cost}}</div>
            </div>
          	@endforeach
        <div class="col-md-12">
        <hr style="padding-top:0"><hr style="padding-bottom: 0">
        </div>
        <div class="row" style="padding-bottom: 20px">
            <div class="col-md-1" style="background-color:#DCD6DC;"></div>
            <div class="col-md-9" style="font-size: 2.2em;">Total</div>
            <div class="col-md-2" style="font-size: 1.2em; background-color:#DCD6DC; display: flex; justify-content: flex-right; align-items: flex-end;">Rs. {{$order->total}}</div>
        </div>
    </div>
@endsection
  
@section('footer')

<div class="footer" align="center" style="background-color:#87A2C0">
    <div class="row" align="center">
        <div class="col-md-12" align="center" style="margin-top:0px;margin-right:5px;margin-left:5px;margin-bottom:0px; padding: 5px 10px">
            <form>
                <input type="hidden" name="order_id" id="order_id" value="">
                @csrf
                <input  role="button" class="btn btn-info btn-lg" style="background-color: #235486; color:#8DB7DC" value="Confirm Order">
            </form>
        </div>
    </div>
</div>

@endsection