<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('approve')->default(false);
            $table->String('role')->default('student');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('lastname');
            $table->string('gender')->default('none');
            $table->string('student_phone')->default('none');
            $table->string('birthdate')->default('none');
            $table->float('gpa')->default(0.00);
            $table->string('student_img')->default('../assets/unknown.png');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
