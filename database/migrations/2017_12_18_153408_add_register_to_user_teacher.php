<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterToUserTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->default('sin dirección');
            $table->string('phone')->default('');
            $table->string('cell_phone')->default('');
            $table->string('referential_info')->default('');
        });


        DB::table('users')->insert([
            'name' => 'Alejandra',
            'last_name' => 'Cortez',
            'email' => 'alejandracortesbustos@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56988083928',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Andrés',
            'last_name' => 'González',
            'email' => 'umceuc@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56954140036',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'María Elena',
            'last_name' => 'Serrano',
            'email' => 'mariaserranodeportes@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56979621919',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Mauricio',
            'last_name' => 'Lagos',
            'email' => 'mlagosreyes@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56950985630',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Katia',
            'last_name' => 'Muñoz',
            'email' => 'katia_roja@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56992836959',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Katherine',
            'last_name' => 'Meza',
            'email' => 'fitness.kz@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56963708482',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Denysse ',
            'last_name' => 'Godoy',
            'email' => 'linditalindi@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56987357877',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Diego',
            'last_name' => 'Araneda',
            'email' => 'dar.1992.cn@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56961915913',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Allison ',
            'last_name' => 'Fuentes',
            'email' => 'allisonfuentes17@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56988605819',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ricardo',
            'last_name' => 'Bustamante',
            'email' => 'ricardobustamanted@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56989343663',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Angelo ',
            'last_name' => 'Romo',
            'email' => 'angelo-romo@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56967357491',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Cristián',
            'last_name' => 'Cabrera',
            'email' => 'cristian_edfisica@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56999561736',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Ariel',
            'last_name' => 'Zambrano',
            'email' => 'ariel.edfisica22@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56977795732',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]); 


        DB::table('users')->insert([
            'name' => 'Alexis',
            'last_name' => 'Rojas',
            'email' => 'alexis-rojas@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56977912484',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Cristian',
            'last_name' => 'López',
            'email' => 'cristianlopezzapata@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56992343974',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Iann',
            'last_name' => 'San Martín',
            'email' => 'sanmartiniann10@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56940297532',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Marcelo ',
            'last_name' => 'Arzola',
            'email' => 'nakor_arzola@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56982184330',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Lidia ',
            'last_name' => 'Ortíz',
            'email' => 'li_voley_azul@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56989836201',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Anthony ',
            'last_name' => 'Cáres',
            'email' => 'anthonny.dapremont@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56987455787',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Julio',
            'last_name' => 'Veloso',
            'email' => 'julio.veloso17051@edu.ipchile.cl',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56982879155',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Ignacio',
            'last_name' => 'Flores',
            'email' => 'floreskichile@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56984362021',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Paula ',
            'last_name' => 'Galvez',
            'email' => 'paulagalvezd@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56977045030',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Marla ',
            'last_name' => 'Pérez',
            'email' => 'marlafpl28@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56987309220',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Hernán ',
            'last_name' => 'Gutiérrez',
            'email' => 'fusacuma@yahoo.es',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56994083547',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Corina ',
            'last_name' => 'Villalobos',
            'email' => 'corywolfville@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56973915843',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Claudia ',
            'last_name' => 'Morales',
            'email' => 'hadecp@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56996701236',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Carla ',
            'last_name' => 'Gonález',
            'email' => 'carlagonzalezfernandez8@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56932839984',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ruth ',
            'last_name' => 'Marín',
            'email' => 'ruthmabemc@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56931353346',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Manuel ',
            'last_name' => 'Paillain',
            'email' => 'manuelp@todografica.cl',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56991400241',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Johanna  ',
            'last_name' => 'Santander',
            'email' => 'lyoxford@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56993641536',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Robinson ',
            'last_name' => 'Cortez',
            'email' => 'hood07@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56988497852',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'name' => 'Nicolle ',
            'last_name' => 'Tobar',
            'email' => 'nicol.tobarverdugo@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56993595394',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Alexis ',
            'last_name' => 'Contreras',
            'email' => 'alexiswrestling@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Victoria ',
            'last_name' => 'Díaz',
            'email' => 'victoriadiazvargas@hotmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56977631621',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Paolo ',
            'last_name' => 'Cataldo',
            'email' => 'dermografika2@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56987506222',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Andrea ',
            'last_name' => 'Guzmán',
            'email' => 'apgp.986@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56982494816',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Karen ',
            'last_name' => 'Jara',
            'email' => 'karenjsj@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56966369132',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Javier ',
            'last_name' => 'Farías',
            'email' => 'javi.farias.7@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => date('Y-m-d H:i:s'),
            'role_id' => '2',
            'status' => '1',
            'cell_phone' => '+56988592690',
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
