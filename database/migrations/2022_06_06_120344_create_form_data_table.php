<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('registration_no');
            $table->integer('exam_roll_no');
            $table->integer('college_roll_no');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('level_id');
            $table->boolean('payment')->default('0');
            $table->string('payment_image');
            $table->string('image');
            $table->integer('year');
            $table->string('signature');
            $table->date('date');
            $table->integer('credit_hours');
            $table->boolean('approve')->default('0');
            $table->string('payment_remarks');
            $table->boolean('seen')->default('0');
            $table->boolean('status')->default('0');
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
        Schema::dropIfExists('form_data');
    }
}
