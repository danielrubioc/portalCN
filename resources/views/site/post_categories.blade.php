@extends('layouts.site')

@section('content')
	<div class="container">

		<div class="content-categories">
			<form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('HomeController@indexPosts') }}">
		        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Busca por titulo" aria-label="Search">
		     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
		    </form>
		    @if ($posts)
				<p>Un total de {{ $posts->total() }} Publicaciones</p>
				@foreach ($posts as $post)
					@if ($post->status === 1)
		    			{{ $post->id }}
		    			<img src="{{url('/uploads/news')}}/{{ $post->cover_page }}" style="width:100%; max-height:150px ">
		    			{{ $post->title }}
		    			{{ $post->url }}
		    			{{ $post->category->name }}
		    			{{ $post->user->name   }}

		    			{{ date('d-m-Y', strtotime($post->created_at)) }}

					@endif
				@endforeach


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


			@endif

		</div>
	</div>
@endsection
