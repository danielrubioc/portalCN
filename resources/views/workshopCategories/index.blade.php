@extends('layouts.app')

@section('title', 'Categorías para el blog')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ URL::to('workshopCategories/create') }}" class="btn btn-success btn-create-gral">Nueva Categoria <i class="fa fa-plus-circle" aria-hidden="true"></i></a>	
			<h1>Lista de Categorias Talleres</h1>
		</div>
	    <br>
	    <p>Un total de {{ $categories->total() }} registros</p>
		    <div class="table-responsive">
			    <table class="table table-responsive table-perzonalise table-striped">
			    	<thead>
			    			<tr>	
			    					<td>#</td>
			    					<td>Nombre</td>
			    					<td>Estado</td>
			    					<td></td>
			    			</tr>
			    	</thead>
			    	<tbody>
			    			@foreach ($categories as $category)
				    			<tr>
								    <td>
								    	<?php if ($category->image): ?>
				                            <img src="{{url('/uploads/workshopCategories')}}/{{ $category->image }}" style="max-width:300px; max-height:150px ">
				                    	<?php endif ?>
				                	</td>
								    <td>{{ $category->name }} {{ $category->last_name }}</td>
									<td>{{$category->hasStatus->name}}</td>
									
								    <td class="box-btnes">
								    	<a href="{{ route('workshopCategories.edit', $category->id) }}" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar"><span class="glyphicon glyphicon-edit"></span></a>
				    					<form method="POST" action="{{ route('workshopCategories.destroy', ['id' => $category->id] ) }}">
									        {{ csrf_field() }}
									        {{ method_field('DELETE') }}
									        <button type="submit" class="btn btn-danger delete-user" value="Delete user" onclick="return confirm('Are you sure?')" data-toggle="tooltip" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span>  </button>
									    </form>
									   
				    			</tr>
			    			@endforeach
			    	</tbody>
			    </table>
		    </div>
		    <div class="col-md-12">
                {{ $categories->links() }}
            </div> 
	</div> 		    
 </div> 
@endsection