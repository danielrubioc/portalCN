<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deportes Cerro Navia') }} site</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheets.css') }}" rel="stylesheet">
    <!--title font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300i,400,700,800,800i" rel="stylesheet">
</head>
<body>
    <div id="app">

      <div id="mySidenav" class="sidenav">
        <a href="{{ route('login') }}" class="left-input"><i class="fa fa-user-o" aria-hidden="true"></i>Ingresa aquí</a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
        <div class="space-menu">
          <a href="{{ url('/') }}">
            <img src="{{url('/images/Logo_Deporte-17.png')}}" >
          </a>
        </div>
        <div class="buttons">
          <a href="#">Nosotros <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="#">Disciplina <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="#">Evento <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('/tercer-tiempo') }}">Tercer Tiempo <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ url('/contacto') }}">Contacto <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
          <a href="{{ route('register') }}">Inscríbete ahora <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
        </div>
      </div>

       
      <div id="main"> 
        <!-- Use any element to open the sidenav -->
        <div class="fixed-menu">
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

        @yield('content')

        <footer>
            <div class="btn-register-taller">
                <a href="registro/create">Inscríbete ahora <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span></a>
            </div>
        </footer>  
      </div>  

    </div>

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
</body>
</html>
