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
			    <table class="table table-responsive table-perzonalise table-striped">
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
								    <td>
								    	@if ($user->role_id  == 1)
                                           <span>Administrador</span>
                                            @elseif($user->role_id  == 2)
                                            <span>Profesor</span>
                                            @elseif($user->role_id  == 3)
                                            <span>Publico</span>
                                        @endif
								    </td>
								    <td>{{ $user->status }}</td>
								    <td>{{ $user->created_at }}</td>
								  

								    <td class="especial">
	
									<div class="info">
								    	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-edit-style">Editar</a>
				    					<form method="POST" action="{{ action('UserController@destroy', ['id' => $user->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')"> Eliminar </button>
									    </form>
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