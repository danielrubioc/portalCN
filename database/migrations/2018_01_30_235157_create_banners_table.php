<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            
            $table->increments('id');
            $table->text('title');
            $table->string('subtitle', 200)->nullable();
            $table->string('color', 100)->nullable();
            $table->string('image', 230);
            $table->integer('status');
            $table->timestamps();    

        });
    }

    
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
