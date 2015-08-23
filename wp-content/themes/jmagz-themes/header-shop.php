<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes' />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'jmagz no-sidebar' ); ?>>
<?php
    get_template_part('fragment/mobile-nav');
    get_template_part('fragment/header', apply_filters('jeg_header_type', get_theme_mod('header_layout', 'navigation-1')));
?>
<div id="main">
<?php
if(vp_option('joption.enable_breakingnews', true)) {
    if(vp_option('joption.show_only_homepage', true)) {
        if(is_front_page()) {
            get_template_part('fragment/breaking', apply_filters('jeg_breaking_type', get_theme_mod('breaking_layout', 'featureimage')));
        }
    } else {
        get_template_part('fragment/breaking', apply_filters('jeg_breaking_type', get_theme_mod('breaking_layout', 'featureimage')));
    }
}
?>

<div class="wrapper wc-wrapper">
    <?php get_template_part('fragment/top-ads'); ?>