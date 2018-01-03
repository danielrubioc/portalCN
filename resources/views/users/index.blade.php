@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')

<div class="container">

	<div id="gral-list-index">
	<div class="content-gral-index">	
		
	    
	    <div class="title-gral-index">
			<a href="{{ URL::to('users/create') }}" class="btn btn-success">Nuevo usuario</a>	
			<h1>Lista de Usuarios</h1>

			    <form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			        <input class="form-control mr-sm-2" type="search" name="name" placeholder="Busca por nombre" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			    </form>


			    <form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			        <input class="form-control mr-sm-2" type="search" name="email" placeholder="Busca por correo" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			    </form>

			   	<form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			       <select class="form-control" id="status" name="status">
			       	  <option disabled selected value> -- Buscar por estado -- </option>
					    <option value="1">Activo</option>
					    <option value="2">Deshabilitado</option>
					    <option value="2">Pendiente</option>
				  	</select>
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
			    </form>

		</div>
	    <br><br><br>

	    <div class="col-md-12">
	    	<p>Un total de {{ $users->total() }} registros</p>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>#</td>
			    					<td>Nombre</td>
			    					<td>Email</td>
			    					<td>Teléfono celular</td>
			    					<td>Perfil</td>
			    					<td>Estado</td>
			    					<td>Fecha de creación</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($users as $user)
				    			<tr>
				    				<td>{{ $user->id }}</td>	
								    <td>{{ $user->name }} {{ $user->last_name }}</td>
								    <td>{{ $user->email }}</td>
								    <td>{{ $user->cell_phone }}</td>
								    <td>{{ $user->roles->name }}</td>
								    <td>{{ $user->status }}</td>
								  	<td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

								    <td class="box-btnes">
								    	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ action('UserController@destroy', ['id' => $user->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estas seguro?')"  data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button>
									    </form>
									</td>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
		</div>    
		    {{ $users->links() }}
</div>
	</div> 
 </div> 
@endsection