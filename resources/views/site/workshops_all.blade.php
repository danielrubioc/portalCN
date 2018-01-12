@extends('layouts.site')

@section('content')
	<div class="main-talleres">
			<div class="content-total">
                <p>Un total de {{ $workshops->total() }} Talleres disponibles</p>
            </div>
            <span class="hidden-xs">

            <ul><li style="position: absolute; left: 0px; top: 0px;">
                        <figure>
                            <img src="img/thumb/1.png" alt="img01">
                            <figcaption><h3>Letterpress asymmetrical</h3><p>Chillwave hoodie ea gentrify aute sriracha consequat.</p></figcaption>
                        </figure>
                    </li></ul>
            @foreach ($workshops as $key => $taller)

                <div class="item" data-owl="{{$key}}">
                    <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                </div>



            @endforeach
            
            <div class="col-md-12">
                {{ $workshops->links() }}
            </div>
            </span>

            <!--mobil-->

            <span class="visible-xs">
                <div class="info-taller">
                    <div id="workshop-modify-container">
                        <div class="owl-carousel owl-theme content-gallery">
                            @foreach ($workshops as $key => $taller)

                                <div class="item" data-owl="{{$key}}">
                                	<img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                </div>    
                            @endforeach
                        </div>     
                    </div>
                    <div class="text-related-workshop" >
                        <div class="relative-conten">
                        @foreach ($workshops as $key => $tall)

                           
                                <span id="content-workshop-{{$key}}" class="visibility-content">
                                    <h3>{{ $tall->name }}</h1>
                                    <span class="info-detail-work">
                                        <p>Cantidad de cupos:  {{ $tall->quotas }}</p>
                                        <p>Profesor(es) a cargo:
                                            <ul>
                                                @foreach ($tall->teachers as  $teacher)

                                                    <li>{{ $teacher->name }} {{ $teacher->last_name }}</li>
                                                @endforeach
                                            </ul>
                                        </p>
                                    </span>
                                    <a href="" class="btn btn-info btn-edit-style" data-toggle="tooltip" title="Editar">
                                        Inscribete
                                    </a>   
                                    
                                </span>

                                   
                       
                        @endforeach
                        </div> 
                    </div>
                </div>
                <div class="col-md-12">
                    {{ $workshops->links() }}
                </div>
                
            </span>

    </div>

@endsection
