<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannerToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            //
            DB::table('banners')->insert([
                'title' => 'Crosswork ',
                'subtitle' => '"Aquel que quiere conseguir algo, encuentra su camino. El que no, encuentra una escusa"',
                'color' => '#48c5bd',
                'subcolor' => '#0e0e0e',
                'image' => 'banner-home.jpg',
                'status' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            //

        });
    }
}
