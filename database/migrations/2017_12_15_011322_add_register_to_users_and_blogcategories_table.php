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



        DB::table('blog_categories')->insert([
            'name' => 'Revistas',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('blog_categories')->insert([
            'name' => 'Noticias',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'last_name' => 'user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '1',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Teacher',
            'last_name' => 'user',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('12345'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Public',
            'last_name' => 'user',
            'email' => 'public@gmail.com',
            'password' => bcrypt('12345'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
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
