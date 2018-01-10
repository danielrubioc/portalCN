@extends('layouts.site')

@section('content')
	<div class="content-categories visible-xs">
			<div class="info-sub-menu" style="display:none">
				<form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('HomeController@indexPosts') }}">
			        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Busca por titulo" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			    </form>
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
		    				<a href="{{url('/tercer-tiempo/')}}/{{ $post->url }}">leer + </a>
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
@endsection
