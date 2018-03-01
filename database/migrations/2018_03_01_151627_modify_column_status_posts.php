<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnStatusPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
        Schema::table('banners', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
        Schema::table('galleries', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
        Schema::table('tags', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
        });
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
