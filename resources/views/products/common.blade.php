@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center"> -->
        <!-- <div class="col-md-12" > -->
            @foreach($products->chunk(4) as $chunk)
                <div class="row">
                @foreach ($chunk as $product)
                    <div class="col-md-3">
                    <div class="card ">
                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        <img class="card-img-top" src={{asset('storage/products/'.$product->image)}} alt="Card image" style="width:auto height:auto">

                        <div class="card-body" style="text-align: left; font-family: arial">
                            <h4 class="card-title"><strong>Name - </strong>{{$product->name}}</h4>
                            <p class="card-text wrap"><strong>Description - </strong>{{$product->description}}
                            <strong>Cost - </strong>Rs. {{$product->price}} </p>
                            <div>
                                <button class="btn btn-primary"  data-toggle="modal" data-target="#add_cart_model{{$product->id}}">Add to Cart</button>

                               
                                <div class="modal fade" id="add_cart_model{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Select the details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="size">Size:</label><br>
                                                        @foreach($product->product_details->pluck('size') as $size)
                                                            <div class="radio">
                                                                <label><input type="radio" id="sizecloth{{$product->id}}" name="sizecloth" value={{$size}} required>{{$size}}</label>
                                                            </div>
                                                        @endforeach
                                                </div>
                                                <div class="form-group">
                                                    <label for="quantity">Quantity:</label>
                                                        <select class="form-control" id="quantity{{$product->id}}" name="quantity" required>
                                                            <option value=1>1</option>
                                                            <option value=2>2</option>
                                                            <option value=3>3</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" onClick="addtoCart({{$product->id}})" class="btn btn-primary">Add To Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                @endforeach
                </div>
                <br/><br/>
            @endforeach



<script >
    $( document ).ready(function() {
        SetTotalValue();
    });
    var size;
    var quantity;
    var prod_id;

    function addtoCart(prod_id){

         this.size = $("#sizecloth"+prod_id+":checked").val();
         this.quantity = $("#quantity"+prod_id).val();
         this.prod_id = prod_id;
         SetTotalValue();
         alert("Product has been Added to cart");
         $('#add_cart_model'+prod_id).modal('toggle'); 

    }

    function SetTotalValue(){
    $.ajax({
      type  : 'POST',
      url     : '/addtoCart',
      data  : {'prod_id':this.prod_id,'size':this.size, 'quantity':this.quantity},
      dataType: 'json',
      }).done(function (data) {
        
        $('#modal').modal('toggle'); 

        // alert(JSON.stringify(data));
        // $("#cart").html('');
        // $("#cart").html('<i class="fa fa-shopping-cart" style="font-size:36px">'+data[2]+'</i> items');
        $('#order_id').val(data[1]);
        $("#value").html('');
        $("#value").html('<strong>Total Cart Value :</strong> Rs. '+data[0]);
        

      }).fail(function(data){
        alert("Unable to process the request."+data);
        });
    }

</script>
@endsection


@section('footer')

<div class="footer" align="center" style="background-color:#87A2C0">
    <div class="row" align="center">
        <div class="col-md-12" align="center" style="margin-top:0px;margin-right:5px;margin-left:5px;margin-bottom:0px; padding: 5px 10px">
            <p id="value" style="font-weight: normal;  font-size: 2.5em;"><strong>Total Cart Value :</strong> </p>
            <form method="get" action="{{route('createOrder')}}">
                <input type="hidden" name="order_id" id="order_id" value="">
                @csrf
                <input  role="button" class="btn btn-lg" type="submit" style="background-color: #235486; color:#8DB7DC" value="Place Order">
            </form>
        </div>
    </div>
</div>

@endsection