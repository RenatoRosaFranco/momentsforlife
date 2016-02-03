<div class='jumbotron' id='presenter'>
	 <div class='container'>  
	 	   <ul style="margin-top: 110px;">
	 	       <li><center><img src="../../uploads/imageProfile/images/{{$user->picture}}" 
	 	       id='profileEditPic' class='thumbnail'></center></li>
	 	   	   <li><center><h4>{{ strtoupper($user->name) }}</h4></center></li>
	 	   	   <li><center><h5><a href="">{{ "@" . $user->nickname }}</a></h5></center></li>
	 	   	   <li style='margin-top: 15px !important;'><center><span class='label label-danger'> Membro </span></center></li>
	 	   </ul>
	 </div>
</div>