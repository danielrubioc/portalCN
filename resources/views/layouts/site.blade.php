<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Corporación del Deporte Cerro Navia</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet">
    <!--title font-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
</head>
<body>
    <div id="app">

      <div id="mySidenav" class="sidenav visible-xs" >
        @if(Auth::user())
            <a href="{{ url('/dashboard') }}" class="left-input"><i class="fa fa-user-o" aria-hidden="true"></i>Administrador</a>
            @else
           <a href="{{ route('login') }}" class="left-input"><i class="fa fa-user-o" aria-hidden="true"></i>Ingresa aquí</a>
        @endif
        
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="space-menu">
          <a href="{{ url('/') }}">
            <img src="{{url('/images/Logo_Deporte-17.png')}}" >
          </a>
        </div>
        <div class="buttons">
          <a href="{{ url('/nosotros') }}">Nosotros <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('/disciplinas') }}">Disciplinas <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('publicaciones/eventos') }}">Evento <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('publicaciones/tercer-tiempo') }}">Tercer Tiempo <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('/contacto') }}">Contacto <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ route('register') }}">Inscríbete ahora <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
        </div>
      </div>

       
      <div id="main"> 
        <!-- Use any element to open the sidenav -->
        <div class="fixed-menu visible-xs navbar-fixed-top">
            <div class="container order-nav">
                <div class="icon-menu" onclick="openNav()">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </div>
                <div class="icon-corporative"> 
                  <a href="{{ url('/') }}">
                    <img src="{{url('/images/Logo_Deporte-17.png')}}" class="img-responsive" >   
                  </a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-default navbar-fixed-top hidden-xs">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand img-responsive" href="{{ url('/') }}">
                <img src="{{url('/images/Logo_Deporte-17.png')}}" >
              </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-desktop" id="bs-example-navbar-collapse-1">
             
 
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('/nosotros') }}">Nosotros </a></li>
                <li><a href="{{ url('/disciplinas') }}">Disciplinas </a></li>
                <li><a href="{{ url('publicaciones/eventos') }}">Eventos </a></li>
                <li><a href="{{ url('publicaciones/tercer-tiempo') }}">Tercer Tiempo </a></li>
                <li> <a href="{{ url('/contacto') }}">Contacto </a></li>
                <li class="registrate"><a href="{{ route('register') }}">Registrate </a></li>
                <li><a href="{{ route('register') }}">Login </a></li>

<!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li>
-->
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        @yield('content')

        
      </div>  

    </div>
    <!--
    <footer>
      
    </footer>
    -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

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
    <!--  sliders -->
    @yield('slider-owl')
    <!-- selector multiple -->
    @yield('inputHasContent')

    @yield('facebook')
</body>
</html>
