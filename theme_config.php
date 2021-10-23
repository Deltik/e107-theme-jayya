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
            'display_menuButton_icon' => array('title'=>"Display menu icon in navbar", 'type'=>'boolean',  'default'=>false, 'help'=> "Display menu icons for all main menu items") ,
            'menuButton_icon' => array('title'=>"Main Menu Icon", 'type'=>'icon',  'default'=>"", 'help'=> "Set main menu icon. Works only if displaying is set on. Recommended size 16x16px.") ,
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

