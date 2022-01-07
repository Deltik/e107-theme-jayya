<?php

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
 

if(!defined('e107_INIT'))
{
	exit();
}

////// Multilanguages/ /////////////////////////////////////////////////////////
e107::lan('theme');
 
 
class theme implements e_theme_render
{
    public function init()
    {
       
        ////// Your own css fixes ////////////////////////////////////////////////////
        define('CORE_CSS', false);
  
        ////// Theme meta tags /////////////////////////////////////////////////////////
        $this->set_metas();

        /////// Theme css  /////////////////////////////////////////////////////////////
        $this->register_css();

        /////// Theme js  /////////////////////////////////////////////////////////////
        $this->register_js();

        /////// Theme fonts ///////////////////////////////////////////////////////////
        $this->register_fonts();

        /////// Theme icons ///////////////////////////////////////////////////////////
        $this->register_icons();

        $this->getInlineCodes();
    }

    function set_metas()
    {
        e107::meta('viewport', 'width=device-width, initial-scale=1.0');
    }
    
    public function register_css()
    {     
       e107::css('theme', 'css/style.css');  
    }

    public function register_js()
    {
        e107::js('theme', 'js/fix.js', 'jquery');  
    }

    public function register_fonts()
    {
    }

    public function register_icons()
    {
    }

    public function getInlineCodes()
    {
 
    }
    
    function tablestyle($caption, $text, $mode = '', $options = array())
    {
    	$style = varset($options['setStyle'], 'default');
        
    	if (e_DEBUG) {
        	echo "
        	<!-- tablestyle initial:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->
        	";
        	echo "\n<!-- \n";
        
        	echo json_encode($options, JSON_PRETTY_PRINT);
        
        	echo "\n-->\n\n";
        }
         
        /* style switcher */    
        switch ($mode) {
        	    case 'wmessage':
    			case 'wm':
    				$style = 'wmessage';
    			break;
             
        }    
        
         if (e_DEBUG) {
    			echo "
    			<!-- tablestyle after switch:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->
    			";
    			echo "\n<!-- \n";
    
    			echo json_encode($options, JSON_PRETTY_PRINT);
    
    			echo "\n-->\n\n";
     	}
     
        /* specific for this theme, always caption */
     	$caption = $caption ? $caption : '&nbsp;';
        
        // what is this?
        if ((isset($mode['style']) && $mode['style'] == 'button_menu') || (isset($mode) && ($mode == 'menus_config'))) {
    		$menu = ' buttons';
    		$bodybreak = '';
    		$but_border = ' button_menu';
    	} else {
    		$menu = '';
    		$bodybreak = '<br />';
    		$but_border = '';
    	}
        $menu .= ($style && $style != 'default') ? ' non_default' : '';
    
     	switch($style)
    	{
                case 'none':
                    echo $text;
                break;
                
                case 'topright':
                    echo "<div class='col m-auto'>".$text."</div>";
                break;    
                
                case "leftmenu":
                case "rightmenu":
                
                /* if the same menu is used more times */
          		$itemid =  $options['uniqueId'].rand() ;
     
          		echo '<div class="accordion-item cap_border'.$but_border.'">';
                echo '<div class="accordion-header left_caption" id="heading'.$itemid.'"><div class="bevel"> 
                      		<button class="accordion-button" type="button" type="button" data-bs-toggle="collapse" data-bs-target="#'.$itemid.'" aria-expanded="true" aria-controls="'.$itemid.'">
          		  '.$caption.'
          		  </button>
                </div></div>';
     
            	echo '<div id="'.$itemid.'" class="cont accordion-collapse collapse show" aria-labelledby="heading'.$itemid.'" >
            		  <div class="accordion-body menu_content '.$menu.'">
            		  '.$text.$bodybreak.'
            		  </div>
            		</div>
            	  </div>';
            	  break;
              
                default:
                   echo "<div class='cap_border".$but_border."'>";
                   echo "<div class='main_caption'><div class='bevel'>".$caption."</div></div>";
                   	echo "</div>";
                	if ($text != "") {
                		echo "<table class='cont'><tr><td class='menu_content ".$menu."'>".$text.$bodybreak."</td></tr></table>";
                	}
        }
        
    }
}
 
  