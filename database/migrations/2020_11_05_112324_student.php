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
        DB::table('users')->insert(
            array(
                'id' => 1,
                'approve' => true,
                'role' => 'admin',
                'email' => 'admin@admin',
                'password' => Hash::make('admin'),
                'name' => 'principle',
                'lastname' => 'admin',
                'gender' => 'male',
                'student_phone' => '0830830830',
                'birthdate' => '1980-11-11',
            )
        );
        DB::table('users')->insert(
            array(
                'id' => 2,
                'approve' => false,
                'email' => 'student@student',
                'password' => Hash::make('student'),
                'name' => 'littleguy',
                'lastname' => 'studentuy',
                'gender' => 'male',
                'student_phone' => '0830830830',
                'birthdate' => '2000-11-11',
            )
        );
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
