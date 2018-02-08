@extends('layouts.site')

@section('content')
<style type="text/css">
#app {
    overflow: inherit!important;
}
</style>
<!--mobil-->
	<div class="main-talleres">
            <div class="content-total tallers">
                <h2>Últimas 5 disciplinas</h2>
                <p><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Desliza para ver <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
            </div>
          

            <span class="visible-xs">
                <div class="info-taller">
                    <div id="workshop-modify-container">
                        <div class="owl-carousel owl-theme content-gallery">
                            @foreach ($workshops as $key => $taller)

                                <div class="item" data-owl="{{$key}}">
                                    <img src="{{url('/uploads/workshop')}}/{{$taller->cover_page}}" class="img-responsive">
                                    
                                    <a href="{{ url('/disciplina') }}/{{$taller->url}}" class="btn-ir-taller btn-taller-home" style=" background: {{$taller->color}}">Ingresa</a>

                                </div>    
                            @endforeach
                        </div>     
                    </div>

                </div>
            </span>

    </div>
    <div class="block-button-taller">
         <a href="{{ url('/disciplinas') }}"> Ver todas las disciplinas</a>
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
