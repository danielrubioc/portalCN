@extends('layouts.site')

@section('content')


	<section class="content content-workshop" id="first-section" style="background-image: url('/uploads/workshop/{{$workshop->cover_page}}') ">
		<div class="container" >
			<div class="form-workshop" style="color:{{$workshop->color}}">
				<h1 class="titulo" style="color:{{$workshop->color}}">{{$workshop->name}}</h1>
				<span>{{$workshop->description}}</span>
				<h2 class="titulo" style="color:{{$workshop->color}}">DATOS DE INSCRIPCIÓN</h2>
				<form class="form-horizontal" method="POST" action="{{ route('registro.store' ) }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="workshop_id" value="{{$workshop->id}}">

					<div class="col-md-6 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="name" type="text" class="form-control effect-placeholder" name="name" value="{{ old('name') }}" required autofocus>
							<label for="name" style="color:{{$workshop->color}}">Nombre</label>
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
							<label for="last_name" style="color:{{$workshop->color}}">Apellido</label>
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
							<label for="rut" style="color:{{$workshop->color}}">Rut</label>
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
							<label for="birth_date" style="color:{{$workshop->color}}">Fecha de nacimiento</label>
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
							<label for="birth_date" style="color:{{$workshop->color}}">Dirección</label>
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
							<input id="email" type="text" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus placeholder="Correo">
							<label for="email" style="color:{{$workshop->color}}">Correo</label>
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
							<button type="submit" class="btn btn-primary" style="background-color:{{$workshop->color}}">
								Inscribirme
							</button>
						</div>
					</div>
				</form> 

			</div>
		</div>
	</section>

	<section class="content" id="second-section">
		
	</section>



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
	var check=document.getElementById("check").value == "text_value";
	</script>
	@stop

	@section('inputHasContent')
	<script type="text/javascript" src="js/validarut.js"></script>
	@stop

	


@endsection
