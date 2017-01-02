<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    // php artisan make:migration create_seller_table --table=sellers

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id');

            $table->integer('seller_id')->unsigned()->index();
            $table->integer('category_id')->unsigned()->index();

            $table->string('product_title');
            $table->integer('product_price')->unsigned();
            $table->integer('stock_amount')->unsigned();
            $table->integer('delivery_cost');
            $table->string('short_description', 255);
            $table->string('full_description', 2295);
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
        Schema::dropIfExists('products');
    }
}
