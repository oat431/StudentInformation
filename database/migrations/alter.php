<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class alter extends Migration
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
