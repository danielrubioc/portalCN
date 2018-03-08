@extends('layouts.app')

@section('content')
<span class="visible-xs">
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
                    <ul class="nav navbar-nav">
                        <li><a href="">Mis Talleres</a></li>
                        <li><a href="">Estadísticas</a></li>
                        <li class="to-site"><a href="{{ URL::to('/') }}">Ir a sitio web</a></li>
                    </ul>
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
</span>


<span class="hidden-xs">
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
                    <ul class="nav navbar-nav">
                        <li><a href="">Mis Talleres</a></li>
                        <li><a href="">Estadísticas</a></li>
                        <li class="to-site"><a href="{{ URL::to('/') }}">Ir a sitio web</a></li>
                    </ul>
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
</span>



@endsection
