<?php
echo"
<script>
$(document).ready(function(){
	/*Initialization of Elements*/
	
/* Opening and Closing Sidenav*/
	  $('.sidenav').sidenav();
	  var elemsidenav = document.querySelector('.sidenav');
	  var sidenav = M.Sidenav.getInstance(elemsidenav);	 
	  $('#content').mousemove(function(event){
if(event.pageX<=20){sidenav.open();}
if(event.pageX>=100){sidenav.close();}		
});});</script>";
?>