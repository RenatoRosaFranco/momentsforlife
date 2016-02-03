@extends('layout.app')


@section('content')

            <div class='container'>
               <div class='col-md-12'>
               	    
               	    <div class='col-md-4'></div>

               	     <div class='col-md-4' style='margin-top: 80px;'>
                           <form action="../profile/update" method="POST" enctype="multipart/form-data">
                           {!! csrf_field() !!}
                           <li><input type='hidden' value="{{$user->id}}" name='id'></li>
                           <li><center><img src="../../uploads/imageProfile/images/{{$user->picture}}" id='profileEditPic' class='thumbnail'></center></li>
                           <li><input type='file'     name='image'></li>
                           <li><input type='text'     placeholder='Nome Completo'   class='form-control' name='name' value="{{$user->name}}" required='required'></li>
                           <li><input type='text'     placeholder='Nome de Usuario' class='form-control' name='nickname' value="{{$user->nickname}}" required='required' ></li>
                           <li><input type='email'    placeholder='E-mail'          class='form-control' name='email' value="{{$user->email}}" required='required'></li>
                           <li><input type='password' placeholder='Senha'           class='form-control' name='password' required='required'></li>
                           <li>
                               <center>
                                 <button class='btn btn-primary' type='submit'> Salvar Edição </button>
                                 <button class='btn btn-default' type='reset'> Limpar campos </button>
                               </center>
                           </li>
                       </form>
                         </div>

               	     <div class='col-md-4'></div>

               </div>
            </div> 

@endsection 