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
    
    /* NORMAL THEME SHORTCODES */
    
    /* {THEME_BULLET} */
    public static function sc_theme_bullet($parm='') {
       
       $icon_path = e107::pref('theme', 'link_bullet_icon', "");
       if(empty($icon_path)) { 
         return "";
       }          
       //$link_bullet = e107::getParser()->toIcon($icon_path, array('fw' => true, 'space' => ' ', 'legacy' => "{e_IMAGE}icons/", "class"=> "bullet" ));
       /* reason for this change:
       Images that do not convey content, are decorative, or contain content that is already conveyed in text are given empty alternative text (alt="")
       otherwise it fails web accesibility test 
       */
       $link_bullet_src = e107::getParser()->replaceConstants($icon_path, 'full');
       $link_bullet = '<img class="bullet" src="'.$link_bullet_src.'" alt="">';
       return $parm == 'src' ? $link_bullet_src : $link_bullet;
    }
    
    /* {THEME_NAVIGATION} */
    public function sc_theme_navigation() 
    {
         if(e107::pref('theme', 'offcanvas_navigation', false)) {        
           $text = $this->offcanvas_navigation();
         }
         else {
            $text = $this->dropdown_navigation();
         }
         $text = e107::getParser()->parseTemplate($text, true);
         return $text;
    }
    
    public function dropdown_navigation() {
 
      $html = '  
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNavigation" aria-controls="navbarMainNavigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="d-block d-sm-none">{SETSTYLE=topright}{MENUAREA=4}</div>
          <div class="collapse navbar-collapse" id="navbarMainNavigation">
            {NAVIGATION} 
          </div>
      ';
      return $html;
    }
    
    
    public function offcanvas_navigation() {
 
      $html = '             
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" aria-label="Toggle navigation" data-bs-target="#navbarMainNavigation" aria-controls="navbarMainNavigation">
          <span class="navbar-toggler-icon"></span>
      </button>
	  <div class="m-2 d-block d-sm-none">{SETSTYLE=none}{MENUAREA=4}</div>
      <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarMainNavigation" aria-labelledby="navbarMainNavigationLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="navbarMainNavigationLabel">{SITENAME}</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          {NAVIGATION} 
        </div>
      </div> ';
    
    return $html;
    
    }
 
}

 