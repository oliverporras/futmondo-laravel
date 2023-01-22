@extends('layouts.app')

@section('content')
      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Temporada') }} {{$temporada}}-{{$temporada+1}}">{{ __('Temporada') }} {{$temporada}}-{{$temporada+1}}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> {{ __('Otras temporadas') }} </li>
            <li> <a href="#" class="active"> {{ __('Temporada') }} {{$temporada}}-{{$temporada+1}}</a> </li>
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
                          <th>{{ __('Puntos') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($equipos as $equipo)
                        <tr>
                          <td>{{$equipo->rn}}</td>
                          <td>
                            @if($equipo->Escudo)
                            <img class="escudo-fit" src="{{ url('/') }}/images/teams/{{$equipo->Escudo}}" onerror="this.src='{{ url('/') }}/images/tl-logo1.png';" alt="{{$equipo->Nombre}}"> <strong>{{$equipo->Nombre}}</strong>
                            @else
                            <img class="escudo-fit" src="{{ url('/') }}/images/tl-logo1.png" alt="{{$equipo->Nombre}}"> <strong>{{$equipo->Nombre}}</strong>
                            @endif
                          </td>
                          <td>
                            
                            @if($equipo->Foto)
                            <img class="user-list" src="{{ url('/') }}/fotos/{{$equipo->Foto}}"  onerror="this.src='{{ url('/') }}/fotos/user.png';" alt="{{$equipo->Entrenador}}">
                            @endif
                            <strong>{{$equipo->Entrenador}}</strong>
                          </td>
                          <td><strong>{{$equipo->Ptos}}</strong></td>
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