@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')

<div class="container">

	<div id="gral-list-index">
	<div class="content-gral-index">	
		
	    
	    <div class="title-gral-index">
			<a href="{{ URL::to('users/create') }}" class="btn btn-success">Nuevo usuario</a>	
			<h1>Lista de Usuarios</h1>
		</div>
	    <br>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>Email</td>
			    					<td>Fecha de nacimiento</td>
			    					<td>Perfil</td>
			    					<td>Estado</td>
			    					<td>Fecha de creación</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($users as $user)
				    			<tr>
				    				
								    <td>{{ $user->name }} {{ $user->last_name }}</td>
								    <td>{{ $user->email }}</td>
								    <td>{{ $user->birth_date }}</td>
								    <td>{{ $user->profile }}</td>
								    <td>{{ $user->status }}</td>
								    <td>{{ $user->created_at }}</td>
								  

								    <td class="especial">
	
									<div class="info">
								    	<a href="{!! route('users.edit', $user->id) !!}" class="btn btn-info btn-edit-style">Editar</a></td>
				    				</div>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>

		    {{ $users->links() }}
</div>
	</div> 
 </div> 
@endsection