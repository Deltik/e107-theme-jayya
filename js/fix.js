$(document).ready(function() {

	//should be fixed in core
    $('i.fa-rss').each(function() {
      	 $(this).addClass('fas');
  	} ); 
  	
 
    //changing class for sending PM - todo fix with sass 
    $('.userprofile').find('.sendpm').each(function() {
  	 $(this).removeClass().addClass('sendpm btn btn-default');
  	} );     
  	
    //changing class for sending PM - todo fix with sass 
    $('.userprofile').find('.efiction_links').each(function() {
  	 $(this).removeClass().addClass('btn btn-outline-default');
  	} ); 
      
    $('.userprofile').find('.btn.btn-default.btn-secondary').each(function() {
  	 $(this).removeClass().addClass('btn btn-default px-4');
  	} );      
      
    $('.userprofile').find('.page-link').each(function() {
  	 $(this).removeClass().addClass('btn btn-default');
  	} ); 
      
 
    var windowWidth = jQuery(window).width();
    if(windowWidth <= 1024) { //for iPad & smaller devices
       jQuery('.accordion-collapse').collapse()
    }
 

	$("img.news_image").each(function(){
        if ($(this).hasClass("img-responsive")) {
        } else {
            $(this).addClass("img-responsive");
        }
    });
    
                
});