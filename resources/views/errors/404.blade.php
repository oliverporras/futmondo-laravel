@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/fav.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/color.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css">
    <title>Futmondo Sage</title>
  </head>
  <body>
    <!--Wrapper Start-->
    <div class="page-404">
      <div class="p404-wrap">
        <h1>404</h1>
        <h2> Página no encontrada</h2>
        <p>La solicitud no se ha podido procesar</p>
        <a href="{{ url('/') }}" class="b2home"><i class="fas fa-home"></i> Volver al Inicio</a> 
      </div>
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
  </body>
</html>

@section('message', __('Not Found'))
