@extends('layouts.app')

@section('content')
      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Noticias') }}">{{ __('Noticias') }}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> <a href="#" class="active"> {{ __('Noticias') }} </a> </li>
          </ul>
        </div>
      </div>
      <!--Main Slider Start--> 
      <!--Main Content Start-->
      <div class="main-content innerpagebg wf100 p80">
        <!--News Large Page Start--> 
        <!--Start-->
        <div class="news-large">
          <div class="container">
            <div class="row">
              <!--News Start-->
              <div class="col-lg-8">
                <div class="news-wrap">
                  @foreach($noticias as $noticia)
                    <!--Post Start-->
                    <div class="news-large-post">
                      @isset($noticia->imagen)  
                        <div class="post-thumb"> <a href="{{ url('/') }}/noticias/{{$noticia->id}}"><i class="fas fa-link"></i></a> <img class="center-news-thumb" src="{{ url('/') }}/images/news/{{$noticia->thumb}}" alt=""></div>
                      @endisset
                      <div class="post-txt">
                        <h3><a href="{{ url('/') }}/noticias/{{$noticia->id}}">{{$noticia->titulo}}</a></h3>
                        <ul class="post-meta">
                          <li><i class="fas fa-user"></i>  {{$noticia->user->name }}</li>
                          <li><i class="fas fa-calendar-alt"></i> {{ date('d-m-Y', strtotime($noticia->fecha)) }}</li>
                          <li><i class="far fa-comment"></i> {{ __('Comentarios') }}: {{ count($noticia->comments) }}</li>
                          <?php $user_like = false ?>
                          @if( count($noticia->likes) > 0 )
                            @foreach($noticia->likes as $like)
                              @if( @null !== Auth::user() )
                                @if( $like->user->id == Auth::user()->id )
                                  <?php $user_like = true ?>
                                @endif
                              @endif
                            @endforeach
                            @if( $user_like )
                              <li><i class="fas fa-heart like" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                            @else
                              @if( @null !== Auth::user() )
                                <li><i class="far fa-heart dislike" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                              @else
                                <li><i class="far fa-heart logged" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                              @endif
                            @endif
                          @else
                            @if( @null !== Auth::user() )
                              <li><i class="far fa-heart dislike" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">0</span></li>
                            @else
                              <li><i class="far fa-heart logged" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">0</span></li>
                            @endif
                          @endif
                        </ul>
                        <p>{{$noticia->subtitulo}}</p>
                        <a href="{{ url('/') }}/noticias/{{$noticia->id}}" class="rm">{{ __('Leer más') }}</a> 
                      </div>
                    </div>
                    <!--Post End-->                    
                  @endforeach   

                  <div class="gt-pagination">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        @if( !$noticias->onFirstPage() )
                        <li class="page-item"> <a class="page-link" href="{{ $noticias->previousPageUrl() }}" tabindex="-1" aria-disabled="true"><i class="fas fa-angle-left"></i></a> </li>
                        @endif
                        <li class="page-item active"><a class="page-link" href="{{ url('/') }}/noticias?page={{ $noticias->currentPage() }}">{{ $noticias->currentPage() }}</a></li>
                        @if( $noticias->currentPage() < $noticias->lastPage() )
                        <li class="page-item"> <a class="page-link" href="{{ $noticias->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a> </li>
                        @endif
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <!--News End--> 
              <!--Sidebar Start-->
              <div class="col-lg-4">
                <div class="sidebar">
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
      <!--Main Content End--> 
@endsection