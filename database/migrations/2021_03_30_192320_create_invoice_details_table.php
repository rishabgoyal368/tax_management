<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('invoice_id');
            $table->String('Final')->nullable();
            $table->date('date_to')->nullable();
            $table->date('date_from')->nullable();
            $table->String('the_amount_of_the_tax_payable')->nullable();
            $table->String('tax_previous_balance')->nullable();
            $table->String('tax_total_paid')->nullable();
            $table->String('tax_paid_share_each_per_partner')->nullable();
            $table->String('report_year')->nullable();
            $table->String('original')->nullable();
            $table->String('tax_period')->nullable();
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
        Schema::dropIfExists('invoice_details');
    }
}
