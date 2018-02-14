@extends('layouts.site')

@section('content')
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
									<!--<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
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
//on load
var scrollTop = $('html body').scrollTop();


if(scrollTop >= ($('.related-bx').offset().top)){
	$("#post-related-0").addClass( "in" );
	$("#post-related-1").addClass( "in" );
	$("#post-related-2").addClass( "in" );

}
if(scrollTop >= 200){
	$( "#box1" ).css('transition', '0.8s all');
	$( "#box1" ).css('top', '100px');
	$("#box1").addClass( "in" );
    $("#btn-1-left").addClass( "in" );
    $("#btn-2-right").addClass( "in" ); 	
}

var countSum =  0 ; 
var countRes =  0 ; 
var lastScrollTop = 0;


$(window).scroll(function(){
	var scrollTop = $('html body').scrollTop();
	var st = $(this).scrollTop();
	if(scrollTop >= 250){

	  	if (st > lastScrollTop){
       	// downscroll code
		    $("#box1").addClass( "in" );
		    
		    $("#btn-1-left").addClass( "in" );
		    $("#btn-2-right").addClass( "in" ); 
		    $("#btn-2-right").addClass( "in" ); 
		    $( "#box1" ).css('position', 'fixed');
		    $( "#box1" ).css('transition', '0s all');
		    $( "#box1" ).css('top', '40%');
		    $( "#box1" ).css('width', '50%');
		   
	   	} 
	   	if (scrollTop >= $('.related-bx').offset().top - 700 && countSum == 0) {
	   		console.log($('#box1').offset().top);
	   		var top = $('#box1').offset().top;
	   		$( "#box1" ).css('position', 'absolute');
	   		$( "#box1" ).css('top', top+'px!important');
			$( "#box1" ).css('width', '100%');
			countSum++;
	   	};

	} else{
		$( "#box1" ).css('position', 'absolute');

		$( "#box1" ).css('width', '100%');
	}

	if(scrollTop >= ($('.related-bx').offset().top - 500)){
		$("#post-related-0").addClass( "in" );
		$("#post-related-1").addClass( "in" );
		$("#post-related-2").addClass( "in" );

	}	
	lastScrollTop = st;

})


</script>

@stop

@endsection
