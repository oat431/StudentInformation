<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Course extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('course_id')->primary();
            $table->string('course_name');
            $table->float('credit');
        });
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
