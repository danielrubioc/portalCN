<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 200);
            $table->text('url')->nullable();
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->integer('quotas');
            $table->integer('about_quotas');
            $table->text('cover_page')->nullable();
            $table->integer('status');
        });

        Schema::table('workshops', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshops');
    }
}
