@extends('layouts.site')

@section('content')
	
	<div class="img-post-detail" style="background: url({{url('/images')}}/nosotros-menu.jpg) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	<div class="content-title-detail">
		<span></span>
		<h1>Nosotros</h1>
	</div>
	<div class="container info-content-detail">
		<h4>La Corporación del Deporte de Cerro Navia nace para dar respuesta a las necesidades de los vecinos y vecinas de la comuna, en su búsqueda de espacios deportivos, recreativos y culturales.</h4>
		<p>A lo largo de cada temporada, nos esforzamos por brindar talleres y cursos con disciplinas de vanguardia, con la meta de tener la parrilla más amplia y de calidad posible, para que todos los vecinos se sientan beneficiados y parte de una comuna en crecimiento.</p>
		<p>Todos quienes integran la Corporación del Deporte de Cerro Navia se esfuerzan por brindar el mejor apoyo y atención a todos nuestros vecinos para juntos poder ser una mejor comuna.</p>

		<br>
		<h2>¿Cuáles son los beneficios del deporte?</h2>
		<p>Creemos que fomentar y difundir el deporte es fundamental para combatir las enfermedades producidas por el sedentarismo en Chile.</p>
		<p>El deporte genera lazos, aumenta la confianza y mejora la toma de decisiones, permitiéndonos tener una comunicación más fluida y estable con nuestro entorno y ¡tener más y mejores amigos! Además regula el peso, elevando notablemente nuestra calidad de vida y salud, tanto física como mental, dándonos energía y mucha motivación, manteniéndonos ocupados y enfocados en los que realmente queremos. </p>
		<p>Creemos que el bienestar y el deporte son un derecho de todos los vecinos y velamos para que toda la comunidad sea parte de esto, trabajando arduamente en cada actividad, poniendo siempre en primer lugar a los vecinos.</p>
		<p>Nuestra misión es difundir y fomentar el deporte y la actividad física en la comuna, para que tengas acceso a estos beneficios.</p>
		
		<a href="{{ url('/disciplinas') }}" class="btn-first btn-gral">CONOCE LAS ACTIVIDADES DISPONIBLES AQUÍ</a>
		
		<p>Queremos que todos los vecinos tengan acceso total a las actividades de la corporación, para así generar el hábito de vida saludable en toda la comuna.</p>

		<p>Creemos que fomentar y difundir el deporte es fundamental para combatir las enfermedades producidas por el sedentarismo en Chile.</p>
		<p>El deporte genera lazos, aumenta la confianza y mejora la toma de decisiones, permitiéndonos tener una comunicación más fluida y estable con nuestro entorno y ¡tener más y mejores amigos! Además regula el peso, elevando notablemente nuestra calidad de vida y salud, tanto física como mental, dándonos energía y mucha motivación, manteniéndonos ocupados y enfocados en los que realmente queremos. </p>
		<p>Creemos que el bienestar y el deporte son un derecho de todos los vecinos y velamos para que toda la comunidad sea parte de esto, trabajando arduamente en cada actividad, poniendo siempre en primer lugar a los vecinos.</p>
		<p>Nuestra misión es difundir y fomentar el deporte y la actividad física en la comuna, para que tengas acceso a estos beneficios.</p>


		<h2>¿Qué nos motiva?</h2>
		<ul>
			<li><strong>Pasión:</strong> Trabajamos movidos por la pasión de cambiar e incentivar nuestra comuna, con la emoción de cada proyecto, canalizando nuestra energía en el logro de todas las metas.</li>
			<li><strong>Amor:</strong> Motivados por el amor a nuestra comuna y sabiendo que la comuna la constituye el vecino, trabajamos con cariño para ayudar a mejorar la calidad de vida de cada cerronavino.</li>
			<li><strong>Compromiso:</strong> Nuestra prioridad es hacer que la comuna mejore su calidad de vida y para eso trabajamos todos y cada uno de los días en distintas actividades en las que todos puedan participar, con dedicación, esfuerzo y mucha entrega.</li>

		</ul>

	</div>
@endsection
