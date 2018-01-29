@extends('layouts.site')
@section('title', 'Page Title')
@section('content')

<span class="hidden-xs">
<span style="    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(50%, 50%);
    text-transform: uppercase;
    font-size: 20px;
    color: black;text-transform: uppercase;
    font-family: 'Merriweather Sans', sans-serif;
    font-weight: bold;"><p>en construcción</p></span>
<img src="{{url('/images/en-construccion.gif')}}" class=" img-responsive" style="height: 100vh;
    margin-top: -0px;    width: 100%;">


<!--

<section class="content slider"> 

<div class="info-taller">
    <div id="workshop-modify-container">
        <div  id="carrousel-slider" class="owl-carousel owl-theme content-gallery">
                <div class="item">
                    <img src="{{url('/images')}}/slider-2-min-min.png" class="img-responsive">
                    
                </div>  
                <div class="item">
                    <img src="{{url('/images')}}/slider-2-min-min.png" class="img-responsive">
                    
                </div>   
        </div>     
    </div>

</div>

</section>


<section class="content" id="first-section">

		<div class="conten-news-gral">
				


				
				@foreach ($workshops as $key => $taller)
					@if ($key ==0 )
						<div class="content-news first-destac">
	                   		<a href="{{ url('/disciplina') }}/{{$taller->url}}">
	                   		<div class="content-img">
	                   			<img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive img-disciplina-home">
	                   		</div>
	                        <div class="description">
				                <h2 class="animable-element" style="opacity: 1;">{{$taller->name}}</h2>
				                <p class="animable-element" style="opacity: 1;">{{ str_limit($taller->description, 800) }} </p>
				            </div>
	                         
	                        </a>
	                   	</div>  
					@else	
                   	<div class="content-news">
                   		<a href="{{ url('/disciplina') }}/{{$taller->url}}">
                   		<div class="content-img">
                   			<img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive img-disciplina-home">
                   			<img class="effect "src="https://www.fcinq.com/v3/wp-content/themes/fcinq/img/slideshow_gradient.png" alt="" class="gradient">
                   		</div>
                        <div class="description">
			                <h2 class="animable-element" style="opacity: 1;">{{$taller->name}}</h2>
			                <p class="animable-element" style="opacity: 1;">{{ str_limit($taller->description, 100) }} </p>
			            </div>
                         
                        </a>
                   	</div>  
                   	@endif
                @endforeach
		</div>

</section>

<section class="content" id="news-section">
@foreach ($posts as $post)

	<div class="item-post" style="background: url({{url('/uploads/news')}}/{{ $post->cover_page }}) no-repeat center center; 
								  -webkit-background-size: cover;
								  -moz-background-size: cover;
								  -o-background-size: cover;
								  background-size: cover;">
		
		<div class="info-post-tercer-tiempo">
			<h2>{{ $post->title }}</h2>
		</div>
		<div class="info-post-tercer-tiempo-right">
			<a href="{{ URL::to('/') }}/{{ $post->category->url }}/detalle/{{ $post->url }}">leer + </a>
		</div>
	</div>		


@endforeach

</section>

-->

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
	
var owl = $('#carrousel-slider');
    owl.owlCarousel({
        loop: false,
        autoplay: true,
        items: 1,
        animateOut: 'fadeOut',
        slideSpeed : 3300,
        paginationSpeed : 3000,
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
