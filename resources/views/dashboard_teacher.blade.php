@extends('layouts.app')

@section('content')

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
    
@endsection
