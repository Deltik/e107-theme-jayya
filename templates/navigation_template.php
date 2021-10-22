<?php
/*
* Copyright (c) 2012 e107 Inc e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
* $Id: e_shortcode.php 12438 2011-12-05 15:12:56Z secretr $
*
* Navigation Template 
*/
 
if(class_exists('theme_settings')) {
  $link_settings = theme_settings::get_linkstyle(); 
}

 
// TEMPLATE FOR {NAVIGATION=main}
$NAVIGATION_TEMPLATE['main']['start'] = $link_settings['main']['prelink']; 
$NAVIGATION_TEMPLATE['main']['end'] = $link_settings['main']['postlink'];

 
// Main Link
$NAVIGATION_TEMPLATE['main']['item'] =  
$link_settings['main']['linkstart'].'
		<a class="'.$link_settings['main']['linkclass'].'"  role="button" href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">
		 '.$link_settings['main']['icon'].'<span>{NAV_LINK_NAME}</span> 
		</a> 
'.$link_settings['main']['linkend'];

// Main Link - active state
$NAVIGATION_TEMPLATE['main']['item_active'] =  
$link_settings['main']['linkstart_hilite'].'
		<a class="'.$link_settings['main']['linkclass_hilite'].'" role="button"  data-target="#" href="{NAV_LINK_URL}"{NAV_LINK_OPEN} title="{NAV_LINK_DESCRIPTION}">
		 '.$link_settings['main']['icon'].' <span>{NAV_LINK_NAME}</span>
		</a>
'.$link_settings['main']['linkend'];

// Main Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['item_submenu'] =  
$link_settings['main']['linkstart_sub'].' 
		<a class="'.$link_settings['main']['linkclass_sub'].'" role="button" '.$link_settings['main']['dropdown_on'].' data-target="#" href="{NAV_LINK_URL}" title="{NAV_LINK_DESCRIPTION}">
		 '.$link_settings['main']['icon'].'<span>{NAV_LINK_NAME}</span> 
		 '.$link_settings['main']['linkcaret'].'
		</a> 
		{NAV_LINK_SUB}
'.$link_settings['main']['linkend'];

// Main Link which has a sub menu - active state.
$NAVIGATION_TEMPLATE['main']['item_submenu_active'] =  
$link_settings['main']['linkstart_sub_hilite'].'
		<a class="'.$link_settings['main']['linkclass_sub_hilite'].'" role="button" '.$link_settings['main']['dropdown_on'].' data-target="#" href="{NAV_LINK_URL}">
		 '.$link_settings['main']['icon'].'<span>{NAV_LINK_NAME}</span>
		 '.$link_settings['main']['linkcaret'].'
		</a>
		{NAV_LINK_SUB}
'.$link_settings['main']['linkend'];


// Sub menu 
$NAVIGATION_TEMPLATE['main']['submenu_start'] = $link_settings['main_sub']['prelink'];
$NAVIGATION_TEMPLATE['main']['submenu_end']   = $link_settings['main_sub']['postlink'];

// Sub menu Link 
$NAVIGATION_TEMPLATE['main']['submenu_item'] = 
$link_settings['main_sub']['linkstart']. '
    <a class="'.$link_settings['main_sub']['linkclass'].'" href="{NAV_LINK_URL}" {NAV_LINK_OPEN}>{NAV_LINK_ICON}<span>{NAV_LINK_NAME}</span></a>
</li>
';


// Sub menu Link - active state
$NAVIGATION_TEMPLATE['main']['submenu_item_active'] = 
$link_settings['main_sub']['linkstart_hilite'] .'
	<a class="'.$link_settings['main_sub']['linkclass_hilite'].'" href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}<span>{NAV_LINK_NAME}</span></a>
</li>
';



/** THIS IS NOT WORKING BY DEFAULT 3rd level is not supported by bootstrap, this is only for megamenu **/
// sub sub menu
$NAVIGATION_TEMPLATE['main']['submenu_lowerstart'] =  $link_settings['main_sub_sub']['prelink'];
$NAVIGATION_TEMPLATE['main']['submenu_lowerend']   = $link_settings['main_sub_sub']['postlink'];
 
// Sub Menu Link which has a sub menu. 
$NAVIGATION_TEMPLATE['main']['submenu_loweritem'] = 
$link_settings['main_sub']['linkstart_sub'].'  
				<a class="'.$link_settings['main_sub']['linkclass_sub'].'"  href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}<span>{NAV_LINK_NAME}</span></a>
				{NAV_LINK_SUB}
			</li>
';

$NAVIGATION_TEMPLATE['main']['submenu_loweritem_active'] = 
$link_settings['main_sub']['linkstart_sub_hilite'].
			'<a class="'.$link_settings['main_sub']['linkclass_sub_hilite'].'"  href="{NAV_LINK_URL}"{NAV_LINK_OPEN}>{NAV_LINK_ICON}<span>{NAV_LINK_NAME}</span></a>
				{NAV_LINK_SUB}
			</li>
';
 