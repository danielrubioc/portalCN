@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('categories/create') }}" class="btn btn-success">Nueva Categoria</a>	
			<h1>Lista de Categorias del blog</h1>
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
			    			@foreach ($categories as $category)
				    			<tr>
				    				
								    <td>{{ $category->name }} {{ $category->last_name }}</td>
								
								    <td>{{ $category->status }}</td>
								  
								    <td class="box-btnes">
								    	<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('categories.destroy', ['id' => $category->id] ) }}">
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