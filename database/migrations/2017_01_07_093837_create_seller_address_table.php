<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_address', function (Blueprint $table) {
            $table->increments('address_id');

            $table->integer('seller_id')->unsigned()->index();
            $table->foreign('seller_id')->references('seller_id')->on('sellers');

            $table->string('address_line_1')
            $table->string('address_line_2')
            $table->string('street')
            $table->string('city')
            $table->string('postcode')

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
        Schema::dropIfExists('seller_address');
    }
}
