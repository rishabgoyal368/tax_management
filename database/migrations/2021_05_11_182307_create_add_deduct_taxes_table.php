<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddDeductTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_deduct_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('buy_invoice');
            $table->string('deduct_notice_paper');
            $table->string('other_docs');
            $table->string('payment_agreement');
            $table->string('form_no_41');
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
        Schema::dropIfExists('add_deduct_taxes');
    }
}
