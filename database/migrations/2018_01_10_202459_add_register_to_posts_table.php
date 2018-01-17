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
                'title' => 'Torneo Talentos del Mañana',
                'subtitle' => 'Escuela Corporación del Deporte de Cerro Navia campeón',
                'url' => 'talentos_del_manana',
                'content' => '<p>Con &eacute;xito se realiz&oacute; el primer campeonato de f&uacute;tbol &ldquo;Talentos del Ma&ntilde;ana&rdquo; organizado por nuestra Corporaci&oacute;n del de Deporte de Cerro Navia en conjunto con el CDA de la Universidad de Chile, entre los d&iacute;as 08 y 13 de Enero.</p>
                
                <p>Este torneo ten&iacute;a como finalidad, encontrar a las j&oacute;venes promesas del f&uacute;tbol que viven en nuestra en comuna, para as&iacute; incentivar y ayudarlos a desarrollar este talento innato.<br />
                Los equipos participantes fueron: Escuela Efidech, Asociaci&oacute;n de f&uacute;tbol Cerro Navia, Lideinsenoba (Carlos Orellana), Estrella Real (Liga Alianza), Escuela Corporaci&oacute;n de Deporte de Cerro Navia y Uni&oacute;n Santa Victoria, dejando todos el cuerpo y el alma en la cancha, tanto jugadores como la barra, quienes no dejaron de apoyar en ningun momento.</p>
                
                <p><br />
                La gran final se realiz&oacute; este S&aacute;bado 13, obteniendo el 4to lugar Uni&oacute;n Santa Victoria, en el 3 en lugar Lideinsenoba (Carlos Orellana) y en la disputa por el trono, obteniendo el 2do lugar Estrella Real (Liga Alianza) y coron&aacute;ndose la Escuela Corporaci&oacute;n del Deporte de Cerro Navia.</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'cover_page' => 'torneo.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            DB::table('posts')->insert([
                'title' => 'Zumba Fest',
                'subtitle' => '¡Baile, burbujas, agua y muchos premios!',
                'url' => 'zumba_fest',
                'content' => '<p>Este 27 de Enero quedan todos invitados al primer festival de Zumba del a&ntilde;o.</p>
                
                <p>Esperamos reunir a m&aacute;s de 600 personas dispuestas a bailar por m&aacute;s de 2 horas al ritmo del baile entretenido, con toda la energ&iacute;a de las mejores coreograf&iacute;as y los instructores m&aacute;s alegres.</p>
                
                <p>Ya sabes, desde las 18 hrs hasta las 21 hrs en el Estadio Municipal de Cerro Navia ubicado en Mapocho Norte 8115, Cerro Navia. Podr&aacute;s mover el esqueleto, divertirte con tus amigos, conocer gente nueva y ganar entretenidos premios.</p>
                
                <p>&iexcl;Te esperamos!</p>
                
                <p><a href="http://deportescerronavia.drubioc.cl/public/nosotros">Inscr&iacute;bete aqu&iacute; !</a></p>',
                'status' => '1',
                'category_id' => '2',
                'user_id' => '1',
                'cover_page' => 'zumba.jpg',
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
