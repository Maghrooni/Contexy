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
    public static $bindings;
    public static $sortable;
    public static $menuID;
    public static $opacity;
    public static $background;
    public static $width;
    protected static $config;

    protected static function load_configs() {
        static::$config = \Config::get('contexy::config');

        foreach (static::$config as $key => $value) {
            static::${$key} = $value;
        }
    }

    private static function script($menuID, $bindings) {
        $sortable = (static::$sortable) ? '.sortable({cursor: "move"}).disableSelection()' : '';
        echo <<<THIS
            <script type="text/javascript">
            $(function() {
                    $("#{$menuID}"){$sortable}.menu({ position: { my: "left top", at: "right-5 top+5", collision: 'flipfit' } });
                    $({$bindings}).bind("contextmenu", function(e) {
                        e.preventDefault();
                        $('#{$menuID}').show().css({
                            top: e.pageY + 'px',
                            left: e.pageX + 'px'
                        });
                    });
                        $(document).click(function() {
                        $('#{$menuID}').hide();
                    });
            });
            </script>
THIS;
    }

    private static function style($menuID) {
        $menuID = !is_null($menuID) ? $menuID : static::$menuID;
        $background = static::$background;
        $width = static::$width;
        $opac = static::$opacity;
        //IE Opacity Support
        $opac_IE = is_numeric($opac) ? $opac * 100 : '';
        $opacity = (isset($opac)) ? '
                opacity: ' . $opac . ';
                -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=' . $opac_IE . ')";
                filter: alpha(opacity=' . $opac_IE . ');
                -moz-opacity: ' . $opac . ';                    
' : '';
        echo <<<THIS
                 <style>
                #{$menuID}, #{$menuID} ul {
                    width: {$width};
                    background: {$background};
                    display: none;
                    font-size: 13.5px;
                    {$opacity}
                    position: absolute;
                    z-index: 100;
                }
                </style>           
THIS;
    }

    public static function make($input = array(), $menuID = Null, $bindings = Null) {
        //set the config options ! 
        static::load_configs();
        $menuID = !is_null($menuID) ? $menuID : static::$menuID;
        $bindings = !is_null($bindings) ? $bindings : static::$bindings;
        //context menu styles ! 
        static::style($menuID);
        //context menu script tag ! 
        static::script($menuID, $bindings);
        echo <<<THIS
                <ul class='dropdown-menu' id='{$menuID}'>
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
        echo "</ul>";
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