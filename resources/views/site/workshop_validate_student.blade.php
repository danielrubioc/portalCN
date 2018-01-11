@extends('layouts.site')

@section('content')

	<section class="content content-form-workshop" id="first-section" style="background-image: url('/uploads/workshop/{{$workshops->cover_page}}') ">
		<div class="container" >
			<div class="form-workshop">
				<h1>DATOS DE INSCRIPCIÓN</h1>
				<form class="form-horizontal" method="POST" action="{{ route('registro.store' ) }}" enctype="multipart/form-data">
					{{ csrf_field() }}

					<input type="hidden" name="user_id" value="{{$user->id}}">					

					<div class="col-md-6 form-group{{ $errors->has('code') ? ' has-error' : '' }}">
						<div class="input-effect">
							<input id="code" type="text" class="form-control effect-placeholder" name="code" value="{{ old('code') }}" required autofocus>
							<label for="code">Codigo</label>
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
							<button type="submit" class="btn btn-primary">
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
