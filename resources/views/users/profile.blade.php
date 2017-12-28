@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel  panel-default" style="display: inline-block">
                <div class="content-avatar-change col-md-12 ">
                    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%; margin-right:25px; float:left">
                    <div class="content-change-input-avatar">
                        <form enctype="multipart/form-data" action="/profile" method="POST">
                            <input type="file" name="avatar" required>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="pull-right btn btn-sm btn-primary"> cambiar avatar</button>
                        </form>
                    </div>
                </div>
                <div class="content-info-change col-md-12">
                    <h2 style="text-align: center">Actualiza tus datos {{ $user->name }}</h2>
                   

                    <form class="form-horizontal profile-form" method="POST" action="{{ action('UserController@update', ['id' => $user->id] ) }}">
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
                                <div class="form-group">
                                    <label for="password" class="col-md-12 control-label">Reseña</label>
                                    <div class="col-md-12">
                                        <textarea name="referential_info" id="referential_info"  rows="10" cols="80">
                                           {{ $user->referential_info }}
                                        </textarea> 
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
