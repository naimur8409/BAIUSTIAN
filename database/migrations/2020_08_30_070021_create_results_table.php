<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('faculty_id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('semester_id');
            $table->unsignedInteger('levelterm_id');
            $table->integer('gpa');
            $table->boolean('retake')->default(0);
            $table->boolean('backlog')->default(0);
            $table->timestamps();


            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('levelterm_id')->references('id')->on('levelterms')->onDelete('cascade');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
