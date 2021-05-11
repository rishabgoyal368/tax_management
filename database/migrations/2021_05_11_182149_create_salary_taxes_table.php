<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_taxes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('upload_photo_of_tax');
            $table->string('company_contract');
            $table->string('national_id');
            $table->string('financial_budget');
            $table->string('import_export_certificates');
            $table->string('other_docs');
            $table->string('commercial_certificate');
            $table->string('additional_tax');
            $table->string('office_lease_contract');
            $table->string('social_insurance');
            $table->string('construction_certificate');
            $table->string('industrial_certificate');
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
        Schema::dropIfExists('salary_taxes');
    }
}
