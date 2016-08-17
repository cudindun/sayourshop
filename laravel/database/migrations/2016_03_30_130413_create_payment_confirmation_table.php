<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentConfirmationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_confirmation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_invoice');
            $table->string('account_name');
            $table->string('bank_account');
            $table->string('admin_account');
            $table->integer('total_transfer');
            $table->string('transfer_date');
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
        //
    }
}
