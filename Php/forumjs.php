<?php 
echo"
<script>
$(document).ready(function(){
	/*Initialization of Elements*/
    $('.collapsible').collapsible();
/* Opening and Closing Sidenav*/
	  $('.sidenav').sidenav();
	  var elemsidenav = document.querySelector('.sidenav');
	  var sidenav = M.Sidenav.getInstance(elemsidenav);
	 var collapsibleelem1=document.querySelector('.collapsible1');
	 var collapsible1 = M.Collapsible.getInstance(collapsibleelem1);
	 collapsible1.open();
//Check if its users first time logging in!
	var replyposted='".(isset($_SESSION['replyposted'])?$_SESSION['replyposted']:'')."';
if(replyposted=='true'){
	//Check if the user has logged in for first time
	 M.toast({html:'Reply posted!',displayLength:5000});
}
	  $('#content').mousemove(function(event){
if(event.pageX<=20){sidenav.open();}
if(event.pageX>=100){sidenav.close();}		
	  });
//Show that user posted something if coming from post a thread!
	var threadposted='".(isset($_SESSION['posted'])?$_SESSION['posted']:'')."';
if(threadposted=='true'){
	//Check if the user has posted 
	 M.toast({html:'Thread posted succesfully!',displayLength:6000});
	 
}
});</script>"; $_SESSION['posted']="false";  $_SESSION['replyposted']='false';?>