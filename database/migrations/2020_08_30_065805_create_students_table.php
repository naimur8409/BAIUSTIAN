<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('s_id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('photo')->nullable();
            $table->string('blood_group');
            $table->boolean('status')->default(1);
            $table->unsignedInteger('levelterm_id')->nullable();
            $table->unsignedInteger('semester_id');
            $table->timestamps();

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
        Schema::dropIfExists('students');
    }
}
