@extends('layouts.app')

@section('content')

  <!--Main Content Start-->
  <div class="main-content wf100"> 
    <!--Futmondo Widget Start-->
    <section class="wf100 p80">
      <div class="container">
        <div class="row">
          <div class="col-lg-8"> 
            @foreach($noticias as $noticia)
              <!--News Box Start-->
              <div class="news-list-post">
                @isset($noticia->imagen)  
                  <div class="post-thumb"> <a href="{{ url('/noticias') }}/{{$noticia->id}}"><i class="fas fa-link"></i></a> <img class="center-news-thumb" src="../images/news/{{$noticia->imagen}}" alt=""></div>
                @endisset
                <div class="post-txt">
                  <h4><a href="{{ url('/noticias') }}/{{$noticia->id}}">{{$noticia->titulo}}</a></h4>
                  <ul class="post-meta">
                    <li><i class="fas fa-calendar-alt"></i> {{$noticia->fecha}}</li>
                  </ul>
                  <p>{{$noticia->subtitulo}}</p>
                  <a href="{{ url('/noticias') }}/{{$noticia->id}}" class="rm">Leer más</a> </div>
              </div>
              <!--News Box End-->             
            @endforeach               
          </div>

          <div class="col-lg-4">
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
        </div>
      </div>
    </section>
    <!--Sports Futmondo End--> 
    <!--Banner Size 920 x 100 Start-->
    <div class="banner-wrap text-center wf100 mb-80"> <a href="https://sticker4life.com" target="_blank"><img src="images/banners/BannerSticker4life.png" alt="Sticker4life"></a> </div>
    <!--Banner Size 920 x 100 End--> 
    <!--Team Squad Start-->
    <section class="team-squad wf100 p80-50">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title white">
              <h2>Líderes de la Liga</h2>
              <a class="full-team" href="{{ url('/equipos') }}">Ver todos los equipos</a> </div>
          </div>
        </div>
        <div class="row"> 
          @foreach($lideres as $team)
            <!--Player Box Start-->
            <div class="col-md-6">
              <div class="player-box">
                @isset($team->Escudo)
                <div class="player-thumb"> <img class="resize_escudo_center" src="../images/teams/{{$team->Escudo}}" alt="{{$team->Nombre}}"></div>
                @else
                <div class="player-thumb"> <img class="resize_escudo_center" src="../images/team.webp" alt="{{$team->Nombre}}"></div>
                @endisset
                <div class="player-txt"> <span class="star-tag"><i class="fas fa-star"></i></span>
                  <h3>{{$team->Nombre}}</h3>
                  <strong class="player-desi">{{$team->Entrenador}}</strong>
                  @isset($team->Lema)
                    <p> {{$team->Lema}} </p>
                  @endisset
                  <ul>
                    <li>{{$team->Ptos}} <span>puntos</span></li>
                  </ul>
                  <a class="playerbio" href="{{ url('/entrenador') }}/{{$team->Id}}">Ficha del entrenador <i class="far fa-arrow-alt-circle-right"></i></a> </div>
              </div>
            </div>
            <!--Player Box End-->
          @endforeach  
        </div>
      </div>
    </section>
    <!--Team Squad End--> 
    <!--Shop Products Start-->
    <section class="wf100 p80 shop-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title">
              <h2>Productos de patrocinadores</h2>
            </div>
          </div>
        </div>
        <div class="row"> 
          <!--Product Start-->
          <div class="col-lg-3 col-sm-6">
            <div class="pro-box">
              <span class="sale-tag">10% descuento</span>
              <div class="pro-thumb"> <a href="https://sticker4life.com/product/one/" target="_blank"><i class="fas fa-link"></i></a> <img src="../images/shop/Sticker4lifeOne.webp" alt=""> </div>
              <div class="pro-txt">
                <h4> <a href="#">Sticker One</a> </h4>
                <p class="price"> <del>19,90€</del> <strong>17,91€</strong></p>
                <p> *Cupón: #FutmondoSage</p>
                <a href="https://sticker4life.com/product/one/" target="_blank" class="add2cart">Ir a la web</a> </div>
            </div>
          </div>
          <!--Product End--> 
          <!--Product Start-->
          <div class="col-lg-3 col-sm-6">
            <div class="pro-box">
              <span class="sale-tag">10% descuento</span>
              <div class="pro-thumb"> <a href="https://sticker4life.com/product/unico-forever/" target="_blank"><i class="fas fa-link"></i></a> <img src="../images/shop/Sticker4lifeForever.webp" alt=""> </div>
              <div class="pro-txt">
                <h4> <a href="#">Sticker Forever</a> </h4>
                <p class="price"> <del>29,90€</del> <strong>26,91€</strong></p>
                <p> *Cupón: #FutmondoSage</p>
                <a href="https://sticker4life.com/product/unico-forever/" target="_blank" class="add2cart">Ir a la web</a> </div>
            </div>
          </div>
          <!--Product End-->
          <!--Product Start-->
          <div class="col-lg-3 col-sm-6">
            <div class="pro-box">
              <span class="sale-tag">10% descuento</span>
              <div class="pro-thumb"> <a href="https://sticker4life.com/product/oferta-twin-forever/" target="_blank"><i class="fas fa-link"></i></a> <img src="../images/shop/Sticker4lifeTwinForever.webp" alt=""> </div>
              <div class="pro-txt">
                <h4> <a href="https://sticker4life.com/product/oferta-twin-forever/" target="_blank">Sticker Twin Forever</a> </h4>
                <p class="price"> <del>37,90€</del> <strong>34,11€</strong></p>
                <p> *Cupón: #FutmondoSage</p>
                <a href="https://sticker4life.com/product/oferta-twin-forever/" target="_blank" class="add2cart">Ir a la web</a> </div>
            </div>
          </div>
          <!--Product End-->
          <!--Product Start-->
          <div class="col-lg-3 col-sm-6">
            <div class="pro-box">
              <span class="sale-tag">10% descuento</span>
              <div class="pro-thumb"> <a href="https://sticker4life.com/product/tarjeta-qr-identificacion/" target="_blank"><i class="fas fa-link"></i></a> <img src="../images/shop/Sticker4lifeTarjeta.webp" alt=""> </div>
              <div class="pro-txt">
                <h4> <a href="https://sticker4life.com/product/tarjeta-qr-identificacion/" target="_blank">Tarjeta de Identificación</a> </h4>
                <p class="price"> <del>9,90€</del> <strong>8,91€</strong></p>
                <p> *Cupón: #FutmondoSage</p>
                <a href="https://sticker4life.com/product/tarjeta-qr-identificacion/" target="_blank" class="add2cart">Ir a la web</a> </div>
            </div>
          </div>
          <!--Product End-->          

        </div>
      </div>
    </section>
    <!--Shop Products End--> 
    <!--Hall of fame Start-->
    <section class="team-squad wf100 p80-50">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title white">
              <h2>Salón de la fama</h2>
          </div>
        </div>
        <!--News / Blog Start-->
        <div class="news-grid">
          <div class="container">
            <div class="row">

              @foreach($halloffame as $team)
                <!--Box Start-->
                <div class="col-lg-2 col-md-6">
                  <div class="ng-box">
                    <div class="thumb">
                      <img src="../images/award{{$team->Titulo}}.png" alt="{{$team->Hito}}">
                    </div>
                    <div class="ng-txt">
                      <ul class="post-author">
                        @isset($team->Foto)
                        <li><img class="escudo-fit" src="../fotos/{{$team->Foto}}" alt="{{$team->Entrenador}}"> <strong>{{$team->Entrenador}}</strong></li>
                        @else
                        <li><img class="escudo-fit" src="../images/tl-logo1.png" alt="{{$team->Entrenador}}"> <strong>{{$team->Entrenador}}</strong></li>
                        @endisset
                      </ul>
                      <h4>{{$team->Hito}}</h4>
                      @isset($team->Escudo)
                      <img class="escudo-fit100" src="../images/teams/{{$team->Escudo}}" alt="{{$team->Nombre}}"> 
                      @else
                      <img class="escudo-fit100" src="../images/tl-logo1.png" alt="{{$team->Nombre}}"> 
                      @endisset
                      <p><strong>{{$team->Nombre}}</strong></p>
                    </div>
                  </div>
                </div>
                <!--Box End-->                
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Hall of fame End--> 

    <!--Sponsor Logos Start-->
    <section class="sponsor-logos wf100">
      <div class="container">
        <ul class="row">
          <li class="col-md-2 col-4 col-sm-2"> <a href="https://sticker4life.com" target="_blank"><img src="../images/sticker4life.png" alt="Sticker4life"></a> </li>
        </ul>
      </div>
    </section>
    <!--Sponsor Logos End--> 
  </div>
  <!--Main Content End--> 
@endsection