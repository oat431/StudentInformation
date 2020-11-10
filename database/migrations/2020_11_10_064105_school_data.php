<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class SchoolData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('registrations')->insert(
            array(
                'registration_id' => '1',
                'student_id' => '2',
                'course_id' => '953233',
            )
        );
        DB::table('registrations')->insert(
            array(
                'registration_id' => '2',
                'student_id' => '2',
                'course_id' => '953261',
            )
        );
        DB::table('registrations')->insert(
            array(
                'registration_id' => '3',
                'student_id' => '2',
                'course_id' => '953212',
            )
        );
        DB::table('registrations')->insert(
            array(
                'registration_id' => '4',
                'student_id' => '2',
                'course_id' => '953361',
            )
        );

        DB::table('courses')->insert(
            array(
                'course_id' => '953233',
                'course_name' => 'programming methodology',
                'credit' => '3',
            ),
        );
        DB::table('courses')->insert(
            array(
                'course_id' => '953261',
                'course_name' => 'interactive website',
                'credit' => '2',
            ),
        );
        DB::table('courses')->insert(
            array(
                'course_id' => '953361',
                'course_name' => 'computer network and protocols',
                'credit' => '3',
            ),
        );
        DB::table('courses')->insert(
            array(
                'course_id' => '953212',
                'course_name' => 'database system and design',
                'credit' => '3',
            )
        );

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
        //
    }
}
