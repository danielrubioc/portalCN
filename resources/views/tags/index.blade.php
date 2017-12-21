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
								
								    <td>{{ $tag->status }}</td>
								  
								    <td class="box-btnes">
								    	<a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('tags.destroy', ['id' => $tag->id] ) }}">
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