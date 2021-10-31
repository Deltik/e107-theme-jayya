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
/**
 * Template for Book and Chapter Listings, as well as navigation on those pages. 
 */


 
$CHAPTER_TEMPLATE['default']['listPages']['caption']				= "{CHAPTER_NAME}";
$CHAPTER_TEMPLATE['default']['listPages']['start'] 					= "{CHAPTER_BREADCRUMB}<ul class='page-pages-list'>";
$CHAPTER_TEMPLATE['default']['listPages']['item'] 					= "<li><a href='{CPAGEURL}'>{CPAGETITLE}</a></li>";
$CHAPTER_TEMPLATE['default']['listPages']['end'] 					= "</ul>";	

$CHAPTER_TEMPLATE['default']['listChapters']['caption']				= "{BOOK_NAME}";	
$CHAPTER_TEMPLATE['default']['listChapters']['start']				= "<ul class='page-chapters-list'>";
$CHAPTER_TEMPLATE['default']['listChapters']['item']				= "<li><h4><a href='{CHAPTER_URL}'>{CHAPTER_NAME}</a></h4>{PAGES}";
$CHAPTER_TEMPLATE['default']['listChapters']['end']					= "</ul>";

$CHAPTER_TEMPLATE['default']['listBooks']['start']					= "<ul class='page-books-list'>";
$CHAPTER_TEMPLATE['default']['listBooks']['item']					= "<li><h3><a href='{BOOK_URL}'>{BOOK_NAME}</a></h3>{CHAPTERS}";
$CHAPTER_TEMPLATE['default']['listBooks']['end']					= "</ul>";



$CHAPTER_TEMPLATE['nav']['listChapters']['caption']					= "Articles";

$CHAPTER_TEMPLATE['nav']['listChapters']['start'] 					= '<ul class="list-group page-nav">';
	
$CHAPTER_TEMPLATE['nav']['listChapters']['item']					= '
																	<li class="list-group-item">
																		<a role="button" href="{LINK_URL}" >
																		 {LINK_NAME} 
																		</a> 
																	</li>
																	';
	

$CHAPTER_TEMPLATE['nav']['listChapters']['item_submenu']	 		= '
																	<li class="list-group-item">
																		<a role="button" href="{LINK_URL}" >
																		 {LINK_NAME} 
																		</a> 
																		{LINK_SUB}
																	</li>
																	';
	
$CHAPTER_TEMPLATE['nav']['listChapters']['item_submenu_active']		= '
																	<li class="list-group-item active">
																		<a role="button"  href="{LINK_URL}">
																		 {LINK_NAME}
																		</a>
																		{LINK_SUB}
																	</li>
																	';	
																	
$CHAPTER_TEMPLATE['nav']['listChapters']['item_active'] 			= '
																	<li class="list-group-item active">
																		<a crole="button" href="{LINK_URL}">
																		 {LINK_NAME}
																		</a>
																	</li>
																	';	

$CHAPTER_TEMPLATE['nav']['listChapters']['end'] 					= '</ul>';		

	
$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_start'] 			= '<ul class="page-nav" id="{LINK_IDENTIFIER}" role="menu" >';
	
	
$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_item'] 			= '
																	<li role="menuitem" >
																		<a href="{LINK_URL}">{LINK_NAME}</a>
																		{LINK_SUB}
																	</li>
																	';
	
$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_loweritem']		= '
																		<li role="menuitem" >
																			<a href="{LINK_URL}">{LINK_NAME}</a>
																			{LINK_SUB}
																		</li>
																	';
$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_loweritem_active'] = '
																			<li role="menuitem" class="active">
																				<a href="{LINK_URL}">{LINK_NAME}</a>
																				{LINK_SUB}
																			</li>
																		';

$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_item_active'] 	= '
																			<li role="menuitem" class="active">
																				<a href="{LINK_URL}">{LINK_NAME}</a>
																				{LINK_SUB}
																			</li>
																		';

$CHAPTER_TEMPLATE['nav']['listChapters']['submenu_end'] 			= '</ul>';	


$CHAPTER_TEMPLATE['nav']['listBooks'] = $CHAPTER_TEMPLATE['nav']['listChapters'];
$CHAPTER_TEMPLATE['nav']['listPages'] = $CHAPTER_TEMPLATE['nav']['listChapters'];
$CHAPTER_TEMPLATE['nav']['showPage'] = $CHAPTER_TEMPLATE['nav']['listChapters'];


// Used by e107_plugins/page/chapter_menu.php & /page.php?bk=x
$CHAPTER_TEMPLATE['panel']['listChapters']['caption']			= "{BOOK_NAME}";
$CHAPTER_TEMPLATE['panel']['listChapters']['start']				= "<!-- Chapter Template: Panel listChapters --><div class='chapter-panel-list'>";
$CHAPTER_TEMPLATE['panel']['listChapters']['item']				= "<div>
																	<a href='{CHAPTER_URL}'>{THEME_BULLET} {THEME_BUTTON}{CHAPTER_NAME}</a>
         															 <br>{CHAPTER_DESCRIPTION} </div>";
$CHAPTER_TEMPLATE['panel']['listChapters']['end']				= "</div>";


$CHAPTER_TEMPLATE['panel']['listPages']['caption']				= "{CHAPTER_NAME}";
$CHAPTER_TEMPLATE['panel']['listPages']['start'] 				= "<!-- Chapter Template: Panel listPages -->{CHAPTER_BREADCRUMB}<div class='chapter-pages-list'>";
$CHAPTER_TEMPLATE['panel']['listPages']['item'] 				= "<div class='section'>{CPAGEMENU}</div>";
$CHAPTER_TEMPLATE['panel']['listPages']['end'] 					= "</div>";	

$CHAPTER_TEMPLATE['panel']['listPages'] = $CHAPTER_TEMPLATE['default']['listPages'];

$CHAPTER_TEMPLATE['grid']['listPages']['caption']				= "{CHAPTER_NAME}";
$CHAPTER_TEMPLATE['grid']['listPages']['start']				    = "<!-- Chapter Template: Grid listPages -->{SETIMAGE: w=450}{CHAPTER_BREADCRUMB}<div class='chapter-pages-list'><div class='row'>";
$CHAPTER_TEMPLATE['grid']['listPages']['item']				    = "<div class='col-xs-12 col-md-4 text-center'>{CPAGEMENU}</div>";
$CHAPTER_TEMPLATE['grid']['listPages']['end']				    = "</div></div>";



$CHAPTER_TEMPLATE['grid']['listChapters']['start']				= "<!-- Chapter Template: Grid listChapters -->{SETIMAGE: w=450}<div class='row'>";
$CHAPTER_TEMPLATE['grid']['listChapters']['item']				= "<div class='col-xs-12 col-md-4 text-center'>
																	{CHAPTER_IMAGE}
																	<h2><a href='{CHAPTER_URL}' >{CHAPTER_NAME}</a></h2><p>{CHAPTER_DESCRIPTION}</p><p>{CHAPTER_BUTTON}</p></div>";
$CHAPTER_TEMPLATE['grid']['listChapters']['end']				= "</div>";




