@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('talleres/create') }}" class="btn btn-success">Nuevo taller</a>
			<a href="{{ URL::to('registro/create') }}" class="btn btn-success">Nuevo Alumno</a>	
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
			    					<td>Estado</td>
			    					<td>Creado por</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($workshops as $taller)
				    			<tr>
				    				
								    <td>{{ $taller->name }}</td>
									<td>{{ $taller->quotas }}</td>
									<td>{{ $taller->about_quotas }}</td>
								    <td>
								    	@if ($taller->status === 1)
										   <span class="span-success">Disponible</span>
										@else
										   <span class="span-danger">No disponible</span>
										@endif	
								    </td>
								    <td>{{ $taller->user->name }} {{ $taller->user->last_name }}</td>
								  	
								    <td class="box-btnes">	
										<a href="{{ route('workshops.edit', $taller->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
					    					
								    	<form method="POST" action="{{ route('talleres.destroy', ['id' => $taller->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
									    </form>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
		</div>
	</div> 		    
 </div> 
@endsection