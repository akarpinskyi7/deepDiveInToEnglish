<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('users__courses', function (Blueprint $table) {
        $table->foreignId('courses_id')->constrained();
    });


    /*Schema::table('courses', function (Blueprint $table) {
    $table->foreign('id')->references('course_id')->on('users_courses');

        });*/




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        $table->dropForeign('users__courses_courses_id_foreign');
    }
}
