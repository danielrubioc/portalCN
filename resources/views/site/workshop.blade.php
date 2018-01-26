@extends('layouts.site')

@section('content')


	<div class="img-post-detail" style="background: url({{url('/uploads/workshop')}}/{{ $workshop->cover_page }}) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	<div class="content-title-detail" >
		<span></span>
		<h1>{{ $workshop->name }}</h1>
	</div>
	<div class="container info-content-detail">	

		<div class="tab-content workshop-content">			
			<div id="step-1" class="tab-pane fade in active" >

				<h4 >{{ $workshop->subtitle }}</h4>
				<p >{!! $workshop->description !!}</p>

				<hr class="separator-comparte">

			@if( !Auth::user())
            
				<h4>DATOS DE INSCRIPCIÓN</h4>

				<form id="incripcion" class="form-horizontal" method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="workshop_id" value="{{$workshop->id}}">

					<div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="name" type="text" class="form-control effect-placeholder" name="name" value="{{ old('name') }}" required autofocus>
							<label for="name">Nombre</label>
							<span class="focus-border"></span>
							@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="col-md-6 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="last_name" type="text" class="form-control effect-placeholder" name="last_name" value="{{ old('last_name') }}" required autofocus>
							<label for="last_name">Apellido</label>
							<span class="focus-border"></span>
							@if ($errors->has('last_name'))
								<span class="help-block">
									<strong>{{ $errors->first('last_name') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="col-md-6 form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="rut" type="text" class="form-control effect-placeholder" name="rut" value="{{ old('rut') }}" required autofocus>
							<label for="rut">Rut</label>
							<span class="focus-border"></span>
							@if ($errors->has('rut'))
								<span class="help-block">
									<strong>{{ $errors->first('rut') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="col-md-6 form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="birth_date" type="text" class="form-control effect-placeholder" name="birth_date" value="{{ old('birth_date') }}" required autofocus>
							<label for="birth_date">Fecha de nacimiento</label>
							<span class="focus-border"></span>
							@if ($errors->has('birth_date'))
								<span class="help-block">
									<strong>{{ $errors->first('birth_date') }}</strong>
								</span>
							@endif
						</div>
					</div>

					<div class="col-md-6 form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="birth_date" type="text" class="form-control effect-placeholder" name="direccion" value="{{ old('birth_date') }}" required autofocus>
							<label for="birth_date">Dirección</label>
							<span class="focus-border"></span>
							@if ($errors->has('birth_date'))
								<span class="help-block">
									<strong>{{ $errors->first('birth_date') }}</strong>
								</span>
							@endif
						</div>
					</div>
					
					<div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="email" type="text" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus >
							<label for="email">Correo</label>
							<span class="focus-border"></span>
							@if ($errors->has('birth_date'))
								<span class="help-block">
									<strong>{{ $errors->first('birth_date') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-4">
							<button id="inscribirme" type="submit" class="btn btn-primary">
								Inscribirme
							</button>
						</div>
					</div>
							
				</form>
			@else
				<h4>QUIERES INSCRIBIRTE?</h4>
				<a>haz click aqui</a>
        	@endif

				
			</div>			
		</div>

		

			

		
		 	
		
	
	</div>

	@section('inputHasContent')
	<script type="text/javascript">
	// JavaScript for label effects only

	        $('.input-effect input').blur(function(){
	            tmpval = $(this).val();
	            if(tmpval == '') {
	                $(this).addClass('not-empty');
	                $(this).removeClass('empty');
	            } else {
	                $(this).addClass('empty');
	                $(this).removeClass('not-empty');
	            }
	        });
	</script>
	@stop

	@section('inputHasContent')
	<script type="text/javascript" src="js/validarut.js"></script>
	@stop

	


@endsection
