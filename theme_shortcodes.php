<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/
 
class theme_shortcodes extends e_shortcode
{
    var $override = true;
     /**
    /* WAY HOW TO DISPLAY MENUS FROM DEFAULT LAYOUT on other layouts
    /* {DEFAULT_MENUAREA=100}.
     **/
    public function sc_default_menuarea($parm)
    {
        $path = $parm;
        /* don't render anything for default layout, let it on core, it has to be set in Menu Manager for default layout */
        if (THEME_LAYOUT == e107::getPref('sitetheme_deflayout')) {
            return '';
        }
        $footermenu = e107::getMenu();
        // tell menu manager that you want menus from default layout
        $footermenu->eMenuActive = $this->getDataLegacyTheme(e107::getPref('sitetheme_deflayout'));
        // render default menus and save it for later use
        $text = $footermenu->renderArea($parm);
        // return it back because it has to work without change in Menu Manager
        $footermenu->eMenuActive = $this->getDataLegacyTheme(THEME_LAYOUT);

        return $text;
    }

    /**
     * Function to retrieve Menu data from tables.
     * original: private function getDataLegacy()
     * change: Layout name as parameter.
     */
    private function getDataLegacyTheme($menu_layout_field = '')
    {
        $sql = e107::getDb();
        //original:  $menu_layout_field = THEME_LAYOUT!=e107::getPref('sitetheme_deflayout') ? THEME_LAYOUT : "";
        $menu_layout_field = $menu_layout_field != e107::getPref('sitetheme_deflayout') ? THEME_LAYOUT : '';
        $cacheData = e107::getCache()->retrieve_sys('menus_'.USERCLASS_LIST.'_'.md5(e_LANGUAGE.$menu_layout_field));
        $menu_data = e107::unserialize($cacheData);

        $eMenuArea = array();
        if (empty($menu_data) || !is_array($menu_data)) {
            $menu_qry = 'SELECT * FROM #menus WHERE menu_location > 0 AND menu_class IN ('.USERCLASS_LIST.') AND menu_layout = "'.$menu_layout_field.'" ORDER BY menu_location,menu_order';
            if ($sql->gen($menu_qry)) {
                while ($row = $sql->fetch()) {
                    $eMenuArea[$row['menu_location']][] = $row;
                }
            }
            $menu_data['menu_area'] = $eMenuArea;
            $menuData = e107::serialize($menu_data, 'json');
            e107::getCache()->set_sys('menus_'.USERCLASS_LIST.'_'.md5(e_LANGUAGE.$menu_layout_field), $menuData);
        } else {
            $eMenuArea = $menu_data['menu_area'];
        }
        return $eMenuArea;
    }
    
    
    /* {THEME_MENU: path=skinchange} */
    /* see core/shortcodes/single/menu.php */
    function sc_theme_menu($parm, $mode='')
    {   
        
    	if(empty($parm))
    	{
    		return null;
    	}
    	if(is_array($parm)) //v2.x format allowing for parms. {MENU: path=y&count=x}
    	{
    		list($plugin,$menu) = explode("/",$parm['path'],2); 		
    		if($menu == '')
    		{
    			$menu = $plugin;	
    		}
 
    		unset($parm['path']);
            //return e107::getMenu()->renderMenu($plugin,$menu."_menu", http_build_query($parm, '', '&'),true);
    		return $this->renderMenu($plugin,$menu."_menu", http_build_query($parm, '', '&'),true);	
    	}   	 
    } 
    
    /* see handlers/menu_class.php */
	/**
	 * Render menu
	 *
	 * @param string $mpath menu path
	 * @param string $mname menu name
	 * @param string $parm menu parameters
	 * @param boolean $return
	 * return string if required
	 */
	public function renderMenu($mpath, $mname='', $parm = '', $return = false)
	{
	//	global $sql; // required at the moment.


		global $sc_style;
				

		$sql        = e107::getDb();
		$ns         = e107::getRender();
		$tp         = e107::getParser();
		$e107cache  = e107::getCache(); // Often used by legacy menus.

		if($tmp = e107::unserialize($parm)) // support e_menu.php e107 serialized parm.
		{
			$parm = $tmp;
			unset($tmp);
		}

 
        $mpath = trim($mpath, '/').'/'; // faster...

	    $id = e107::getForm()->name2id($mpath . $mname);
		$ns->setUniqueId($id);
        
        $path = e_THEME.$mpath."menus/".$mname.'.php';
   
		if($return)
		{
			ob_start();
		}
 
		if(is_numeric($mpath) || ($mname === false)) // Custom Page/Menu 
		{
		}
		else
		{
 

			deftrue('e_DEBUG') ? include($path) : @include($path);
		}
 
		if($return)
		{
			return ob_get_clean();
		}

		unset($pref);
		return null;
	}
}





?>
