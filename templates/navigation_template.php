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


// TEMPLATE FOR {NAVIGATION=main}
$NAVIGATION_TEMPLATE['main']['start'] = '<ul class="nav navbar-nav nav-main ml-auto">';

// Main Link
$NAVIGATION_TEMPLATE['main']['item'] = '
	<li class="nav-item">
		<a  class="nav-link menuButton"  role="button" href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">
		<span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME} 
		</a> 
	</li>
';

// Main Link - active state
$NAVIGATION_TEMPLATE['main']['item_active'] = '
	<li id="menu_current" class="nav-item active ">
		<a class="nav-link menuButton menuButtonActive" role="button"  data-target="#" href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">
		<span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME}
		</a>
	</li>
';

// Main Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['item_submenu'] = '
	<li class="nav-item dropdown {NAV_LINK_IDENTIFIER}">
		<a class="nav-link menuButton dropdown-toggle"  role="button" data-toggle="dropdown" data-bs-toggle="dropdown" data-target="#" href="{NAV_LINK_URL}" title="{NAV_LINK_DESCRIPTION}">
		<span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME} 
		 <span class="caret"></span>
		</a> 
		{NAV_LINK_SUB}
	</li>
';

// Main Link which has a sub menu - active state.
$NAVIGATION_TEMPLATE['main']['item_submenu_active'] = '
	<li class="nav-item dropdown active {NAV_LINK_IDENTIFIER}">
		<a class="nav-link menuButton menuButtonActive  \dropdown-toggle" role="button" data-toggle="dropdown" data-bs-toggle="dropdown" data-target="#" href="{NAV_LINK_URL}">
		<span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME}
		 <span class="caret"></span>
		</a>
		{NAV_LINK_SUB}
	</li>
';	

$NAVIGATION_TEMPLATE['main']['end'] = '</ul>';	

// Sub menu 
$NAVIGATION_TEMPLATE['main']['submenu_start'] = '
		<ul class="dropdown-menu menu submenu-start submenu-level-{NAV_LINK_DEPTH}" role="menu" >
';

// Sub menu Link 
$NAVIGATION_TEMPLATE['main']['submenu_item'] = '
			<li class="linkstart link-depth-{NAV_LINK_DEPTH}">
				<a class="menuItem" href="{NAV_LINK_URL}"{NAV_LINK_OPEN}><span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME}</a>
			</li>
';

// Sub menu Link - active state
$NAVIGATION_TEMPLATE['main']['submenu_item_active'] = '
			<li class="linkstart active link-depth-{NAV_LINK_DEPTH}">
				<a class="menuItem" href="{NAV_LINK_URL}"{NAV_LINK_OPEN}><span class="menuButton-icon">{NAV_LINK_ICON}</span> {NAV_LINK_NAME}</a>
			</li>
';
$NAVIGATION_TEMPLATE['main']['submenu_end'] = '</ul>';

// Sub menu
$NAVIGATION_TEMPLATE['main']['submenu_lowerstart'] = '
		<ul class="dropdown-menu submenu-start lower submenu-level-{NAV_LINK_DEPTH}" role="menu" >
';

// Sub Menu Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['submenu_loweritem'] = '
			<li role="menuitem" class="dropdown-submenu lower">
				<a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a>
				{NAV_LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['main']['submenu_loweritem_active'] = '
			<li role="menuitem" class="dropdown-submenu active">
				<a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a>
				{NAV_LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['main']['submenu_lowerend'] = '</ul>';



// TEMPLATE FOR {NAVIGATION=side}

$NAVIGATION_TEMPLATE['side']['start'] 				= '<ul class="listgroup nav-side">';

$NAVIGATION_TEMPLATE['side']['item'] 				= '<li class="list-group-item"><a href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['side']['item_submenu'] 		= '<li class="list-group-item nav-header">{NAV_LINK_ICON}{NAV_LINK_NAME}{NAV_LINK_SUB}</li>';

$NAVIGATION_TEMPLATE['side']['item_submenu_active'] = '<li class="list-group-item nav-header">{NAV_LINK_ICON}{NAV_LINK_NAME}{NAV_LINK_SUB}</li>';

$NAVIGATION_TEMPLATE['side']['item_active'] 		= '<li class="list-group-item active"{NAV_LINK_OPEN}><a class="list-group-item active" href="{NAV_LINK_URL}" title="{NAV_LINK_DESCRIPTION}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>
														';

$NAVIGATION_TEMPLATE['side']['end'] 				= '</ul>
														';

$NAVIGATION_TEMPLATE['side']['submenu_start'] 		= '';

$NAVIGATION_TEMPLATE['side']['submenu_item']		= '<li class="list-group-item" ><a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['side']['submenu_loweritem'] = '
			<li role="menuitem" class="dropdown-submenu">
				<a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a>
				{NAV_LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['side']['submenu_item_active'] = '<li class="active"><a href="{NAV_LINK_URL}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['side']['submenu_end'] 		= '';


// Footer links.  - ie. 3 columns of links. 
 
$NAVIGATION_TEMPLATE["footer"]["start"] 				= "<ul class='nav justify-content-center footer'>";
$NAVIGATION_TEMPLATE["footer"]["item"] 					= "<li class='nav-item'><a class='nav-link' href='{NAV_LINK_URL}'{NAV_LINK_OPEN} title=\"{NAV_LINK_DESCRIPTION}\">{NAV_LINK_NAME}</a></li>";
$NAVIGATION_TEMPLATE["footer"]["item_submenu"] 			= $NAVIGATION_TEMPLATE["footer"]["item"] ;
$NAVIGATION_TEMPLATE["footer"]["item_active"] 			= $NAVIGATION_TEMPLATE["footer"]["item"];
$NAVIGATION_TEMPLATE['footer']['item_submenu_active']   = $NAVIGATION_TEMPLATE["footer"]["item"];
$NAVIGATION_TEMPLATE["footer"]["end"] 					= "</ul>";
 


$NAVIGATION_TEMPLATE['alt']['start'] 				= '<ul class="nav nav-list">
														';

$NAVIGATION_TEMPLATE['alt']['item'] 				= '<li><a href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>
														';

$NAVIGATION_TEMPLATE['alt']['item_submenu'] 		= '<li class="nav-header">{NAV_LINK_ICON}{NAV_LINK_NAME}{NAV_LINK_SUB}</li>
														';

$NAVIGATION_TEMPLATE['alt']['item_active'] 		= '<li class="active"{NAV_LINK_OPEN}><a href="{NAV_LINK_URL}" title="{NAV_LINK_DESCRIPTION}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>
														';

$NAVIGATION_TEMPLATE['alt']['end'] 				= '</ul>
														';

$NAVIGATION_TEMPLATE['alt']['submenu_start'] 		= '';

$NAVIGATION_TEMPLATE['alt']['submenu_item']		= '<li><a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['alt']['submenu_loweritem'] = '
			<li role="menuitem" class="dropdown-submenu">
				<a href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}{NAV_LINK_NAME}</a>
				{NAV_LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['alt']['submenu_item_active'] = '<li class="active"><a href="{NAV_LINK_URL}">{NAV_LINK_ICON}{NAV_LINK_NAME}</a></li>';

$NAVIGATION_TEMPLATE['alt']['submenu_end'] 		= '';


$NAVIGATION_TEMPLATE['alt5'] 						= $NAVIGATION_TEMPLATE['alt'];
$NAVIGATION_TEMPLATE['alt6'] 						= $NAVIGATION_TEMPLATE['alt'];

$NAVIGATION_TEMPLATE['alt5']['start'] 				= '<ul class="nav nav-list nav-alt5">';
$NAVIGATION_TEMPLATE['alt6']['start'] 				= '<ul class="nav nav-list nav-alt6">';


 