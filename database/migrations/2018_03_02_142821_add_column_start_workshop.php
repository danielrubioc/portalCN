<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStartWorkshop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        
        Schema::table('workshops', function (Blueprint $table) {
            $table->integer('status')->unsigned()->change();
            $table->foreign('status')->references('id')->on('statuses');
            $table->integer('subcolor')->nullable()->after('color');
            $table->integer('type')->nullable()->after('status');
        });

        DB::table('workshops')->update(['type' => 1]);
        DB::table('workshops')->update(['status' => 1]);
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
