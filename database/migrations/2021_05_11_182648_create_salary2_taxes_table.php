<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalary2TaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary2_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('upload_hiring_list');
            $table->string('upload_pay_slip');
            $table->string('upload_national_id');
            $table->string('upload_insured');
            $table->string('upload_salaries_list');
            $table->string('upload_deductions');
            $table->string('upload_benefits');
            $table->string('upload_resigning');
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
        Schema::dropIfExists('salary2_taxes');
    }
}
