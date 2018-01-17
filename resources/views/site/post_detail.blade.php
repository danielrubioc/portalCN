@extends('layouts.site')

@section('content')
	
	<div class="img-post-detail" style="background: url({{url('/uploads/news')}}/{{ $post->cover_page }}) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	<div class="content-title-detail">
		<span>{{ date('d-m-Y', strtotime($post->created_at)) }} | {{ $post->category->name  }}</span>
		<h1>{{ $post->title }}</h1>
	</div>
	<div class="container info-content-detail">
		<h4>{{ $post->subtitle }}</h4>
		<p>{!! $post->content !!}</p>

		<hr class="separator-comparte">
		<div class="social-icons">
			<ul>
				<!--<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
				<li><div class="fb-share-button" data-href="https://www.facebook.com/cerronaviadeporte/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fcerronaviadeporte%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
				</li>
				<li><a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
			</ul>
	
		</div>
	</div>	

@endsection
