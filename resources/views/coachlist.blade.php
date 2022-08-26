@extends('layouts.app')

@section('content')

      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Entrenadores') }}">{{ __('Entrenadores') }}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> <a href="#" class="active"> {{ __('Entrenadores') }} </a> </li>
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
                @foreach($teams as $team)
                  <!--Player Box Start-->
                  <div class="col-md-6">
                    <div class="player-box">
                      @if($team->Foto)
                      <div class="player-thumb"> <img class="resize_fit_center" src="../fotos/{{$team->Foto}}" alt="{{$team->Entrenador}}"></div>
                      @endif
                      <div class="player-txt">
                        <!--<div class="num">{{ $team->getRanking() }}</div>-->
                        <div class="num">{{ $team->Ptos }}</div>
                        <h3>{{$team->Nombre}}</h3>
                        <strong class="player-desi">{{$team->Entrenador}}</strong>
                        @isset($team->Lema)
                        <p> {{$team->Lema}} </p>
                        @endisset
                        <!--<ul>
                          <li>29 <span>Age</span></li>
                          <li>87 <span>matches</span></li>
                          <li>113 <span>Goals</span></li>
                          <li>87 <span>matches</span></li>
                        </ul>-->
                        <a class="playerbio" href="../entrenador/{{$team->Id}}">{{ __('Ficha del entrenador') }} <i class="far fa-arrow-alt-circle-right"></i></a> 
                      </div>
                    </div>
                  </div>
                  <!--Player Box End--> 
                @endforeach
              </div>
            </div>
          </div>
          <!--End--> 
        </div>
        <!--team Page End--> 
      </div>
      <!--Main Content End--> 
@endsection