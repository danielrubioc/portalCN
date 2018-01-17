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
<div id="mySidenav" class="sidenav visible-xs" style="margin-left:0">
                @if(Auth::user())
                <a href="{{ url('/profile')}}" class="left-input"><img src="{{url('/uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:25px; height:25px; position:absolute; top:7px; left:10px; border-radius:50%"> <span>Mi perfil</a>
                @endif
                <a href="{{ url('/')}}" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
                <div class="space-menu">
                    <a href="{{ url('/') }}">
                    @if(Auth::user())
                        <h3>{{ Auth::user()->name }}</h3>
                    @endif
                    </a>
                </div>
                <div class="buttons">
                    @if(Auth::user())
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ URL::to('users') }}">Usuarios <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            <a href="{{ URL::to('categories') }}">Categorías blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            <a href="{{ URL::to('posts') }}">Blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            <a href="{{ URL::to('tags') }}">Tags <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            <a href="{{ URL::to('workshops') }}">Talleres <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            
                        @endif
                        @if (Auth::user()->role_id == 2)
                                <a href="{{ URL::to('categories') }}">Categorías blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                                <a href="{{ URL::to('posts') }}">Blog <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                                <a href="{{ URL::to('tags') }}">Tags <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                                <a href="{{ URL::to('workshops') }}">Talleres <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                        @endif
                        @if (Auth::user()->role_id == 3)
                            <ul class="nav navbar-nav">
                                <a href="">Mis Talleres <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                                <a href="">Estadísticas <span> <i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
                            </ul>

                        @endif
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Cerrar sesión <span>  <i class="fa fa-sign-out"></i> </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                    @endif
                    @guest
                        <a href="{{ route('login') }}">Ingresar</a>
                        <a href="{{ route('register') }}">Registro</a>
                        <a href="{{ URL::to('/') }}">Volver a sitio</a>
                    @endif
                  
        </div>
</div>



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
