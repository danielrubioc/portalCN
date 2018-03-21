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
            $table->string('url')->unique();
            $table->integer('status')->unsigned()->index();
            $table->foreign('status')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });

            DB::table('workshop_categories')->insert([
                    'name' => 'Gimnasio',
                    'image' => 'lalal',
                    'url' => 'gimnasio',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Estadio',
                    'image' => 'lalal',
                    'url' => 'estadio',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'IND',
                    'image' => 'lalal',
                    'url' => 'ind',
                    'status' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Casa de la Cultura y Comunitario',
                    'image' => 'lalal',
                    'status' => '1',
                    'url' => 'territorio_casa_de_la_cultura_y_comunitario',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Clubes y otros',
                    'image' => 'lalal',
                    'status' => '1',
                    'url' => 'territorio_clubes_y_otros',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Unidades Vecinales',
                    'image' => 'lalal',
                    'status' => '1',
                    'url' => 'territorio_unidades_vecinales',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
            ]);
            DB::table('workshop_categories')->insert([
                    'name' => 'Territorio - Escuelas y Colegios',
                    'image' => 'lalal',
                    'status' => '1',
                    'url' => 'territorio_escuelas_y_colegios',
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
