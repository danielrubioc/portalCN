<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('image')->nullable();
            $table->integer('status')->unsigned()->index();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });

            DB::table('workshop_categories')->insert([
                    'name' => 'Gimnasio',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Estadio',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'IND',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Casa de la Cultura y Comunitario',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Clubes y otros',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Unidades Vecinales',
                    'image' => 'lalal',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Escuelas y Colegios',
                    'image' => 'lalal',
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
        Schema::dropIfExists('workshop_categories');
    }
}
