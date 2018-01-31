@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('banners/create') }}" class="btn btn-success btn-create-gral">Nuevo banner <i class="fa fa-plus-circle" aria-hidden="true"></i></a>	
			<h1>Lista de Banners</h1>
		</div>
	    <br>
	    <p>Un total de {{ $banners->total() }} registros</p>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>#</td>
				    				<td width="20%">Portada</td>
			    					<td>Nombre</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($banners as $banner)
				    			<tr>
				    				<td>{{ $banner->id }}</td>
				    				<td><img src="{{url('/uploads/banners')}}/{{ $banner->image }}" style="width:100%; max-height:150px "></td>
								    <td>{{ $banner->title }}</td>
								
									<td>
								    	@if ($banner->status == 1)
										   <span class="span-success">Visible</span>
										@else
										   <span class="span-danger">No visible</span>
										@endif	
								    </td>
								    <td class="box-btnes">
								    	<a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('banners.destroy', ['id' => $banner->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
									    </form>
									    @if ($banner->status == 1)
										    <form method="POST" action="{{ route('banners.update', ['id' => $banner->id] ) }}">
										       	{{ csrf_field() }}
	                                    		{{ method_field('PUT') }}
	                                    		<input type="hidden" name="status" id="status" value="0">
	                                    		<input type="hidden" name="show" value="show">
										        <button type="submit" class="btn btn-alert delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Ocultar"> <span class="glyphicon glyphicon-eye-close"></span> </button>
										    </form>
										@else
										    <form method="POST" action="{{ route('banners.update', ['id' => $banner->id] ) }}">
										       	{{ csrf_field() }}
	                                    		{{ method_field('PUT') }}
	                                    		<input type="hidden" name="status" value="1">
	                                    		<input type="hidden" name="show" value="show">
										        <button type="submit" class="btn btn-success delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Mostrar"> <span class="glyphicon glyphicon-eye-open"></span> </button>
										    </form>
										@endif

				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
	</div> 		    
 </div> 
@endsection