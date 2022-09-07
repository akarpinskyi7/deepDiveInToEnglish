<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

           Schema::table('users__courses', function (Blueprint $table) {
                   $table->foreignId('clients_id')->constrained();
               });

           /*  Schema::table('clients', function (Blueprint $table) {
           $table->foreign('id')->references('user_id')->on('users_courses');

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
        $table->dropForeign('users__courses_clients_id_foreign');
    }
}
