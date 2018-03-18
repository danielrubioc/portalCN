@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('UserController@update', ['id' => $user->id] ) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Teléfono fijo</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Teléfono celular</label>

                            <div class="col-md-6">
                                <input id="cell_phone" type="text" class="form-control" name="cell_phone" value="{{ $user->cell_phone }}">

                                @if ($errors->has('cell_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cell_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                         <!--roles-->
                        @if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'publisher' )   
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-4 control-label">Rol</label>
                            <div class="col-md-6">
                                <select class="form-control" name="role_id">
                                   @foreach($roles as $role)
                                        @if ($user->role_id  == $role->id)
                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                            @else
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                      
                                    @endforeach
                                </select>
                                @if ($errors->has('role_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @elseif (Auth::user()->hasRole->name == 'attention')
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label for="role_id" class="col-md-4 control-label">Rol</label>    
                            <div class="col-md-6">
                                <input name="role_id" type="role_id" class="form-control" name="role_id" value="{{$user->hasRole->name}}" required readonly style="cursor: not-allowed;">        
                            </div>
                         </div>

                        @endif
                        <!--roles-->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Tienes problemas de salud?</label>
                            <div class="radio col-md-6">
                                @if ($user->health  == 0)
                                    <label class="checkbox-inline"><input type="radio" name="health" class="closeheal" id="health" value="0" checked>No</label>
                                    @else
                                    <label class="checkbox-inline"><input type="radio" name="health" class="closeheal" id="health" value="0">No</label>
                                @endif
                                @if ($user->health  == 1)
                                    <label class="checkbox-inline"><input type="radio" class="openheal" name="health" id="health" value="1" checked>Si</label>
                                    @else
                                    <label class="checkbox-inline"><input type="radio" class="openheal" name="health" id="health" value="1">Si</label>
                                @endif
                                
                            </div>
                            <div class="shownDiv">
                                <div class="col-md-4"></div>
                                <br>
                                <div class="col-md-6 effect-reg">
                                    <textarea id="health_problem" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="health_problem"> {{ $user->health_problem }}</textarea>
                                    <label for="health_problem" class="col-md-12 control-label" style="color:#aaa">Especifique</label>

                                    @if ($errors->has('health_problem'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('health_problem') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label for="birth_date" class="col-md-4 control-label">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="birth_date" value="{{ $user->birth_date }}" required>

                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="age" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="age" value="{{  $user->age  }}" required readonly>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                    @if($user->age >= 18)
                        <span class="titular-info" style="display:none;">
                        @else
                        <span class="titular-info" style="display:block;">
                    @endif

                        <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                            <label for="school" class="col-md-4 control-label">Nombre del colegio al que asiste?</label>

                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="school" value="{{  $user->school  }}" required>

                                @if ($errors->has('school'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('school') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('headline_full_name') ? ' has-error' : '' }}">
                            <label for="headline_full_name" class="col-md-4 control-label">Nombre completo (apoderado)</label>

                            <div class="col-md-6">
                                <input id="headline_full_name" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_full_name" value="{{  $user->headline_full_name  }}" required>

                                @if ($errors->has('headline_full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('headline_full_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('headline_phone') ? ' has-error' : '' }}">
                            <label for="headline_phone" class="col-md-4 control-label">Teléfono de contacto (apoderado)</label>

                            <div class="col-md-6">
                                <input id="headline_phone" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_phone" value="{{  $user->headline_phone  }}" required>

                                @if ($errors->has('headline_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('headline_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('headline_rut') ? ' has-error' : '' }}">
                            <label for="headline_rut" class="col-md-4 control-label">Rut (apoderado)</label>

                            <div class="col-md-6">
                                <input id="headline_rut" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_rut" value="{{  $user->headline_rut  }}" required>

                                @if ($errors->has('headline_rut'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('headline_rut') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('headline_email') ? ' has-error' : '' }}">
                            <label for="headline_email" class="col-md-4 control-label">E-Mail (apoderado)</label>

                            <div class="col-md-6">
                                <input id="headline_email" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_email" value="{{  $user->headline_email  }}" required>

                                @if ($errors->has('headline_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('headline_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </span>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="cover_page" class="col-md-4 control-label">Estado</label>
                            <div class="col-md-6">
                            <select class="form-control" id="status" name="status">
                                @foreach($statuses as $status)
                                    @if ($user->status  == $status['id'])
                                        <option value="{{$status['id']}}" selected>{{ $status['name'] }}</option>

                                        @else
                                        <option value="{{$status['id']}}">{{$status['name']}}</option>
                                    @endif
                                        
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                                <a href="{{ URL::to('users') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('select2')
<script type="text/javascript">
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
                
                //console.log('eres extraño');
                
            }

            $(document).ready(function() {
                $('.closeheal').on('click', function(e) {
                    $('.shownDiv').css("display", "none");
                });
                $('.openheal').on('click', function(e) {
                    $('.shownDiv').css("display", "block");
                });
            });

            
        });

</script>
@stop
@endsection
