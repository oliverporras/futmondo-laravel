<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/') }}/images/fav.png" type="image/png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/css/custom.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/responsive.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/color.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/prettyPhoto.css">

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
                                        <li class="acctount-btn"> <a href="{{ route('login') }}">{{ __('Login') }} <i class="fas fa-sign-in-alt" title="{{ __('Login') }}"></i></a> </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="acctount-btn"> <a href="{{ route('register') }}">{{ __('Register') }} <i class="fas fa-user-plus" title="{{ __('Register') }}"></i></a> </li>
                                    @endif
                                @else
                                    <li class="acctount-btn"> <a href="#"> {{ Auth::user()->name }} </a></li>
                                    <li class="acctount-btn"> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"><i class="fas fa-sign-out" title="{{ __('Logout') }}"></i></a> 
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
                                    <li class="nav-item">
                                        <a href="{{ url('/') }}">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('/home') }}">Clasificación</a>
                                    </li>
                                    @if( isset($teams) )
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/equipos') }}">Equipos</a>
                                        <ul>
                                            @foreach($teams as $team)
                                            <li><a style="line-height: 30px;" href="{{ url('/equipo') }}/{{$team->Id}}">{{$team->Nombre}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="{{ url('/equipos') }}">Equipos</a>
                                    </li>
                                    @endif
                                    @if( isset($coaches) )
                                    <li class="nav-item drop-down">
                                        <a href="{{ url('/entrenadores') }}">Entrenadores</a>
                                        <ul>
                                            @foreach($coaches as $coach)
                                            <li><a style="line-height: 30px;" href="{{ url('/entrenador') }}/{{$coach->Id}}">{{$coach->Entrenador}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a href="{{ url('/entrenadores') }}">Entrenadores</a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
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
                        <p class="copyr"> © 2022, Design & Developed By: <a href="https://oliverporras.com">Oliver Porras</a> </p>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="quick-links">
                            <li><a href="{{ url('/') }}">Inicio</a></li>
                            <li><a href="{{ url('/home') }}">Clasificación</a></li>
                            <li><a href="{{ url('/equipos') }}">Equipos</a></li>
                            <li><a href="{{ url('/entrenadores') }}">Entrenadores</a></li>
                            <li><a href="{{ url('/noticias') }}">Noticias</a></li>
                            @guest
                                @if (Route::has('login'))
                                    <li> <a href="{{ route('login') }}"><i class="fas fa-sign-in-alt" title="{{ __('Login') }}"></i></a> </li>
                                @endif
                                @if (Route::has('register'))
                                    <li> <a href="{{ route('register') }}"><i class="fas fa-user-plus" title="{{ __('Register') }}"></i></a> </li>
                                @endif
                            @else
                                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form-footer').submit();"><i class="fas fa-sign-out" title="{{ __('Logout') }}"></i></a> 
                                <form id="logout-form-footer" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form></li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--Main Footer End--> 
    </div>
    <!--Wrapper End--> 
    <!-- Optional JavaScript --> 
    <script src="{{ url('/') }}/js/jquery-3.3.1.min.js"></script> 
    <script src="{{ url('/') }}/js/popper.min.js"></script> 
    <script src="{{ url('/') }}/js/bootstrap.min.js"></script> 
    <script src="{{ url('/') }}/js/mobile-nav.js"></script>  
    <script src="{{ url('/') }}/js/owl.carousel.min.js"></script> 
    <script src="{{ url('/') }}/js/isotope.js"></script> 
    <script src="{{ url('/') }}/js/jquery.prettyPhoto.js"></script> 
    <script src="{{ url('/') }}/js/jquery.countdown.js"></script> 
    <script src="{{ url('/') }}/js/custom.js"></script>
    <script src="{{ url('/') }}/js/eventos.js"></script>
</body>
</html>