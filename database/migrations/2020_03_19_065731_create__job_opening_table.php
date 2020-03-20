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
            $table->string('JobTitle');
            $table->unsignedBigInteger('DesignationId');
            $table->unsignedBigInteger('DepartmentId');
            $table->integer('MinExperienceRequired')->nullable();
            $table->integer('MaxExperienceRequired');
            $table->integer('MinSalary')->nullable();
            $table->integer('MaxSalary');
            $table->integer('Position');
            $table->string('Description');
            $table->string('Time period');
            $table->enum('status', ['Archive','Closed','Hold','Open','Upcoming'])->nullable();            
            $table->string('deleted_at')->nullable();
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
