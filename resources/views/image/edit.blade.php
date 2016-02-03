@extends('layout.app')


@section('content')

            <div class='container'>
               <div class='col-md-12'>
                      
                      <div class='col-md-4'></div>

                      <div class='col-md-4'>
                       <li><h3>EDIT IMAGE</h3>
                       
                       <!-- form -->
                       <form action="../../image/{{$image->id}}/update" method="POST" enctype="multipart/form-data">
                           {!! csrf_field() !!}
                           <li><input type='hidden' value="{{$image->id}}" name='id'></li>
                           <li><center><img src="../../uploads/imageGallery/images/{{$image->image}}" id='imageView' class='thumbnail'></center></li>
                           <li><input type='text' placeholder='Titulo'    class='form-control' name='title' value="{{$image->title}}"></li>
                           <li><input type='text' placeholder='descrição' class='form-control' name='description' value='{{ $image->description }}'></li>
                           <li><input type='file' name='image' required='required'></li>
                           <li>
                                 <button class='btn btn-primary' type='submit'> Salvar Edição </button>
                                 <button class='btn btn-default' type='reset'> Limpar campos </button>
                           </li>
                       </form>
                      </div>

                       <div class='col-md-4'></div>

                       <div class='col-md-12'>
                           <br><br>
                           <center><a href='/'><button class='btn btn-primary'>Voltar</button></a></center>
                       </div>

               </div>
            </div> 

@endsection