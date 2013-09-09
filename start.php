<?php

/**
 * Context Menu for creating Right Click menus !
 *
 * @category   HTML/UI
 * @package    Contexy
 * @author     Mahdi Maghrooni - <maghrooni@gmail.com>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 *
 */
// Autoload Context Menu
Autoloader::map(
        array('contexy' => Bundle::path('contexy') . 'src' . DS . 'contexy.php')
);

// Define main assets
Asset::container('header')
        ->bundle('contexy')
        ->add('bootstrap', 'css/bootstrap.min.css')
        ->add('bootstrap-responsive', 'css/bootstrap-responsive.min.css')
        ->add('contextmenu', 'css/contextmenu.css');

Asset::container('footer')
        ->bundle('contexy')
        ->add('jquery', 'js/jquery.min.js')
        ->add('jquery-ui', 'js/jquery-ui.js', 'jquery')
        ->add('bootstrap-js', 'js/bootstrap.min.js', 'jquery')
        ->add('contxtmenu', 'js/contextmenu.js', 'jquery');