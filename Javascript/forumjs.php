<?php 
?>
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
	  });
//Show that user posted something if coming from post a thread!
	var threadposted="<?php if(isset($_SESSION['posted'])){echo $_SESSION['posted'];}?>";
if(threadposted=="true"){
	//Check if the user has posted 
	 M.toast({html:"Thread posted succesfully!",displayLength:6000});
<?php $_SESSION['posted']="false";?>}
});