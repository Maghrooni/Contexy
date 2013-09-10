<?php

/**
 * Contexy - Create Context Menu for View Easy and Quick !
 *
 * @category   HTML/UI
 * @package    Contexy
 * @author     Mahdi Maghrooni - <maghrooni@gmail.com>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 *
 */
class contexy {

    public static $target;
    public static $icon;
    protected static $config;

    protected static function load_configs() {
        static::$config = \Config::get('contexy::config');

        foreach (static::$config as $key => $value) {
            static::${$key} = $value;
        }
    }

    public static function make($input = array()) {
        //set the config options ! 
        static::load_configs();
        //context menu start tag ! 
        echo <<<THIS
        <div class="row">
            <div class="span4">
                <ul class='dropdown-menu' id='contextmenu'>
THIS;
        foreach ($input as $name => $link) {
            //if menu item has submenu ! 
            if (is_array($link)) {
                //if list was an array for each one of them make ul /ul again ! 
                echo "<li>" . $name . "<ul class='dropdown-menu'>";
                //foreach submenus ! 
                echo static::submenu($link);
                //end the submenu tags ...
                echo "</ul></li>";
            } else {
                echo static::menu($name, $link);
            }
        }
        //end of the contextmenu tag ! 
        echo "</div></div></ul>";
    }

// if it has submenu we make it submenu !  
    private static function submenu($input) {
        $MENU = '';
        foreach ($input as $subname => $sublink) {
            //if submenus also have submenu !
            if (is_array($sublink)) {
                $MENU .= "<li>" . $subname . "<ul class='dropdown-menu'>";
                $MENU .= static::submenu($sublink);
                $MENU .= "</ul></li>";
            } else {
                $MENU .= static::menu($subname, $sublink);
            }
        }
        return $MENU;
    }

    private static function menu($name, $link) {
        //get the options ! 
        $icon = explode('|icon:', $name);
        $attr = explode('|target:', $name);
        $class = isset($icon[1]) ? $icon[1] : static::$icon;
        $target = isset($attr[1]) ? $attr[1] : static::$target;
        $name = $icon[0];
        return <<<HERE
                <li><a href="{$link}" target="{$target}"><span class="{$class}"></span>{$name}</a></li>
HERE;
    }

}
?>