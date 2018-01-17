<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRegisterWorkshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('workshops')->insert([
            'name' => 'Karate ',
            'url' => 'karate',
            'color' => '#54a492',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'karate.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El camino de la mano vacía, un arte marcial tradicional de las islas Ryükyü, actualmente territorio japonés. <br>  El karate-Do de hoy en día se caracteriza fundamentalmente por el empleo de golpes de puño, bloqueos, patadas y golpes de mano abierta, donde las diferentes técnicas reciben varios nombres, según la zona del cuerpo a defender o atacar. <br> Al ser un arte, tiene muchos secretos para aprender, así como técnicas, formas y cortesías. El objetivo no es solo desarrollar destreza de combate, sino también desarrollar la espiritualidad del practicante para lograr equilibrio entre cuerpo y mente. <br> El Karate es deporte de exhibición Olímpica, aún no alcanza el grado de disciplina Olímpica oficial, pero tiene la opción de serlo a partir de Tokio 2020. Pese a eso, es el segundo arte marcial más popular del mundo detrás del Taekwondo. <br> Aprende este arte marcial y encuentra el equilibro ¡inscríbete ya!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Natación ',
            'url' => 'natacion',
            'color' => '',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'natacion.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'La natación, al igual que el basquetbol, es considerado uno de los deportes más completos, esto se refiere a que utiliza una gran cantidad de los músculos en los movimientos de desplazamiento. <br> Sabías que las primeras referencias a esta disciplina se remontan a la prehistoria, es decir, existen registros de la natación desde hace más de 7500 años ¡Increíble! <br> La natación es un Deporte Olímpico, actualmente popularizado a nivel mundial gracias al deportista Michael Phelps, quién con increíble destreza, tiene el logro de ser el deportista Olímpico con mayor cantidad de medallas en una sola edición, logrando 8 medallas de Oro en Pekín 2008. <br> Durante Pekín 2008, Michael Phelps fue el deportista que más noticias generó en todo el mundo, superando a deportistas tan mediáticos como Usain Bolt. <br> Así que ya sabes, estás totalmente invitado a iniciar esta aventura con nosotros, inscríbete a Natación y ¡activa cada musculo de tu cuerpo! ',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Futbol ',
            'url' => 'futbol',
            'color' => '#3c997d',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'futbol.jpg',
            'about_quotas' => '20',
            'user_id' => '1',
            'description' => 'El fútbol es el deporte más popular del mundo, practicado por más de 270 millones de personas, nació en Inglaterra y las reglas creadas en el año 1863 sirven de base para el deporte que disfrutamos hoy en día. <br> Este deporte es tan popular en el orbe, que la Copa Mundial de Fútbol dobla la audiencia de los mismísimos Juegos Olímpicos.  <br>  Lo fascinante del fútbol es su capacidad para unir a las personas en torno a un sentimiento, su capacidad para mostrar los mejor de las personas al momento de enfrentar al rival y apoyar a sus jugadores. ¡Una vez terminado el partido, seguimos siendo amigos! <br> ¡Inscríbete en fútbol y aprende sobre amistad y pasión!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Aerobox ',
            'url' => 'aerobox',
            'color' => '#e2789d',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'aerobox.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El Aerobox es una disciplina única que combina ejercicios de kickboxing con música energética. Aquí el adversario físico no existe, es más bien imaginario, en donde mediante ejercicios buscamos algo cercano a un baile violento, pero ojo, que no buscamos el desarrollo de capacidades luchadoras, más bien la mejora física y aeróbica a través de altas dosis de adrenalina. <br> El fitness de combate te permite no solo modelar tu figura, disminuir el peso, quemando aproximadamente 800 calorías por sesión, sino que también es una disciplina ideal para liberar estrés y sentirse mejor con uno mismo. <br> ¡Te invitamos a participar de esta adrenalínica disciplina y mejorar tu calidad de vida!.',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Atletismo ',
            'url' => 'atletismo',
            'color' => '#c1fce6',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'atletismo.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => ' El Atletismo, considerado el deporte más antiguo, es más bien un conjunto de especialidades y disciplinas que van desde la velocidad, hasta los obstáculos. Es además el deporte base para los Juegos Olímpicos. <br> ¿Cuáles son los beneficios de practicar atletismo? <br> El atletismo es un deporte que abarca numerosas disciplinas. Todas estas actividades se caracterizan por presentar un elevado ejercicio aeróbico. Esto significa que tiene cualidades únicas para prevenir la obesidad, cuida el corazón debido a que se entrena para resistir diversos niveles de esfuerzo. <br> Además, entre otros de sus beneficios, mejora el sistema respiratorio, aumentando la resistencia al esfuerzo físico y mental, sumado a lo anterior, se transforman en un deporte que previene tanto las enfermedades físicas como las enfermedades o deterioros cognitivos. <br>Lo más importante es que aumenta la confianza en ti mismo, mejora tu estado de ánimo y con ello tu calidad de vida. <br> ¡Te invitamos a inscribirte y comenzar a mejorar tu calidad de vida con nosotros! ',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Baile Entretenido',
            'url' => 'baile-entretenido',
            'color' => '#1e3275',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'baile-entretenido.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'Si estás leyendo esto, estás a un paso de mover el esqueleto y tonificar tu cuerpo. En baile entretenido mezclamos el ritmo de la mejor música junto a coreografías que activan tu metabolismo y tu mente, gracias a esto te mantienes activo, mejoras tu coordinación, lo mejor es que ¡te sientes feliz y lleno de energía!  <br> Cada vez que te muevas con el ritmo del baile entretenido, estarás botando tensiones, botando el estrés y llenándote de fuerza y energía, con ganas de no parar y con cada paso y cada vuelta ¡estarás mejorando tu calidad de vida! <br> ¡Inscríbete, participa y comienza a sentirte más vivo que nunca!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Basquetbol',
            'url' => 'basquetbol',
            'color' => '#1806b7',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'basquetbol.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El basquetbol o baloncesto es uno de los deportes más populares en Estados Unidos y uno de los deportes más completos que se pueden practicar, esto debido a que te exige estar en constante movimiento durante periodos de intensa actividad física y cardiovascular. <br> Entre sus beneficios destaca que es el deporte que más influye en el crecimiento de una persona desde su niñez hasta la adolescencia. <br><br>Curiosidades. <br><br> Sabías que los primeros campeonatos del mundo de este deporte fueron celebrados en Argentina en 1950. Y que tres años más tarde fueron celebrados en Chile, pero esta vez para el basquetbol femenino. <br> El récord de puntuación en el baloncesto es del jugador brasileño Oscar Schmidt. La ‘Mano Santa’, como llegó a ser conocido, obtuvo 49.703 puntos durante su carrera. <br> El jugador que anotó más puntos en un solo partido oficial es Wilt Chamberlain. Eran 100 puntos en un partido de la NBA celebrado el 02 de marzo de 1962. <br> Ya lo sabes, el basquetbol es uno de los deportes más completos que existen, trae numerosos beneficios y tiene una historia de curiosidades infinita, por eso ¡te invitamos a ser parte de este entretenido deporte y mejorar tu calidad de vida junto a nosotros!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Crossfit ',
            'url' => 'crossfit',
            'color' => '#cd1142',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'crossfit.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'Greg Glassman, el creador del Crossfit es considerado por muchos, como el hombre más poderoso del mundo en cuanto a forma física. En sus palabras, el Crossfit es capaz de entregar a quienes lo practican con disciplina, su máximo potencial genético, ¡permite verte y sentirte como la naturaleza quiere que te veas y te sientas! <br> Así de poderoso es el Crossfit para su creador y nosotros en Corporación del Deporte de Cerro Navia lo tenemos de forma gratuita, para que te entregues totalmente a mejorar tu condición física y sentirse bien contigo mismo.<br> Según su creador, el Crossfit te prepara para lo desconocido y lo imprevisto, porque la vida es un desafío, y queremos que estés preparado para afrontarlo.<br> ¡Inscríbete en Crossfit y mejora tu calidad de vida con nosotros!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Crosswork',
            'url' => 'crosswork',
            'color' => '#7dc5bd',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'crosswork.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => '"Aquel que quiere conseguir algo, encuentra un camino. El que no, encuentra una excusa" Stephen Dolley. <br>  Esta es una de las frases con las que se presenta el Cross-work y si estás leyendo esto, estás a un paso de comenzar a mejorar tu calidad de vida junto a nosotros. <br> Así llega Crosswork, con la promesa de mezclar entrenamiento tradicional con ciencia y biomecánica. Sumale la disciplna y podrás lograr tus objetivos de bienestar. <br> Pero ten cuidado, no es un camino fácil, solo tu determinación y fuerza de voluntad serán tus compañeros de viaje. <br> Así que sí estás dispuesto, te proponemos inscribirte ahora y mejorar tu calidad de vida.',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Defensa Personal',
            'url' => 'defensa-personal',
            'color' => '#b62445',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'defensa-personal.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'Gran parte de la autoestima y el amor propio, pasan por la confianza, por sentirse seguro con uno mismo. Defensa personal es una disciplina profesional que busca brindarte las herramientas necesarias para que te sientas segura, para que sientas confianza en ti mismo y te sientas capaz de estar tranquila. <br> Este taller mezcla movimientos de diversos estilos de combate para aplicarlos a situaciones reales de peligro. El objetivo es que puedas evitar un combate y en caso de que él combate sea inevitable, puedas defenderte y dar respuesta a esos momentos sin sentir pánico, sin quedarte inmovilizada y protegiéndote a ti a tus seres queridos. <br> Inscríbete, comienza a cambiar tu vida ¡siéntete segura, elimina el temor!.',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Hidromasaje',
            'url' => 'hidromasaje',
            'color' => '#6ca989',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'hidromasaje.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'Somos la única Comuna que presenta a sus vecinos y vecinas esta actividad de forma gratuita y combinada con especialistas que hacen un completo seguimiento a quienes participan de ella.  <br> El hidromasaje es un momento de relajación, de conexión con nosotros mismos y de limpieza. <br> Mediante agua que fluye a presión en combinación con altas dosis de oxigenación, nuestro cuerpo elimina el estrés, mejora la circulación, disminuye la ansiedad, elimina toxinas de los poros de la piel y ayuda a la regeneración de la piel. <br> Aprovecha este espectacular beneficio e inscríbete en las sesiones de hidromasaje ¡mejora tu calidad de vida con nosotros!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'Taekondo',
            'url' => 'taekwondo',
            'color' => '#2c4092',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'taekwondo.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El Taekwondo es un arte marcial moderno, dado a conocer en 1955 y convertido en deporte Olímpico oficial en el año 2000. <br> Actualmente el Taekwondo es uno de los deportes de combate más conocidos y populares del mundo, principalmente por su variedad de movimientos y espectacularidad de sus patadas. <br> Además de los beneficios comunes de practicar deporte, como disminuir la obesidad y mejorar la salud a nivel físico y mental, el Taekwondo es una disciplina que mejora muchísimo los reflejos y tiempos de reacción frente a diversas situaciones, permitiendo pensar más rápido, sobre todo en desventaja. <br> Esta disciplina basa sus principios en las filosofías chinas del confusionismo y el taoísmo, sus principios son: Cortesía, integridad, perseverancia, autocontrol y espíritu indomable.  <br> ¡Te invitamos a ser parte de este arte marcial y descubrir tu propio potencial!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'voleibol',
            'url' => 'voleibol',
            'color' => '#3c997d',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'voleibol.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El voleibol es un deporte que se practica en casi todo el mundo, su federación llamada Federación Internacional de Voleibol se encuentra conformada por 220 naciones. <br> Durante un partido de voleibol es normal que los jugadores realicen entre 70 y 100 saltos, lo que se traduce en una alta quema de calorías y tonificación del cuerpo. <br> Al ser un deporte en equipo, aprendes a compartir, trabajar con tus pares y confiar en los demás. Puedes aprender habilidades de liderazgo y cooperación, lo cual se traduce en un mejor estilo de vida y confianza en ti mismo. <br>  Aumenta tu estado de ánimo jugando voleibol, compartiendo con amigos y quemando calorías. <br> ¡Inscríbete, salta, golpea la bola y disfruta de esta apasionada disciplina con nosotros!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'yoga',
            'url' => 'yoga',
            'color' => '#f1cd43',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'yoga.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'El yoga es una disciplina, que al igual que el Chi-Kung, ofrece a sus practicantes beneficios tanto físicos como espirituales. Es en el plano mental-espiritual donde el yoga entrega sus mayores beneficios, conectándote contigo mismo y comprendiendo la vida con otro significado, desde otra perspectiva. <br>  Al lograr esto, el camino se vuelve más sencillo, más placentero. <br> Es indudable que a nivel físico, quienes practican yoga, experimentan beneficios tangibles como la pérdida de peso o el alivio de contracturas y tensiones, pero su mayor beneficio es la paz interior. <br> Te invitamos a sentir un aumento de energía, a ver el mundo de forma diferente y conectarte espiritualmente con algo superior.  <br> ¡Inscríbete y mejora tu calidad de vida!',
            'place' => 'Gimnasio Municipal, Mapocho Norte 8115, Cerro Navia',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('workshops')->insert([
            'name' => 'zumba',
            'url' => 'zumba',
            'color' => '',
            'status' => '1',
            'quotas' => '20',
            'cover_page' => 'zumba.jpg',
            'about_quotas' => '5',
            'user_id' => '1',
            'description' => 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum. <br> Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
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
        
    }
}
