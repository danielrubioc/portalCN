@extends('layouts.site')

@section('content')

	<section class="content" id="first-section">
		<img src="{{url('/images/first-section.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description">
				<div class="title">
					<h1>Fomentar y difundir</h1>
					<span>
					"El deporte y la actividad física  en Cerro Navia"
					</span>
					
				</div>

			</div>
		</div>
	</section>

	<section class="content" id="second-section">
		<img src="{{url('/images/second-section.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description-gral text-second-gral">
				<h1>¿Por qué?</h1>
				<p>Para disminuir las enfermedades producidas por el sedentarismo en Chile creemos que es fundamental Difundir y Fomentar la actividad física en toda la comuna.</p>
				<a href="" class="btn-first btn-gral">Aprende más</a>
			</div>
			
		</div>
	</section>


	<section class="content" id="third-section">
		<img src="{{url('/images/third-section.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description-gral text-third-gral">
				<h1>¿Por qué actividad física y deporte?</h1>
				<p>Genera lazos y aumenta la confianza en ti mismo, regula el peso y mejora notablemente la calidad de vida, manteniéndonos ocupados y enfocados en lo que realmente queremos. ¡El deporte te desafía a superarte a ti mismo!</p>
				<a href="" class="btn-first btn-gral">Aprende más</a>
			</div>
		</div>
	</section>


@endsection
