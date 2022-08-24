<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/fav.png" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css">

    <title>{{ config('app.name', 'Futmondo Sage') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <!--Wrapper Start-->
    <div class="wrapper">
        <!--Header Start-->
        <header id="main-header" class="main-header">
            <!--topbar-->
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <ul class="toplinks">
                                @guest
                                    @if (Route::has('login'))
                                        <li class="acctount-btn"> <a href="{{ route('login') }}">{{ __('Login') }}</a> </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="acctount-btn"> <a href="{{ route('register') }}">{{ __('Register') }}</a> </li>
                                    @endif
                                @else
                                    <li class="acctount-btn"> <a href="#"> {{ Auth::user()->name }} </a></li>
                                    <li class="acctount-btn"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--topbar end--> 
            <!--Logo + Navbar Start-->
            <div class="logo-navbar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-5">
                            <div class="logo"><a href="{{ url('/') }}"><img src="../images/ftmndLogo.png" alt=""></a></div>
                        </div>
                        <div class="col-md-10 col-sm-7">
                            <nav class="main-nav">
                                <ul>
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/') }}">Inicio</a>
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/home') }}">Clasificación</a>
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/equipos') }}">Equipos</a>
                                        @if( isset($teams) )
                                        <ul>
                                            @foreach($teams as $team)
                                            <li><a style="line-height: 30px;" href="{{ url('/equipo') }}/{{$team->Id}}">{{$team->Nombre}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/entrenadores') }}">Entrenadores</a>
                                        @if( isset($coaches) )
                                        <ul>
                                            @foreach($coaches as $coach)
                                            <li><a style="line-height: 30px;" href="{{ url('/entrenador') }}/{{$coach->Id}}">{{$coach->Entrenador}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/noticias') }}">Noticias</a>
                                    </li>
                                    <li class="nav-item drop-down">
                                        <a href="">Otras temporadas</a>
                                        <ul>
                                            <li><a href="{{ url('/temporada') }}/21">Temporada 21-22</a></li>
                                            <li><a href="{{ url('/temporada') }}/20">Temporada 20-21</a></li>
                                            <li><a href="{{ url('/temporada') }}/19">Temporada 19-20</a></li>
                                            <li><a href="{{ url('/temporada') }}/18">Temporada 18-19</a></li>
                                            <li><a href="{{ url('/temporada') }}/C18">Temporada 18-19 Cartagena</a></li>
                                            <li><a href="{{ url('/temporada') }}/17">Temporada 17-18</a></li>
                                            <li><a href="{{ url('/temporada') }}/C17">Temporada 17-18 Cartagena</a></li>
                                            <li><a href="{{ url('/temporada') }}/16">Temporada 16-17</a></li>
                                            <li><a href="{{ url('/temporada') }}/15">Temporada 15-16</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--Logo + Navbar End--> 
        </header>
        <!--Header End--> 
        <main class="py-4">
            @yield('content')
        </main>
        <!--Main Footer Start-->
        <footer class="wf100 main-footer">
            <div class="container brtop">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <p class="copyr"> All Rights Reserved of Sports © 2020, Design & Developed By: <a href="https://oliverporras.com">OliverPorras</a> </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="quick-links">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('/home') }}">Clasificación</a></li>
                            <li><a href="{{ url('/equipos') }}">Equipos</a></li>
                            <li><a href="{{ url('/entrenadores') }}">Entrenadores</a></li>
                            <li><a href="{{ url('/noticias') }}">Noticias</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--Main Footer End--> 
    </div>
    <!--Wrapper End--> 
    <!-- Optional JavaScript --> 
    <script src="../js/jquery-3.3.1.min.js"></script> 
    <script src="../js/popper.min.js"></script> 
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/mobile-nav.js"></script>  
    <script src="../js/owl.carousel.min.js"></script> 
    <script src="../js/isotope.js"></script> 
    <script src="../js/jquery.prettyPhoto.js"></script> 
    <script src="../js/jquery.countdown.js"></script> 
    <script src="../js/custom.js"></script>
    <script src="{{ asset('js/eventos.js') }}"></script>
</body>
</html>