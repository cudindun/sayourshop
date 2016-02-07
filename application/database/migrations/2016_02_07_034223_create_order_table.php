<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('no_invoice');
            $table->string('order_status')->unique();
            $table->integer('total_price');
            $table->string('order_address');
            $table->string('order_phone');
            $table->string('order_email');
            $table->integer('total_weight');
            $table->string('discount_code');
            $table->integer('total_discount');
            $table->integer('shipping_price');
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
        Schema::drop('order');
    }
}
