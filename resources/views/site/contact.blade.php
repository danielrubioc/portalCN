


@extends('layouts.site')

@section('content')
<div class="conent-form-contact">
<form method="POST" class="form-css-label" action="{{ url('/contacto/enviar' ) }}">
    {{ csrf_field() }}

    <h2>Formulario de contacto</h2>

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

    <div class="col-md-6  form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="input-effect">
            <input id="email" type="text" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus>
            <label for="email">email</label>
            <span class="focus-border"></span>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-md-6  form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="input-effect">
           	{!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <br>

	{!! Form::submit('Enviar', ['class' => 'btn btn-info pull-right contact-btn-submit']) !!}
</form>
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
var check=document.getElementById("check").value == "text_value";
</script>
@stop

@endsection