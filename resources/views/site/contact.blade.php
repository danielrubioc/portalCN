@extends('layouts.site')

@section('content')
<div class="contact-info">
    <div class="content-message">
        @include('flash::message')
    </div>


<span class="hidden-xs" >
    <div class="content-about-de">

    <div class="container info-content-detail">
        <div class="col-md-12 title-posts content-title-detail">
                
             <h1> CONTACTO</h1>
        </div>
        <div class="col-md-6">
            <h3>¿ Tienes dudas ? deja tu mensaje</h3>
            <form method="POST" class="form-css-label form-desktop" action="{{ url('/contacto/enviar' ) }}">
                {{ csrf_field() }}

                <div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
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

                <div class="col-md-12  form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-effect">
                        <input id="email" type="email" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email">email</label>
                        <span class="focus-border"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12  form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-effect">
                        <textarea name="msg" id="msg" rows="10"></textarea> 
                        <span class="focus-border"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>


                <br>

                {!! Form::submit('Enviar', ['class' => 'btn btn-info pull-right contact-btn-submit color-black-desk']) !!}
            </form>


        </div>
        <div class="col-md-6">
            <h3>Ven a visitarnos</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.0469611632616!2d-70.75543984965658!3d-33.42202000334467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c3d77f3cbad3%3A0x79dad72ec9744a99!2sMapocho+Nte+8115%2C+Cerro+Navia%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1518367848373" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            <p>Mapocho Norte 8115, Cerro Navia, Santiago</p>
        </div>    
        
    </div>
    
</div>
</span> 
<span class="visible-xs" >
<div class="conent-form-contact" style="background: url({{url('/images/contacto-fondo.jpg')}}) no-repeat center center; 
                                              -webkit-background-size: cover;
                                              -moz-background-size: cover;
                                              -o-background-size: cover;
                                              background-size: cover;">

        <div class="conten-formulario">
            <form method="POST" class="form-css-label" action="{{ url('/contacto/enviar' ) }}">
                {{ csrf_field() }}

                <h2>Contáctenos</h2>

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
                        <input id="email" type="email" class="form-control effect-placeholder" name="email" value="{{ old('email') }}" required autofocus>
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
                        <textarea name="msg" id="msg" rows="10" placeholder="Mensaje"></textarea> 
                        <span class="focus-border"></span>
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
</div>
</span> 


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

@endsection