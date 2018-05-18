var velocity = 0.25;
$(document).ready(function(){
	/*Setting up the picture for parralaxing*/
	 var pos = $(window).scrollTop(); 
    $('.imgcontainer').each(function() { 
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-$(window).height();
	$(this).css('backgroundPosition', '50% ' + Math.round((height - pos) * velocity) + 'px'); })
	/*Initialization of Elements*/
    $('.collapsible').collapsible();
	$('.slider').slider();
	 $('.tooltipped').tooltip();
	
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
    $('.imgcontainer').each(function() { 
        var $element = $(this);
        // subtract some from the height b/c of the padding
        var height = $element.height()-$(window).height();
        $(this).css('backgroundPosition', '50% ' + Math.round((height - pos) * velocity) + 'px'); 
    }); 
};

$(window).bind('scroll', update);
