<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            DB::table('posts')->insert([
                'title' => 'noticia por defecto 1 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_1',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 2 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_2',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 3 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_3',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 4 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_4',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 5 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_5',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 6 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_6',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);


            DB::table('posts')->insert([
                'title' => 'noticia por defecto 7 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_7',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 8 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_8',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 9 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_9',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 10 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_10',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 11 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_11',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'noticia por defecto 12 ',
                'subtitle' => 'Este es el subtitulo de la noticia',
                'url' => 'noticia_por_defecto_12',
                'content' => '<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimend</p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
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
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
