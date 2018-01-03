<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('workshop_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('status');
        });        

        Schema::table('user_workshops', function($table) {
            $table->foreign('workshop_id')->references('id')->on('workshops')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_workshops');
    }
}
