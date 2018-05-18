<?php
?>
$(document).ready(function(){
	/*Initialization of Elements*/
	
/* Opening and Closing Sidenav*/
	  $('.sidenav').sidenav();
	  var elemsidenav = document.querySelector('.sidenav');
	  var sidenav = M.Sidenav.getInstance(elemsidenav);
	  //Check if its users first time logging in!
	var replyposted="<?php if(isset($_SESSION['replyposted'])){echo $_SESSION['replyposted'];}?>";
if(replyposted=="true"){
	//Check if the user has logged in for first time
	 M.toast({html:'Reply posted!',displayLength:5000});
}
	 <?php $_SESSION['replyposted']="false";?>
	  $("#content").mousemove(function(event){
/*console.log(event.pageX+" "+event.pageY);*/
if(event.pageX<=20){sidenav.open();}
if(event.pageX>=100){sidenav.close();}		
});});