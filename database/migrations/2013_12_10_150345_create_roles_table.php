<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('status');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            'name' => 'admin',
            'status' => '1'
        ]);

        DB::table('roles')->insert([
            'name' => 'teacher',
            'status' => '1'
        ]);

        DB::table('roles')->insert([
            'name' => 'public',
            'status' => '1'
        ]);

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
