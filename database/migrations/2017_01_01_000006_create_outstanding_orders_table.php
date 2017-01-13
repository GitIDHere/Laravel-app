<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutstandingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outstanding_orders', function (Blueprint $table) {
            $table->increments('outstanding_orders_id');

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');

            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('seller_id')->on('sellers')->onDelete('cascade');

            $table->string('product_title');
            $table->string('quantity');

            $table->string('product_price');
            $table->string('total_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outstanding_orders');
    }
}
