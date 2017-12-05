<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tienda UPQROO') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">

    <link rel="stylesheet" href="/css/app.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{url('/iconos/laptop-icon.png')}}"> <span></span>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <a href="{{url('/aviso')}}" class="btn" role="Button">Aviso</a>
                                <a href="{{url('/condiciones')}}" class="btn" role="Button">Condiciones</a>

                        <!-- Authentication Links -->
                        <li>
                            <a href="{{url('/carrito')}}">
                                Carrito
                                <span class ="circle-shopping-cart">
                               {{$productsCount}}

                                </span> 
                                </a>

                        </li>

                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Iniciar</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>      
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>


    <footer>
    
        
    <div class="container">
        <div class="row">
        <div class="col-md-12 widget">
                <a href="{{url('/condiciones')}}" title="">Terminos y Condiciones</a> 
                <a href="{{url('/aviso')}}" title="">Aviso de Privacidad</a>
        </div>
         </div>
        </div>

    </footer>



        
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"> </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
    


    <script>
        $.material.init();
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
