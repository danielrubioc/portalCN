@extends('layouts.app')

@section('content')

    <div class="dashboard-main">
        <div class="container">   
            @if(Auth::user())

                @if (Auth::user()->hasRole->name == 'admin')
                    <div class="workshop-modify-container col-md-4">
                        <div class="info-welcome">
                            <h2>Bienvenido</h2>
                            <h3>{{ Auth::user()->name }} 
                                    <img src="{{url('/images/66t261gs.png')}}" class="img-responsive">
                            </h3>
                            <p>Si tienes alguna duda contáctanos al correo contacto@deportescerronavia.cl para mayor información</p>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->hasRole->name == 'teacher')
                    <div class="containt-workshops-public">
                        
                        <div class="workshop-modify-container col-md-4">
                            <div class="info-welcome">
                                <h2>Bienvenido</h2>
                                <h3>{{ Auth::user()->name }} 
                                        <img src="{{url('/images/66t261gs.png')}}" class="img-responsive">
                                </h3>
                                <p>Si tienes alguna duda respecto a tus cursos porfavor contáctanos al correo contacto@deportescerronavia.cl para mayor información</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1>Talleres asignados</h1>
                            <p>Un total de  {{ count($workshops)}} talleres</p>
                            @foreach ($workshops as $key => $taller)
                                <div class="col-md-6 max-heigh-susc">
                                    <div class="item-disc " data-owl="{{$key}}">
                                        <div class="img-disc-all">
                                            <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                        </div>
                                        <div class="info-detail">
                                            <h2>{{$taller->name}}</h2> 
                                            <p><strong>Profesores(as):</strong> 
                                            <ul>
                                                @foreach ($taller->teachers as $techer)
                                                    <li>{{ $techer->name }} {{ $techer->last_name }}</li>
                                                @endforeach   
                                            </ul>
                                            </p>
                                            
                                        </div> 
                                    </div>   
                                </div>
                            @endforeach   
                            <div class="col-md-12">
                                @if (count($workshops) > 0)
                                    <a href="{{ URL::to('workshops') }}" class="btn btn-success btn-create-gral">ver todos</a>
                                @endif
                            </div> 
                        </div>
                    </div>

                @endif
                @if (Auth::user()->hasRole->name == 'public')
                    <div class="containt-workshops-public">
                        
                        <div class="workshop-modify-container col-md-4">
                            <div class="info-welcome">
                                <h2>Bienvenido</h2>
                                <h3>{{ Auth::user()->name }} 
                                        <img src="{{url('/images/66t261gs.png')}}" class="img-responsive">
                                </h3>
                                <p>Si tienes alguna duda respecto a tus cursos porfavor contáctanos al correo contacto@deportescerronavia.cl para mayor información</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1>Últimos Talleres inscritos</h1>
                            @foreach ($workshops as $key => $taller)
                                <div class="col-md-6 max-heigh-susc">
                                    <div class="item-disc " data-owl="{{$key}}">
                                        <div class="img-disc-all">
                                            <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                        </div>
                                        <div class="info-detail">
                                            <h2>{{$taller->name}}</h2> 
                                            <p><strong>Profesores(as):</strong> 
                                            <ul>
                                                @foreach ($taller->teachers as $techer)
                                                    <li>{{ $techer->name }} {{ $techer->last_name }}</li>
                                                @endforeach   
                                            </ul>
                                            </p>
                                            <p><strong>Clases disponibles:</strong> {{count($taller->lessons)}}</p>
                                             <p><strong>Próxima clase:</strong> 
                                                {{ date('d-m-Y', strtotime($taller->lessonsBeforeRecord()->first()['date']))  }}
                                            </p>
                                        </div> 
                                    </div>   
                                </div>
                            @endforeach  
                            <div class="col-md-12">
                                @if (count($workshops) > 0)
                                    <a href="{{ route('home.viewWorkshopsIns') }}" class="btn btn-success btn-create-gral">ver todos</a>
                                @endif
                            </div> 
                        </div>
                    </div>
                @endif
                @if (Auth::user()->hasRole->name == 'publisher')
                    <div class="containt-workshops-public">
                        
                        <div class="workshop-modify-container col-md-4">
                            <div class="info-welcome">
                                <h2>Bienvenido</h2>
                                <h3>{{ Auth::user()->name }} 
                                        <img src="{{url('/images/66t261gs.png')}}" class="img-responsive">
                                </h3>
                                <p>Si tienes alguna duda contáctanos al correo contacto@deportescerronavia.cl para mayor información</p>
                            </div>
                        </div>
                        
                    </div>
                @endif
            @endif

        </div>
    </div>



@endsection
