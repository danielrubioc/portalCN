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
		
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>Descripcion</td>
			    					<td>Horario</td>
									<td>Fecha de inicio</td>
									<td>Fecha de termino</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($workshops as $taller)
				    			<tr>
				    				
								    <td>{{ $taller->name }}</td>
								    <td>{{ $taller->description }}</td>
									<td>{{ $taller->horario }}</td>
									<td>{{ $taller->fecha_inicio }}</td>
									<td>{{ $taller->fecha_termino }}</td>
								    <td>{{ $taller->status }}</td>
								  	
								    <td class="box-btnes">
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
@endsection