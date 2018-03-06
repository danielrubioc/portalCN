@extends('layouts.site')
@section('content')
<span class="hidden-xs">
	<section class="content slider sld-home"> 

		<div class="info-taller">
			<div id="carrousel-slider-home" class="owl-carousel owl-theme">
	            @foreach ($banners as $banner)
					@if ($banner->url)	
						<a href="{{$banner->url}}">
						@else
						<a>
	            	@endif
							<div class="item" style="    background: url({{url('/uploads/banners')}}/{{ $banner->image }}) center center / cover no-repeat;">
								<div class="info">
									<h2 style="color: {{$banner->color}}">{{$banner->title}}</h2>
									<span style="color: {{$banner->subcolor}}">{{$banner->subtitle}}</span>
								</div>
								
							</div> 	
						</a>
				@endforeach
			</div>
		</div>

	</section>


	<section class="content col-md-12 conten-workshop-gral" style="background-image: url('{{url('/images')}}/bg-disciplinas.jpg')" >
		<h2 class="titulo-home titulo-princ" style="text-align: right;">NUESTRAS<br><strong>DISCIPLINAS</strong></h2>

		<div class="col-md-7">
			@foreach ($workshops as $key => $taller)				
				<a href="{{ url('/disciplina') }}/{{$taller->url}}" class="col-md-6 ult-wrk">					
					<div class="img" style=" background-image: url('/uploads/workshop/{{$taller->cover_page}}');">
					</div>
					<div class="txt">
						<h2 class="animable-element" style="opacity: 1;">{{$taller->name}}</h2>
						<p class="animable-element" style="opacity: 1;">{{ str_limit($taller->description, 40) }} </p>
					</div>						
				</a>				 
			@endforeach
		</div>
<!-- Destacada -->
		<div class="col-md-5">	
			<div class="destacada-wrk">
				<a href="{{ url('/disciplina') }}/{{$workshops[0]->url}}">					
					<div class="img" style=" background-image: url('/uploads/workshop/{{$workshops[0]->cover_page}}');">
					</div>
					<div class="txt">
						<h2 class="animable-element" style="opacity: 1;">{{$workshops[0]->name}}</h2>
						<p class="animable-element" style="opacity: 1;">{{ str_limit($workshops[0]->description, 40) }} </p>
					</div>						
				</a>
			</div>		
		</div>
		<button class="btn-home">VER MÁS</button>
	</section>

	<section class="container-fluid">
		<h2 class="titulo-home">CERRO NAVIA DEPORTES</h2>
	</section>

	<section class="container-fluid equipo-home" style="background-image: url('{{url('/images')}}/bg-nosotros.jpg')">
		<div class="col-md-offset-1 col-md-5 izq">
			
			<p>¿QUÉ NOS MOTIVA?</p>
			<span>Creemos que fomentar y difundir el deporte es fundamental para nuestra calidad de vida y salud, tanto fisica y mental, además creemos que el bienestar y el deporte son un derecho de todos y velamos para que toda la comunidad sea parte.</span>
			<button>LEER MÁS</button>
		</div>
		<div class="col-md-5 der">
			<h2>CERRO NAVIA</h2>
			<span>DEPORTES</span>
			<button>CONOCE AL EQUIPO</button>		
		</div>
	</section>

	

	
	
	<section  class="content col-md-12 conten-home-tercer" style="background-image: url('{{url('/images')}}/foto-fondo-tercertiempo.jpg'); ">

		<h2 class="titulo-home titulo-princ" style="text-align: left;">TERCER<br><strong>TIEMPO</strong></h2>
		<!-- Destacada -->
		<div class="col-md-5">	
			<div class="destacada-wrk">
				<a href="{{ url('/disciplina') }}/{{$posts[0]->url}}">					
					
					<div class="txt">
						<h2 class="animable-element" style="opacity: 1;">{{$posts[0]->title}}</h2>
						<p class="animable-element" style="opacity: 1;">{{ str_limit($posts[0]->content, 40) }} </p>
					</div>
					<div class="img" style=" background-image: url('/uploads/workshop/{{$posts[0]->cover_page}}');">
					</div>					
				</a>
			</div>

		</div>		
	
		<div class="col-md-7 home-tercertiempo" >
			@foreach ($posts as $key => $post)			
				<a href="{{ url('/disciplina') }}/{{$taller->url}}" class="col-md-4 ult-wrk">					
					<div class="img" style="background-image: url('{{url('/images')}}/slider-2-min-min.png')">
						<br><br> <br>
					</div>
					<div class="txt">
						<h2 class="animable-element" style="opacity: 1;">{{$post->title}}</h2>
					</div>			
				</a>
			@endforeach
		</div>
</section>
</span>	



<span class="visible-xs">
	<section class="content" id="first-section">
		<img src="{{url('/images/home-home.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description">
				<div class="title">
					<h1>Fomentar y difundir</h1>
					<span>
					El deporte y la actividad física
					</span>
					
				</div>

			</div>
		</div>
	</section>

	<section class="content" id="second-section">
		<img src="{{url('/images/nosotros-menu.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description align-left-section">
				<div class="text-description-section text-second-gral">
					<h1>Nosotros</h1>
					<p>Buscamos brindar a todos los vecinos y vecinas variados talleres Deportivos y de Actividad Física para que puedan desarrollar habilidades de destrezas corporales, generar una vida más saludable y activa, que permita un desarrollo de mejora de su calidad de vida.</p>
					
				</div>
			</div>
			<div class="content-btn-full">
				<a href="{{ url('/nosotros') }}" class="btn-first btn-gral">Aprende más</a>
			</div>
		</div>
	</section>

	<section class="content" id="third-section">
		<img src="{{url('/images/disciplina-menu.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description align-left-section">
				<div class="text-description-section text-third-gral">
					<h1>Disciplina</h1>
					<p>Te invitamos a conocer las variadas disciplinas, talleres y cursos que tenemos a disposición de todos nuestros vecinos y vecinas. ¡Inscríbete y mejora tu calidad de vida!</p>
					
				</div>
			</div>
			<div class="content-btn-full">
				<a href="{{ url('/disciplinas') }}" class="btn-first btn-gral">Aprende más</a>
			</div>
		</div>
	</section>

	




	<section class="content" id="four-section">
		<img src="{{url('/images/eventos-menu.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description align-left-section">
				<div class="text-description-section text-four-gral">
					<h1>Eventos</h1>
					<p>Revisa las actividades especiales que la Corporación del Deporte organiza para todos sus vecinos. ¡Entérate e inscríbete, participa y comparte!</p>
					
				</div>
			</div>
			<div class="content-btn-full">
				<a href="{{ url('publicaciones/eventos') }}" class="btn-first btn-gral">Aprende más</a>
			</div>
		</div>
	</section>

	<section class="content" id="five-section">
		<img src="{{url('/images/tercer-tiempo-menu.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description align-left-section">
				<div class="text-description-section text-five-gral">
					<h1>Tercer tiempo</h1>
					<p>Visita la sección Tercer tiempo y aprende más sobre todos los aspectos de la Corporación del Deporte, desde notas y artículos, hasta historias y experiencias de vida de nuestros vecinos y vecinas. ¡Entra, aprende y comparte!</p>
					
				</div>
			</div>
			<div class="content-btn-full">
				<a href="{{ url('publicaciones/tercer_tiempo') }}" class="btn-first btn-gral">Aprende más</a>
			</div>
		</div>
	</section>

	<section class="content" id="six-section">
		<img src="{{url('/images/contacto-menu.jpg')}}" class="img-responsive">
		<div class="container">
			<div class="text-description align-left-section">
				<div class="text-description-section text-six-gral">
					<h1>Contacto</h1>
					<p>Mantengamos el contacto.</p>
					<ul>
						<li>Número: (+562) 2667 6631</li>
						<li>Correo: contacto@deportescerronavia.cl</li>
						<li>Dirección: Mapocho Norte 8115, Cerro Navia. Stgo.</li>
					</ul>
					<ul class="ul-rrss" >
						<li><a href="https://www.facebook.com/cerronaviadeporte/" ><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="https://www.instagram.com/deportes_cerronavia/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
						<li><a href="/login"><i class="fa fa-user" aria-hidden="true"></i></a></li>
					</ul>	
				</div>
			</div>
			<div class="content-btn-full">
				<a href="{{ url('/contacto') }}" class="btn-first btn-gral">Contáctanos</a>
			</div>
		</div>
	</section>
	<footer>
        <div class="btn-register-taller">
            <a href="register">Inscríbete ahora <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
        </div>
    </footer>  
</span>


@section('slider-owl')
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>

	$('#carrousel-slider-home').owlCarousel({
        loop:true,
        dots:true,
        margin:100,
        nav:false,
        animateOut: 'fadeOut',
        autoplay: true,
        slideSpeed : 3300,
        paginationSpeed : 3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    var owl = $('#carrousel-disciplinas');
    owl.owlCarousel({
        loop: false,
        autoplay: true,
        items: 1,
        animateOut: 'fadeOut',
        slideSpeed : 3300,
        paginationSpeed : 3000,

    });



    owl.on('drag.owl.carousel', function(event) {
        var currentItem = event.item.index;
        var src = $(event.target).find(".owl-item").eq(currentItem).find("div");

        $(event.target).find(".owl-item").eq(currentItem+1).addClass('featured');
        $(event.target).find(".owl-item").eq(currentItem).addClass('in-move');

        $('.info-taller').removeClass('active-clicked'); 
        $('.text-related-workshop').removeClass('active-clicked');
        $('.content-gallery').removeClass('active-clicked'); 
        $('#workshop-modify-container').removeClass('active-clicked');
        $('.item img').removeClass('active-clicked');
       
    });
    owl.on('dragged.owl.carousel', function(event) {
        var currentItem = event.item.index;
        $(event.target).find(".owl-item").eq(currentItem+1).removeClass('in-move');
        $(event.target).find(".owl-item").eq(currentItem+1).removeClass('featured');
        $('.visibility-content').removeClass('active-clicked');
       
    });

    owl.on('changed.owl.carousel', function(event) {
        var currentItem = event.item.index;
        //remuevo 
        $(event.target).find(".owl-item").eq(currentItem).removeClass('featured');
        $(event.target).find(".owl-item").eq(currentItem).removeClass('in-move');

       
    });


    var clickeado = false;
    $(document).on('click', '.item', function(){
        var id = $(this).attr('data-owl');
        if (!clickeado) {    

            n = $(this).index();
            $('.info-taller').addClass('active-clicked'); 
            $('.text-related-workshop').addClass('active-clicked');
            $('.content-gallery').addClass('active-clicked'); 
            $('#workshop-modify-container').addClass('active-clicked');
            $('.item img').addClass('active-clicked');
            $('#content-workshop-'+id).addClass('active-clicked');
            clickeado = true;

        } else {
            clickeado = false;
            $owl = $(".owl-carousel");
            $owl.trigger("refresh.owl.carousel");
            n = $(this).index();
            $('#content-workshop-'+id).removeClass('active-clicked');
            $('.info-taller').removeClass('active-clicked'); 
            $('.text-related-workshop').removeClass('active-clicked');
            $('.content-gallery').removeClass('active-clicked'); 
            $('#workshop-modify-container').removeClass('active-clicked');
            $('.item img').removeClass('active-clicked');
        }   

            
    });

</script>
@stop

@endsection
