@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('blogNew/create') }}" class="btn btn-success">Subir noticia</a>	
			<h1>Noticias</h1>
		</div>
	    <br>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>Nombre</td>
			    					<td>Subtitulo</td>
			    					<td>Contenido</td>
			    					<td>Pricipal</td>
			    					<td>Categoría</td>
			    					<td>Usuario</td>
			    					<td>Creado</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($news as $post)
				    			<tr>
				    				
								    <td>{{ $post->title }}</td>
								    <td>{{ $post->subtitle }}</td>
									<td>{{ $post->content }}</td>
									<td>{{ $post->cover_page }}</td>
									<td>{{ $post->BlogCategory->name }}</td>
									<td>{{ $post->user->name   }}</td>
									<td>{{ $post->created_at }}</td>
								    <td>{{ $post->status }}</td>
								  
								    <td class="box-btnes">
								    	<a href="{{ route('blogNew.edit', $post->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('blogNew.destroy', ['id' => $post->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button>
									    </form>
									</td>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
		    {{ $news->links() }}

	</div>
 </div> 
@endsection