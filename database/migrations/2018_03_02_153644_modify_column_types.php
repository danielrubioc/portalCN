<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('posts', function (Blueprint $table) {
            $table->renameColumn('start', 'type');
        });


        Schema::table('posts', function (Blueprint $table) {
            $table->integer('type')->unsigned()->change();
            $table->foreign('type')->references('id')->on('types');
        });

        DB::table('posts')->update(['type' => 1]);
        
        Schema::table('workshops', function (Blueprint $table) {
            $table->integer('type')->unsigned()->change();
            $table->foreign('type')->references('id')->on('types');
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
