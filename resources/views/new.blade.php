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
                        <li><i class="fas fa-user"></i>  {{$noticia->user->name }}</li>
                        <li><i class="fas fa-calendar-alt"></i> {{ date('d-m-Y', strtotime($noticia->fecha)) }}</li>
                        <li><i class="far fa-comment"></i> Comentarios: {{ count($noticia->comments) }}</li>
                        <?php $user_like = false ?>
                        @if( count($noticia->likes) > 0 )
                          @foreach($noticia->likes as $like)
                            @if( @null !== Auth::user() )
                              @if( $like->user->id == Auth::user()->id )
                                <?php $user_like = true ?>
                              @endif
                            @endif
                            @if( $user_like )
                              <li><i class="fas fa-heart like" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                            @else
                              @if( @null !== Auth::user() )
                                <li><i class="far fa-heart dislike" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                              @else
                                <li><i class="far fa-heart logged" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">{{ count($noticia->likes) }}</span></li>
                              @endif
                            @endif
                          @endforeach
                        @else
                          @if( @null !== Auth::user() )
                            <li><i class="far fa-heart dislike" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">0</span></li>
                          @else
                            <li><i class="far fa-heart logged" data-id="{{ $noticia->id }}"></i> Likes: <span id="likes_{{ $noticia->id }}">0</span></li>
                          @endif
                        @endif
                      </ul>
                      <p> {!! $noticia->cuerpo !!}</p>
                    </div>
                    <div class="post-bottom">
                      <!--Post Comments Start-->
                      <div class="post-comments">
                        <h3 class="stitle">Comentarios ({{ count($noticia->comments) }})</h3>
                        <ul class="comments">
                          @foreach( $noticia->comments as $comment)
                          <li class="comment">
                            <div class="user-comments">
                            
                              <h6 class="aname">{{ $comment->user->name }}</h6>
                              <ul class="post-time">
                                <li>Fecha: {{ date('d-m-Y', strtotime($comment->created_at)) }}</li>
                              </ul>
                              <p>{{ $comment->comentario }}</p>
                            </div>
                          </li>
                          @endforeach
                        </ul>
                      </div>
                      <!--Post Comments End--> 
                      @guest
                      @else
                      <!--comments form Start-->
                      <div class="post-comments-form">
                        <form method="POST" action="{{ route('comment.save') }}">
                          @csrf
                          <input type="hidden" name="noticia_id" value="{{$noticia->id}}" />
                          <h3 class="stitle">Deja un comentario</h3>
                          <ul>
                            <li class="half-col">
                              <label>{{ Auth::user()->name }}</label>
                              <input type="hidden" name="user_id" value="{{ Auth::user()->name }}" />
                            </li>
                            <li class="full-col">
                              <textarea class="{{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Escribe tu comentario" name="content" ></textarea>
                              @if( $errors->has('content'))
                                <span class="invalid-feedback" role="alert"><strong>*{{ $errors->first('content') }}</strong></span>
                              @endif
                            </li>
                            <li class="full-col">
                              <input type="submit" value="Envía tu comentario">
                            </li>
                          </ul>
                        </form>
                      </div>
                      <!--comments form End--> 
                      @endguest
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