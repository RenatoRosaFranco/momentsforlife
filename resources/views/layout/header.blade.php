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
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
            <li><a href="/register">Documentation</a></li>
            <li><a href="/register">Criar Conta</a></li>
            <li><a href="/login">Login</a></li>
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
          <div class='col-md-12' style='padding-top: 20px;'>
              <li><center><img src="laravel-logo.png" style="width: 60px; height: 40px;"></center></li><br>
              <li><center><h5 style='display: inline;'>LARAVEL 5.1.27</h5> - Image Gallery &copy 2015</center></li>
              <li><center>Coded by : <a href=''>Renato Franco</center></a></li><br><br>
          </div>
      </div>

</footer>
