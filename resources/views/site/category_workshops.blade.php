@extends('layouts.site')
@section('title',  'Categorías de talleres' )
@section('content')
<style type="text/css">
#app {
    overflow: inherit!important;
}
</style>

	<div class="main-talleres categorias">
            
            <div class="container">
                <div class="col-md-12 title-posts"><h1>Categorías de talleres</h1></div>
                <div class="content-total tallers">
                    <h2></h2>
                </div>
            
                <div class="content-category">

                    @foreach ($categories as $key => $category)

                    <div class="col-xs-6 col-md-3">
                        <div class="item-disc item-category" data-owl="{{$key}}">
                            <a href="{{ url('/disciplinas') }}/{{$category->url}}">
                                <div class="img-disc-all">
                                    <img src="{{url('/uploads/workshopCategories')}}/{{ $category->image }}" class="img-responsive">
                                </div>
                            </a>
                            <div class="info-detail detail-category">
                                <h2 class="hidden-xs">{!! $category->name !!}</h2>
                                <div class="view-regis">
                                    <span class="hidden-xs vm-category"><a href="{{ url('/disciplinas') }}/{{$category->url}}">Ver más</a></span> 
                                </div>
                            </div> 
                            <p class="visible-xs name-cagtegory-mv">{!! $category->name !!} </p>
                            <a href="{{ url('/disciplinas') }}/{{$category->url}}" class="btn-ir-taller visible-xs btn-category-mv" style="background: rgb(226, 120, 157);">Ingresa</a>
                        </div>   
                    </div>
                    @endforeach

                </div>
                {{ $categories->links() }}
            </div>    
    </div>
    <!--
    <div class="block-button-taller">
         <a href="{{ url('/disciplinas') }}"> Ver todas las disciplinas</a>
    </div>
    -->
@section('slider-owl')

<script>
  
</script>
@stop

@endsection
