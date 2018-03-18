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
					<p class="especial-p"><strong>Lugar:  </strong>{!! $workshop->place !!}</p>
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
		                    <form class="form-horizontal form-css-label form-desktop form-work-insc" method="POST" action="{{ route('workshops.storeStudentPublicAuth' ) }}">
		                        {{ csrf_field() }}
		                        <input type="hidden" name="id" id="id" value="{{$workshop->id}}">
			                       
		                        <div class="col-md-12 form-group">
								  	<label for="sel1">Como te enteraste del taller?</label>
								  	<select class="form-control" name="commentary" id="commentary" required>
									  	<option value="">-Selecciona una opcion</option>
									    <option value="Facebook Deportes">Facebook Deportes</option>
									    <option value="Facebook Municipalidad">Facebook Municipalidad</option>
									    <option value="Volante o Afiche">Volante o Afiche</option>
									    <option value="Página Web Municipalidad">Página Web Municipalidad</option>
									    <option value="Boca a boca">Boca a boca</option>
									    <option value="Diario Comunal "Barrancas"">Diario Comunal "Barrancas"</option>
								  	</select>
								</div>
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


							<div class="col-md-12 form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="birth_date" type="date" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required autofocus>
									<label for="birth_date" style="top: -16px;">Fecha de nacimiento</label>
									<span class="focus-border"></span>
									@if ($errors->has('birth_date'))
										<span class="help-block">
											<strong>{{ $errors->first('birth_date') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('age') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="age" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="age" value="{{ old('age') }}" required readonly>
									<label for="age"  style="top: -16px;">Edad</label>
									<span class="focus-border"></span>
									@if ($errors->has('age'))
										<span class="help-block">
											<strong>{{ $errors->first('age') }}</strong>
										</span>
									@endif
								</div>
							</div>


							<div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-12">    
                                <label for="email" style="color: #aaa;">Tienes problemas de salud?</label>
	                                <div class="radio" style="margin-top: -10px;">
	                                  <label class="checkbox-inline"><input type="radio" name="health" class="closeheal" id="health" value="0" checked>No</label>
	                                  <label class="checkbox-inline"><input type="radio" class="openheal" name="health" id="health" value="1">Si</label>
	                                </div>
	                            <div class="shownDiv" style="display:none;">
	                                <div class="form-group{{ $errors->has('health_problem') ? ' has-error' : '' }}">
	                                    <div class="col-md-12 effect-reg">
	                                       	<label for="health_problem" class="control-label" style="color:#aaa; text-align: left;">Especifique</label>
	                                        <textarea id="health_problem" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }} no-bor" name="health_problem" value="{{ old('health_problem') }}"></textarea>

	                                        @if ($errors->has('health_problem'))
	                                            <span class="help-block">
	                                                <strong>{{ $errors->first('health_problem') }}</strong>
	                                            </span>
	                                        @endif
	                                    </div>
	                                </div>

	                            </div>
	                        </div> 

	                        @if(!old('age'))
	                            <span class="titular-info" style="display:none;">
	                        @else
	                            @if(old('age') >= 18)
	                                <span class="titular-info" style="display:none;">
	                                @else
	                                <span class="titular-info" style="display:block;">
	                            @endif
	                        @endif
                                

								<div class="col-md-12 form-group{{ $errors->has('school') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="school" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="school" value="{{ old('school') }}" required autofocus>
										<label for="school" >Nombre del colegio al que asiste?</label>
										<span class="focus-border"></span>
										@if ($errors->has('school'))
											<span class="help-block">
												<strong>{{ $errors->first('school') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="col-md-12 form-group{{ $errors->has('headline_full_name') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_full_name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_full_name" value="{{ old('headline_full_name') }}" required autofocus>
										<label for="headline_full_name" >Nombre completo (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_full_name'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_full_name') }}</strong>
											</span>
										@endif
									</div>
								</div>


								<div class="col-md-12 form-group{{ $errors->has('headline_phone') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_phone" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_phone" value="{{ old('headline_phone') }}" required autofocus>
										<label for="headline_phone" >Teléfono de contacto (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_phone'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_phone') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="col-md-12 form-group{{ $errors->has('headline_email') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_email" type="email" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_email" value="{{ old('headline_email') }}" required autofocus>
										<label for="headline_email" >E-Mail (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_email'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_email') }}</strong>
											</span>
										@endif
									</div>
								</div>
                               
								<div class="col-md-12 form-group{{ $errors->has('headline_rut') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_rut" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_rut" value="{{ old('headline_rut') }}" title="ej. 12345678-5" pattern="[0-9]{7,8}-[0-9Kk]{1}" required autofocus>
										<label for="headline_rut" >Rut (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_rut'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_rut') }}</strong>
											</span>
										@endif
									</div>
								</div>
                               

                        	</span>

                        	<div class="col-md-12 form-group">
							  	<label for="sel1" style="color: #aaa;">Como te enteraste del taller?</label>
							  	<select class="form-control no-bor" name="commentary" id="commentary" value="{{ old('commentary') }}" required>
								  	<option value="">-Selecciona una opcion</option>
								    <option value="Facebook Deportes">Facebook Deportes</option>
								    <option value="Facebook Municipalidad">Facebook Municipalidad</option>
								    <option value="Volante o Afiche">Volante o Afiche</option>
								    <option value="Página Web Municipalidad">Página Web Municipalidad</option>
								    <option value="Boca a boca">Boca a boca</option>
								    <option value="Diario Comunal "Barrancas"">Diario Comunal "Barrancas"</option>
							  	</select>
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


							<div class="col-md-12 form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="birth_date" type="date" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required autofocus>
									<label for="birth_date" style="top: -16px;">Fecha de nacimiento</label>
									<span class="focus-border"></span>
									@if ($errors->has('birth_date'))
										<span class="help-block">
											<strong>{{ $errors->first('birth_date') }}</strong>
										</span>
									@endif
								</div>
							</div>

							<div class="col-md-12 form-group{{ $errors->has('age') ? ' has-error' : '' }}">
								<div class="input-effect">
									<input id="age" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="age" value="{{ old('age') }}" required readonly>
									<label for="age"  style="top: -16px;">Edad</label>
									<span class="focus-border"></span>
									@if ($errors->has('age'))
										<span class="help-block">
											<strong>{{ $errors->first('age') }}</strong>
										</span>
									@endif
								</div>
							</div>


							<div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} col-md-12">    
                                <label for="email" style="color: #aaa;">Tienes problemas de salud?</label>
	                                <div class="radio" style="margin-top: -10px;">
	                                  <label class="checkbox-inline"><input type="radio" name="health" class="closeheal" id="health" value="0" checked>No</label>
	                                  <label class="checkbox-inline"><input type="radio" class="openheal" name="health" id="health" value="1">Si</label>
	                                </div>
	                            <div class="shownDiv" style="display:none;">
	                                <div class="form-group{{ $errors->has('health_problem') ? ' has-error' : '' }}">
	                                    <div class="col-md-12 effect-reg">
	                                       	<label for="health_problem" class="control-label" style="color:#aaa; text-align: left;">Especifique</label>
	                                        <textarea id="health_problem" type="text" class="form-control not-empty {{ !empty($errors->first()) ? ' empty' : '' }} no-bor" name="health_problem" value="{{ old('health_problem') }}"></textarea>

	                                        @if ($errors->has('health_problem'))
	                                            <span class="help-block">
	                                                <strong>{{ $errors->first('health_problem') }}</strong>
	                                            </span>
	                                        @endif
	                                    </div>
	                                </div>

	                            </div>
	                        </div> 

	                        @if(!old('age'))
	                            <span class="titular-info" style="display:none;">
	                        @else
	                            @if(old('age') >= 18)
	                                <span class="titular-info" style="display:none;">
	                                @else
	                                <span class="titular-info" style="display:block;">
	                            @endif
	                        @endif
                                

								<div class="col-md-12 form-group{{ $errors->has('school') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="school" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="school" value="{{ old('school') }}" required autofocus>
										<label for="school" >Nombre del colegio al que asiste?</label>
										<span class="focus-border"></span>
										@if ($errors->has('school'))
											<span class="help-block">
												<strong>{{ $errors->first('school') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="col-md-12 form-group{{ $errors->has('headline_full_name') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_full_name" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_full_name" value="{{ old('headline_full_name') }}" required autofocus>
										<label for="headline_full_name" >Nombre completo (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_full_name'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_full_name') }}</strong>
											</span>
										@endif
									</div>
								</div>


								<div class="col-md-12 form-group{{ $errors->has('headline_phone') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_phone" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_phone" value="{{ old('headline_phone') }}" required autofocus>
										<label for="headline_phone" >Teléfono de contacto (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_phone'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_phone') }}</strong>
											</span>
										@endif
									</div>
								</div>

								<div class="col-md-12 form-group{{ $errors->has('headline_email') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_email" type="email" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_email" value="{{ old('headline_email') }}" required autofocus>
										<label for="headline_email" >E-Mail (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_email'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_email') }}</strong>
											</span>
										@endif
									</div>
								</div>
                               
								<div class="col-md-12 form-group{{ $errors->has('headline_rut') ? ' has-error' : '' }}">
									<div class="input-effect">
										<input id="headline_rut" type="text" class="form-control effect-placeholder {{ !empty($errors->first()) ? ' empty' : '' }}" name="headline_rut" value="{{ old('headline_rut') }}" title="ej. 12345678-5" pattern="[0-9]{7,8}-[0-9Kk]{1}" required autofocus>
										<label for="headline_rut" >Rut (apoderado)</label>
										<span class="focus-border"></span>
										@if ($errors->has('headline_rut'))
											<span class="help-block">
												<strong>{{ $errors->first('headline_rut') }}</strong>
											</span>
										@endif
									</div>
								</div>
                               

                        	</span>

                        	<div class="col-md-12 form-group">
							  	<label for="sel1" style="color: #aaa;">Como te enteraste del taller?</label>
							  	<select class="form-control no-bor" name="commentary" id="commentary" value="{{ old('commentary') }}" required>
								  	<option value="">-Selecciona una opcion</option>
								    <option value="Facebook Deportes">Facebook Deportes</option>
								    <option value="Facebook Municipalidad">Facebook Municipalidad</option>
								    <option value="Volante o Afiche">Volante o Afiche</option>
								    <option value="Página Web Municipalidad">Página Web Municipalidad</option>
								    <option value="Boca a boca">Boca a boca</option>
								    <option value="Diario Comunal "Barrancas"">Diario Comunal "Barrancas"</option>
							  	</select>
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



        ////edad
        var age;
        $('#birth_date').on('change', function () {
          if ($('#birth_date').val()) {
                var dateString = $('#birth_date').val();
                var today = new Date();
                var birthDate = new Date(dateString);
                age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $("#age").val(age);
          }
        });

        $('#birth_date').blur(function () {
            if (age && age > 0) {
                $("#age").val(age);  
                if (age >= 18) {   
                
                    $(".titular-info").css("display", "none");
                    $("#school").removeAttr('required');
                    $("#school").val(null); 
                    $("#headline_full_name").removeAttr('required');
                    $("#headline_full_name").val(null); 
                    $("#headline_phone").removeAttr('required');
                    $("#headline_phone").val(null); 
                    $("#headline_email").removeAttr('required');
                    $("#headline_email").val(null); 
                    $("#headline_rut").removeAttr('required');
                    $("#headline_rut").val(null);     
                }
                if (age < 18) {   
                    
                    $(".titular-info").css("display", "block");
                    $("#school").attr("required", true);
                    $("#school").val(null); 
                    $("#headline_full_name").attr("required", true);
                    $("#headline_full_name").val(null); 
                    $("#headline_phone").attr("required", true);
                    $("#headline_phone").val(null); 
                    $("#headline_email").attr("required", true);
                    $("#headline_email").val(null); 
                    $("#headline_rut").attr("required", true);
                    $("#headline_rut").val(null);   

                }
            } else {
                
                console.log('eres extraño');
                
            }

            console.log('eres extraño');
            
        });


        $(document).ready(function() {
        	console.log('entraaaa');
            $('.closeheal').on('click', function(e) {
                $('.shownDiv').css("display", "none");
            });
            $('.openheal').on('click', function(e) {
                $('.shownDiv').css("display", "block");
            });
        });
</script>
@stop



@endsection
