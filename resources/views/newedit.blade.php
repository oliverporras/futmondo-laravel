@extends('layouts.app')

@section('content')

      <!--Main Slider Start-->
      <div class="inner-banner-header wf100">
        <h1 data-generated="{{ __('Noticia') }}">{{ __('Edición de Noticia') }}</h1>
        <div class="gt-breadcrumbs">
          <ul>
            <li> <a href="{{ url('/') }}"> <i class="fas fa-home"></i> {{ __('Inicio') }} </a> </li>
            <li> <a href="{{ url('/noticias') }}"> {{ __('Noticias') }} </a> </li>
            <li> <a href="#" class="active"> {{ __('Edición de Noticia') }} </a> </li>
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
                    @guest
                    @else
                      <form method="POST" action="{{ route('new.save') }}">
                        @isset($noticia->imagen)  
                          <div class="post-thumb"> <img src="{{ url('/') }}/images/news/{{$noticia->imagen}}" alt=""></div>
                        @endisset                    
                        <div class="post-txt">
                          Título: <input type="text" name="titulo" value="{{$noticia->titulo}}" />
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
                          <div class="post-comments-form">
                              @csrf
                              <input type="hidden" name="noticia_id" value="{{$noticia->id}}" />
                              <ul>
                                <li class="full-col">
                                  <textarea class="ckeditor form-control" name="wysiwyg-editor">{!! $noticia->cuerpo !!}</textarea>
                                </li>
                                <li class="full-col">
                                  <input type="submit" value="{{ __('Guardar') }}">
                                </li>
                              </ul>
                          </div>
                        @endguest
                      </div>
                    </form>
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
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
          $('.ckeditor').ckeditor();
      });
    </script>      
@endsection