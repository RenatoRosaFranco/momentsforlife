<head>
	  <title>ToDo - Renato Franco</title>
	  @section('assets')
        @include('layout.assets')
	  @show
</head>

<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
         <a class="navbar-brand" href="/">
          <img src="../../laravel-logo.png" id='logo'> LARAVEL 5.1.27</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
      </ul>

      <ul class='nav navbar-nav navbar-left'>
           
           <form action="../../image/search" method="POST" enctype="multipart/form-data"> 
            {!! csrf_field() !!}
               <div class="input-group">
  <input type="text" class="form-control" placeholder="Buscar imagem..." id='txtSearch' name='search'>
  <span class="input-group-addon" id="sizing-addon2">
    <span class='glyphicon glyphicon-search'></span>
  </span>
</div>

           </form>
     
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
          <li><img src="../../uploads/imageProfile/images/{{$user->picture}}" id='header-pic'></li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
          aria-haspopup="true" aria-expanded="false">
             {{ $user->name }}
           <i class="glyphicon glyphicon-chevron-down"></i></a>
          <ul class="dropdown-menu">
            <li><a href="/profile">Meu perfil</a></li>
            <li><a href="/profile/edit">Editar perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/logout">Sair</a></li>
          </ul>
        </li>
      </ul>
      </div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>


@section('content')
   @yield('content')
@show


<footer>
       
       <div class='container'>
          <div class='col-md-12' style='padding-top: 40px;'>
              <li><center><img src="../../laravel-logo.png" style="width: 60px; height: 40px;"></center></li><br>
              <li><center><h5 style='display: inline;'>LARAVEL 5.1.27</h5> - Image Gallery &copy 2015</center></li>
              <li><center>Coded by : <a href=''>Renato Franco</center></a></li><br><br>
          </div>
      </div>

</footer>
