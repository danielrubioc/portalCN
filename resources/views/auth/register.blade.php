@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal form-register-user" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            <div class="col-md-12 effect-reg">
                                <input id="name" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name" class="col-md-12 control-label">Nombre</label>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div class="col-md-12 effect-reg">
                                <input id="last_name" type="text" class="form-control not-empty{{ !empty($errors->first()) ? ' empty' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
                                <label for="last_name" class="col-md-12 control-label">Apellido</label>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                            
                            <div class="col-md-12 effect-reg">
                                <input id="rut" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="rut" value="{{ old('rut') }}" required pattern="[0-9]{7,8}-[0-9Kk]{1}" value="" name="rut" id="rut" title="ej. 12345678-5" autofocus>
                                <label for="rut" class="col-md-12 control-label">Rut</label>

                                @if ($errors->has('rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        
                            <div class="col-md-12 effect-reg">
                                <input id="email" type="email" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="col-md-12 control-label">E-Mail</label>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12 effect-reg">
                                <input id="password" type="password" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="password" required>
                                <label for="password" class="col-md-12 control-label">Contraseña</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            

                            <div class="col-md-12 effect-reg">
                                <input id="password-confirm" type="password" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="password_confirmation" required>
                                <label for="password-confirm" class="col-md-12 control-label">Confirmar Contraseña</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-register-user">
                                    Registrar 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('inputHasContent')
<script type="text/javascript">
// JavaScript for label effects only
        $('.effect-reg input').blur(function(){
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
