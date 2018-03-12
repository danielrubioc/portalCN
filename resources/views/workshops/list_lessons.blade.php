@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
		<div class="control-btne-crud">
            <a href="{{ URL::to('workshops') }}" class="btn btn-success btn-create-gral">Volver a Talleres</a>
        </div>
	    <div class="title-gral-index">
			<h1>Calendario de clases </h1>	
			<h3>Taller de "{{ $workshops->name }}"</h3>
		</div>
	    <div class="content-fotm-lessons">
    		<form class="form-horizontal" method="POST" action="{{ route('lessons.store' ) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <input id="workshop_id" name="workshop_id" value="{{ $workshops->id }}" type="hidden" />

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="title" class="col-md-4 control-label"> Lugar </label>

                    <div class="col-md-6">
                        <input id="place" type="text" class="form-control" name="place" value="{{ old('place') }}" required autofocus>

                        @if ($errors->has('place'))
                            <span class="help-block">
                                <strong>{{ $errors->first('place') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    <label for="fecha" class="col-md-4 control-label">Fecha</label>
                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required autofocus>
                    </div>                   
                </div>

                <div class="form-group{{ $errors->has('horario') ? ' has-error' : '' }}">
                    <label for="horario" class="col-md-4 control-label">Horario</label>
                    <div class="col-md-6">
                        <input type="time" id="hour"  class="form-control" name="hour" value="{{ old('hour') }}" required autofocus/>
                    </div>                   
                </div>

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="horario" class="col-md-4 control-label">Descripción</label>
                    <div class="col-md-6">
                        <textarea id="description"  type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>
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
                            Guardar clase
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12 no-padding">
            <p>Un total de  {{ count($lessons)}} clases</p>
            <div class="table-responsive"> 
                <table class="table table-responsive table-perzonalise table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora de clase</th>
                            <th scope="col">Lugar</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $key => $lesson)
                            <tr>
                                <th scope="row">Clase {{ $key+1 }}</th>
                                <td>{{ $lesson->date }}</td>
                                <td>{{ $lesson->hour }}</td>
                                <td>{{ $lesson->place }}</td>
                                <td>{{ $lesson->description }}</td>
                                <td class="btn-align-lesson">

                                <a href="{{ route('lessons.listAssistance', $lesson->id) }}" class="btn btn-info btn-edit-style btn-especial-taller" data-toggle="tooltip" title="Registrar estudiante">Ver asistencia</a>
                                <form method="POST" action="{{ route('lessons.destroy', ['id' => $lesson->id] ) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estás seguro?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
                                </form>

                                </td>
                            </tr>
                        @endforeach                                                                                    
                    </tbody>
                </table>
            </div>
        </div>

                

	    
		<div class="col-md-12 no-padding">

		   
		</div>
	</div> 		    
 </div> 
@endsection