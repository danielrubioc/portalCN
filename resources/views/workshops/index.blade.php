@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('workshops/create') }}" class="btn btn-success">Nuevo taller</a>
			<a href="{{ URL::to('workshops/create') }}" class="btn btn-success">Lista</a>	
			<h1>Lista de Talleres </h1>
		</div>
	    <br>
		<br><br><br>

	    <div class="col-md-12">
	    	<p>Un total de {{ $workshops->total() }} registros</p>
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
			    					<td>Profesor(es) a cargo</td>
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
								    <td>
								    	@foreach ($taller->teachers as $key => $teacher)
								    		{{ $teacher->name }} {{ $teacher->last_name }}, 
								    	@endforeach
								    </td>
								  	
								    <td class="box-btnes">	
										<a href="{{ route('workshops.edit', $taller->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>


					    					
								    	<form method="POST" action="{{ route('workshops.destroy', ['id' => $taller->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
									    </form>

									   	<a href="{{ route('workshops.registerStudent', $taller->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar">Registrar estudiante</a>
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