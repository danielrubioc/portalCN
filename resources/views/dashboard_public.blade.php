@extends('layouts.app')

@section('content')
<div class="container-fluid">   

    <div class="content-total">
        <p>Mis Talleres</p>
    </div>

    <div class="mis-talleres">
    @foreach ($my_workshops as $key => $taller)

        <div class="col-xs-3">
            <!--<h2 style="color: {{$taller->color}}">{{ $taller->name }}</h2>-->
            <br>
            <img class="img-responsive" src="/uploads/workshop/{{ $taller->cover_page}}">
        </div>

    @endforeach
    </div>

           

</div>
<br><br><br><br><br><br>
@if(Auth::user())
        @if (Auth::user()->role_id == 3)
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
                    <h1>{{ $taller->name }}</h1>
                    <img src="/uploads/workshop/{{ $taller->cover_page}}">
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
                                    <h1>{{ $taller->name }}</h1>
                                    <img src="/uploads/workshop/{{ $taller->cover_page}}">
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
            </span>
            



        

       

    @endif
@endif



@section('slider-owl')
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: false,
        autoplay: false,
        items: 1,
        animateOut: 'fadeOut',
        slideSpeed : 3300,
        paginationSpeed : 3000,

    });


    owl.on('drag.owl.carousel', function(event) {
        var currentItem = event.item.index;
        var src = $(event.target).find(".owl-item").eq(currentItem).find("div");

        $(event.target).find(".owl-item").eq(currentItem+1).addClass('featured');
        $(event.target).find(".owl-item").eq(currentItem).addClass('in-move');

        $('.info-taller').removeClass('active-clicked'); 
        $('.text-related-workshop').removeClass('active-clicked');
        $('.content-gallery').removeClass('active-clicked'); 
        $('#workshop-modify-container').removeClass('active-clicked');
        $('.item img').removeClass('active-clicked');
       
    });
    owl.on('dragged.owl.carousel', function(event) {
        var currentItem = event.item.index;
        $(event.target).find(".owl-item").eq(currentItem+1).removeClass('in-move');
        $(event.target).find(".owl-item").eq(currentItem+1).removeClass('featured');
        $('.visibility-content').removeClass('active-clicked');
       
    });

    owl.on('changed.owl.carousel', function(event) {
        var currentItem = event.item.index;
        //remuevo 
        $(event.target).find(".owl-item").eq(currentItem).removeClass('featured');
        $(event.target).find(".owl-item").eq(currentItem).removeClass('in-move');

       
    });


    var clickeado = false;
    $(document).on('click', '.item', function(){
        var id = $(this).attr('data-owl');
        if (!clickeado) {    

            n = $(this).index();
            $('.info-taller').addClass('active-clicked'); 
            $('.text-related-workshop').addClass('active-clicked');
            $('.content-gallery').addClass('active-clicked'); 
            $('#workshop-modify-container').addClass('active-clicked');
            $('.item img').addClass('active-clicked');
            $('#content-workshop-'+id).addClass('active-clicked');
            clickeado = true;

        } else {
            clickeado = false;
            $owl = $(".owl-carousel");
            $owl.trigger("refresh.owl.carousel");
            n = $(this).index();
            $('#content-workshop-'+id).removeClass('active-clicked');
            $('.info-taller').removeClass('active-clicked'); 
            $('.text-related-workshop').removeClass('active-clicked');
            $('.content-gallery').removeClass('active-clicked'); 
            $('#workshop-modify-container').removeClass('active-clicked');
            $('.item img').removeClass('active-clicked');
        }   

            
    });

</script>
@stop
@endsection
