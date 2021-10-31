<?php

if (!defined('e107_INIT')) { exit; }    

$sitetheme = e107::getPref('sitetheme');

e107::themeLan('admin', $sitetheme, true);




class theme_config implements e_theme_config
{

	function __construct()
	{
 
	}


	function config()
	{
 
 
		return array(
			'offcanvas_navigation' => array('title'=>"Offcanvas navigation", 'type'=>'boolean',  'default'=>false, 'help'=> "Display Off Canvas Navigation instead of classic dropdown") ,
            'link_bullet_icon' => array('title'=>"Bullet icon for links in menus", 'type'=>'icon',  'default'=>"", 'help'=> "Set bullet for links used in menus. Recommended size 10x10px.") ,  
       );

	}

	function help()
	{
		return null; 
	}
	
	function process()
	{
	 	return null;
	}

}

