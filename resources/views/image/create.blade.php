@extends('layout.app')


@include('errors.message')

@section('content')

            <div class='container'>
               
               <div class='col-md-12'>
                   @include('errors.message')
               </div>

               <div class='col-md-12'>


               	    
               	    <div class='col-md-4'></div>

               	    <div class='col-md-4'>
               	     <li><h3>ADD IMAGE</h3>
               	     
               	     <!-- form -->
               	     <form action="/image/create" method="POST" enctype="multipart/form-data">
               	         {!! csrf_field() !!}
                           <li><input type='text' placeholder='Titulo'    class='form-control' name='title'></li>
               	     	   <li><input type='text' placeholder='descrição' class='form-control' name='description'></li>
               	     	   <li><input type='file' name='image' required='required'></li>
                           <li>
               	     	   	   <button class='btn btn-primary' id='laravel-button'> Cadastrar </button>
               	     	   	   <button class='btn btn-default'> Limpar campos </button>
               	     	   </li>
               	     </form>
               	    </div>

               	     <div class='col-md-4'></div>

               </div>
            </div> 

@endsection