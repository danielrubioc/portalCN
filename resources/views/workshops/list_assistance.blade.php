@extends('layouts.app')

@section('title', 'Talleres')


@section('content')

<div class="container">
	<div class="gral-list-content">
	    <div class="title-gral-index">
			<a href="{{ route('workshops.edit', $workshop->id) }}" class="btn btn-success">Volver</a>	


			<h1>Lista de Asistencia  </h1>

		</div>
	    <br>
		<div class="col-md-12 no-padding">
	    	<p>Un total de  {{ count($lessons)}}registros</p>
		    <div class="table-responsive">



				    <ul class="table-list">
				    	<li class="head-lisr">
				    		<span>Nombre</span>
	    					<span>Rut</span>
	    					<span>Email</span>
	    					<span>Presente</span>
				    	</li>
				    	<form class="form-horizontal" method="POST" action="{{ route('lessons.saveList' ) }}" enctype="multipart/form-data">
		                        {{ csrf_field() }}
		                        <input type="hidden" name="lesson_id" value="{{$lesson->id}}">
		                        <input type="hidden" name="wk_id" value="{{$workshop->id}}">
		                        
		                		@foreach ($lessons as $key => $lesson)
		                		<li class="body-list">
		
						    		<span>{{ $lesson->user->name}} {{ $lesson->user->last_name}}</span>
			    					<span>{{ $lesson->user->rut}} </span>
			    					<span>{{ $lesson->user->email}}</span>
			    					<input type="hidden" name="status[{{$key}}][user]" value="{{$lesson->user->id}}" />
			    					<input type="hidden" name="status[{{$key}}][status]" value="0">	
						    		<span><input type="checkbox" name="status[{{$key}}][status]" value="1" {{ $lesson->status ? 'checked' : '' }}> </span>

								</li>		
				    			@endforeach
				    			<div class="col-md-12 send-list">
					    			<button type="submit" class="btn btn-primary">Guardar lista</button>
					    		</div>
						</form>
				    </ul>

				   	
		    </div>

		</div>
	</div> 		    
 </div> 
@endsection