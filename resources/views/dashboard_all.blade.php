@extends('layouts.app')

@section('content')

    <div class="dashboard-main">
        <div class="container">   
            @if(Auth::user())

                @if (Auth::user()->hasRole->name == 'admin')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('users') }}">Usuarios</a></li>
                        <li><a href="{{ URL::to('categories') }}">Categorías blog</a></li>
                        <li><a href="{{ URL::to('posts') }}">Blog</a></li>
                        <li><a href="{{ URL::to('tags') }}">Tags</a></li>
                        <li><a href="{{ URL::to('workshops') }}">Talleres</a></li>
                        <li><a href="{{ URL::to('banners') }}">Banners</a></li>
                        <li class="to-site"><a href="{{ URL::to('/') }}">Ir a sitio web</a></li>
                    </ul>
                @endif
                @if (Auth::user()->hasRole->name == 'teacher')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('workshops') }}">Talleres</a></li>
                        <li class="to-site"><a href="{{ URL::to('/') }}">Ir a sitio web</a></li>
                    </ul>

                @endif
                @if (Auth::user()->hasRole->name == 'public')
                    <div class="containt-workshops-public">
                        <h1>Talleres inscritos</h1>
                        <p>Un total de  {{ count($workshops)}} talleres</p>
                        <div id="workshop-modify-container col-md-6">
                            <div class="info-welcome">
                                <h2>Bienvenido</h2>
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                        </div>
                        <div id="workshop-modify-container col-md-6">
                            @foreach ($workshops as $key => $taller)
                                <div class="col-md-4 max-heigh-susc">
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

                                        </div> 
                                    </div>   
                                </div>
                            @endforeach   
                        </div>
                    </div>
                @endif
                @if (Auth::user()->hasRole->name == 'publisher')
                    <ul class="nav navbar-nav">
                        <li><a href="{{ URL::to('categories') }}">Categorías blog</a></li>
                        <li><a href="{{ URL::to('posts') }}">Blog</a></li>
                        <li><a href="{{ URL::to('tags') }}">Tags</a></li>
                        <li><a href="{{ URL::to('banners') }}">Banners</a></li>
                        <li class="to-site"><a href="{{ URL::to('/') }}">Ir a sitio web</a></li>
                    </ul>
                @endif
            @endif

        </div>
    </div>



@endsection
