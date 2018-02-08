@extends('layouts.site')

@section('content')
	<span class="hidden-xs">
		<div class="content-detail-post">
			<div class="img-header-post">
				<img src="{{url('/uploads/news')}}/{{ $post->cover_page }}" class="img-responsive">
			</div>
			<div class="bx-info">
				<div class="col-md-6 content-title-detail hideme" id="box1">
					<span>{{ date('d-m-Y', strtotime($post->created_at)) }} | {{ $post->category->name  }}</span>
					<h1>{{ $post->title }}</h1>
				<div class="social-icons-detail">
						<ul>
							<!--<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
							<li><div class="fb-share-button" data-href="https://www.facebook.com/cerronaviadeporte/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fcerronaviadeporte%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
							</li>
							<li><a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
						</ul>
				
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
					@foreach ($postRelated as $post2)
						<a href="{{ URL::to('/') }}/{{ $post2->category->url }}/detalle/{{ $post2->url }}">
							<div class="col-md-4 content-related-col">
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
				<li><div class="fb-share-button" data-href="https://www.facebook.com/cerronaviadeporte/" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fcerronaviadeporte%2F&amp;src=sdkpreparse"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
				</li>
				<li><a href="whatsapp://send?text={{ url()->current() }}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
			</ul>
	
		</div>
	</div>	

	</span>
@section('slider-owl')

<script type="text/javascript">



$(window).scroll(function(){
	var scrollTop = $('html body').scrollTop();
  if(scrollTop >= 100){
    $('#box1').html( scrollTop + '   /***/ ' + $('#box1').offset().top );
  	$('#box1').css('background', 'red');
  }else{
    $('#box1').html(scrollTop +'***'+ $('#box1').offset().top );
  	$('#box1').css('background', '#ccc' );
  }
})
</script>
@stop

@endsection
