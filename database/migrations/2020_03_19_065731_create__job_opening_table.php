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
            $table->text('Job_title');
            $table->unsignedBigInteger('Designation_id');
            $table->unsignedBigInteger('Department_id');
            $table->integer('Min_experience_required')->nullable();
            $table->integer('Max_experience_required');
            $table->integer('Min_salary')->nullable();
            $table->integer('Max_salary');
            $table->integer('Position');
            $table->text('Description');
            $table->text('Time_period');
            $table->enum('Status', ['Archive','Closed','Hold','Open','Upcoming'])->nullable();            
            $table->timestamp('Deleted_at')->nullable();
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
