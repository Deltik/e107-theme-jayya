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
$sc_style['LM_SIGNUP_LINK']['pre'] = "<br />[ ";
$sc_style['LM_SIGNUP_LINK']['post'] = " ]";

$sc_style['LM_FPW_LINK']['pre'] = "<br />[ ";
$sc_style['LM_FPW_LINK']['post'] = " ]";

$sc_style['LM_RESEND_LINK']['pre'] = "<br />[ ";
$sc_style['LM_RESEND_LINK']['post'] = " ]";

$sc_style['LM_REMEMBERME']['pre'] = "<br />";
$sc_style['LM_REMEMBERME']['post'] = "";

if (!isset($LOGIN_MENU_FORM)){

	$LOGIN_MENU_FORM = "
	<div style='text-align: center'>".
    LOGIN_MENU_L1."
	<br />\n
	{LM_USERNAME_INPUT}
	<br />".
	LOGIN_MENU_L2."
	<br />\n
    {LM_PASSWORD_INPUT}
	<br />\n
  {LM_IMAGECODE}
	{LM_LOGINBUTTON}
    {LM_REMEMBERME}
	<br />
	{LM_SIGNUP_LINK}
	{LM_FPW_LINK}
	{LM_RESEND_LINK}
	</div>
	";
}

if (!isset($LOGIN_MENU_LOGGED)){
    $sc_style['LM_ADMINLINK']['pre'] = "";
	$sc_style['LM_ADMINLINK']['post'] = "<br />";

	$LOGIN_MENU_LOGGED = "
		{LM_MAINTENANCE}
		{THEME_BULLET} {LM_ADMINLINK}
		{THEME_BULLET} {LM_USERSETTINGS}<br />
		{THEME_BULLET} {LM_PROFILE}<br />
		{THEME_BULLET} {LM_LOGOUT}
	";
}

if (!isset($LOGIN_MENU_MESSAGE)){
	$LOGIN_MENU_MESSAGE = '<div style="text-align: center;">{LM_MESSAGE}</div>';
}
?>
