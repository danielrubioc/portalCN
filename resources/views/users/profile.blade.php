@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel  panel-default" style="display: inline-block">
                <div class="content-avatar-change col-md-12 ">
                    <img src="{{url('/uploads/avatars/')}}/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px; float:left">
                    <div class="content-change-input-avatar">
                        <form enctype="multipart/form-data" action="{{ route('users.profileAvatarUpdate' ) }}" method="POST">
                            
                            <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-12 control-label">Nombre</label>

                                <div class="col-md-12">

                                    <input type="file" name="avatar" required>

                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="pull-right btn btn-sm btn-primary"> cambiar avatar</button>
                        </form>
                    </div>
                </div>
                <div class="content-info-change col-md-12">
                    <h2 style="text-align: center">Actualiza tus datos {{ $user->name }}</h2>
                   

                    <form class="form-horizontal profile-form" method="POST" action="{{ route('users.profileUpdate' ) }}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input id="profile" type="hidden" class="form-control" name="profile" value="true">
                                <input id="role_id" type="hidden" class="form-control" name="role_id" value="{{$user->role_id}}">

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-12 control-label">Nombre</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="last_name" class="col-md-12 control-label">Apellido</label>

                                    <div class="col-md-12">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('last_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
                                    <label for="rut" class="col-md-4 control-label">Rut</label>

                                    <div class="col-md-6">
                                        <input id="rut" type="text" class="form-control" name="rut" value="{{ $user->rut }}" required pattern="[0-9]{7,8}-[0-9Kk]{1}" name="rut" id="rut" placeholder="12345678-5" title="ej. 12345678-5" autofocus>

                                        @if ($errors->has('rut'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rut') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                                    <label for="birth_date" class="col-md-12 control-label">Fecha de nacimiento</label>

                                    <div class="col-md-12">
                                        <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ $user->birth_date }}" required autofocus>

                                        @if ($errors->has('birth_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('birth_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-12 control-label">E-Mail</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-12 control-label">Dirección</label>

                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}" autofocus>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-12 control-label">Teléfono fijo</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="cell_phone" class="col-md-12 control-label">Teléfono celular</label>

                                    <div class="col-md-12">
                                        <input id="cell_phone" type="text" class="form-control" name="cell_phone" value="{{ $user->cell_phone }}" autofocus>

                                        @if ($errors->has('cell_phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cell_phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

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
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('ckeditor')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
<script>
    $('#referential_info').ckeditor();
</script>
@stop

@endsection
