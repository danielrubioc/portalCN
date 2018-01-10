<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterToUsersAndBlogcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //



        DB::table('categories')->insert([
            'name' => 'Tercer tiempo',
            'status' => '1',
            'url' => 'tercer-tiempo',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('categories')->insert([
            'name' => 'Eventos',
            'status' => '1',
            'url' => 'eventos',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d'),
            'role_id' => '1',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher',
            'last_name' => 'user',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d'),
            'role_id' => '2',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Public',
            'last_name' => 'user',
            'email' => 'public@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d'),
            'role_id' => '3',
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
