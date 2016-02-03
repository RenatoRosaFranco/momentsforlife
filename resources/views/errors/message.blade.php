<div class='container'>
     
     @if(count($errors) > 0 )
           @foreach($errors->all() as $error)
             <script type="text/javascript">
                   alertify.error("{{$error}}", 3000);
           </script>
           @endforeach
     @endif
      
	   @if(Session::has('success'))
          <script type="text/javascript">
                   alertify.success("{{Session::get('success')}}", 3000);
           </script>
	   @endif

	   @if(Session::has('info'))
           <script type="text/javascript">
                   alertify.info("{{Session::get('info')}}", 3000);
           </script>
	   @endif

	   @if(Session::has('warning'))
           <script type="text/javascript">
                   alertify.warning("{{Session::get('warning')}}", 3000);
           </script>
	   @endif

	   @if(Session::has('error'))
           <script type="text/javascript">
                   alertify.error("{{Session::get('error')}}", 3000);
           </script>
	   @endif

</div>