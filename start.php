<?php

/**
 * Contexy
 *
 * @category   HTML/UI
 * @package    Contexy
 * @author     Mahdi Maghrooni - <maghrooni@gmail.com>
 * @license    MIT License <http://www.opensource.org/licenses/mit>
 *
 */
// Autoload Contexy
Autoloader::map(
        array('contexy' => Bundle::path('contexy') . 'src' . DS . 'contexy.php')
);

// Define main assets
Asset::container('header')
        ->bundle('contexy')
        ->add('contextmenu', 'css/contextmenu.css')
        ->add('jquery', 'js/jquery.min.js')
        ->add('jquery-ui', 'js/jquery-ui.js', 'jquery');