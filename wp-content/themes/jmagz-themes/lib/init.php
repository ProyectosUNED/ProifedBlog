<?php

/**
 * @author Jegtheme
 * Initialize All Variable
 */

function jeg_init_variable()
{
    /* Initialize variable */
    defined( 'JEG_THEMENAME' ) or define("JEG_THEMENAME", 'Jmagz');
    defined( 'JEG_SHORTNAME' ) or define("JEG_SHORTNAME", 'jmagz');
    defined( 'JEG_THEME' ) or define("JEG_THEME", 'jegtheme');

    /* Themes version */
    $themeData			= wp_get_theme();
    $themeVersion 		= trim($themeData['Version']);
    if (!$themeVersion)   $themeVersion = "1.0.0";
    define("JEG_VERSION"	, $themeVersion);

    // Content Width
    if ( ! isset( $content_width ) ) $content_width = 900;
}
jeg_init_variable();



function jeg_themes_setup() {
    // support woocommerce
    add_theme_support('woocommerce');

    // support feed link
    add_theme_support( 'automatic-feed-links' );

    // featured image

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'square-thumbnail', 75, 75, true );
    add_image_size( 'square-slider-thumbnail', 300, 300, true );

	add_image_size( 'mini-post-featured', 150, 75, true );
    add_image_size( 'one-third-post-featured', 300, 150, true );
    add_image_size( 'half-post-featured', 450, 225, true );
    add_image_size( 'two-third-post-featured', 600, 300, true );
    add_image_size( 'post-featured', 900, 450, true );

    // title tag
    add_theme_support( 'title-tag' );

    // post format
    add_theme_support( 'post-formats', array( 'gallery', 'video' ) );
}

add_action( 'after_setup_theme', 'jeg_themes_setup' );


/**
 * jeg remove image size
 */

function jeg_remove_image_size() {
    remove_image_size('medium');
    remove_image_size('large');
}


function jeg_remove_default_image_size ($sizes){
    unset( $sizes['medium']);
    unset( $sizes['large']);

    return $sizes;
}

add_action( 'after_setup_theme', 'jeg_remove_image_size' );
add_filter('intermediate_image_sizes_advanced', 'jeg_remove_default_image_size');

/**
 * Load Languages
 */
function jeg_tb_load_textdomain()
{
    load_theme_textdomain('jeg_textdomain', get_template_directory() . '/lang/');
}
add_action('after_setup_theme', 'jeg_tb_load_textdomain');


/** favico header **/
function jeg_favico_header() {
    $favico = get_theme_mod('favicon_logo', get_template_directory_uri() . '/public/img/favicon.ico');
    if(ctype_digit($favico) || is_int($favico)) {
        $favico = wp_get_attachment_image_src($favico, "full");
        $favico = $favico[0];
    }
    if($favico) {
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . $favico . '" />';
    }
}

add_action('wp_enqueue_scripts', 'jeg_favico_header');


/** favico header **/
function jeg_ios_bookmarketlet() {
    $apple_iphone_icon          = vp_option('joption.apple_iphone_icon', get_template_directory_uri() . '/public/img/appleicon.png');
    $apple_iphone_retina_icon   = vp_option('joption.apple_iphone_retina_icon', get_template_directory_uri() . '/public/img/appleicon.png');
    $apple_ipad_icon            = vp_option('joption.apple_ipad_icon', get_template_directory_uri() . '/public/img/appleicon.png');
    $apple_ipad_retina_icon     = vp_option('joption.apple_ipad_retina_icon', get_template_directory_uri() . '/public/img/appleicon.png');

    if($apple_iphone_icon)          echo '<link rel="apple-touch-icon" href="' . $apple_iphone_icon . '"/> ';
    if($apple_iphone_retina_icon)   echo '<link rel="apple-touch-icon" sizes="120x120" href="' . $apple_iphone_retina_icon . '"/> ';
    if($apple_ipad_icon)            echo '<link rel="apple-touch-icon" sizes="72x72" href="' . $apple_ipad_icon . '"/> ';
    if($apple_ipad_retina_icon)     echo '<link rel="apple-touch-icon" sizes="144x144" href="' . $apple_ipad_retina_icon . '"/> ';
}

add_action('wp_enqueue_scripts', 'jeg_ios_bookmarketlet');