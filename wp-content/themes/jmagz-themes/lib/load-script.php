<?php

/**
 * @author Jegtheme
 */

function jeg_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

function jeg_get_template_multisite_url() {
    return apply_filters('jeg_template_multisite_url', get_template_directory_uri());
}

function jeg_get_admin_js_option() {
    global $is_IE;
    $option = array();
    $option['ajaxurl'] = admin_url("admin-ajax.php");
    $option['copyclipboard'] = __('Copied URL to clipboard','jeg_textdomain');
    $option['shareto'] = __('Share Article to','jeg_textdomain');
    $option['gacode'] = vp_option('joption.google_analytic_code');
    $option['usezoom'] = vp_option('joption.enable_image_zoom', '1');
    $option['ismobile'] = wp_is_mobile();
    $option['commentscript'] = apply_filters('jeg_comment_type', vp_option('joption.comment_type', 'wordpress'));
    if($option['commentscript'] === 'disqus') $option['disqus_shortname'] = vp_option('joption.disqus_shortname');
    $option['fbapps'] = vp_option('joption.og_app_id');
    $option['isie'] = $is_IE;

    if(is_single() && !is_page()) {
        $option['postid'] = get_the_ID();
        $option['isblog'] = true;
    } else {
        $option['postid'] = 0;
        $option['isblog'] = false;
    }

    return $option;
}

function jeg_init_script() {
    global $is_IE;
    $templateurl = get_template_directory_uri();

    if(!jeg_is_login_page()) {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wp-mediaelement' );

        wp_enqueue_script( 'jeg-plugin', $templateurl . '/public/js/plugins.js', null, JEG_VERSION, true);
        wp_enqueue_script( 'jeg-html5shiv', $templateurl . '/public/js/html5shiv.min.js', null, JEG_VERSION, true);
        wp_enqueue_script( 'jeg-main', $templateurl . '/public/js/main.js', null, JEG_VERSION, true);

        if( !$is_IE )
            wp_enqueue_script( 'jeg-clipboard', $templateurl . '/public//js/zeroclipboard/ZeroClipboard.min.js', null, JEG_VERSION, true);

        if( vp_option('joption.enable_ajax_post') )
            wp_enqueue_script( 'jeg-ajax', $templateurl . '/public/js/ajax-post.js', null, JEG_VERSION, true);

        if ( is_singular() )
            wp_enqueue_script( 'comment-reply' );

        wp_localize_script('jeg-main', 'jmagzoption', jeg_get_admin_js_option());
    }
}

function jeg_additional_style() {
    ob_start();
    get_template_part('fragment/additionalcss');
    return ob_get_clean();
}

function jeg_init_style() {
    $templateurl = get_template_directory_uri();

    if(!jeg_is_login_page()) {
        wp_enqueue_style( 'wp-mediaelement' );
        wp_enqueue_style('jeg-style', get_stylesheet_uri() , null, JEG_VERSION);
        wp_enqueue_style('jeg-fontawesome', $templateurl . '/public/css/fonticons/font-awesome.min.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-chosen', $templateurl . '/public/css/chosen/chosen.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-responsive', $templateurl . '/public/css/responsive.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-scrollpane', $templateurl . '/public/css/jquery.jscrollpane.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-magnific', $templateurl . '/public/css/magnific-popup.css', null, JEG_VERSION);
        wp_enqueue_style('jeg-carousel', $templateurl . '/public/js/owl-carousel/owl.carousel.css', null, JEG_VERSION);

        if(function_exists('is_woocommerce'))
            wp_enqueue_style('jeg-woocommerce', $templateurl . '/public/css/woocommerce.css', null, JEG_VERSION);

        // Switch Style
        $colorscheme = apply_filters('jeg_color_scheme', get_theme_mod( 'color_scheme', 'default' ));
        if ($colorscheme != 'default') {
            wp_enqueue_style('jeg-style-'. $colorscheme, $templateurl . '/public/css/style-'. $colorscheme .'.css', null, JEG_VERSION);
        }

        wp_enqueue_style('jeg-additional-style', $templateurl . '/public/jkreativ-icon/jkreativ-icon.min.css', null, JEG_VERSION);
        $additionalcss = jeg_additional_style();
        wp_add_inline_style( 'jeg-additional-style',  $additionalcss);
    }
}

/** font usage  */

function jeg_build_font($fontarray) {
    $fonturl = "https://fonts.googleapis.com/css?family=";

    $fullfonturl = array();

    foreach($fontarray as $idx => $font)
    {
        $fontname = str_replace(' ', '+', $font['fontname']);
        $farray = array();

        if(!empty($font['fontstyle'])) {
            foreach($font['fontstyle'] as $fontstyle) {
                // font normal
                if($fontstyle == 'normal') $fontstyle = '';

                if(!empty($font['fontweight'])) {
                    foreach($font['fontweight'] as $fontweight) {
                        // font weight
                        if($fontweight == 'normal') $fontweight = 400;
                        $farray[] = $fontweight . $fontstyle;
                    }
                }

            }
        }

        if(empty($farray)) {
            $fullfonturl[] =  $fontname;
        } else {
            $fullfonturl[] =  $fontname . ":" . implode(',', $farray);
        }
    }

    $fullfonturl = $fonturl . implode('%7C', $fullfonturl);
    wp_enqueue_style ('jeg_font', $fullfonturl , null, null);
}

function jeg_check_use_font_uploader($option) {
    $fontname = vp_option('joption.' . $option . '_fontname');
    if( !empty($fontname) ) {
        return true;
    }
    return false;
}

function jeg_font_setup () {
    $fontarray = array();

    // Load fonts for color scheme
    $style = apply_filters('jeg_color_scheme', get_theme_mod( 'color_scheme', 'default' ));;
    switch ($style) {
        case 'blue':
            // Blue scheme
            $fontarray[0] = array(
                'fontname' => 'Roboto Slab',
                'fontstyle' => array('normal'),
                'fontweight' => array('300', '400', '700')
            );
            $fontarray[1] = array(
                'fontname' => 'Open Sans',
                'fontstyle' => array('normal', 'italic'),
                'fontweight' => array('400', '700')
            );
            break;

        case 'black':
            // Black scheme
            $fontarray[0] = array(
                'fontname' => 'Lato',
                'fontstyle' => array('normal'),
                'fontweight' => array( '300', '400', '700')
            );
            $fontarray[1] = array(
                'fontname' => 'Playfair Display',
                'fontstyle' => array('normal', 'italic'),
                'fontweight' => array('400', '700')
            );
            break;

        case 'green':
            // Green scheme
            $fontarray[0] = array(
                'fontname' => 'Source Sans Pro',
                'fontstyle' => array('normal'),
                'fontweight' => array( '300', '400', '700')
            );
            $fontarray[1] = array(
                'fontname' => 'Merriweather',
                'fontstyle' => array('normal', 'italic'),
                'fontweight' => array('400', '700')
            );
            break;

        default:
            // Default
            $fontarray[0] = array(
                'fontname' => 'Open Sans',
                'fontstyle' => array('normal', 'italic'),
                'fontweight' => array( '400', '700')
            );
            $fontarray[1] = array(
                'fontname' => 'Lora',
                'fontstyle' => array('normal', 'italic'),
                'fontweight' => array('400')
            );
            break;
    }

    if(!jeg_check_use_font_uploader('additional_font_1')){
        $firstfont = get_theme_mod('first_font');
        if(!empty($firstfont)) {
            $fontarray[0] = array(
                'fontname' => $firstfont,
                'fontstyle' => jeg_extract_value(vp_get_gwf_style($firstfont)),
                'fontweight' => jeg_extract_value(vp_get_gwf_weight($firstfont))
            );
        }
    }

    if(!jeg_check_use_font_uploader('additional_font_2')) {
        $secondfont = get_theme_mod('second_font');
        if (!empty($secondfont)) {
            $fontarray[1] = array(
                'fontname' => $secondfont,
                'fontstyle' => jeg_extract_value(vp_get_gwf_style($secondfont)),
                'fontweight' => jeg_extract_value(vp_get_gwf_weight($secondfont))
            );
        }
    }

    jeg_build_font($fontarray);
}

add_action('wp_enqueue_scripts', 'jeg_init_script');
add_action('wp_enqueue_scripts', 'jeg_init_style');
add_action('wp_enqueue_scripts', 'jeg_font_setup');

/** jeg web analytics */
function jeg_website_analytic() {
    get_template_part('fragment/website-analytic');
}

add_action('wp_footer', 'jeg_website_analytic');

/** additional javascript **/
function jeg_additional_script() {
    ?>
    <script><?php echo vp_option('joption.jseditor'); ?></script>
    <?php

}

add_action('wp_footer', 'jeg_additional_script');

/** faster loader style */

function jmagz_above_the_fold_style() {
    get_template_part('fragment/above-the-fold');
}

add_action('jeg_above_the_fold_style', 'jmagz_above_the_fold_style');
