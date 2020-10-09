<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('jobseeker_id')->unsigned();
            $table->foreign('jobseeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->integer('joblisting_id')->unsigned();
            $table->foreign('joblisting_id')->references('id')->on('job_listings')->onDelete('cascade');
            $table->text('essay');
            $table->string('status')->default('Applied');
            $table->integer('salary_offered');
            $table->string('cv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applications');
    }
}
