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
			<div id="step-2" class="tab-pane fade in active">
				<h4 style="color: {{$workshop->color}} ;">DATOS DE INSCRIPCIÓN</h4>
				<p style="color: {{$workshop->color}} ;">Felicidades estás a un paso de estar inscrito, revisa tu correo e ingresa el código que te enviamos.</p>
			
				<form id="incripcion" class="form-horizontal" method="POST" action="{{ action('HomeController@codeVerify') }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="workshop_id" value="{{$workshop->id}}">

					<div class="col-md-6 form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="code" type="text" class="form-control effect-placeholder" name="code" value="{{ old('birth_date') }}" required autofocus>
							<label for="code" style="color:{{$workshop->color}}">Ingresa tu código aquí</label>
							<span class="focus-border"></span>
							@if ($errors->has('code'))
								<span class="help-block">
									<strong>{{ $errors->first('code') }}</strong>
								</span>
							@endif
						</div>
					</div>
										
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button id="inscribirme" type="submit" class="btn btn-primary" style="background-color:{{$workshop->color}}">
								Enviar
							</button>
						</div>
					</div>
							
				</form>

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
