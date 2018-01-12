@extends('layouts.site')

@section('content')
	<div class="main-talleres">
        <div class="flotant-button">
            <button class="search-button clickable"><i class="fa fa-search" aria-hidden="true"></i> </button>
        </div>
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

            <!--mobil-->

            <span class="visible-xs">

                <div class="container workshop-all">
                    <h1>Disciplinas</h1>
                    <div class="info-taller">
                        
                            <div id="workshop-modify-container">
                                    @foreach ($workshops as $key => $taller)
                                        <div class="col-xs-6 no-padding">
                                            <div class="item-work " data-owl="{{$key}}">
                                            	<img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
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