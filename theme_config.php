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

