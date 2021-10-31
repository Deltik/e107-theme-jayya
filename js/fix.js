$(document).ready(function() {

	//should be fixed in core
    $('i.fa-rss').each(function() {
      	 $(this).addClass('fas');
  	} ); 
     
      
    $('.user-profile').find('.page-link').each(function() {
  	 $(this).removeClass().addClass('btn btn-default');
  	} ); 
      
 
    var windowWidth = jQuery(window).width();
    if(windowWidth <= 992) { //for iPad & smaller devices
       jQuery('.accordion-collapse').collapse()
    }
 

	$("img.news_image").each(function(){
        if ($(this).hasClass("img-responsive")) {
        } else {
            $(this).addClass("img-responsive");
        }
    });
    
                
});