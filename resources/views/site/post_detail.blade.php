@extends('layouts.site')
@section('title',  $post->title )
@section('og:image'){{url('/uploads/news')}}/{{ $post->cover_page }} @stop
@section('content')
	<span class="hidden-xs">
		<div class="container">
			<div class="text-info-full">
				<div class="col-md-8 global-content">
					<div class="title-new">
						<h1>{{ $post->title }}</h1>
						<span>{{ $post->category->name  }}</span>
					</div>
					<div class="img-header-news">
						<span>Fecha de publicación {{ date('d-m-Y', strtotime($post->created_at)) }}</span>
						<img src="{{url('/uploads/news')}}/{{ $post->cover_page }}" class="img-responsive">	
					</div>
					<div class="info-detail-news">
						<ul class="popup-share-rrss text-center">
					  		<li class="hidden-xs hidden-sm fbc-comment"><a href="mailto:contacto@deportescerronavia.cl" class="default dash"><span class="fa fa-envelope"></span></a></li>
					  		<li class="hidden-xs hidden-sm fbc-twitter">
						  		<a 	class = "twitter-share-button"
						  			rel = "canonical"
								  	href = "https://twitter.com/intent/tweet?text={{ $post->title }}&url={{URL::current()}}" 
								  	target="_blank"
								  	onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
								<span class="fa fa-twitter"></span> </a>
							</li>
					  		<li class="hidden-xs hidden-sm fbc-face"><div class="fb-share-button" data-href="https://www.facebook.com/cerronaviadeporte/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><span class="fa fa-facebook"></span> </a></a></div></li>

					   	</ul>
						<h4 class="subtitle">{{ $post->subtitle }}</h4>
						<p>{!! $post->content !!}</p>
					</div>	


				</div>
				<div class="col-md-4 last-news">
					<div class="info-content-related-news">
						<h2>Te recomendamos</h2>
					</div>
					@foreach ($postRelated as $key => $post2)
						<a href="{{ URL::to('/') }}/{{ $post2->category->url }}/detalle/{{ $post2->url }}">
							<div  id="post-related-new-{{ $key }}" class="col-md-12 content-related-col">
								<div class="hidden-item">
									<div class="item-post" style="background: url({{url('/uploads/news')}}/{{ $post2->cover_page }}) no-repeat center center; 
																  -webkit-background-size: cover;
																  -moz-background-size: cover;
																  -o-background-size: cover;
																  background-size: cover;    
																      height: 200px;
			    												">

						    		</div>
						    	</div>
						    		<div class="div-desc">			

										{{$post2['title']}}
										<span>{{ date('d-m-Y', strtotime($post2->created_at)) }}</span>
									</div>
								</div>
							
						</a>
					@endforeach	

				</div>

				
				
			</div>
		</div>
	</span>


<!--
	<span class="hidden-xs">
		<div class="content-detail-post">
			<div class="img-header-post">
				<img src="{{url('/uploads/news')}}/{{ $post->cover_page }}" class="img-responsive">
			</div>
			<div class="bx-info">
				<div class="col-md-6 content-title-detail hideme">
						<div id="box1">
							<span>{{ date('d-m-Y', strtotime($post->created_at)) }} | {{ $post->category->name  }}</span>
							<h1>{{ $post->title }}</h1>
							<div class="social-icons-detail">
								<ul>
								
									<li id="btn-1-left"><div class="fb-share-button" data-href="https://www.facebook.com/cerronaviadeporte/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fcerronaviadeporte%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
									</li>
									<li id="btn-2-right"><a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
								</ul>
						
							</div>
						</div>
				</div>
				<div class="col-md-6 content-p-detail">
					<h4>{{ $post->subtitle }}</h4>
					<p>{!! $post->content !!}</p>
				</div>
			</div>
			
			<div class="info-content-related">
				<div class="cont-hr">
					<h2>Te recomendamos</h2>
					<hr class="separator-comparte">
				</div>	
			</div>
			<div class="col-md-12 related-bx">
				<div class="row">
					@foreach ($postRelated as $key => $post2)
						<a href="{{ URL::to('/') }}/{{ $post2->category->url }}/detalle/{{ $post2->url }}">
							<div  id="post-related-{{ $key }}" class="col-md-4 content-related-col">
								<div class="item-post" style="background: url({{url('/uploads/news')}}/{{ $post2->cover_page }}) no-repeat center center; 
															  -webkit-background-size: cover;
															  -moz-background-size: cover;
															  -o-background-size: cover;
															  background-size: cover;    
															      height: 200px;
		    												">

					    		</div>
					    		<div class="div-desc">			

									{{$post2['title']}}
								</div>
							</div>
						</a>
					@endforeach
				</div>
			</div>
	
		</div>		
	</span>
-->

	<span class="visible-xs">
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
				<li><a class="fb-xfbml-parse-ignore" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
				</li>
				<li><a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
			</ul>
	
		</div>
	</div>	

	</span>
@section('slider-owl')



@stop

@endsection
