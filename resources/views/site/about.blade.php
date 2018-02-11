@extends('layouts.site')

@section('content')
<span class="hidden-xs" >
	<div class="content-about-de">
	<img src="{{url('/images')}}/nosotros-interior.jpg" class="img-responsive">

	<div class="container info-content-detail">
		<div class="col-md-12 title-posts content-title-detail">
	    	 <h1><span>Cerro Navia</span> Deportes</h1>
		</div>
		<h4>La Corporación del Deporte de Cerro Navia nace para dar respuesta a las
		necesidades de los vecinos y vecinas de la comuna, en su búsqueda de espacios
		deportivos, recreativos y culturales.</h4>
		

		<br>
		<!--<h3>CONOCE LAS ACTIVIDADES DISPONIBLES AQUÍ</h3>-->
		<div class="col-md-6 no-padding dektop-list">
			<h2>¿Qué nos motiva?</h2>
			<ul>
				<div class="content-tt"><h2>Pasión </h2> </div>
				<li>Trabajamos movidos por la pasión de cambiar e incentivar nuestra comuna, con la emoción de cada proyecto, canalizando nuestra energía en el logro de todas las metas.</li>
				<div class="content-tt"><h2>Amor </h2></div>
				<li> Motivados por el amor a nuestra comuna y sabiendo que la comuna la constituye el vecino, trabajamos con cariño para ayudar a mejorar la calidad de vida de cada cerronavino.</li>
				<div class="content-tt"><h2>Compromiso </h2>  </div>
				<li>Nuestra prioridad es hacer que la comuna mejore su calidad de vida y para eso trabajamos todos y cada uno de los días en distintas actividades en las que todos puedan participar, con dedicación, esfuerzo y mucha entrega.</li>

			</ul>

		</div>
		<div class="col-md-6 no-padding">
			<div class="content-mis">
				<h2>Nuestra Misión </h2>
				<p>Difundir y Fomentar <br>el deporte y la actividad física</p>
				<a href="{{ url('/equipo') }}">conoce al equipo</a>
			</div>

		</div>

		

		
	</div>
	
</div>
</span>	

<span class="visible-xs">
	<div class="img-post-detail" style="background: url({{url('/images')}}/nosotros-portada.jpg) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	<div class="content-title-detail">
		<span></span><br>
		<h1>Nosotros</h1>
	</div>
	<div class="container info-content-detail">
		<h4>La Corporación del Deporte de Cerro Navia nace para dar respuesta a las
		necesidades de los vecinos y vecinas de la comuna, en su búsqueda de espacios
		deportivos, recreativos y culturales.</h4>
		<p>Creemos que fomentar y difundir el deporte es fundamental para nuestra calidad
		de vida y salud, tanto física como mental, además creemos que el bienestar y el
		deporte son un derecho de todos y velamos para que toda la comunidad sea parte.</p>
		<p>Nuestra misión es difundir y fomentar el deporte y la actividad física en la
		comuna, para que tengas acceso a estos beneficios.</p>

		<br>
		<!--<h3>CONOCE LAS ACTIVIDADES DISPONIBLES AQUÍ</h3>-->
		

		<h2>¿Qué nos motiva?</h2>
		<ul>
			<li><strong>Pasión:</strong> Trabajamos movidos por la pasión de cambiar e incentivar nuestra comuna, con la emoción de cada proyecto, canalizando nuestra energía en el logro de todas las metas.</li>
			<li><strong>Amor:</strong> Motivados por el amor a nuestra comuna y sabiendo que la comuna la constituye el vecino, trabajamos con cariño para ayudar a mejorar la calidad de vida de cada cerronavino.</li>
			<li><strong>Compromiso:</strong> Nuestra prioridad es hacer que la comuna mejore su calidad de vida y para eso trabajamos todos y cada uno de los días en distintas actividades en las que todos puedan participar, con dedicación, esfuerzo y mucha entrega.</li>

		</ul>

		
	</div>
	<div class="selection-participate">
			<div class="separ-vtn">
				 <a href="{{ url('/disciplinas') }}">Disciplinas <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
			</div>
			<div class="separ-vtn">
				 <a href="{{ url('/equipo') }}">El equipo <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
			</div>
	</div>
</span>	
@endsection
