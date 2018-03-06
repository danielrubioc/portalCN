@extends('layouts.site')

@section('content')
	<div class="content-categories hidden-xs">

	        <div class="container">
	        	<div class="col-md-12 title-posts">
	        		@if ($category == 'eventos')
                        <h1>Eventos</h1>
                        @elseif ($category == 'tercer-tiempo')
                        <h1><span>Tercer</span> Tiempo</h1>	
                    @endif
	        	</div>
			    @if ($posts)
					
					@foreach ($posts as $post)
					<div class="col-md-6 content-gl-post">
						<div class="row-content">
						<div class="over-hidde" style=" height: 200px;">
				    		<div class="item-post" style="background: url({{url('/uploads/news')}}/{{ $post->cover_page }}) no-repeat center center; 
														  -webkit-background-size: cover;
														  -moz-background-size: cover;
														  -o-background-size: cover;
														  background-size: cover;    
														      height: 200px;
	    												">

				    		</div>	
				    	</div>	
			    			<div class="info-post-tercer-tiempo">
			    				<h2>{{ $post->title }}</h2>
			    				<p>{!! str_limit($post->content, $limit = 200, $end = '...') !!}</p>
			    				<hr>
			    			</div>
			    			<div class="info-post-tercer-tiempo-right">
			    				<a href="{{ URL::to('/') }}/{{ $post->category->url }}/detalle/{{ $post->url }}">ver más</a>
			    			</div>	
		    			</div>
			    	</div>	
					@endforeach
					<div class="col-md-12 pagina-bx">
						<div class="pagination-blog">
							{{ $posts->links() }}
						</div>
					</div>
				@endif
			</div>
	</div>


	<div class="content-categories visible-xs">
			<div class="flotant-button">
	            <button class="search-button clickable"><i class="fa fa-search" aria-hidden="true"></i> </button>
	        </div>
	        <div class="search-open">

	                <button class="search-button clickable-out"><i class="fa fa-times" aria-hidden="true"></i> </button>
	               
	                <br>

	                <div class="content-info-search">
	                 <p >Busca por nombre de publicacion</p>
	                <form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('HomeController@indexPosts') }}">
	                    <input class="form-control mr-sm-2" type="search" name="title" placeholder="Busca por titulo" aria-label="Search">
	                    <br>
	                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	                </form>
	                </div>
	            
	        </div>
		    @if ($posts)
				<p>Un total de {{ $posts->total() }} Publicaciones</p>
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
				<div class="pagination-blog">
					{{ $posts->links() }}
				</div>

				<!--
				<div class="content" style="margin-top: 50px;">
					@if ($categories)
						@foreach ($categories as $category)
							
				    			{{ $category->id }}
				    			{{ $category->name }}

				    			<a href="{{url('/publicaciones/categoria/')}}/{{ $category->id }}/{{ $category->name }}">{{ $category->name }}</a>
				    			
						@endforeach
					@endif
				</div>

				<div class="content">
					@if ($tags)
						@foreach ($tags as $tags)
			    			
						    {{ $tags->name }}
						@endforeach
					@endif
				</div>
				-->
				
			@endif

	</div>



@section('slider-owl')
<script type="text/javascript">
$(".clickable").click(function() {  //use a class, since your ID gets mangled
    $(".search-open").addClass("active");      //add the class to the clicked element
});
$(".clickable-out").click(function() {  //use a class, since your ID gets mangled
    $(".search-open").removeClass("active");      //add the class to the clicked element
});

</script>
@stop
@endsection
