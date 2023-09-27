<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('marks', function (Blueprint $table) {
      $table->unsignedBigInteger('class_id');
      $table->foreign('class_id')->references('id')->on('classes');
      $table->unsignedBigInteger('section_id');
      $table->foreign('section_id')->references('id')->on('sections');
      $table->unsignedBigInteger('subject_id');
      $table->foreign('subject_id')->references('id')->on('subjects');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropColumn('marks');
  }
};