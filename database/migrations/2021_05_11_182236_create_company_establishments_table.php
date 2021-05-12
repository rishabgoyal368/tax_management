<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_establishments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('stock_partnership');
            $table->string('partnerships_co');
            $table->string('one_person_co');
            $table->string('manufacturers');
            $table->string('adjust');
            $table->string('joint_stock_companies');
            $table->string('limited_liability');
            $table->string('sole_company');
            $table->string('branches');
            $table->string('separation_of_exit');
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
        Schema::dropIfExists('company_establishments');
    }
}
