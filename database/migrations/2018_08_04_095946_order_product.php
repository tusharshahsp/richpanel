<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cust_id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('size')->nullable($value = true);
            $table->float('cost',8,2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('order_products');
    }
}
