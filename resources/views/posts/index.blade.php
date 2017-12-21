@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('posts/create') }}" class="btn btn-success">Subir publicación</a>	
			<h1>Publicaciones</h1>
		</div>
	    <br>
		    <div class="table-responsive">
			  	
			    @if ($news)
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td width="20%">Portada</td>
			    					<td>título</td>
			    					<td>Bajada de título</td>
			    					<td>Categoría</td>
			    					<td>Usuario</td>
			    					<td>Creado </td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($news as $post)
				    			<tr>
				    				<td><img src="/uploads/news/{{ $post->cover_page }}" style="width:100%; max-height:150px "></td>
								    <td>{{ $post->title }}</td>
								    <td>{{ $post->subtitle }}</td>
									<td>{{ $post->category->name }}</td>
									<td>{{ $post->user->name   }}</td>
									<td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
								    <td>{{ $post->status }}</td>
								  
								    <td class="box-btnes">
								    	<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('posts.destroy', ['id' => $post->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button>
									    </form>
									    
									    @if ($post->status === 1)
										    <form method="POST" action="{{ route('posts.update', ['id' => $post->id] ) }}">
										       	{{ csrf_field() }}
	                                    		{{ method_field('PUT') }}
	                                    		<input type="hidden" name="status" value="0">
	                                    		<input type="hidden" name="show" value="show">
										        <button type="submit" class="btn btn-alert delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Ocultar"> <span class="glyphicon glyphicon-eye-close"></span> </button>
										    </form>
										@else
										    <form method="POST" action="{{ route('posts.update', ['id' => $post->id] ) }}">
										       	{{ csrf_field() }}
	                                    		{{ method_field('PUT') }}
	                                    		<input type="hidden" name="status" value="1">
	                                    		<input type="hidden" name="show" value="show">
										        <button type="submit" class="btn btn-success delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Mostrar"> <span class="glyphicon glyphicon-eye-open"></span> </button>
										    </form>
										@endif

									    


									</td>
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>

			    @endif
		    </div>
		    {{ $news->links() }}

	</div>
 </div> 
@endsection