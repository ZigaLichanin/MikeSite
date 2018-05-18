var velocity = 0.5; 
$(document).ready(function(){
	
	$('.dropdown-trigger').dropdown();
	var createform=document.getElementById('createform');
	createform.reset();
	var loginform=document.getElementById('loginform');
	loginform.reset();
   /* Opening and Closing Sidenav*/
	  $('.sidenav').sidenav();
	  var elemsidenav = document.querySelector('.sidenav');
	  var sidenav = M.Sidenav.getInstance(elemsidenav);
	  
	  $("#content").mousemove(function(event){
/*console.log(event.pageX+" "+event.pageY);*/
if(event.pageX<=20){sidenav.open();}
if(event.pageX>=100){sidenav.close();}	
})
  });
  /* Parralax Function for Page*/
function update(){ 
    var pos = $(window).scrollTop(); 
    $('.parallax').each(function() { 
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-530;
        $(this).css('backgroundPosition', '50% ' + Math.round((height + pos) * velocity) + 'px'); 
    }); 
};

$(window).bind('scroll', update);