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

                        <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
                            <label for="birth_date" class="col-md-4 control-label">Fecha de nacimiento</label>
                            <div class="col-md-6">
                                <input id="birth_date" type="date" class="form-control" name="birth_date" value="{{ date('Y-m-d', strtotime($user->birth_date)) }}" required autofocus>

                                @if ($errors->has('birth_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth_date') }}</strong>
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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Rol</label>
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
                            </div>
                        </div>

                     
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
@endsection
