@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	    <div class="title-gral-index">
			<a href="{{ URL::to('blogCategory/create') }}" class="btn btn-success">Nueva Categoria</a>	
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
								  
								    <td class="especial">
	
									<div class="info">
								    	<a href="{{ route('blogCategory.edit', $category->id) }}" class="btn btn-info btn-edit-style">Editar</a>
				    					<form method="POST" action="{{ route('blogCategory.destroy', ['id' => $category->id] ) }}">
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
 </div> 
@endsection