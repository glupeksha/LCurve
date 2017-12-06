<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subject_table', function (Blueprint $table) {
            $table->integer('class_subject_id')->unsigned()->nullable();
      $table->foreign('class_subject_id')->references('id')
            ->on('class_subjects')->onDelete('cascade');

      $table->integer('student_id')->unsigned()->nullable();
      $table->foreign('student_id')->references('id')
            ->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('student_subject_table');
    }
}
