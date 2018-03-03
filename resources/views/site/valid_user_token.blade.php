@extends('layouts.site')

@section('content')

<span class="hidden-xs" >
	<div class="valid-registe-section">
		<div class="container">
			 @include('flash::message')
			<div class="col-md-12 title-posts"><h1>Valida tu usuario</h1></div>
			<div class="col-md-12"><p>Revisa tu correo, se envió un código de activación</p>	</div>
			<div class="col-md-4 col-md-offset-4">
				<form id="validate" class="form-horizontal form-register-disciplinas validate-form" method="POST"  action="/codeVerify" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<div class="input-effect">
								<input id="email" type="email" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus>
								<label for="name">Correo</label>
								<span class="focus-border"></span>
								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<div class="input-effect">
								<input id="code" type="code" class="form-control effect-placeholder" name="code" value="{{ old('code') }}" required autofocus>
								<label for="name">Código de verificación</label>
								<span class="focus-border"></span>
								@if ($errors->has('name'))
									<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-4 col-md-offset-4">
								<button id="inscribirme" type="submit" class="btn btn-primary">
									Validar
								</button>
							</div>
						</div>
								
				</form>
			</div>
		</div>

	</div>
</span>	

<span class="visible-xs">

</span>	

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
@endsection
