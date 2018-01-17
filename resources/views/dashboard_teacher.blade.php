@extends('layouts.app')

@section('content')
<div class="container"> 
    
    

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
@endsection
