<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUsersCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('feedbacks', function (Blueprint $table) {
                            $table->foreignId('users__courses_id')->nullable()->constrained();
                        });


         /* Schema::table('user_courses', function (Blueprint $table) {
         $table->foreign('id')->references('user_courses_id')->on('Feedbacks');

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
        $table->dropForeign('feedbacks_users__courses_id_foreign');
    }
}
