<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SupplierData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->timestamp('invoice_date');
            $table->integer('national_id_no');
            $table->string('address');
            $table->integer('invoice_no');
            $table->string('supplier_name');
            $table->integer('file_no');
            $table->integer('tax_registration_no');
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
        Schema::dropIfExists('supplier_data');
    }
}
