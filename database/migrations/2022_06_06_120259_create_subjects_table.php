<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('subject_code');
            $table->bigInteger('barrier_id')->nullable();
            $table->bigInteger('hasbarrier')->nullable();
            $table->bigInteger('concurrent_id')->nullable();
            $table->integer('credit_hours');
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('program_id');
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
        Schema::dropIfExists('subjects');
    }
}
