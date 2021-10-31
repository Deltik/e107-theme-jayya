/*
 * Copyright (C) 2011-2021 Deltik <https://www.deltik.net/>
 * Copyright (C) 2008-2009 e107 Inc <https://e107.org/>
 *
 * Jayya MoreBlue images are from Debian MoreBlue Orbit GDM Theme
 * version 1.0 (August 2008)
 * Copyright (C) 2006-2008 Andre Luiz Rodrigues Ferreira
 *
 * This file is part of Jayya.
 *
 * Jayya is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jayya is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jayya.  If not, see <https://www.gnu.org/licenses/>.
 */

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