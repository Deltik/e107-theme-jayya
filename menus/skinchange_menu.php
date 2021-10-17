<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */

if (!defined('e107_INIT')) { exit; }

$sitetheme = deftrue('USERTHEME', e107::getPref('sitetheme')); 
 
$content = "<select name=\"skin\" onChange=\"document.location = '".e_REQUEST_SELF."?skin=' + this.options[this.selectedIndex].value + '$querystring';\">";
 
$directory = opendir(e_THEME.$sitetheme."/skins");

$tmp_frontcss = e107::getPref('themecss');   
$tmp_frontcss = str_replace("skins/", "", $tmp_frontcss);
 
while($filename = readdir($directory)) {
	if($filename== "." || $filename== ".." || $filename== "images" ) continue;
 
	$skinlist[strtolower($filename)] = "<option value=\"$filename\"".($tmp_frontcss == $filename ? " selected" : "").">$filename</option>";
}
 
ksort($skinlist);
foreach($skinlist as $s) { $content .= $s; }
unset($skinlist, $s);
closedir($directory);
$content .= "</select>";
 
e107::getRender()->tablerender("Select skin", $content, 'usertheme');

 