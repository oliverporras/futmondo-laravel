@extends('layouts.app')

@section('content')
      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="Noticia">Noticia</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> Inicio </a> </li>
            <li> <a href="{{ url('/noticias') }}"> Noticias </a> </li>
            <li> <a href="#" class="active"> Noticia </a> </li>
          </ul>
        </div>
      </div>
      <!--Main Slider Start--> 
      <!--Main Content Start-->
      <div class="main-content innerpagebg wf100 p80">
        <!--News Large Page Start--> 
        <!--Start-->
        <div class="news-details">
          <div class="container">
            <div class="row">
              <!--News Start-->
              <div class="col-lg-8">
                <div class="news-details-wrap">
                  <div class="news-large-post">
                    
                    @isset($noticia->imagen)  
                      <div class="post-thumb"> <img src="../images/news/{{$noticia->imagen}}" alt=""></div>
                    @endisset                    
                    <div class="post-txt">
                      <h3>{{$noticia->titulo}}</h3>
                      <ul class="post-meta">
                        <li><i class="fas fa-calendar-alt"></i> {{$noticia->fecha}}</li>
                      </ul>
                      <p> {!! $noticia->cuerpo !!}</p>
                    </div>

                  </div>
                </div>
              </div>
              <!--News End--> 
              <!--Sidebar Start-->
              <div class="col-lg-4">
                <div class="sidebar">
                  <!--widget start-->
                  <div class="widget">
                    <h4>Clasificación</h4>
                    <div class="point-table-widget">
                      <table>
                        <thead>
                          <tr>
                            <th title="Posición">P</th>
                            <th>Equipo</th>
                            <th title="Jornadas">J</th>
                            <th>Pts</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($equipos as $equipo)
                          <tr>
                            <td>{{$equipo->Puesto}}</td>
                            <td class="tn"><strong>{{$equipo->Nombre}}</strong></td>
                            <td>{{$equipo->Jornadas}}</td>
                            <td><strong>{{$equipo->Puntos}}</strong></td>
                          </tr>                          
                          @endforeach                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--widget end--> 
                  <!--widget start-->
                  <div class="widget">
                    <h4>Sponsors</h4>
                    <ul class="match-sponsors">
                      <li> <a href="https://sticker4life.com" target="_blank"><img src="../images/sticker4life.png" alt=""></a> </li>
                      <!--<li> <a href="#"><img src="images/sitelogos2.png" alt=""></a> </li>
                      <li> <a href="#"><img src="images/sitelogos3.png" alt=""></a> </li>
                      <li> <a href="#"><img src="images/sitelogos4.png" alt=""></a> </li>
                      <li> <a href="#"><img src="images/sitelogos5.png" alt=""></a> </li>
                      <li> <a href="#"><img src="images/sitelogos6.png" alt=""></a> </li>-->
                    </ul>
                  </div>
                  <!--widget end--> 

                </div>
              </div>
              <!--Sidebar End--> 
            </div>
          </div>
        </div>
        <!--End--> 
      </div>
      <!--Main Content End--> 
@endsection