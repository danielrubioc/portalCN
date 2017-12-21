@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('blogGallery/create') }}" class="btn btn-success">Nueva imagen</a>	
			<h1>Lista de Categorias de imagenes </h1>
		</div>
	    <br>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>url</td>
			    					<td>id noticia</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($galleries as $gallery)
				    			<tr>
				    				
								    <td>{{ $gallery->name }}</td>
								    <td>{{ $gallery->url }}</td>
									<td>{{ $gallery->blog_news_id }}</td>
								    <td>{{ $gallery->status }}</td>
								  	
								    <td class="box-btnes">
								    	<a href="{{ route('blogGallery.edit', $gallery->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('blogGallery.destroy', ['id' => $gallery->id] ) }}">
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