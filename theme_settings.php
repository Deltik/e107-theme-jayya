<?php


class theme_settings
{
    public static $defaults = array();
    
    public function __construct() {
      
         $defaults['search_shortcode']      = "{SEARCH}";
         //$defaults['search_shortcode']      = "{CUSTOM=search+default}";
               
         $defaults['topnav_shortcode']      = '{SIGNIN}';
         //$defaults['navbar_shortcode']      = '{NAVIGATION}';
         //$defaults['navbar_shortcode']      = '{SITELINKS_ALT=".THEME_ABS."images/common/arrow.png+noclick}';
         if(e107::pref('theme', 'offcanvas_navigation', false)) {        
           $defaults['navbar_shortcode'] = $this->offcanvas_navigation();
         }
         else {
            $defaults['navbar_shortcode'] = $this->dropdown_navigation();
           //$defaults['navbar_shortcode']      = '{NAVIGATION}';
         }
         $defaults['slogan_shortcode']      = '{SITETAG}';
         $defaults['sitename_shortcode']    = '{SITENAME}';  
         $defaults['skinchange_block']      = "";
         $defaults['footer_message']        = "{SETSTYLE=default}{CMENU=copyright}";
 
         self::$defaults = $defaults;
    
    }
 
    
    public  function layout_header($elements = array())  {
 
        $defaults = self::$defaults;     
        $parms = array_merge($defaults, $elements);
        extract($parms);

      //  $clock_menu = "{CUSTOM=clock}<span class='jayya_clock'><br /></span>";
        $LAYOUT_HEADER = '
        <div class="main page_container">
           
            <div class="container-fluid top_section">
                <div class="row">
                    <div class="col-md-2 top_section_left">
                        {LOGO: h=80&class=mx-auto d-block}
                    </div>
                    <div class="col-md-8 p-2 d-none d-sm-block top_section_mid">
                        {BANNER}
                    </div>
                    <div class="col-md-2 p-2 top_section_right">
                        <div class="m-2">'.$clock_menu.'</div>
                        <div class="m-2 d-none d-sm-block">'.$search_shortcode.'</div>
                    </div>
                </div>
            </div>
            <div>
              '.$navbar_shortcode.'
            </div>
         ';
 
        if($_GET['action'] ==  'printable') {
            $LAYOUT_HEADER = '';
        }
        
        return $LAYOUT_HEADER;  
    }
    
    
    public static function layout_footer($elements = array())  {
 
        $defaults = self::$defaults; 
 
        $parms = array_merge($defaults, $elements);
 
        extract($parms);
        
        $layout_sidebar = self::layout_sidebar($parms);
 
        $LAYOUT_FOOTER  = "
              <div class='container-fluid' style='text-align:center'>
              <br />
              {SITEDISCLAIMER}{SETSTYLE=none} {THEME_MENU: path=jayya3/skinchange}
              <br /><br />
              </div>
              </td>
              </tr>
              </table>
              </div>";
 
        return $LAYOUT_FOOTER;  
    }
    
    public static function layout_sidebar($type = 'right') {
 
          $layout_sidebar['right']   = '           
            <table class="menus_container"><tr><td>
            {SETSTYLE=rightmenu}
            {MENU=2}
            </td></tr></table>
          ';
            
          $layout_sidebar['left'] = '
             <table class="menus_container"><tr><td>
            {SETSTYLE=leftmenu}
            {MENU=1}
            </td></tr>
            </table>
         ';   
    
         return $layout_sidebar[$type];
    }
    
        
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
 
            /* 1.st level ul */
            $link_settings['main']['prelink'] = '<ul class="nav navbar-nav nav-main ml-auto {NAV_CLASS}">';
            $link_settings['main']['postlink'] = '</ul>';
            /* 1.st level li */ 
            $link_settings['main']['linkstart'] = '<li class="nav-item">';
            $link_settings['main']['linkstart_hilite'] = '<li id="menu_current"  class="nav-item active">';  //because bg hover otherwise a active is enough
            $link_settings['main']['linkstart_sub'] = '<li class="nav-item dropdown">';
            $link_settings['main']['linkstart_sub_hilite'] = '<li  class="nav-item dropdown active">';
            $link_settings['main']['linkcaret'] = '';
            $link_settings['main']['linkend'] = "</li>";
            $link_settings['main']['dropdown_on'] = ' data-bs-toggle="dropdown" ';  //alternative hover 
            
            /* 1.st level a */
            $link_settings['main']['linkclass'] = 'nav-link'; 
	        $link_settings['main']['linkclass_hilite'] = 'nav-link active';
            $link_settings['main']['linkclass_sub'] = 'nav-link dropdown-toggle'; 
            $link_settings['main']['linkclass_sub_hilite'] = 'nav-link dropdown-toggle active';
 
            $link_settings['main_sub']['prelink'] = '<ul class="dropdown-menu">';
            $link_settings['main_sub']['postlink'] = '</ul>';
            
            $link_settings['main_sub']['linkstart'] = '<li class="dropdown-item linkstart link-depth-{NAV_LINK_DEPTH}">';
            $link_settings['main_sub']['linkstart_hilite'] = '<li class="dropdown-item linkstart active link-depth-{NAV_LINK_DEPTH}">';
            $link_settings['main_sub']['linkstart_sub'] = '<li class="dropend lower">';
            $link_settings['main_sub']['linkstart_sub_hilite'] = '<li class="active dropend lower">';
            
            $link_settings['main_sub']['linkend'] = '';
            
            $link_settings['main_sub']['linkclass'] = 'dropdown-item'; 
	        $link_settings['main_sub']['linkclass_hilite'] = 'dropdown-item active';
            $link_settings['main_sub']['linkclass_sub'] = 'dropdown-item dropdown-toggle'; 
            $link_settings['main_sub']['linkclass_sub_hilite'] = 'dropdown-item dropdown-toggle active';       
 
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
    
    
    public function dropdown_navigation() {
 
    $html = '
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
         
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNavigation" aria-controls="navbarMainNavigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMainNavigation">
          {NAVIGATION}
         <div class="m-2 d-block d-sm-none">{SEARCH}</div>
        </div>
      </div>
    </nav>
    ';
    return $html;
    }
    
    
    public function offcanvas_navigation() {
 
    $html = '<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
    
    <div class="container-fluid">
               
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation" data-bs-target="#navbarMainNavigation" aria-controls="navbarMainNavigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarMainNavigation" aria-labelledby="Main Navigation">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="navbarMainNavigationLabel">{LOGO}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        {NAVIGATION}
        <div class="m-2 d-block d-sm-none">{SEARCH}</div>
      </div>
    </div></nav>';
    
    return $html;
    
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