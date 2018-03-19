@extends('layouts.app')

@section('content')

    <div class="dashboard-main">
        <div class="container">   
             <h1>Talleres inscritos</h1>
                <p>Un total de  {{ count($workshops)}} talleres</p>
                @if (count($workshops) == 0)
                    <p>No estás inscrito a ningún taller</p>
                @endif

                @foreach ($workshops as $key => $taller)
                    <div class="col-md-4 max-heigh-susc">
                        <div class="item-disc " data-owl="{{$key}}">
                            <div class="img-disc-all">
                                <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                            </div>
                            <div class="info-detail">
                                <h2>{{$taller->name}}</h2> 
                                <p><strong>Clases disponibles:</strong> {{count($taller->lessons)}}</p>
                                <p><strong>Próxima clase:</strong> 
                                    @if ($taller->lessonsBeforeRecord()->first()['date'])
                                        {{ date('d-m-Y', strtotime($taller->lessonsBeforeRecord()->first()['date']))  }}  a las {{ $taller->lessonsBeforeRecord()->first()['hour']  }} hrs.
                                        @else
                                        No hay clases disponibles
                                    @endif
                                </p>

                                <p><strong>Profesor(es): </strong>
                                    <ul style="text-align: left;">
                                    @if($taller->teachers)
                                        @foreach ($taller->teachers as $key => $teacher)
                                            <li>{{ $teacher->name}} {{ $teacher->last_name}}</li>
                                        @endforeach  
                                    @else
                                        <li>No hay profesor asignado</li>
                                    @endif
                                    </ul>
                                </p>
                            </div> 
                        </div>   
                    </div>
                @endforeach  
            <div class="col-md-12">
                {{ $workshops->links() }}
            </div>    
        </div>
    </div>



@endsection
