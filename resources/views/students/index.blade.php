@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('registro/create') }}" class="btn btn-success">Nuevo Alumno</a>	
			<h1>Alumnos inscritos </h1>
		</div>
	    <br>
		
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>Apellido</td>
			    					<td>Correo</td>
									<td>Taller</td>
							</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($alumnos as $alumno)
				    			<tr>
				    				
								    <td>{{ $alumno->name }}</td>
								    <td>{{ $alumno->last_name }}</td>
									<td>{{ $alumno->email }}</td>
									<td>{{ $alumno->taller_id }}</td>							
								</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
	</div> 		    
 </div> 
@endsection