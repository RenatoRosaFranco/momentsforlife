@extends('layout.header')

@section('content')

            <div class='container'>
             <div class='col-md-12'>

             @include('errors.message')
             
                   <div class='col-md-4'></div>

                       <div class='col-md-4' style='margin-top: 80px;'>
                         
                         <form action="/register" method="POST">
                           {!! csrf_field() !!} 
                           <li><center><img src="../../uploads/imageProfile/images/default.png" id='profileEditPic' class='thumbnail'></center></li>
                           <li><input type="text"     placeholder='Nome Completo' class='form-control' name='name'></li>
                           <li><input type="text"     placeholder='Nome de Usuario' class='form-control' name='nickname' required='required'></li>
                           <li><input type='email'    placeholder='E-mail'        class='form-control' name='email'    required='required'></li>
                           <li><input type='password' placeholder='Senha'         class='form-control' name='password' required='required'></li>
                           <li><input type='checkbox' required='required'> Li e aceito os <a href=''>termos de uso</a></li>
                           <li><br>
                              <center>
                                <button class='btn btn-primary' type='submit'> Criar Conta</button>
                              </center
                           </li>
                        </form>
                      
                         </div>

                       <div class='col-md-4'></div>
             </div>
            </div> 

@endsection