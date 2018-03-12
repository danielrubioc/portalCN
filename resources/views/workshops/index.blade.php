@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
		<div class="control-btne-crud">
			@if (Auth::user()->hasRole->name == 'admin' && Auth::user()->hasRole->name == 'publisher')                             
            	<a href="{{ URL::to('workshops/create') }}" class="btn btn-success btn-create-gral">Nuevo taller</a>
            @endif
        </div>
	    <div class="title-gral-index">
			<h1>Lista de Talleres </h1>
		</div>


	    <div class="col-md-12">
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
									<td>Cupos</td>
									<td>Sobrecupos</td>
									<td>Inscritos</td>
									<td>C. Disponibles</td>
			    					<td>Estado</td>
			    					<td>Tipo</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($workshops as $taller)
				    			<tr>
				    				
								    <td>{{ $taller->name }}</td>
									<td>{{ $taller->quotas }}</td>
									<td>{{ $taller->about_quotas }}</td>
									<td>{{ count($taller->students) }}</td>
									<td>{{ $taller->hasTotalQuotesAvaibles() }}</td>
								    <td>{{ $taller->hasStatus->name }}</td>
								    <td>{{ $taller->hasType->name}} </td>
								  	
								    <td class="box-btnes">	
										<a href="{{ route('workshops.edit', $taller->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>

										@if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'publisher')                             
							            	<form method="POST" action="{{ route('workshops.destroy', ['id' => $taller->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
										        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estás seguro?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
										    </form>
							            @endif
					    					
								    	
									    
									   	<a href="{{ route('workshops.registerStudent', $taller->id) }}" class="btn btn-info btn-edit-style btn-especial-taller" data-toggle="tooltip" title="Registrar estudiante">Registrar <br> estudiante</a>
									   	<a href="{{ route('workshops.listStudent', $taller->id) }}" class="btn btn-info btn-edit-style btn-especial-taller" data-toggle="tooltip" title="Lista de Estudiantes">Lista <br>estudiantes</a>
									   	<a href="{{ route('lessons.listLesson', $taller->id) }}" class="btn btn-info btn-edit-style btn-especial-taller" data-toggle="tooltip" title="Listado de Clases">Calendario de<br>Clases</a>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
		    {{ $workshops->links() }}
		</div>
	</div> 		    
 </div> 
@endsection