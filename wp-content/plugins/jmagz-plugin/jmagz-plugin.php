<?php
/*
	Plugin Name: Jmagz Plugin
	Plugin URI: http://jegtheme.com/
	Description: Mandatory Plugin for Jmagz Themes
	Version: 1.0.3
	Author: Agung Bayu Iswara
	Author URI: http://jegtheme.com
	License: GPL2
*/

defined( 'JMAGZ_PLUGIN_VERSION' ) 	    or define( 'JMAGZ_PLUGIN_VERSION', '1.0.3' );
defined( 'JMAGZ_PLUGIN_URL' ) 		    or define( 'JMAGZ_PLUGIN_URL', plugins_url('jmagz-plugin'));
defined( 'JMAGZ_PLUGIN_DIR' ) 		    or define( 'JMAGZ_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

$jpostarray = array();
$jreviewarray = array();

function jeg_jmagz_plugin_load() {
    if( defined('JEG_PLUGIN_VERSION') ) {
        require_once JMAGZ_PLUGIN_DIR . '/lib/plugin-helper.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/post-type.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/shortcode.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/build-shortcode.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/filter-shortcode.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/vc-integration.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/additional-widget.php';
        require_once JMAGZ_PLUGIN_DIR . '/lib/additional-filter.php';
    }
}

add_action('plugins_loaded', 'jeg_jmagz_plugin_load');