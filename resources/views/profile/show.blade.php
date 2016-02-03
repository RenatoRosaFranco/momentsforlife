@extends('layout.app')


@section('content')

            <div class='container'>
               <div class='col-md-12'>
               	    
               	    <div class='col-md-4'></div>

               	     <div class='col-md-4' style='margin-top: 80px;'>
                          
                           <li><center><img src="../../uploads/imageProfile/images/{{$user2->picture}}" id='profileEditPic' class='thumbnail'></center></li>
                           <li><input type='text'     placeholder='Nome Completo'   class='form-control' name='name' value="{{$user2->name}}" disabled=""></li>
                           <li><input type='text'     placeholder='Nome de Usuario' class='form-control' name='nickname' value="{{$user2->nickname}}" disabled=""></li>
                           <li><input type='email'    placeholder='E-mail'          class='form-control' name='email' value="{{$user2->email}}" disabled=""></li>
                           <li><br>
                              <center>
                                <a href='/'> <button class='btn btn-primary' type='submit'> Voltar </button> </a>
                              </center>
                           </li>
                      
                         </div>

               	     <div class='col-md-4'></div>

               </div>
            </div>   

@endsection 