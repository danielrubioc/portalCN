@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('tags/create') }}" class="btn btn-success">Nuevo tag</a>	
			<h1>Lista de tags</h1>
		</div>
	    <br>

		<div class="col-md-12">
		    <p>Un total de {{ $tags->total() }} registros</p>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($tags as $tag)
				    			<tr>
				    				
								    <td>{{ $tag->name }} {{ $tag->last_name }}</td>
								
								    <td>
								    	@if ($tag->status === 1)
										   <span class="span-success">Visible</span>
										@else
										   <span class="span-danger">No visible</span>
										@endif	
								    </td>
								  
								    <td class="box-btnes">
								    	<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('tags.destroy', ['id' => $tag->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
									    </form>
									    @if ($tag->status === 1)
										    <form method="POST" action="{{ route('tags.update', ['id' => $tag->id] ) }}">
										       	{{ csrf_field() }}
	                                    		{{ method_field('PUT') }}
	                                    		<input type="hidden" name="status" id="status" value="0">
	                                    		<input type="hidden" name="show" value="show">
										        <button type="submit" class="btn btn-alert delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Ocultar"> <span class="glyphicon glyphicon-eye-close"></span> </button>
										    </form>
										@else
										    <form method="POST" action="{{ route('tags.update', ['id' => $tag->id] ) }}">
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
 </div> 
@endsection