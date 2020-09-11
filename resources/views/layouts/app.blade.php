<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!--<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/estilo.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">
    <link href="/css/aos.css" rel="stylesheet" type="text/css">
    <link href="/css/animacion.css" rel="stylesheet" type="text/css">


    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->

    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/animacion.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

    
    
</head>
<body>
    <div id="app" >
        <nav class=" navbar navbar-expand-md navbar-dark" style="background-color:#f18835;z-index:99;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!--{{ config('app.name', 'Laravel') }}-->
                    <img style="width: 300px;" src="/images/logo-blanco.png">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
 {!! Form::open(['route' => 'resultados', 'method' => 'GET','class' => 'form-inline my-2 my-lg-0','role' => 'search']) !!}
          <div class="input-group ">
            <!--<div class="input-group-prepend">
              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" style="background-color:#262C60;color:white;" aria-haspopup="true" aria-expanded="false">Categorias</button>
              <div class="dropdown-menu">
            
                  <a class="dropdown-item" href="#">categoria1</a>
               
              </div>
            </div>-->
           
            <!--<input type="text" class="form-control" placeholder="Busca un libro, género o autor/a" aria-label="Text input with dropdown button">-->
            {!! Form::text('name', null, ['class' => 'form-control form-buscar-blanco-inicio', 'placeholder' => 'Busca un libro, género o autor/a']) !!}
              <div class="input-group-append">
                <button class="btn" style="background-color: white;color:#262C60;" type="submit" ><i class="fas fa-search"></i></button>
              </div>
               
          </div>
         {!! Form::close() !!}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        
                        @guest
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('libros') }}">Libros</a></li>                                  
                            <!--<li class="nav-item"><a class="nav-link" href="#">Conoce más</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="http://www.palabralab.com/" target="_blank">Palabralab</a></li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            <!--@if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif-->
                        @else
                            <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('libros') }}">Libros</a></li>                                                 
                            <!--<li class="nav-item"><a class="nav-link" href="#">Conoce más</a></li>-->
                            <li class="nav-item"><a class="nav-link" href="http://www.palabralab.com/" target="_blank">Palabralab</a></li>
                             
                            <li class="nav-item dropdown submenu-principal">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fas fa-user"></i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <h5>Panel de control</h5>
                                    <a class="dropdown-item" href="{{ route('notificacion') }}"><i class="fas fa-bell"></i> Notificaciones</a>
                                    <a class="dropdown-item" href="{{ route('pedidos') }}"><i class="fas fa-user"></i> Solicitudes</a>
                                    <a class="dropdown-item" href="{{ route('biblioteca') }}"><i class="fas fa-book"></i> Mi Biblioteca</a>
                                    <a class="dropdown-item" href="{{ route('subirlibros') }}"><i class="fas fa-comments"></i> Subir Libro</a>
                                    <a class="dropdown-item" href="/messages"><i class="fas fa-book-reader"></i> Mensajes @include('messenger.unread-count')</a>
                                    <div class="dropdown-divider"></div>
                                    <h5>Más</h5>
                                    <a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-user"></i> Perfil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Salir') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>                       
                        @endguest
                            <!--<li>
                                {!! Form::open(['route' => 'resultados', 'method' => 'GET','class' => 'form-inline my-2 my-lg-0','role' => 'search']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control mr-sm-1 form-buscar-blanco', 'placeholder' => 'Busca un libro, género o autor/a']) !!}
                                    
                                  <button class="btn my-2 my-sm-0 btn-iniciosesion-3" type="submit"><i class="fas fa-search"></i></button>
                                {!! Form::close() !!}
                            </li>-->
                    </ul>
                </div>
            </div>
        </nav>

        <!--<main class="py-4">-->
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>
