<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuyInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('unites');
            $table->integer('unit_price');
            $table->string('total_line');
            $table->string('invoice_type');
            $table->string('product_type');
            $table->integer('quantity');
            $table->string('tax_category');
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
        Schema::dropIfExists('buy_invoices');
    }
}
