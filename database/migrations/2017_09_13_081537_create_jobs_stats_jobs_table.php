<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateJobsStatsJobsTable
 */
class CreateJobsStatsJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_stats_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->index();
            $table->string('class');
            $table->string('status')->nullable();
            $table->json('result')->nullable();
            $table->double('queued_at')->nullable();
            $table->string('connection')->nullable();
            $table->string('queue')->nullable();
            $table->unsignedInteger('delay')->nullable();
            $table->unsignedInteger('tries')->nullable();
            $table->unsignedInteger('timeout')->nullable();
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
        Schema::dropIfExists('jobs_stats_jobs');
    }
}
