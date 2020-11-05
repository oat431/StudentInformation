<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->integer('student_id')->primary();
            $table->string('student_img');
            $table->string('student_name');
            $table->string('student_lastname');
            $table->string('student_phone');
            $table->string('gender');
            $table->boolean('approve')->default(false);
            $table->date('birthdate'); 
            $table->float('gpa')->default(0.00);
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
