@extends('layout.app')


@section('content')



            <div class='container'>
                 @include('errors.message')
                  
               	    <div class='col-md-12'>  
                          <li><h3>VIEW IMAGE</h3></li>
                      </div>
               	    
                      <div class='col-md-12'>
                             
                             
                             <div class='col-md-7'>
                                  <li><img src="../../uploads/imageGallery/images/{{$image->image}}" id='imageBig' class='thumbnail'></li>
                                  <li><center><a href=''><h4>{{strtoupper($image->title)}}</h4></a></center></li>
                                  <li><center>{{ $image->description }}</center></li>
                                  <li><hr></li>
                                  <li>
                                    
                                    <a href='/image/{{$image->id}}/download'><button class='btn btn-default'>
                                      Baixar Foto
                                    </button></li></a>
                                 
                             </div>
                             
                             <div class='col-md-5' >
                                 <ul style="margin-left: 100px; margin-top: -40px;">
                                     <li><h4>COMENTARIOS <span class='badge' style='float: right;'> {{ count($count) }} </span></h4></li>
                                     <li><hr></li>
                                     @forelse($comments as $comment)
                                       
                                       <div class="media">
                                           <div class="media-left">
                                                <a href="../../profile/{{ $comment->hasUser->nickname }}">
                                                    <img class="media-object"
                                                     src="../../uploads/imageProfile/images/{{$comment->hasUser->picture}}" a
                                                     lt="..." id='comment-pic' class='thumbnail'>
                                                </a>
                                           </div>
                                        <div class="media-body">
                                      <h4 class="media-heading"><a href'../../profile/{{ $comment->hasUser->nickname }}'>
                                      {{ $comment->hasUser->name }}</a></h4>
                                        <span align='justify'>{{ $comment->comment }}</span>
                                        <ul class='list-inline'>
                                            <li><a href="">{{ $comment->created_at->diffForHumans() }}</a></li>
                                            <li><a href="">Curtir</a></li>
                                        </ul>
                                      </div>
                                  </div>

                                     @empty
                                      <li class='well'>Nenhum comentario encontrado.</li>
                                     @endforelse

                                     {!! $comments->render() !!}

                                   <li><hr></li>
                                 </ul>
                                 <li style="margin-left: 150px;">
                                   <h5>Adicione um comentario</h5>
                                    <form action='#' method="POST">
                                       {!! csrf_field() !!}
                                       <input type='hidden' value="{{$image->id}}" name='id_image'>
                                        <textarea class='form-control'
                                         required='required' name='comment'></textarea>
                                        <button class='btn btn-primary form-control' 
                                          id='laravel-button'
                                        style="margin-top: 10px;"> 
                                        Postar </button>
                                    </form>
                                 </li>
                             </div>

                      </div> 
                  
            
            </div> <!-- container -->

@endsection