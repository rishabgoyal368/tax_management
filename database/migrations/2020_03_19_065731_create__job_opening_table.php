<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOpeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('department_id');
            $table->integer('min_experience')->nullable();
            $table->integer('max_experience');
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary');
            $table->integer('position');
            $table->text('description');
            $table->text('time_period');
            $table->enum('status', ['Archive','Closed','Hold','Open','Upcoming'])->nullable();            
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('_job_opening');
    }
}
