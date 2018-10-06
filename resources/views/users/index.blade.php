@extends('layouts.app')

@section('title', 'Lista de usuarios')


@section('content')

<div class="container">

	<div id="gral-list-index">
	<div class="content-gral-index">	
		
 
	    <div class="title-gral-index">
			<a href="{{ URL::to('users/create') }}" class="btn btn-success btn-create-gral">Nuevo usuario <i class="fa fa-plus-circle" aria-hidden="true"></i></a>	
			<a href="{{ URL::to('download-excel-file/users') }}" target="_blank" class="btn btn-success btn-create-gral">Descargar listado <i class="fa fa-cloud-download" aria-hidden="true"></i></a>	
			<a data-toggle="modal" data-target="#myModal" class="btn btn-success btn-create-gral">Cargar usuarios nuevos<i class="fa fa-cloud-upload" aria-hidden="true"></i></a>	
 			<a data-toggle="modal" data-target="#myModal2" class="btn btn-success btn-create-gral">Actualizar usuarios <i class="fa fa-cloud-upload" aria-hidden="true"></i></a>	
			<h1>Lista de Usuarios</h1>

			    <form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			        <input class="form-control mr-sm-2" type="search" name="name" placeholder="Busca por nombre" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    </form>


			    <form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			        <input class="form-control mr-sm-2" type="search" name="email" placeholder="Busca por correo" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    </form>

			   	<form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('UserController@index') }}">
			       <select class="form-control" id="status" name="status">
			       	  <option disabled selected value> -- Buscar por estado -- </option>
					    @foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['name']}}</option>
                        @endforeach
				  	</select>
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
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
								    <td>{{ $user->hasRole->name }}</td>
								    <td>{{ $user->hasStatus->name }}</td>
								  	<td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>

								    <td class="box-btnes">
								    	<a href="{{ route('users.edit', $user->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
								    	@if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'publisher' )                             
							            	<form method="POST" action="{{ action('UserController@destroy', ['id' => $user->id] ) }}">
										        {{ csrf_field() }}
										        {{ method_field('DELETE') }}
										        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estas seguro?')"  data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button>
										    </form>
							            @endif
				    					
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form  action="{{ URL::to('upload-users') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Carga de usuarios</h4>
      	</div>
      	<div class="modal-body">
			{{ csrf_field() }}
			<input type="file" name="import_file" accept=".xlsx, .xls, .csv" />
       	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn btn-primary">Subir archivo</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      	</div>
    </div>
    </form>
  </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<form  action="{{ URL::to('update-users') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      	<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Actualización de usuarios</h4>
      	</div>
      	<div class="modal-body">
			{{ csrf_field() }}
			<input type="file" name="import_file" accept=".xlsx, .xls, .csv" />
       	</div>
      	<div class="modal-footer">
      		<button type="submit" class="btn btn-primary">Subir archivo</button>
        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      	</div>
    </div>
    </form>
  </div>
</div>

<div id="errorsUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Registros con errores</h4>
	    </div>
      	<div class="modal-body">
      	@if (!empty($error_users))		
      		<table class="table table-responsive table-perzonalise table-striped">
      		<thead>
    			<tr>	
 					<td>Nombre</td>
					<td>Email</td>
					<td>rut</td>
					<td>Observación</td>
    			</tr>
	    	</thead>
	    	<tbody>
    			 @foreach ($error_users as $user_er)
	    			<tr>
 					    <td>{{ $user_er['name'] }} {{ $user_er['last_name'] }}</td>
					    <td>{{ $user_er['email']  }}</td>
					    <td>{{ $user_er['rut'] }}</td>
					     
					  	<td>{{ $user_er['observación'] }}</td>
	    			</tr>
    			@endforeach
	    	</tbody>
	    	</table>
		@endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>

  </div>
</div>
@endsection