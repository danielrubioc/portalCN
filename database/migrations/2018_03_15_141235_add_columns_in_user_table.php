<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age')->nullable();
            $table->text('school')->nullable();
            $table->integer('health')->nullable();
            $table->text('health_problem')->nullable();
            $table->text('headline_full_name')->nullable();
            $table->text('headline_email')->nullable();
            $table->text('headline_phone')->nullable();
            $table->text('headline_rut')->nullable();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->integer('make_workshop')->nullable();
            $table->text('commentary')->nullable();
        });


        DB::table('roles')->insert([
            'name' => 'attention',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
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
