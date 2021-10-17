<?php

/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 *
 * Jayya MoreBlue images are from Debian MoreBlue Orbit GDM Theme
 * version 1.0 (August 2008)
 * Copyright (C) 2006-2008  Andre Luiz Rodrigues Ferreira
 *
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 */
 

if(!defined('e107_INIT'))
{
	exit();
}
 
$sitetheme = deftrue('USERTHEME', e107::getPref('sitetheme')); 
e107::getSingleton('theme_settings', e_THEME.$sitetheme."/theme_settings.php");


////// fix for not able to set default skin ////////////////////////////////////
////// issue https://github.com/e107inc/e107/issues/4514  6.6.2021 /////////////
$tmp_frontcss = e107::getPref('themecss');     
if($tmp_frontcss == "style.css") { 
    $tmp_frontcss = "skins/default.css";
    e107::getConfig()->setPref('themecss', $tmp_frontcss)->save(false,true,false);
}
////////////////////////////////////////////////////////////////////////////////
 
/* tmp solution for testing  */
$av_skins = array("canvas.css", "default.css", "pepper.css", "moreblue.css");
if(isset($_GET['skin']) && in_array($_GET['skin'], $av_skins )) {
    $tmp_frontcss = "skins/".$_GET['skin'];
    e107::getConfig()->setPref('themecss', $tmp_frontcss)->save(false,true,false);
    e107::redirect();
} 
 
////// Multilanguages/ /////////////////////////////////////////////////////////
e107::lan('theme');

////////////////////////////////////////////////////////////////////////////////
define("THEME_LEGACY",false); //warning it is ignored somewhere
//define("THEME_DISCLAIMER", "Copyright &copy; xxx by <a href='xxx'>xxx</a>. All rights reserved.");
define("THEME_DISCLAIMER", " ");
define("STANDARDS_MODE", TRUE);
////// Your own css fixes ////////////////////////////////////////////////////
define("CORE_CSS", false);  //copy core e107.css to theme and remove problematic rules 

/* way how to avoid loading libraries by core **********************************/
/* 
define("BOOTSTRAP",  5);
define("FONTAWESOME",  5);

e107::getParser()->setBootstrap(5);
e107::getParser()->setFontAwesome(5);
e107::getForm()->_snippets = true;
 
function fake() {
  $fake = "font-awesome.min.css";
  $fake = "bootstrap.min.js";
  $fake = "bootstrap.min.css";
}
*/



/*************** HEADERS AND FOOTERS  *****************************************/
/* way how to change shortcodes on fly, it is not needed here, so just array()*/ 
$elements = array();
 
/* we need 2 headers */
$LAYOUT['_header_'] = '';
$LAYOUT['_footer_'] = '';


/* fill new header and footer */
$LAYOUT_HEADER =  theme_settings::layout_header($elements);
$LAYOUT_FOOTER =  theme_settings::layout_footer($elements);
/************** end of HEADERS AND FOOTERS ***************** ******************/


/*************** LAYOUTS ******************************************************/
$layout = '_default'; 
 
///////////////////////DEFAULT 3 COLUMN LAYOUT ////////////////////////////////
/* Note: use SETSTYLE for sidebars in settings class */ 
/* Note: THEME_LAYOUT is not available */

$LAYOUT['3_column'] = $LAYOUT_HEADER.'
    {ALERTS}
    <div class="container-fluid main_section">
      <div class="row">
        <div class="col-md-2 left_menu">
            '.theme_settings::layout_sidebar('left').'
        </div>
        <div class="col-md-8 default_menu">
          {SETSTYLE=default}
          {FEATUREBOX|default}
          {FEATUREBOX|dynamic}
          {WMESSAGE}
          {---}
          <br />
          {FEATUREBOX|tabs=notablestyle}
        </div>
        <div class="col-md-2 right_menu">
            '.theme_settings::layout_sidebar('right').'
        </div>
      </div>  
    </div>
'.$LAYOUT_FOOTER;
 
 
$LAYOUT['2_column'] = $LAYOUT_HEADER.'
  {ALERTS} 
  <div class="container-fluid main_section">
      <div class="row">
        <div class="col-md-2 left_menu">
            '.theme_settings::layout_sidebar('left').'
        </div>
        <div class="col-md-10 default_menu">
          {SETSTYLE=default}
          {FEATUREBOX|default}
          {FEATUREBOX|dynamic}
          {WMESSAGE}
          {---}
          <br />
          {FEATUREBOX|tabs=notablestyle}
        </div>
      </div>  
    </div>
 '.$LAYOUT_FOOTER;
 
 
/* already prepared for theme class as methods, so let it this way */ 
////// Theme meta tags /////////////////////////////////////////////////////////
set_metas();

/////// Theme css  /////////////////////////////////////////////////////////////
register_css();

/////// Theme js  /////////////////////////////////////////////////////////////
register_js();

/////// Theme fonts ///////////////////////////////////////////////////////////
register_fonts();

/////// Theme icons ///////////////////////////////////////////////////////////
register_icons();

getInlineCodes();



function set_metas()
{
    e107::meta('viewport', 'width=device-width, initial-scale=1.0');
}

function register_css()
{
    //e107::css('theme', 'css/bootstrap.min.css'); - too soon
    e107::css('theme', 'css/bootstrap-grid.css');
 
    e107::css('theme', 'css/e107.css');   //needed parts of core e107.css
    e107::css('theme', 'style.css');
	 
}
          
function register_js()
{
    //e107::js('theme', 'js/bootstrap.bundle.min.js', 'jquery');
    e107::js('theme', 'fix.js', 'jquery'); //core fixes done by js
}
           
function register_fonts()
{ 
  /* e107::css('url', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap&subset=latin-ext');
  e107::css('url', 'https://fonts.googleapis.com/css?family=Courgette&display=swap&subset=latin-ext');
  e107::css('url', 'https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700&subset=latin-ext'); */
 
}
          
function register_icons()
{
    e107::css('url', 'https://use.fontawesome.com/releases/v5.3.1/css/all.css');
}

function getInlineCodes()
{
	/*
    $inlinecss = e107::pref('theme', 'custom_css', false);
	if ($inlinecss) {
		e107::css("inline", $inlinecss);
	}
	$inlinejs = e107::pref('theme', 'inlinejs');
	if ($inlinejs) {
		e107::js("footer-inline", $inlinejs);
	}
    */
}

/**
 * @param string $text
 * @return string without p tags added always with bbcodes
 * note: this solves W3C validation issue and CSS style problems
 * use this carefully, mainly for custom menus, let decision on theme developers
 */

function remove_ptags($text = '') // FIXME this is a bug in e107 if this is required.
{
	$text = str_replace(array("<!-- bbcode-html-start --><p>", "</p><!-- bbcode-html-end -->"), "", $text);

	return $text;
}



/* the rest of jayya theme.php ************************************************/
define('PRELINK', '');
define('POSTLINK', '');
define('LINKSTART', '');
define('LINKEND', '');
define('LINKDISPLAY', 1);
define('LINKALIGN', 'left');


// [newsstyle]

$sc_style['NEWSIMAGE']['pre'] = "<td style='padding-right: 7px; vertical-align: top'>";
$sc_style['NEWSIMAGE']['post'] = "</td>";

$sc_style['NEWSCOMMENTS']['pre'] = "<img src='".THEME_ABS."images/common/comments_16.png' style='width: 16px; height: 16px' alt='' />";
$sc_style['NEWSCOMMENTS']['post'] = "";


$NEWSSTYLE = "<div class='cap_border'><div class='main_caption'><div class='bevel'>
{STICKY_ICON}{NEWSTITLE}
</div></div></div>
<div class='menu_content'>
<table style='width: 100%'>
<tr>
{NEWSIMAGE}
<td style='width: 100%; vertical-align: top'>
{NEWSBODY}
{EXTENDED}
<br />
</td>
</tr>
</table>
</div>
<div class='menu_content'>
<table class='news_info'>
<tr>
<td style='text-align: center; padding: 3px; padding-bottom: 0px; white-space: nowrap'>
{NEWSICON}
</td>
<td style='width: 100%; padding: 0px; padding-bottom: 0px; padding-left: 2px'>
".LAN_THEME_5."
{NEWSAUTHOR}
 ".LAN_THEME_6."
{NEWSDATE}
</td><td style='text-align: center; padding: 3px; padding-bottom: 0px; white-space: nowrap'>
<!-- -->
</td>
<td style='padding: 0px; padding-left: 2px; white-space: nowrap'>
{NEWSCOMMENTS}
</td><td style='padding: 0px; white-space: nowrap'>
{TRACKBACK}
</td><td style='text-align: center; padding: 3px; padding-bottom: 0px; padding-left: 7px; white-space: nowrap'>
{EMAILICON}
{PRINTICON}
{PDFICON}
{ADMINOPTIONS}
</td></tr></table>
<br /></div>";

define('ICONMAIL', 'email_16.png');
define('ICONPRINT', 'print_16.png');
define('ICONSTYLE', 'border: 0px');
define('COMMENTLINK', LAN_THEME_2);
define('COMMENTOFFSTRING', LAN_THEME_1);
define('PRE_EXTENDEDSTRING', '<br /><br />[ ');
define('EXTENDEDSTRING', LAN_THEME_3);
define('POST_EXTENDEDSTRING', ' ]<br />');
define('TRACKBACKSTRING', LAN_THEME_4);
define('TRACKBACKBEFORESTRING', '&nbsp;|&nbsp;');


//	[tablestyle]

function tablestyle($caption, $text, $mode){
	global $style;
	$caption = $caption ? $caption : '&nbsp;';
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

    if ($style == "none") {
        echo $text;
    }
    else {
    	echo "<div class='cap_border".$but_border."'>";
    	if ($style == 'leftmenu') {
    		echo "<div class='left_caption'><div class='bevel'>".$caption."</div></div>";
    	}  else if ($style == 'rightmenu') {
    		echo "<div class='right_caption'><div class='bevel'>".$caption."</div></div>";
    	} else {
    		echo "<div class='main_caption'><div class='bevel'>".$caption."</div></div>";
    	}
        
    	echo "</div>";
    	if ($text != "") {
    		echo "<table class='cont'><tr><td class='menu_content ".$menu."'>".$text.$bodybreak."</td></tr></table>";
    	}
    }
}


// chatbox post style
$CHATBOXSTYLE = "
<img src='".e_IMAGE_ABS."admin_images/chatbox_16.png' alt='' style='width: 16px; height: 16px; vertical-align: bottom' />
<b>{USERNAME}</b><br />{TIMEDATE}<br />{MESSAGE}<br /><br />";


// comment post style
$sc_style['REPLY']['pre'] = "<tr><td class='forumheader'>";
$sc_style['REPLY']['post'] = "</td>";

$sc_style['SUBJECT']['pre'] = "<td class='forumheader'>";
$sc_style['SUBJECT']['post'] = "</td></tr>";

$sc_style['COMMENTEDIT']['pre'] = "<tr><td class='forumheader' colspan='2' style='text-align: right'>";
$sc_style['COMMENTEDIT']['post'] = "</td></tr>";

$sc_style['JOINED']['post'] = "<br />";

$sc_style['LOCATION']['post'] = "<br />";

$sc_style['RATING']['post'] = "<br /><br />";

$sc_style['COMMENT']['post'] = "<br />";

$COMMENTSTYLE = "<div class='spacer' style='text-align:center'><table class='fborder' style='width: 95%'>
<tr>
<td class='fcaption' colspan='2'>".LAN_THEME_5." {USERNAME} ".LAN_THEME_6." {TIMEDATE}
</td>
</tr>
{REPLY}{SUBJECT}
<tr>
<td style='width: 20%; vertical-align: top' class='forumheader3'>
<div style='text-align: center'>
{AVATAR}
</div>
{LEVEL}<span class='smalltext'>{JOINED}{COMMENTS}{LOCATION}{IPADDRESS}</span>
</td>
<td style='width: 80%; vertical-align: top' class='forumheader3'>
{COMMENT}
{RATING}
{SIGNATURE}
</td>
</tr>
{COMMENTEDIT}
</table>
</div>";


// poll style
$POLLSTYLE = "<img src='".THEME_ABS."images/common/polls.png' style='width: 10px; height: 14px; vertical-align: bottom' /> {QUESTION}
<br /><br />
{OPTIONS=<img src='".THEME_ABS."images/common/bullet2.gif' style='width: 10px; height: 10px' /> OPTION<br />BAR<br /><span class='smalltext'>PERCENTAGE VOTES</span><br /><br />}
<div style='text-align:center' class='smalltext'>{AUTHOR}<br />{VOTE_TOTAL} {COMMENTS}
<br />
{OLDPOLLS}
</div>";



 