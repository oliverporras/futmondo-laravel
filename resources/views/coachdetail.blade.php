@extends('layouts.app')

@section('content')

      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Ficha de Entrenador') }}">{{ __('Ficha de Entrenador') }}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> <a href="{{ url('/entrenadores') }}"> {{ __('Entrenadores') }} </a> </li>
            <li> <a href="#"  class="active"> {{ __('Ficha') }} </a> </li>
          </ul>
        </div>
      </div>
      <!--Main Slider Start--> 
      <!--Main Content Start-->
      <div class="main-content innerpagebg wf100">
        <!--team Page Start-->
        <div class="team wf100 p80">
          <!--Start-->
          <div class="player-squad">
            <div class="container">
              <div class="row">
                <!--Squad Start-->
                <div class="col-lg-8">
                  <!--Player Box Start-->
                  <div class="player-card">
                    @if($team->Foto)
                    <div class="pimg"><img class="resize_fit_center" src="{{ url('/') }}/fotos/{{$team->Foto}}" alt="{{$team->Entrenador}}"></div>
                    @endif
                    <div class="player-details">
                      <h2>{{$team->Entrenador}}</h2>
                      @foreach($from as $desde)
                      <strong class="desi">*{{ __('Desde') }} {{$desde->temporada}}</strong>
                      @endforeach
                      <span class="follow"><a href="#">{{ __('Temporada') }} 22-23</a></span>
                      <ul>
                        <li> {{ __('Equipo') }} <strong><a href="{{ url('/') }}/equipo/{{$team->Id}}">{{$team->Nombre}}</a></strong></li>
                        <li> {{ __('Posición actual') }} <strong>{{$current_season->Puesto}}</strong></li>
                        <li> {{ __('Jugados') }} <strong>{{$current_season->Jornadas}}</strong></li>
                        <li> {{ __('Ganados') }} <strong>{{$current_season->Victorias}}</strong></li>
                        <li> {{ __('Empatados') }} <strong>{{$current_season->Empates}}</strong></li>
                        <li> {{ __('Perdidos') }} <strong>{{$current_season->Derrotas}}</strong></li>
                        <li> {{ __('Puntos') }} <strong>{{$current_season->Puntos}}</strong></li>
                      </ul>
                    </div>
                  </div>
                  <!--Player Box End--> 
                  <!--Player Box End--> 
                  @isset($team->Lema)
                  <!--Player Biography Start-->
                  <div class="player-bio">
                    <h4>{{ __('Historia') }}</h4>
                    <div class="txt">
                      <blockquote> {{$team->Lema}} </blockquote>
                    </div>
                  </div>
                  <!--Player Biography End--> 
                  @endisset

                  <div class="row">
                    <!--Squad Start-->
                    <div class="col-md-6">
                      <!--Team Prograss Start-->
                      <div class="team-one-scrore">
                        <h4>{{ __('Modo Liga') }}</h4>
                        <ul>
                          @foreach($compPuntosLiga as $compPtos)
                          <!--Box Start-->
                          <li style="width: 50%;">
                              <div class="progress-circle over50 p{{$compPtos->PctGraph}}">
                                <span>{{$compPtos->Pct}}%</span>
                                <div class="left-half-clipper">
                                    <div class="first50-bar"></div>
                                    <div class="value-bar"></div>
                                </div>
                              </div>
                              @if($compPtos->Pct == 100.00 )
                                <i class="fa fa-trophy"></i>
                              @endif
                              <strong>{{$compPtos->Temporada}}</strong> 
                          </li>
                          <!--Box End--> 
                          @endforeach
                        </ul>
                      </div>
                      <!--Team Prograss End--> 
                    </div>
                    <div class="col-md-6">
                      <!--Team Prograss Start-->
                      <div class="team-one-scrore team-two">
                        <h4>{{ __('Modo Clásico') }}</h4>
                        <ul>
                        @foreach($compPuntosClassic as $compPtos)
                          <!--Box Start-->
                          <li style="width: 50%;">
                              <div class="progress-circle over50 p{{$compPtos->PctGraph}}">
                                <span>{{$compPtos->Pct}}%</span>
                                <div class="left-half-clipper">
                                  <div class="first50-bar"></div>
                                  <div class="value-bar"></div>
                                </div>
                              </div>
                              @if($compPtos->Pct == 100.00 )
                                <i class="fa fa-trophy"></i>
                              @endif
                              <strong>{{$compPtos->Temporada}}</strong> 
                          </li>
                          <!--Box End--> 
                          @endforeach
                        </ul>
                      </div>
                      <!--Team Prograss End--> 
                    </div>
                  </div>
                  <!--Team Prograss End--> 


                  <!--Career Facts Start-->
                  <div class="career-facts">
                    <h4>{{ __('Palmarés') }}</h4>
                    <table>
                      <thead>
                        <tr>
                          <th>{{ __('Temporada') }}</th>
                          <th>{{ __('Campeonato') }}</th>
                          <th>{{ __('Posición') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($team_facts as $fact)
                        <tr>
                          <td>{{$fact->temporada}}</td>
                          <td>{{$fact->campeonato}}</td>
                          <td>
                            @if($fact->puesto == 1 )
                              <i class="fa fa-trophy"></i> {{$fact->puesto}}
                            @elseif( $fact->puesto == 0 )
                              - {{ __('abandono') }} -
                            @else
                              {{$fact->puesto}}
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!--Career Facts End--> 
                </div>
                <!--Squad End--> 
                <!--Sidebar Start-->
                <div class="col-lg-4">
                  <div class="sidebar">

                    <!--widget start-->
                    <div class="widget">
                      <h4>{{ __('Últimas noticias') }}</h4>
                      <div class="top-stories-widget">
                        <div id="top-stories">
                          @foreach($noticias as $noticia)
                            <!--Slide 1 Start-->
                            <div class="item">
                              <ul class="top-stories">
                                <!--Story Start-->
                                <li class="story-row">
                                  @isset($noticia->thumb)  
                                    <div class="ts-thumb"><img class="center-new-thumb" src="{{ url('/') }}/images/news/{{$noticia->thumb}}" alt=""> </div>
                                  @endisset
                                  <div class="ts-txt">
                                    <h5> <a href="{{ url('/') }}/noticias/{{$noticia->id}}">{{$noticia->titulo}}</a> </h5>
                                    <ul class="tsw-meta">
                                      <li>{{$noticia->subtitulo}}</li>
                                    </ul>
                                  </div>
                                </li>
                                <!--Story End--> 
                              </ul>
                            </div>
                            <!--Slide 1 End--> 
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <!--widget end--> 
                    <!--widget start-->
                    <div class="widget">
                      <h4>{{ __('Clasificación') }}</h4>
                      <div class="point-table-widget">
                        <table>
                          <thead>
                            <tr>
                              <th title="{{ __('Posición') }}">P</th>
                              <th>{{ __('Equipo') }}</th>
                              <th title="{{ __('Jornadas') }}">J</th>
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
                      <h4>{{ __('Sponsors') }}</h4>
                      <ul class="match-sponsors">
                        <li> <a href="https://sticker4life.com" target="_blank"><img src="{{ url('/') }}/images/sticker4life.png" alt=""></a> </li>
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
        <!--team Page End--> 
      </div>
      <!--Main Content End--> 
@endsection