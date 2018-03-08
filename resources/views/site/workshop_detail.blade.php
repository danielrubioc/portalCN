@extends('layouts.site')

@section('content')

<span class="hidden-xs">
<div class="content-detail-workshop main-work-desk container">

	<div class="col-md-12 title-posts">
			<h1><span>Nuestras</span> Disciplinas</h1>	
	</div>

	<div class="col-md-12">
		<div class="col-md-6 no-padding tecnique-especi">
			<div class="content-detail-workshops-inter">
				<img src="{{url('/uploads/workshop')}}/{{$workshop->cover_page}}" class="img-responsive">
				<div class="info-txt-detail">
					<h1>{{ $workshop->name }}</h1>
					<h4 >{{ $workshop->subtitle }}</h4>
					<p >{!! $workshop->description !!}</p>
					<p><strong>Lugar:  </strong>{!! $workshop->place !!}</p>
					<p><strong>Cupos disponibles: </strong>{{ $workshop->hasTotalQuotesAvaibles() }}</p>
				</div>
			</div>
		</div>
		<div class="col-md-6 no-padding form-right">
			
			
		<h2>Si te llamó la atención, Inscribete!</h2>
		@if(Auth::user())
			@if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'admin')
				<div class="col-md-12 no-padding">
                	<h2>Debes ser público para registrarte</h2>
               	</div>
           	@endif
                @if (Auth::user()->hasRole->name == 'public')
                	@if($registered )
			               	<div class="col-md-12 no-padding">
		                    	<h2>Ya estas registrado</h2>
		                   	</div>
		               	@elseif($workshop->hasTotalQuotesAvaibles() != 0 && !$registered )
		                    <form class="form-horizontal" method="POST" action="{{ route('workshops.storeStudentPublicAuth' ) }}">
		                        {{ csrf_field() }}
		                        <input type="hidden" name="id" id="id" value="{{$workshop->id}}">	
			                    <div class="register-workshop-desk">
			                    	<button type="submit" class="btn btn-primary btn-home btn-register-disci">Inscribirme a taller</button>
			                    </div>
		                    </form>
	                    @elseif($workshop->hasTotalQuotesAvaibles() == 0)
		                   	<div class="col-md-12 no-padding text-info-detail-discip">
			                	<h2>Lo sentimos, no hay cupos disponibles</h2>
			               	</div>
	                @endif
                @endif

            @else
            	@if($workshop->hasTotalQuotesAvaibles() == 0 )
					<div class="col-md-12 no-padding text-info-detail-discip">
	                	<h2>Lo sentimos, no hay cupos disponibles</h2>
	               	</div>
	               	@else

	               	<div class="form-suscri">
						<form id="incripcion" class="form-horizontal form-register-disciplinas" method="POST" action="{{ route('users.registerUserAndWorkshop') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							
							<input type="hidden" name="workshop_id" value="{{$workshop->id}}">

							<div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
									<label for="name">Nombre</label>
									<span class="focus-border"></span>
									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="last_name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
									<label for="last_name">Apellido</label>
									<span class="focus-border"></span>
									@if ($errors->has('last_name'))
										<span class="help-block">
											<strong>{{ $errors->first('last_name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="rut" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="rut" value="{{ old('rut') }}" pattern="[0-9]{7,8}-[0-9Kk]{1}"  title="ej. 12345678-5" required autofocus>
									<label for="rut">Rut</label>
									<span class="focus-border"></span>
									@if ($errors->has('rut'))
										<span class="help-block">
											<strong>{{ $errors->first('rut') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="email" type="email" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
									<label for="email">E-Mail</label>
									<span class="focus-border"></span>
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							
							<div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="password" type="password" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
									<label for="password">Contraseña</label>
									<span class="focus-border"></span>
									@if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>


							<div class="col-md-12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="password_confirmation" type="password" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
									<label for="password_confirmation">Confirmar Contraseña</label>
									<span class="focus-border"></span>
									@if ($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 col-md-offset-4">
									<button id="inscribirme" type="submit" class="btn btn-primary">
										Inscribirme
									</button>
								</div>
							</div>
									
						</form>
					</div>
	            @endif
        @endif
	
            

		</div>

	</div>


</div>
</span>


<span class="visible-xs">
<div class="content-detail-workshop">
	<div class="img-post-detail" style="background: url({{url('/uploads/workshop')}}/{{ $workshop->cover_page }}) no-repeat center center; 
											  -webkit-background-size: cover;
											  -moz-background-size: cover;
											  -o-background-size: cover;
											  background-size: cover;">
	</div>
	<div class="content-title-detail" >
		<span></span>
		<h1>{{ $workshop->name }}</h1>
	</div>
	<div class="container info-content-detail">	

		<div class="tab-content workshop-content">			
			<div id="step-1" class="tab-pane fade in active" >

				<h4 >{{ $workshop->subtitle }}</h4>
				<p >{!! $workshop->description !!}</p>

				<hr class="separator-comparte">	

			</div>
		</div>	
   		
   		<h2>Si te llamó la atención, Inscribete!</h2>
		@if(Auth::user())
			@if (Auth::user()->hasRole->name == 'admin' || Auth::user()->hasRole->name == 'admin')
				<div class="col-md-12 no-padding">
                	<h2>Debes ser público para registrarte</h2>
               	</div>
           	@endif
                @if (Auth::user()->hasRole->name == 'public')
                	@if($registered )
			               	<div class="col-md-12 no-padding">
		                    	<h2>Ya estas registrado</h2>
		                   	</div>
		               	@elseif($workshop->hasTotalQuotesAvaibles() != 0 && !$registered )
		                    <form class="form-horizontal" method="POST" action="{{ route('workshops.storeStudentPublicAuth' ) }}">
		                        {{ csrf_field() }}
		                        <input type="hidden" name="id" id="id" value="{{$workshop->id}}">	
			                    <div class="register-workshop-desk">
			                    	<button type="submit" class="btn btn-primary btn-home btn-register-disci">Inscribirme a taller</button>
			                    </div>
		                    </form>
	                    @elseif($workshop->hasTotalQuotesAvaibles() == 0)
		                   	<div class="col-md-12 no-padding text-info-detail-discip">
			                	<h2>Lo sentimos, no hay cupos disponibles</h2>
			               	</div>
	                @endif
                @endif

            @else
            	@if($workshop->hasTotalQuotesAvaibles() == 0 )
					<div class="col-md-12 no-padding text-info-detail-discip">
	                	<h2>Lo sentimos, no hay cupos disponibles</h2>
	               	</div>
	               	@else

	               	<div class="form-suscri">
						<form id="incripcion" class="form-horizontal form-register-disciplinas" method="POST" action="{{ route('users.registerUserAndWorkshop') }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							
							<input type="hidden" name="workshop_id" value="{{$workshop->id}}">

							<div class="col-md-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
									<label for="name">Nombre</label>
									<span class="focus-border"></span>
									@if ($errors->has('name'))
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="last_name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>
									<label for="last_name">Apellido</label>
									<span class="focus-border"></span>
									@if ($errors->has('last_name'))
										<span class="help-block">
											<strong>{{ $errors->first('last_name') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('rut') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="rut" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="rut" value="{{ old('rut') }}" pattern="[0-9]{7,8}-[0-9Kk]{1}"  title="ej. 12345678-5" required autofocus>
									<label for="rut">Rut</label>
									<span class="focus-border"></span>
									@if ($errors->has('rut'))
										<span class="help-block">
											<strong>{{ $errors->first('rut') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="email" type="email" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
									<label for="email">E-Mail</label>
									<span class="focus-border"></span>
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>

							
							<div class="col-md-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="password" type="password" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
									<label for="password">Contraseña</label>
									<span class="focus-border"></span>
									@if ($errors->has('password'))
	                                    <span class="help-block">
	                                        <strong>{{ $errors->first('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>


							<div class="col-md-12 form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="password_confirmation" type="password" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
									<label for="password_confirmation">Confirmar Contraseña</label>
									<span class="focus-border"></span>
									@if ($errors->has('password_confirmation'))
										<span class="help-block">
											<strong>{{ $errors->first('password_confirmation') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 col-md-offset-4">
									<button id="inscribirme" type="submit" class="btn btn-primary">
										Inscribirme
									</button>
								</div>
							</div>
									
						</form>
					</div>
	            @endif
            @endif
	
	</div>	

</div>
</span>


@section('inputHasContent')
<script type="text/javascript">

// JavaScript for label effects only
	$(this).addClass('not-empty');
        $('.input-effect input').blur(function(){
            tmpval = $(this).val();
            if(tmpval == '') {
                $(this).addClass('not-empty');
                $(this).removeClass('empty');
            } else {
                $(this).addClass('empty');
                $(this).removeClass('not-empty');
            }
        });
</script>
@stop
@endsection
