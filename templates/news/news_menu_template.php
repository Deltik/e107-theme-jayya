<?php
/**
 * Copyright (C) e107 Inc (e107.org), Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
 * $Id$
 * 
 * News menus templates
 */

if (!defined('e107_INIT'))  exit;

$lists_style = array();
if(class_exists('theme_settings')) {
  $lists_style = theme_settings::get_lists_style(); 
}

//$bullet = "<img src='".THEME_ABS."images/bullet2.gif' alt='bullet' class='icon' />";
$bullet = '';
if(class_exists('theme_shortcodes')) {
  $bullet = theme_shortcodes::sc_theme_bullet();
}
 
// category menu
$NEWS_MENU_TEMPLATE['category']['start']       = $lists_style['start'];
$NEWS_MENU_TEMPLATE['category']['end']         = $lists_style['end'];
$NEWS_MENU_TEMPLATE['category']['item']        = $lists_style['item_start'].'<a class="e-menu-link newscats{ACTIVE}" href="{NEWS_CATEGORY_URL}">'.$bullet.' {NEWS_CATEGORY_TITLE}</a><span class="badge-lists">[{NEWS_CATEGORY_NEWS_COUNT=raw}]</span>'.$lists_style['item_end'];
 
// @deprecated months menu - use news archive instead.
$NEWS_MENU_TEMPLATE['months']['start']       = $lists_style['start'];
$NEWS_MENU_TEMPLATE['months']['end']         = $lists_style['end'];
$NEWS_MENU_TEMPLATE['months']['item']        = $lists_style['item_start'].
'<a class="e-menu-link newsmonths{active}" href="{url}">'.$bullet.' {month}</a> <span class="badge-lists">[{count}]</span>'.$lists_style['item_end'];
 
// sends value to tablestyle / $options['footer'];
// $NEWS_MENU_TEMPLATE['months']['footer']   = '<div class="e-menu-link news-menu-archive" ><a class="btn btn-default btn-secondary btn-sm btn-block" href="{e_PLUGIN}blogcalendar_menu/archive.php">{LAN=BLOGCAL_L2}</a></div>';;

//$NEWS_MENU_TEMPLATE['months']['separator']   = '<br />';
 
// latest menu
$NEWS_MENU_TEMPLATE['latest']['start']       = $lists_style['start'];
$NEWS_MENU_TEMPLATE['latest']['end']         = $lists_style['end'];
$NEWS_MENU_TEMPLATE['latest']['item']        = $lists_style['item_start'].
'<a class="e-menu-link newsmonths" href="{NEWSURL}">{THEME_BULLET} {NEWSTITLE}</a><span class="badge-lists">[{NEWSCOMMENTCOUNT}]</span>'.$lists_style['item_end'];
 

$NEWS_MENU_TEMPLATE['archive']['start']       = $lists_style['start']; 
$NEWS_MENU_TEMPLATE['archive']['end']         = $lists_style['end'];

$NEWS_MENU_TEMPLATE['archive']['year_start']        = "<li class='list-group-item' >
												<a class='e-expandit {EXPANDOPEN}' href='#{YEAR_ID}' style='display:block'>".$bullet." {YEAR_NAME}</a>
												<ul id='{YEAR_ID}' class='menu-list pl-2 news-archive-menu-months' style='display:{YEAR_DISPLAY}'>
												";
$NEWS_MENU_TEMPLATE['archive']['year_end']        = '</ul></li>';

$NEWS_MENU_TEMPLATE['archive']['month_start']        = "<li>
													 <a class='e-expandit' href='#{MONTH_ID}'>".$bullet." {MONTH_NAME}</a><span class='badge-lists'>[{MONTH_COUNT}]</span> 
													 <ul id='{MONTH_ID}' class='menu-list pl-3 news-archive-menu-items' style='display:none'>
													 ";
$NEWS_MENU_TEMPLATE['archive']['month_end']        = '</ul></li>';

$NEWS_MENU_TEMPLATE['archive']['item']        = "<li><a href='{ITEM_URL}'>".$bullet." {ITEM_TITLE}</a></li>\n";


// Other News Menu. 
$NEWS_MENU_TEMPLATE['other']['caption'] 	= TD_MENU_L1;
$NEWS_MENU_TEMPLATE['other']['start']		= "<div id='otherNews' data-interval='false' data-bs-interval='false' class='carousel slide othernews-block'>
												<div class='carousel-inner'>
												{SETIMAGE: w=400&h=200&crop=1}"; // set the {NEWSIMAGE} dimensions. 								
$NEWS_MENU_TEMPLATE['other']['item']		= '<div class="carousel-item item {ACTIVE}">
												{NEWSTHUMBNAIL=placeholder}
              									<h3>{NEWSTITLE}</h3>
              									<p>{NEWSSUMMARY}</p>
              									<p class="text-right text-end"><a class="btn btn-sm btn-primary btn-othernews" href="{NEWSURL}">{LAN=READ_MORE} &raquo;</a></p>
            									</div>';									
$NEWS_MENU_TEMPLATE['other']['end']			= "</div></div>";








// Other News Menu. 2 

$NEWS_MENU_TEMPLATE['other2']['caption'] 	= TD_MENU_L2;
$NEWS_MENU_TEMPLATE['other2']['start'] 	= "<ul class='media-list unstyled list-unstyled othernews2-block'>{SETIMAGE: w=100&h=100&crop=1}"; // set the {NEWSIMAGE} dimensions.
$NEWS_MENU_TEMPLATE['other2']['item'] 	= "<li class='media d-flex'>
										<span class='media-object pull-left float-left mr-3 me-3'>{NEWSTHUMBNAIL=placeholder}</span> 
										<div class='media-body'><h4>{NEWSTITLELINK}</h4>
										<p class='text-right text-end'><a class='btn btn-sm btn-primary btn-othernews2' href='{NEWSURL}'>{LAN=READ_MORE} &raquo;</a></p>
										</div>
										</li>\n";
										
$NEWS_MENU_TEMPLATE['other2']['end'] 	= "</ul>";




// Grid Menu
// Moved to news_grid_template.php


// $NEWS_MENU_WRAPPER['grid']['NEWSTITLE'] = "<span style='color:red'>{---}</span>"; // example


/* Carousel Menu */

$NEWS_MENU_TEMPLATE['carousel']['start'] = '
										    <div id="news-carousel" class="carousel slide" data-ride="carousel" data-bs-ride="carousel">
										        <div class="row">
										      <!-- Wrapper for slides -->
										      <div id="news-carousel-images" class="col-md-8">
										      <div class="carousel-inner">';


$NEWS_MENU_TEMPLATE['carousel']['end'] = '

										      </div><!-- End Carousel Inner -->
											</div>
												<div id="news-carousel-titles" class="col-md-4 ">
													<ul id="news-carousel-nav" class="nav nav-inverse nav-stacked pull-right float-right float-end">{NAV}</ul>
												</div>
											</div><!-- End Carousel -->
											</div>
										 ';


$NEWS_MENU_TEMPLATE['carousel']['item'] = '<!-- Start Item -->
											<div class="carousel-item item {ACTIVE}">{SETIMAGE: w=800&h=370&crop=1}
									          {NEWS_IMAGE: class=img-responsive img-fluid}
									           <div class="carousel-caption">
									            <small>{NEWS_DATE=dd MM, yyyy}</small>
									            <h1>{NEWS_TITLE}</h1>

									          </div>
									        </div><!-- End Item -->';

$NEWS_MENU_TEMPLATE['carousel']['nav'] = '<li data-target="#news-carousel" data-slide-to="{COUNT}" data-bs-slide-to="{COUNT}" class="{ACTIVE}"><a href="#">{NEWS_SUMMARY}</a></li>';

