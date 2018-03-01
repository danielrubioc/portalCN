@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('posts/create') }}" class="btn btn-success btn-create-gral">Subir publicación <i class="fa fa-plus-circle" aria-hidden="true"></i></a>	
			<h1>Publicaciones</h1>
			 	<form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('PostsController@index') }}">
			        <input class="form-control mr-sm-2" type="search" name="title" placeholder="Busca por titulo" aria-label="Search">
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    </form>


			    <form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('PostsController@index') }}">
			    	<select class="form-control" id="category" name="category">
			    		<option disabled selected value> -- Buscar por Categoría -- </option>
                        @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
			       
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    </form>

			   	<form class="form-search-general form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('PostsController@index') }}">
			       <select class="form-control" id="status" name="status">
			       	  <option disabled selected value> -- Buscar por estado -- </option>
					   	@foreach($statuses as $status)
                                <option value="{{$status['id']}}">{{$status['name']}}</option>
                        @endforeach
				  	</select>
			     	<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
			    </form>
		
	    <br><br><br>

		    <div class="col-md-12">
		    	<p>Un total de {{ $news->total() }} registros</p>
			    <div class="table-responsive">
				  	
				    @if ($news)
				    <table class="table table-responsive table-perzonalise table-striped">
				    	<thead>
				    			<tr>	
				    					<td>#</td>
				    					<td width="20%">Portada</td>
				    					<td>título</td>
				    					<td>Url</td>
				    					<td>Categoría</td>
				    					<td>Usuario</td>
				    					<td>Creado </td>
				    					<td>Estado</td>
				    					<td>Tipo</td>
				    					<td></td>
				    			</tr>
				    	</thead>
				    	<tbody>
				    			@foreach ($news as $post)
					    			<tr>
					    				<td>{{ $post->id }}</td>
					    				<td><img src="{{url('/uploads/news')}}/{{ $post->cover_page }}" style="width:100%; max-height:150px "></td>
									    <td>{{ $post->title }}</td>
									    <td>{{ $post->url }}</td>
										<td>{{ $post->category->name }}</td>
										<td>{{ $post->user->name   }}</td>
										<td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
									    <td>{{$post->hasStatus->name}}</td>
									  	<td>{{$post->start}}</td>
									    <td class="box-btnes">
									    	<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
					    					<form method="POST" action="{{ route('posts.destroy', ['id' => $post->id] ) }}">
										        {{ csrf_field() }}
										        {{ method_field('DELETE') }}
										        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span> </button>
										    </form>
										    
										    @if ($post->status == 1)
											    <form method="POST" action="{{ route('posts.update', ['id' => $post->id] ) }}">
											       	{{ csrf_field() }}
		                                    		{{ method_field('PUT') }}
		                                    		<input type="hidden" name="status" id="status" value="2">
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

											@if ($post->start == 1)
											    <form method="POST" action="{{ route('posts.update', ['id' => $post->id] ) }}">
											       	{{ csrf_field() }}
		                                    		{{ method_field('PUT') }}
		                                    		<input type="hidden" name="start" id="start" value="2">
		                                    		<input type="hidden" name="show" value="show">
											        <button type="submit" class="btn btn-alert delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Destacado"> <i class="fa fa-star" aria-hidden="true"></i> </button>
											    </form>
											@else
											    <form method="POST" action="{{ route('posts.update', ['id' => $post->id] ) }}">
											       	{{ csrf_field() }}
		                                    		{{ method_field('PUT') }}
		                                    		<input type="hidden" name="start" value="1">
		                                    		<input type="hidden" name="show" value="show">
											        <button type="submit" class="btn btn-success delete-user" value="Delete user" onclick="return confirm('Estas seguro?')" data-toggle="tooltip" title="Normal"> <i class="fa fa-star-o" aria-hidden="true"></i> </button>
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
	</div>
 </div> 
@endsection