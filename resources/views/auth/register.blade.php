@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal form-register-user" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="inline-flex">
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
                        </div>
                        <div class="inline-flex">
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
                        </div>   
                        <div class="inline-flex"> 
                            <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                <div class="col-md-12 effect-reg">
                                    <input id="birth_date" type="date" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>
                                    <label for="email" class="col-md-12 control-label" style="top: -16px; font-size: 12px;">Fecha de nacimiento</label>

                                    @if ($errors->has('birth_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birth_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                <div class="col-md-12 effect-reg">
                                    <input id="age" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="age" value="{{ old('age') }}" required readonly>
                                    <label for="age" class="col-md-12 control-label"  style="top: -16px; font-size: 12px;">Edad</label>

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>  
                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-12">    
                                <input class="hidden" type="checkbox" value="0" id="health" name="health" checked />
                                <div class="checkbox col-md-12">
                                  <label><input type="checkbox" value="1" id="health" name="health" >Tengo problema(s) de salud</label>
                                </div>
                            <br/><br/>
                            <div class="shownDiv" style="display:none;">
                                <div class="form-group{{ $errors->has('health_problem') ? ' has-error' : '' }}">
                                    <div class="col-md-12 effect-reg">
                                       
                                        <textarea id="health_problem" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="health_problem" value="{{ old('health_problem') }}"></textarea>
                                        <label for="health_problem" class="col-md-12 control-label" style="color:#aaa">Especifique</label>

                                        @if ($errors->has('health_problem'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('health_problem') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div> 
                        
                        <span class="titular-info" style="display:none;">
                                <div class="inline-flex"> 
                                    <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="birth_date" type="date" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>
                                            <label for="email" class="col-md-12 control-label" style="top: -16px; font-size: 12px;">Fecha de nacimiento</label>
                                            @if ($errors->has('birth_date'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="age" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="age" value="{{ old('age') }}" required readonly>
                                            <label for="age" class="col-md-12 control-label"  style="top: -16px; font-size: 12px;">Edad</label>
                                            @if ($errors->has('age'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>  

                        </span>

                        <div class="inline-flex"> 
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

        ////edad
        var age;

        $('#birth_date').on('change', function () {
          if ($('#birth_date').val()) {
                var dateString = $('#birth_date').val();
                var today = new Date();
                var birthDate = new Date(dateString);
                age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }

                $("#age").val(age);

          } else {
            $("#age").text('');   
          }      
        });

        $('#birth_date').blur(function () {
            if (age && age > 0) {
                $("#age").val(age);  
                if (age >= 18) {   
                    console.log('eres adulto');
                }
                if (age < 18) {   
                    console.log('eres menor');
                    $('.titular-info').toggle();
                }
            } else {
                
                    console.log('eres extraño');
                
            }
            
        });


        $(document).ready(function() {
            $('.checkbox').on('change', function() {
                $('.shownDiv').toggle();
            });
        });
</script>
@stop
@endsection
