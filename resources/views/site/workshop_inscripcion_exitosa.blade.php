@extends('layouts.site')

@section('content')


	<div class="img-post-detail" style="background: url({{url('/uploads/workshop')}}/{{ $workshop->cover_page }}) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	
	<div class="container info-content-detail">	

		<div class="tab-content workshop-content">			
			<div id="step-3" class="tab-pane fade in active">
			
				<h4 style="color: {{$workshop->color}} ;">DATOS DE INSCRIPCIÓN</h4>
				<i class="exito-i fa fa-check-circle-o" style="color: {{$workshop->color}} ;" aria-hidden="true"></i>
				<span class="exito-span" style="color: {{$workshop->color}} ;" >Registro exitoso!</span>
				<p style="color: {{$workshop->color}} ;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			

			</div>
		</div>

		

			

		
		 	
		
	
	</div>

	@section('inputHasContent')
	<script type="text/javascript">
	// JavaScript for label effects only

		$(".input-effect input").focusout(function(){
			if($(this).val() != ""){
				$(this).addClass("has-content");
			}else{
				$(this).removeClass("has-content");
			}
		})
	
	</script>
	@stop

	@section('inputHasContent')
	<script type="text/javascript" src="js/validarut.js"></script>
	@stop

	


@endsection
