<?php
    $websitelogo = apply_filters('jeg_navigation_logo', get_theme_mod('website_logo', get_template_directory_uri() . '/public/img/logo.png'));
    if(ctype_digit($websitelogo) || is_int($websitelogo)) {
        $websitelogo = wp_get_attachment_image_src($websitelogo, "full");
        $websitelogo = $websitelogo[0];
    }
    $websiteretinalogo = apply_filters('jeg_navigation_logo_retina', get_theme_mod('website_logo_retina', get_template_directory_uri() . '/public/img/logo.png'));
    if(ctype_digit($websiteretinalogo) || is_int($websiteretinalogo)) {
        $websiteretinalogo = wp_get_attachment_image_src($websiteretinalogo, "full");
        $websiteretinalogo = $websiteretinalogo[0];
    }
    $mobilelogo = get_theme_mod('website_logo', get_template_directory_uri() . '/public/img/logo.png');
    if(ctype_digit($mobilelogo) || is_int($mobilelogo)) {
        $mobilelogo = wp_get_attachment_image_src($mobilelogo, "full");
        $mobilelogo = $mobilelogo[0];
    }
    $mobileretinalogo = get_theme_mod('website_logo_retina', get_template_directory_uri() . '/public/img/logo.png');
    if(ctype_digit($mobileretinalogo) || is_int($mobileretinalogo)) {
        $mobileretinalogo = wp_get_attachment_image_src($mobileretinalogo, "full");
        $mobileretinalogo = $mobileretinalogo[0];
    }
?>
<header class="header-style-2">
    <div id="top">
        <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo esc_url( $websitelogo ); ?>" data-at2x="<?php echo esc_url( $websiteretinalogo ); ?>" <?php echo esc_attr( jeg_logo_title_alt() ); ?>></a>
        <div class="top-right">
            <div id="header-promotion">
                <?php echo jeg_render_ads('top_menu_ads'); ?>
            </div>
        </div>
    </div>
    <div id="navbar">
        <?php if(!get_theme_mod('mobile_breaking_hide', 0)) { ?>
        <a href="#" class="mobile-toggle sidebar-toggle"><i class="fa fa-newspaper-o"></i></a>
        <?php } ?>
        <a href="<?php echo home_url(); ?>" class="mobile-logo"><img src="<?php echo esc_url( $mobilelogo ); ?>" data-at2x="<?php echo esc_url( $mobileretinalogo ); ?>" <?php echo esc_attr( jeg_logo_title_alt() ); ?>></a>
        <nav class="main-nav">
            <?php get_template_part('fragment/left-nav'); ?>
            <?php get_template_part('fragment/right-nav'); ?>
        </nav>
        <a href="#" class="mobile-toggle menu-toggle"><i class="fa fa-navicon"></i></a>
    </div>
</header>