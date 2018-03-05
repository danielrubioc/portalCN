<style type="text/css">
#main {
    margin-top: 0 !important;
}
</style>
@extends('layouts.app')

@section('content')


<div class="container hidden-xs">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ingresar</div>

                <div class="panel-body">
                    <form class="form-css-label" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br><br>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="img-content-login visible-xs" style="background: url({{url('/images/cn-view-login-fondo.jpg')}}) no-repeat center center; 
                                              -webkit-background-size: cover;
                                              -moz-background-size: cover;
                                              -o-background-size: cover;
                                              background-size: cover;">

    <div class="conten-formulario">
            <form class="form-horizontal form-css-label form-login" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <h2>Ingresa</h2>



                <div class="col-md-6 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-effect">
                        <input id="email" type="email" class="effect-placeholder" name="email" value="{{ old('email') }}" required autofocus />
                        <label for="name">Correo electrónico</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-effect">
                        <input id="password" type="password" class="effect-placeholder" name="password" required />
                        <label for="name">Contraseña</label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="content-login">
                    <button type="submit" class="btn btn-primary loggin-btn">
                            ENTRAR
                    </button>
                </div>

            
                <br>

               <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox color-white-login">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        

                        <a class="btn btn-link color-white-login" href="{{ route('password.request') }}">
                            Olvidaste tu contraseña?
                        </a>
                    </div>
                </div>
            </form>

             <div class="content-login">
                    <a  class="btn btn-primary loggin-btn" href="{{ route('register') }}" class="btn btn-primary loggin-btn">
                            REGISTRATE
                    </a>
                </div>
        </div>

</div>

@section('inputHasContent')
    <script type="text/javascript">
    // JavaScript for labe  l effects only
            $('.input-effect input').blur(function(){
                tmpval = $(this).val();
                if(tmpval == '') {
                    $(this).addClass('not-empty');
                    $(this).removeClass('empty');
                    console.log('ss');
                } else {
                    $(this).addClass('empty');
                    $(this).removeClass('not-empty');
                }
            });
    </script>
@stop
@endsection
