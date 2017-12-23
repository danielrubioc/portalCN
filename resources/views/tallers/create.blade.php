@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo taller</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('talleres.store' ) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Nombre </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Descripcion </label>

                            <div class="col-md-6">
                                <textarea id="title" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="profes" class="col-md-4 control-label">Profesor a Cargo</label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_id">
                                    @foreach($profes as $profe)
                                            <option value="{{$profe->id}}">{{$profe->name}} {{$profe->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Horario </label>

                            <div class="col-md-6">
                                <select id="horario" type="text" class="form-control" name="horario" value="{{ old('horario') }}" required autofocus>
                                    <option value="9:30 a 10:30">9:30 a 10:30</option>
                                    <option value="10:30 a 11:30">10:30 a 11:30</option>
                                    <option value="11:30 a 12:30">11:30 a 12:30</option>
                                    <option value="12:30 a 13:30">12:30 a 13:30</option>
                                    <option value="14:00 a 15:00">14:00 a 15:00</option>
                                    <option value="15:00 a 16:00">15:00 a 16:00</option>
                                </select>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Fecha de inicio </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label"> Fecha de termino </label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="fecha_termino" value="{{ old('fecha_termino') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Crear
                                </button>
                            </div>
                        </div>
                    </form>




                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection