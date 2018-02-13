<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   

        Schema::table('posts', function (Blueprint $table) {
            DB::table('posts')->delete();

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
                'start' => '0',
                'created_at' => '2018-01-26 09:07:52',
                'updated_at' => '2018-01-26 09:07:52'
            ]);

            DB::table('posts')->insert([
                'title' => 'Zumba Cerro Navia Fest 2018',
                'subtitle' => '¡Más de 2 horas de baile y una espectacular guerra de bombitas de agua!',
                'url' => 'zumba_cerro_navia_fest_2018',
                'content' => '<p>En el marco de las actividades de verano organizadas por la Corporaci&oacute;n del Deporte de Cerro Navia en conjunto con el Alcalde Mauro Tamayo, este s&aacute;bado 27 de Enero se realiz&oacute; la primera versi&oacute;n de la fiesta denominada &ldquo;Zumba Cerro Navia Fest&rdquo;.</p>\r\n\r\n<p>Actividad completamente gratuita, que reuni&oacute; a vecinos de todos los puntos de la comuna para bailar al ritmo de la Zumba con 10 instructores certificados por m&aacute;s de 2 horas y disfrutar de la m&aacute;s entretenida guerra de bombitas que la comuna haya visto.</p>\r\n\r\n<p>La m&uacute;sica comenz&oacute; a eso de las 19 horas y no se cans&oacute; de sonar hasta pasadas las 21 horas.</p>\r\n\r\n<p>M&aacute;s de 400 personas repletaron el Estadio Municipal y los cerca de 30&deg; de calor no fueron suficientes para aplacar la energ&iacute;a de los vecinos. La organizaci&oacute;n dispuso de agua para todos los asistentes as&iacute; como tambi&eacute;n bloqueador solar para todos.</p>\r\n\r\n<p>Cuando el calor aumentaba, el ritmo de la m&uacute;sica no aguantaba y los vecinos disfrutaban como nunca, aparecieron en puntos estrat&eacute;gicos de la actividad, baldes repletos de bombitas de agua. S&oacute;lo bast&oacute; para que los vecinos las vieran para que la locura se desatara.<br />\r\nLa guerra de bombitas fue sin cuartel, no quedo polera sin mojar y por supuesto, los ni&ntilde;os los m&aacute;s felice, mojados, riendo y compartiendo con sus amigos de forma sana.</p>\r\n\r\n<p>Luego de la guerra de bombitas aparecieron los premios y 10 poleras del Team Zumba fueron regaladas a los asistentes. Los premios fueron para quienes tuvieran la mejor ropa veraniega, para quienes sub&iacute;eran la mejor foto a Instagram con el Hashtag #ZumbaCerroNaviaFest (revisa las imagenes en el hashtag) y para quienes tuvieran el n&uacute;mero de pulsera ganador.</p>\r\n\r\n<p>La organizaci&oacute;n qued&oacute; muy complacida con la asistencia, contentos de que los vecinos se hagan parte de las actividades y disfruten del verano. Tambi&eacute;n los vecinos que seg&uacute;n sus palabras: &ldquo;fue una actividad muy buena, estamos felices de que la comuna se la juegue por nosotros, s&uacute;per cansadas, pero felices, porque hacen falta estas cosas en la comuna&rdquo;.</p>\r\n\r\n<p>As&iacute; que ya lo saben, el verano sigue estando en Cerro Navia y continuaremos reportando todas las actividades que la Corporaci&oacute;n del Deporte de Cerro Navia en conjunto con nuestro Alcalde Mauro Tamayo tiene preparadas para sus vecinos.</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'start' => '0',
                'cover_page' => '1517322301_0cb68eeb6af5b4fb4e0438d421fd2881.jpg',
                'created_at' => '2018-01-30 21:25:02',
                'updated_at' => '2018-02-03 00:48:59'
            ]);
            
            DB::table('posts')->insert([
                'title' => 'Cerro Navia Campeón Fútbol Categoría 2000',
                'subtitle' => 'Campeonato Haciendo Amigos de Algarrobo',
                'url' => 'cerro_navia_campeon_categoria_2000',
                'content' => '<p>Maravillosos resultados est&aacute;n consiguiendo los deportistas de Cerro Navia, m&aacute;s a&uacute;n cuando es toda la comuna la que apoya a nuestros j&oacute;venes.</p>\r\n\r\n<p>Si ayer nos enteramos de que el baloncesto femenino consigui&oacute; el tercer lugar y el masculino el segundo lugar en el campeonato Intercomunal de Basquetbol, hoy es el turno del f&uacute;tbol para celebrar.</p>\r\n\r\n<p>Y es que nuestros j&oacute;venes futbolistas est&aacute;n disputando el campeonato &ldquo;Haciendo Amigos&rdquo; de Algarrobo, torneo que se disputa entre los d&iacute;as 26 y 31 de enero e invita a equipos de todo el pa&iacute;s m&aacute;s un equipo de Argentina y otro de Brasil.</p>\r\n\r\n<p>En ese marco es que la categor&iacute;a 2000 se coron&oacute; campe&oacute;n al disputar la final frente a Captadores Online. La final termin&oacute; 0-0 durante los 90 minutos y se tuvo que definir a penales, y es ah&iacute; donde nuestros chicos vencieron por 3-0.</p>\r\n\r\n<p>En cuanto a los penales, nuestro portero Gonzalo Arenas tap&oacute; los 3 tiros rivales y se coron&oacute; como la figura del encuentro. Nuestros goles fueron anotados por Randy Bahamondes, Tom&aacute;s Mena y Benjam&iacute;n L&oacute;pez.</p>\r\n\r\n<p>Los resultados del equipo campe&oacute;n son los siguientes:</p>\r\n\r\n<p>1&deg; Partido: 2-0 frente a Captadores Online.</p>\r\n\r\n<p>2&deg; Partido: 3-1 frente a Babel.</p>\r\n\r\n<p>3&deg; Partido: 2-2 frente a Chacabuco.</p>\r\n\r\n<p>4&deg; Partido: 3-3 frente al local y paso a la final a penales por 4-1.</p>\r\n\r\n<p>Final: 0-0 frente a Captadores Online y 3-0 en definici&oacute;n a penales.</p>\r\n\r\n<p>Premiaci&oacute;n hoy 31 de enero a las 14:00 horas.</p>\r\n\r\n<p>Adem&aacute;s, la categor&iacute;a 2004 tambi&eacute;n en competici&oacute;n acaba de coronarse con el tercer lugar al ganar la final de plata por 3 goles a 0.</p>\r\n\r\n<p>Goles de Nicol&aacute;s Arias, Mart&iacute;n Campos y Ra&uacute;l Vicencio.</p>\r\n\r\n<p>Ampliaremos informaci&oacute;n durante el d&iacute;a.</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'start' => '0',
                'cover_page' => '1517424192_95522702f1e011fd29832dd9832f0fec.jpg',
                'created_at' => '2018-01-31 20:59:52',
                'updated_at' => '2018-02-01 01:43:12'
            ]);

            DB::table('posts')->insert([
                'title' => 'Cancha Loca la revolución del verano',
                'subtitle' => 'De la mano de nuestro Alcalde, Mauro Tamayo y de la Corporación del Deporte, Cerro Navia está viviendo una verdadera revolución en el deporte y en el bienestar de todos los vecinos.',
                'url' => 'cancha_loca',
                'content' => '<p>Si ya viviste diferentes actividades durante la temporada de verano, te enteraste de las actividades especiales que se realizan en la piscina del Gimnasio Municipal. Si hace poco te contamos c&oacute;mo nuestros j&oacute;venes sal&iacute;an campeones en Algarrobo y, por si fuera poco, tambi&eacute;n te contamos todo lo sucedido en la Zumba Cerro Navia Fest &iexcl;creemos que est&aacute;s listo para saber m&aacute;s!</p>\r\n\r\n<p>Hoy te contamos sobre c&oacute;mo una cancha acu&aacute;tica sorprende a los vecinos de todos los rincones de Cerro Navia y hacen felices a cientos de ni&ntilde;os y j&oacute;venes.</p>\r\n\r\n<p>Consiste en 27 metros de pura y sana diversi&oacute;n para ni&ntilde;os y adultos, adultos y ni&ntilde;os, todos en la misma frecuencia de bienestar, buena onda y convivencia.</p>\r\n\r\n<p>Lo que te queremos contar, es que Cancha Loca es una iniciativa de nuestro alcalde Mauro Tamayo, &uacute;nica en el pa&iacute;s, la que consiste en una cancha itinerante de 27 metros de largo y 14 metros de ancho que es rellenada con agua, pura y cristalina. La cancha se aproxima a una de baby futbol, pero en vez de pasto, tenemos agua en nuestros pies. Creo que ya te est&aacute;s imaginando lo que sigue: risas, carcajadas, ca&iacute;das, chascarros, agua por all&aacute; y por ac&aacute;.</p>\r\n\r\n<p>Pero ojo, que los ni&ntilde;os y ni&ntilde;as no est&aacute;n solos, la actividad cuenta con monitores todo el tiempo, que fiscalizan el buen uso de la cancha y la seguridad, as&iacute; todos los asistentes pasan un excelente tiempo de sana recreaci&oacute;n.</p>\r\n\r\n<p>Al hacer deporte, disfrutan y lo pasan bien, eso es bienestar, mejorar la calidad de vida de los vecinos.</p>\r\n\r\n<p>La cancha es itinerante, esto significa amigo lector, que la podemos mover a diversos puntos de la comuna, en palabras del alcalde al diario LUN: &ldquo;<em>La intenci&oacute;n es abarcar a la mayor cantidad de vecinos, esto gracias a que la cancha es completamente nuestra</em>&rdquo;. Te cuento que el a&ntilde;o pasado pudimos arrendarla para s&oacute;lo 3 puntos, ahora tenemos cerca de 30 puntos en toda la comuna para refrescarnos y divertirnos&hellip; &iexcl;Eso significa que tenemos cancha para rato!</p>\r\n\r\n<p>As&iacute; que bueno, como dicen los &ldquo;reclames&rdquo;, d&eacute;jate seducir y ven a jugar a la cancha loca, divi&eacute;rtete, pasa un rico momento y date cuenta que Cerro Navia est&aacute; cambiando, est&aacute; mejorando y como Corporaci&oacute;n del Deporte no vamos a descansar hasta instaurar una cultura de bienestar en toda la comuna, &iexcl;he dicho!</p>\r\n\r\n<p>Mira la entrevista de TVN a nuestro Alcalde por la cancha loca: <a href="http://bit.ly/2nONQNp">http://bit.ly/2nONQNp</a></p>\r\n\r\n<p>Ya sabes, cancha loca, 27 metros de diversi&oacute;n entre las 11:00 y las 18:00 horas. A parte que siempre regalamos heladitos para capear el calor ?</p>',
                'status' => '1',
                'category_id' => '1',
                'user_id' => '1',
                'start' => '0',
                'cover_page' => '1518060760_053c5a586b0748f7a004ad11c39c4b6b.jpg',
                'created_at' => '2018-02-08 10:32:40',
                'updated_at' => '2018-02-08 10:34:05'
            ]);

        });


        Schema::table('galleries', function (Blueprint $table) {
            $table->string('type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            //
        });
    }
}
