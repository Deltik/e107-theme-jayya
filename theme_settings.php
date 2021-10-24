<?php


class theme_settings
{
     
    public static function login_template_settings()
    {
    
       if(e107::getPref('membersonly_enabled')) {
         return self::get_membersonly_template();
       }
        /* this is workaround for e_IFRAME fatal error in PHP 8 to display standalone login page */    
 
        $defaults['layout_sidebar']     = '
            <div class="gb-25 sidebar"></div>         
            <div class="gb-50 content"><!-- END BLOCK : header -->'; 
   	
     	$tmp['page_start'] =  self::layout_header($defaults);
        $tmp['page_end']   =  self::layout_footer();
        
        $tmp['page_logo'] = "";
        
        return $tmp;    
    
    }        
    
    public static function fpw_template_settings()
    {
    
       if(e107::getPref('membersonly_enabled')) {
         $defaults =  self::get_membersonly_template();

         /* because this in fpw.php:
         	$HEAD = $tp->simpleParse($FPW_TABLE_HEADER, $sc);
  	        $FOOT = $tp->simpleParse($FPW_TABLE_FOOTER, $sc);
         */
         $defaults['page_start'] = e107::getParser()->parseTemplate($defaults['page_start']);
         $defaults['page_end'] = e107::getParser()->parseTemplate($defaults['page_end']);
       }
       else {        
         $defaults =self::login_template_settings();  
       }
       $form_style = self::get_forms_style();
       $fpw_settings = array_merge($defaults, $form_style);
       $fpw_settings['fpw-start'] = '<div class=gb-20></div><div class="gb-60">';
       $fpw_settings['fpw-end'] = '</div>';     
       

 
       return $fpw_settings;
       
    }     
    
    public static function signup_template_settings()
    {
    
       if(e107::getPref('membersonly_enabled')) {
         $defaults =  self::get_membersonly_template();
       }
       else {        
         $defaults =self::login_template_settings();  
       }
       $form_style = self::get_forms_style();
       $signup_settings = array_merge($defaults, $form_style);
       $signup_settings['coppa-start'] = '<div class=gb-20></div><div class="gb-60">';
       $signup_settings['coppa-end'] = '</div>';
       $signup_settings['signup-start'] = '<div class=gb-30></div><div class="gb-40">';
       $signup_settings['signup-end'] = '</div>';       
       return $signup_settings;
       
    } 
    
    public static function get_membersonly_template()
    {
        
        /* let there only what you want for quests to see or use HTML markup directly */
        $defaults['search_shortcode'] = " ";
        $defaults['topnav_shortcode'] = '{SIGNIN}';
        $defaults['navbar_shortcode'] = '<div id="menu"><ul><li>&nbsp;</li></ul></div>';
        $defaults['slogan_shortcode'] = '{SITETAG}';
        $defaults['sitename_shortcode'] = '{SITENAME}';  
        $defaults['layout_sidebar']     = ' '; 
        
        
        /* this is workaround for e_IFRAME fatal error in PHP 8 to display standalone login page */       	
     	$tmp['page_start'] =  self::layout_header($defaults);
        $tmp['page_end']   =  self::layout_footer($defaults);
        $tmp['page_logo'] = "";

        return $tmp;
    }
    
    public static function get_linkstyle() {
            /* menuBar needs to be moved outside nav - container padding + mobile, see header */
 
            /* 1.st level ul */
            $link_settings['main']['prelink'] = '<ul class="nav navbar-nav nav-main ml-auto">';
            $link_settings['main']['postlink'] = '</ul>';
            /* 1.st level li */ 
            $link_settings['main']['linkstart'] = '<li class="nav-item">';
            $link_settings['main']['linkstart_hilite'] = '<li id="menu_current"  class="nav-item active">';  //because bg hover otherwise a active is enough
            $link_settings['main']['linkstart_sub'] = '<li class="nav-item dropdown menu">';
            $link_settings['main']['linkstart_sub_hilite'] = '<li  class="nav-item dropdown active menu">';
            $link_settings['main']['linkcaret'] = '';
            $link_settings['main']['linkend'] = "</li>";
            $link_settings['main']['dropdown_on'] = ' data-bs-toggle="hover" ';  //alternative hover 
            
            
            
            /* 1.st level a */
            $link_settings['main']['linkclass'] = 'nav-link menuButton'; 
	        $link_settings['main']['linkclass_hilite'] = 'nav-link active menuButton';
            $link_settings['main']['linkclass_sub'] = 'nav-link dropdown-toggle menuButton'; 
            $link_settings['main']['linkclass_sub_hilite'] = 'nav-link dropdown-toggle active menuButton';
            
            if(e107::pref('theme', 'display_menuButton_icon', false)) {  
                 $icon_path = e107::pref('theme', 'menuButton_icon', "");
                 if(!empty($icon_path)) {
                       //$icon = e107::getParser()->toIcon($icon_path, array('fw' => true, 'space' => ' ', 'legacy' => "{e_IMAGE}icons/"));
                       /* reason for this change:
                       Images that do not convey content, are decorative, or contain content that is already conveyed in text are given empty alternative text (alt="")
                       otherwise it fails web accesibility test 
                       */
                      $icon_src = e107::getParser()->replaceConstants($icon_path, 'full');
                      $icon = '<img class="icon" src="'.$icon_src.'" alt="">';
                      $link_settings['main']['icon'] =  '<span class="menuButton-icon">'.$icon.'</span>'; 
                 }
            }
            else {  
               $link_settings['main']['icon'] = '<span class="menuButton-icon">{NAV_LINK_ICON}<span>'; 
            } 
            
    
            $link_settings['main_sub']['prelink'] = '<ul class="dropdown-menu menu">';
            $link_settings['main_sub']['postlink'] = '</ul>';
            
            $link_settings['main_sub']['linkstart'] = '<li class="menuItem linkstart link-depth-{NAV_LINK_DEPTH}">';
            $link_settings['main_sub']['linkstart_hilite'] = '<li class="menuItem  linkstart active link-depth-{NAV_LINK_DEPTH}">';
            $link_settings['main_sub']['linkstart_sub'] = '<li class="menuItem dropend lower">';
            $link_settings['main_sub']['linkstart_sub_hilite'] = '<li class="menuItem active dropend lower">';
            
            $link_settings['main_sub']['linkend'] = '';
            
            $link_settings['main_sub']['linkclass'] = 'dropdown-item '; 
	        $link_settings['main_sub']['linkclass_hilite'] = 'dropdown-item  active';
            $link_settings['main_sub']['linkclass_sub'] = 'dropdown-item  dropdown-toggle'; 
            $link_settings['main_sub']['linkclass_sub_hilite'] = 'dropdown-item  dropdown-toggle active';       
 
            $link_settings['main_sub_sub']['prelink'] = '<ul class="dropdown-menu">';
            $link_settings['main_sub_sub']['postlink'] = '</ul>';
  
            /* used for signin */ 
            $link_settings['alt'] = $link_settings['main'];
        
            $link_settings['alt']['prelink'] = '<ul class="navbar-nav">';
            $link_settings['alt']['linkdivider'] = '<li class="divider-vertical"></li>';
            $link_settings['alt']['linkcaret'] = '';
          
            $link_settings['alt_sub']['linkdivider'] = '<li><hr class="dropdown-divider"></li>';
  
            return $link_settings;
    }
    
 
    public static function get_forms_style() {
      $class['submit_button'] = 'btn btn-primary button';
      
      return $class;
    }
    
    
    //'.$theme_settings['forum_header_background'].'
    //'.$theme_settings['forum_table_background'].'
    //'.$theme_settings['forum_card_background'].'
    public static function get_forumstyle() {
    
        // use card only if something fails, maybe bootstrap update
    	$style['forum-card'] = 'card mb-3 ';
        
        // use card-header only if something fails, maybe bootstrap update
        $style['forum-card-header'] = 'card-header';
        
        //column labels, formelly th 
        //forumname uses wrapper f.e. h3
        $style['forum-card-title'] = 'card-title fw-bold ';
        
         //list-group-flush - use only if you need condensed look 
         //list-group is part of template
        $style['forum-list-group'] = ' list-group-striped list-group-hover';
       
        // bg-transparent -doesn't work with list-group-striped
        $style['forum-list-group-item'] = 'list-group-item p-3  ';
 
  
        return $style;
	}
    
    public static function get_lists_style() {  
     
     $style['start'] = '<style> .badge-lists {float: right; } .pl-2 {padding-left: 0.5rem!important } .pl-3 {padding-left: 1rem!important } </style><ul class="menu-list">';
     $style['item_start'] = '<li>';
     $style['item_end'] = '</li>';
     $style['end'] = '</ul>';
            return $style;
    }  
    
    

    
}

/* search button markup 

          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
          
*/