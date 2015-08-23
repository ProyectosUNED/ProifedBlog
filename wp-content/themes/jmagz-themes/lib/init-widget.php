<?php
/***
 * @author jegbagus
 */

defined('JEG_FOOTER_WIDGET_1') or define('JEG_FOOTER_WIDGET_1', 'Footer Widget 1');
defined('JEG_FOOTER_WIDGET_2') or define('JEG_FOOTER_WIDGET_2', 'Footer Widget 2');
defined('JEG_FOOTER_WIDGET_3') or define('JEG_FOOTER_WIDGET_3', 'Footer Widget 3');
defined('JEG_SHOP_WIDGET')     or define('JEG_SHOP_WIDGET', 'Shop Page Widget');


function jeg_register_widget_list() {
    $defaultwidget = array(JEG_FOOTER_WIDGET_1, JEG_FOOTER_WIDGET_2, JEG_FOOTER_WIDGET_3);
    foreach($defaultwidget as $widgetpost) {
        register_sidebar(array(
            'name'			=> $widgetpost,
            'id' 			=> $widgetpost,
            'before_widget' => '<div class="footer-widget %2$s" id="%1$s">',
            'before_title'	=> '<h2 class="widget-title">',
            'after_title' 	=> '</h2>',
            'after_widget' 	=> '</div>',
        ));
    }

    register_sidebar(array(
        'name'          => JEG_SHOP_WIDGET,
        'id'            => JEG_SHOP_WIDGET,
        'before_widget' => '<div class="sidebar-widget %2$s" id="%1$s">',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        'after_widget'  => '</div>',
    ));
}

add_action('after_setup_theme', 'jeg_register_widget_list');