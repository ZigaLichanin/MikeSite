$(document).ready(function(){
	/* Opening and Closing Sidenav*/
	  $('.sidenav').sidenav();
	  var elemsidenav = document.querySelector('.sidenav');
	  var sidenav = M.Sidenav.getInstance(elemsidenav);
	  
	  $("#content").mousemove(function(event){
/*console.log(event.pageX+" "+event.pageY);*/
if(event.pageX<=20){sidenav.open();}
if(event.pageX>=100){sidenav.close();}	
})
$('.dropdown-trigger').dropdown();
});