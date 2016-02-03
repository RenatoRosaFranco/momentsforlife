@extends('layout.app')



@section('content')
          
           @section('presenter')
              @include('layout.presenter')
           @show

            <div class='container'>
            @include('errors.message')
            
             <div class='col-md-12'>   
                <div class='col-md-9' style="margin-left: 70px;">
                   <li><h3>MY IMAGES</h3>
                      <li><hr></li>
                  </div> <!-- col-md-9-->
            </div><!-- col-md-12 -->

            <div class='col-md-12'> 
               <div class='col-md-10'>   

                  <div style="margin-top:5px;">  
                     @forelse($images as $image)
                     <div class='col-md-3' id='imageBlock'>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                          role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-cog"></i></a>
                               <ul class="dropdown-menu"> 

                           @if( Auth::user()->id == $image->id_user)
                            <li>

                                <form action="../../image/{{$image->id}}/show" method="GET">
                                   {!! csrf_field() !!}
                                    <button class='btn btn-default'>Visualizar</button>
                                 </form>
                            </li>
                            <li>
                                 <form action="../../image/{{$image->id}}/edit" method="GET">
                                 {!! csrf_field() !!}
                                    <button class='btn btn-default'>Editar</button>
                                 </form>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                 <form action="../../image/{{$image->id}}/delete" method="POST">
                                 {!! csrf_field() !!}
                                    <button class='btn btn-default'>Deletar</button>
                                 </form>
                            </li>

                            @else
                             <li> Nenhuma Operação .</li>
                            @endif

                         </ul>
                        </li>
                        
                        <li>
                          <a href='../image/{{$image->id}}/show'>
                          <img src="../../uploads/imageGallery/images/{{$image->image}}"
                        class='thumbnail' id='image'></a></li>
                          <li><h4><a href=''><center>{{ strtoupper($image->title) }}</center></a></h4></li>
                          <ul class='list-inline' id='list'>
                              <li><center>{{ $image->created_at->diffForHumans() }}</center></li>
                              <li><center><a href='profile/{{$image->hasUser->nickname}}'>{{ $image->hasUser->name }} </a></center></li>
                         </ul>
                     </div> <!-- imageBlock -->
               @empty
                     <div class='col-md-12'><center>Nenhuma <a href=''>imagem</a> foi encontada</center></div>
               @endforelse
               </div>
              </div>

               <div class='col-md-2' id='menu'>
                        <li><a href='/profile'>Perfil</a></li>
                        <li><a href='/profile/edit'>Editar Perfil</a></li>
                        <li><a href='/myImages'>Minhas Fotos</a></li>
                        <li><a href='/members'>Membros</a></li>
                        <li><a href='/logout'>Sair</a></li>
               </div>

              
                  

                </div> <!-- col-md-10 -->
                 
                

                 </div> <!-- col-md-12 -->
            </div> <!-- container -->
               
            </div>
            
           
  
  </div>
</div> <!-- container -->
             
@endsection