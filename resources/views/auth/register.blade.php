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
                                    <label for="email" class="col-md-12 control-label" style="top: -16px">Fecha de nacimiento</label>

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
                                    <label for="age" class="col-md-12 control-label"  style="top: -16px">Edad</label>

                                    @if ($errors->has('age'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>  
                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-12">    
                                <label for="email" class="control-label" style="top: -16px;    color: #aaa;">Tienes problemas de salud?</label>


                                <div class="radio col-md-12">
                                  <label class="checkbox-inline"><input type="radio" name="health" class="closeheal" id="health" value="0" checked>No</label>
                                  <label class="checkbox-inline"><input type="radio" class="openheal" name="health" id="health" value="1">Si</label>
                                </div>
                            <div class="shownDiv" style="display:none;">
                                <div class="form-group{{ $errors->has('health_problem') ? ' has-error' : '' }}">
                                    <div class="col-md-12 effect-reg">
                                        
                                        <label for="health_problem" class="col-md-12 control-label" style="color:#aaa">Especifique</label>
                                        <textarea id="health_problem" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }} no-bor" name="health_problem" value="{{ old('health_problem') }}"></textarea>
                                        
                                        @if ($errors->has('health_problem'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('health_problem') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div> 


                        @if(!old('age'))
                            <span class="titular-info" style="display:none;">
                        @else
                            @if(old('age') >= 18)
                                <span class="titular-info" style="display:none;">
                                @else
                                <span class="titular-info" style="display:block;">
                            @endif
                        @endif
                                <div class="inline-flex"> 
                                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="school" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="school" value="{{ old('school') }}">
                                            <label for="email" class="col-md-12 control-label" style="top: -16px;">Nombre del colegio al que asiste?</label>
                                            @if ($errors->has('school'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('school') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div> 
                                <div class="inline-flex"> 
                                    <div class="form-group{{ $errors->has('headline_full_name') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="headline_full_name" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_full_name" value="{{ old('headline_full_name') }}">
                                            <label for="email" class="col-md-12 control-label" style="top: -16px;">Nombre completo (apoderado)</label>
                                            @if ($errors->has('headline_full_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('headline_full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('headline_phone') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="headline_phone" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_phone" value="{{ old('headline_phone') }}">
                                            <label for="headline_phone" class="col-md-12 control-label"  style="top: -16px; ">Teléfono de contacto (apoderado)</label>
                                            @if ($errors->has('headline_phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('headline_phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>  
                                <div class="inline-flex"> 
                                    <div class="form-group{{ $errors->has('headline_email') ? ' has-error' : '' }}">
                                        <div class="col-md-12 effect-reg">
                                            <input id="headline_email" type="email" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_email" value="{{ old('headline_email') }}">
                                            <label for="email" class="col-md-12 control-label" style="top: -16px;">E-Mail (apoderado)</label>
                                            @if ($errors->has('headline_email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('headline_email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('headline_rut') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-12 effect-reg">
                                            <input id="headline_rut" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_rut" value="{{ old('headline_rut') }}"  pattern="[0-9]{7,8}-[0-9Kk]{1}" value="" name="headline_rut" id="headline_rut" title="ej. 12345678-5" autofocus>
                                            <label for="headline_rut" class="col-md-12 control-label">Rut (apoderado)</label>

                                            @if ($errors->has('headline_rut'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('headline_rut') }}</strong>
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
                            <div class=" col-md-2 " style="text-align:left;">  
                                {!! app('captcha')->display($attributes = [], $options = ['lang'=> 'es']) !!}
                            
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong style="color: #a94442">Debes completar el captcha</strong>
                                    </span>
                                @endif
                            </div>
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
          }
        });

        $('#birth_date').blur(function () {
            if (age && age > 0) {
                $("#age").val(age);  
                if (age >= 18) {   
                
                    $(".titular-info").css("display", "none");
                    $("#school").removeAttr('required');
                    $("#school").val(null); 
                    $("#headline_full_name").removeAttr('required');
                    $("#headline_full_name").val(null); 
                    $("#headline_phone").removeAttr('required');
                    $("#headline_phone").val(null); 
                    $("#headline_email").removeAttr('required');
                    $("#headline_email").val(null); 
                    $("#headline_rut").removeAttr('required');
                    $("#headline_rut").val(null);     
                }
                if (age < 18) {   
                    
                    $(".titular-info").css("display", "block");
                    $("#school").attr("required", true);
                    $("#school").val(null); 
                    $("#headline_full_name").attr("required", true);
                    $("#headline_full_name").val(null); 
                    $("#headline_phone").attr("required", true);
                    $("#headline_phone").val(null); 
                    $("#headline_email").attr("required", true);
                    $("#headline_email").val(null); 
                    $("#headline_rut").attr("required", true);
                    $("#headline_rut").val(null);   

                }
            } else {
                
                console.log('eres extraño');
                
            }
            
        });


        $(document).ready(function() {
            $('.closeheal').on('click', function(e) {
                $('.shownDiv').css("display", "none");
            });
            $('.openheal').on('click', function(e) {
                $('.shownDiv').css("display", "block");
            });
        });
</script>
@stop
@endsection
