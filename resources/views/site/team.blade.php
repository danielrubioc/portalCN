@extends('layouts.site')

@section('content')
	
	<div class="container info-content-detail content-team-description">
		
		
        <span class="visible-xs">

            <div class="container workshop-all">
                <h1>El equipo</h1>
               	<p>Todos quienes forman parte de la Corporación del Deporte de Cerro Navia lo hacen con un objetivo en mente; brindar a todos los vecinos y vecinas de la comuna las mejores actividades y programas deportivos posibles, la meta es mejorar la calidad de vida de todos.</p>

                <div class="info-taller">
                    
                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/claudio-varela.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Claudio Varela</h1>
                                    	<h2>Director Corporación de Deportes</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/magaly-jauregui.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Magaly Jauregui</h1>
                                    	<h2>Jefa de Gestión y D.O.</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/mario-baeza.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Mario Baeza</h1>
                                    	<h2>Jefe de Deportes</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/felipe-fuenzalida.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Felipe Fuenzalida</h1>
                                    	<h2>Asesor de Programas y Contenidos Deportivas</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/myriam-curiarte.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Myriam Curiarte</h1>
                                    	<h2>Secretaria de la Corporación</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/juan-contreras.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Juan González </h1>
                                    	<h2>Encargado de Proyectos y Asistente de Gestión</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>
                    	
                    	<div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/ignacio-martinez.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Ignacio Martínez </h1>
                                    	<h2>Encargado de Comunicaciones y RRPP</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/cristina-beltran.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Cristina Beltrán  </h1>
                                    	<h2>Encargada de Mantención del Recinto Turno Mañana</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/pedro-lopez.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Pedro López</h1>
                                    	<h2>Encargado de Mantención del Recinto Turno Tarde</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                        <div id="team-modify-container">
                            <div class="col-xs-6 no-padding">
                                <div class="item-work item-team">
                                	<img src="{{url('/images/team')}}/jeaqueline-burgos.jpg" class="img-responsive">
                                    <span class="info-team">
                                    	<h1>Jeaqueline Burgos</h1>
                                    	<h2>Encargada de Mensajería y Aseo</h2>
                                    </span> 
                                </div>   
                            </div> 
                        </div>

                </div>

            </div>

        </span>	

	</div>
	<div class="selection-participate">
			<div class="separ-vtn">
				 <a href="{{ url('/disciplinas') }}">Disciplinas <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
			</div>
			<div class="separ-vtn">
				 <a href="{{ url('/nosotros') }}">Nosotros <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
			</div>
	</div>
@endsection
	