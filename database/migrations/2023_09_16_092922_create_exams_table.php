<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('exam_type');
            $table->string('starting_time');
            $table->string('ending_time');
            $table->float('total_marks');
            $table->string('status');
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('exams');
    }
};
