@extends('layouts.app')

@section('content')
      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Clasificación') }}">{{ __('Clasificación') }}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> <a href="#"  class="active"> {{ __('Clasificación') }} </a> </li>
          </ul>
        </div>
      </div>
      <!--Main Slider Start--> 
      <!--Main Content Start-->
      <div class="main-content solidbg wf100">
        <!--team Page Start-->
        <div class="team wf100 p80">
          <!--Start-->
          <div class="point-table">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="point-table-widget">
                    <table>
                      <thead>
                        <tr>
                          <th>{{ __('Pos') }}</th>
                          <th>{{ __('Equipo') }}</th>
                          <th>{{ __('Entrenador') }}</th>
                          <th>{{ __('Partidos') }}</th>
                          <th>{{ __('G') }}G</th>
                          <th>{{ __('E') }}</th>
                          <th>{{ __('P') }}</th>
                          <th>{{ __('Puntos') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($equipos as $equipo)
                        <tr>
                          <td>{{$equipo->Puesto}}</td>
                          <td>
                            @if($equipo->Escudo)
                            <img class="escudo-fit" src="{{ url('/') }}/images/teams/{{$equipo->Escudo}}" alt="{{$equipo->Nombre}}"> <strong><a class="clasificacion-item" href="{{ url('/') }}/equipo/{{$equipo->Id}}">{{$equipo->Nombre}}</a></strong>
                            @else
                            <img class="escudo-fit" src="{{ url('/') }}/images/tl-logo1.png" alt="{{$equipo->Nombre}}"> <strong><a class="clasificacion-item" href="{{ url('/') }}/equipo/{{$equipo->Id}}">{{$equipo->Nombre}}</a></strong>
                            @endif
                          </td>
                          <td>
                            <a class="clasificacion-item" href="{{ url('/') }}/entrenador/{{$equipo->Id}}">
                              @if($equipo->Foto)
                              <img class="user-list" src="fotos/{{$equipo->Foto}}" alt="{{$equipo->Entrenador}}">
                              @endif
                              <strong>{{$equipo->Entrenador}}</strong>
                            </a>
                          </td>
                          <td>{{$equipo->Jornadas}}</td>
                          <td>{{$equipo->Victorias}}</td>
                          <td>{{$equipo->Empates}}</td>
                          <td>{{$equipo->Derrotas}}</td>
                          <td><strong>{{$equipo->Puntos}}</strong></td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--End--> 
        </div>
        <!--team Page End--> 
      </div>
      <!--Main Content End--> 
@endsection
