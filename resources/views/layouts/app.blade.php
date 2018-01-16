<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deportes Cerro Navia') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheets-app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <span class="hidden-xs">
        <nav class="navbar navbar-default navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @if(Auth::user())
                        <a class="navbar-brand" href="{{ url('/dashboard') }}">
                            <img src="{{url('/images/Logo_Deporte-17.png')}}" style="height: 50px; margin-top: -15px;">
                        </a>
                        @else
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{url('/images/Logo_Deporte-17.png')}}" style="height: 50px; margin-top: -15px;">
                        </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav align-element-nav">
                        @if(Auth::user())
                            @if (Auth::user()->role_id == 1)
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ URL::to('users') }}">Usuarios</a></li>
                                    <li><a href="{{ URL::to('categories') }}">Categorías blog</a></li>
                                    <li><a href="{{ URL::to('posts') }}">Blog</a></li>
                                    <li><a href="{{ URL::to('tags') }}">Tags</a></li>
                                    <li><a href="{{ URL::to('workshops') }}">Talleres</a></li>
                                </ul>
                            @endif
                            @if (Auth::user()->role_id == 2)
                                <ul class="nav navbar-nav">
                                    <li><a href="{{ URL::to('categories') }}">Categorías blog</a></li>
                                    <li><a href="{{ URL::to('posts') }}">Blog</a></li>
                                    <li><a href="{{ URL::to('tags') }}">Tags</a></li>
                                    <li><a href="{{ URL::to('workshops') }}">Talleres</a></li>
                                </ul>

                            @endif
                            @if (Auth::user()->role_id == 3)
                                <ul class="nav navbar-nav">
                                    <li><a href="">Mis Talleres</a></li>
                                    <li><a href="">Estadísticas</a></li>
                                </ul>

                            @endif
                        @endif
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                        @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registro</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">
                                   
                                    <img src="{{url('/uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:25px; height:25px; position:absolute; top:7px; left:10px; border-radius:50%"> <span style="padding-left: 25px;">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/profile')}}"> Mi perfil </span></a>
                                    </li>
                                    <li role="presentation" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
        </span>
        <span class="visible-xs">
            <div id="mySidenav" class="sidenav">
                @if(Auth::user())
                <a href="{{ url('/profile')}}" class="left-input"><img src="{{url('/uploads/avatars')}}/{{ Auth::user()->avatar }}" style="width:25px; height:25px; position:absolute; top:7px; left:10px; border-radius:50%"> <span>Mi perfil</a>
                @endif
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
                <div class="space-menu">
                    <a href="{{ url('/dashboard') }}">
                        <h3>Administrador</h3>
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
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Cerrar sesión <span>  <i class="fa fa-sign-out"></i> </span>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
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
                    @endif
                    @guest
                        <a href="{{ route('login') }}">Ingresar</a>
                        <a href="{{ route('register') }}">Registro</a>
                        <a href="{{ URL::to('/') }}">Volver a sitio</a>
                    @endif
                  
                </div>
            </div>
        

            <div class="fixed-menu">
                <div class="container order-nav">
                    <div class="icon-menu" onclick="openNav()">
                      <div class="bar1"></div>
                      <div class="bar2"></div>
                      <div class="bar3"></div>
                    </div>
                    <div class="icon-corporative"> 
                      <a href="{{ url('/') }}">
                        <h3>Administrador</h3>  
                      </a>
                    </div>
                </div>
            </div>
        </span>
        <div id="main">
            <div class="container">
                @include('flash::message')
            </div>
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- selector multiple -->
    @yield('select2')
    <!--  editor de texto -->
    @yield('ckeditor')
    <!--  sliders -->
    @yield('slider-owl')
    <script>
        $('#flash-overlay-modal').modal();
    </script>

     <script type="text/javascript">

        function openNav() {
            document.getElementById("mySidenav").classList.add('margin-nav');
            document.getElementById("main").classList.add('margin-nav');
            document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
        function closeNav() {
            document.getElementById("mySidenav").classList.remove('margin-nav');
            document.getElementById("main").classList.remove('margin-nav');
            document.body.style.backgroundColor = "white";
        }

    </script>

    
</body>
</html>
