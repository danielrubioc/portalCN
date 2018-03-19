@extends('layouts.site')

@section('content')
	<div class="main-talleres">
        <span class="hidden-xs">
            <div class="container content-workshop">
                
                <div class="col-md-12 title-posts">
                                    <span><strong>Aviso importante:</strong> los cursos y disciplinas de la temporada 2018 estarán disponibles en marzo, una vez disponibles podrás inscribirte </span>

                    <h1>Disciplinas</h1>
                </div>

                <div class="container workshop-all">
                    <div class="info-taller">
                        
                            <div id="workshop-modify-container">
                                    @foreach ($workshops as $key => $taller)
                                        <div class="col-xs-3 col-md-3">
                                            <div class="item-disc " data-owl="{{$key}}">
                                                <a href="{{ url('/disciplina') }}/{{$taller->url}}">
                                                    <div class="img-disc-all">
                                                        <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                                    </div>
                                                </a>
                                                
                                                <div class="info-detail">
                                                    <h2>{!! $taller->name !!}</h2>
                                                    <p>{!! str_limit($taller->description, 80) !!}</p>
                                                    <div class="suscrit-regis">
                                                        <span>Próxima clase</span>
                                                        <span>@if ($taller->lessonsBeforeRecord()->first()['date'])
                                                                    {{ date('d-m-Y', strtotime($taller->lessonsBeforeRecord()->first()['date']))  }}
                                                                    @else
                                                                    No hay clases
                                                                @endif 
                                                        </span>

                                                    </div>
                                                    <div class="view-regis">
                                                        <span><a href="{{ url('/disciplina') }}/{{$taller->url}}">Ver más</a></span>
                                                        <span><a href="{{ url('/disciplina') }}/{{$taller->url}}">Inscríbete</a></span>

                                                    </div>
                                                </div> 
                                            </div>   
                                        </div>
                                    @endforeach   
                            </div>
                        
                    </div>
                    <div class="col-md-12 pagination-work">
                        {{ $workshops->links() }}
                    </div>
                

                </div>
            </div>
        </span>
            <!--mobil-->

            <span class="visible-xs">
                <div class="search-open">

                        <button class="search-button clickable-out"><i class="fa fa-times" aria-hidden="true"></i> </button>
                       
                        <br>

                        <div class="content-info-search">
                             <p >Busca por nombre de disciplina</p>
                            <form class="form-inline my-2 my-lg-0 col-md-4" method="GET" action="{{ action('HomeController@workshopsAll') }}">
                                <input class="form-control mr-sm-2" type="search" name="title" placeholder="Busca por titulo" aria-label="Search">
                                <br>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </form>
                        </div>
                    
                </div>
                <div class="container workshop-all">
                    <h1>Disciplinas</h1>
                    <div class="info-taller">
                        
                            <div id="workshop-modify-container-l">
                                    @foreach ($workshops as $key => $taller)
                                        <div class="col-md-6 col-sm-6 col-xs-6 element-work" style="padding: 0;margin-bottom: 50px;">
                                            <div class="item-work " data-owl="{{$key}}">
                                                <a href="{{ url('/disciplina') }}/{{$taller->url}}">
                                            	   <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                                </a>
                                                <p>{!! $taller->name !!}</p>
                                                <a href="{{ url('/disciplina') }}/{{$taller->url}}" class="btn-ir-taller" style=" background: {{$taller->color}}">Ingresa</a>

                                            </div>   
                                        </div>
                                    @endforeach   
                            </div>
                        
                    </div>
                    <div class="col-md-12 pagination-work">
                        {{ $workshops->links() }}
                    </div>
                

                </div>

            </span>

    </div>
@section('slider-owl')
<script type="text/javascript">
$(".clickable").click(function() {  //use a class, since your ID gets mangled
    $(".search-open").addClass("active");      //add the class to the clicked element
});
$(".clickable-out").click(function() {  //use a class, since your ID gets mangled
    $(".search-open").removeClass("active");      //add the class to the clicked element
});

</script>
@stop
@endsection
