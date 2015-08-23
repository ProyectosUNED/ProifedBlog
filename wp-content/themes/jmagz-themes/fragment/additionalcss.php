
<?php
// first font
if(jeg_check_use_font_uploader('additional_font_1')) {
    ?>
    @font-face {
        font-family: '<?php echo vp_option('joption.additional_font_1_fontname'); ?>';
        src: url('<?php echo vp_option('joption.additional_font_1_eot'); ?>');
        src: url('<?php echo vp_option('joption.additional_font_1_eot'); ?>?#iefix') format('embedded-opentype'),
        url('<?php echo vp_option('joption.additional_font_1_woff'); ?>') format('woff'),
        url('<?php echo vp_option('joption.additional_font_1_ttf'); ?>') format('truetype'),
        url('<?php echo vp_option('joption.additional_font_1_svg'); ?>#champagne__limousinesregular') format('svg');
    }
<?php
}
if(jeg_check_use_font_uploader('additional_font_2')) {
    ?>
    @font-face {
        font-family: '<?php echo vp_option('joption.additional_font_2_fontname'); ?>';
        src: url('<?php echo vp_option('joption.additional_font_2_eot'); ?>');
        src: url('<?php echo vp_option('joption.additional_font_2_eot'); ?>?#iefix') format('embedded-opentype'),
        url('<?php echo vp_option('joption.additional_font_2_woff'); ?>') format('woff'),
        url('<?php echo vp_option('joption.additional_font_2_ttf'); ?>') format('truetype'),
        url('<?php echo vp_option('joption.additional_font_2_svg'); ?>#champagne__limousinesregular') format('svg');
    }
<?php
}
?>

/** font setup **/
<?php
    // first font
    $firstfont = get_theme_mod('first_font');
    if(jeg_check_use_font_uploader('additional_font_1')){
        $firstfont = vp_option('joption.additional_font_1_fontname');
    }
    if(!empty($firstfont)) {
?>
body,html,button,
input,select,textarea {
    font-family : "<?php echo esc_html( $firstfont ) ?>";
}
<?php
    }
    // second font
    $secondfont = get_theme_mod('second_font');
    if(jeg_check_use_font_uploader('additional_font_2')){
        $secondfont = vp_option('joption.additional_font_2_fontname');
    }

    if(!empty($secondfont)) {
?>
.article-content.intro-text > p:first-child, .article-content p.intro-text, .article-content.dropcap > p:first-child:first-letter,
.article-content p.dropcap:first-letter, .article-content blockquote, .aside-post .post-title, .slide-caption, .review-shortdesc {
    font-family : "<?php echo esc_html( $secondfont ) ?>";
}
<?php
    }
?>


<?php
    $navheight = get_theme_mod('nav_height', 60);
?>
#navbar, .header-style-1 .logo,
.top-search [name='s'] {
    height: <?php echo esc_html( $navheight ); ?>px;
}

header ul.menu > li > a, .top-socials li,
.top-search-toggle, .top-search [name='s'] {
    line-height: <?php echo esc_html( $navheight ); ?>px;
}

.logo img {
    margin-left:    <?php echo get_theme_mod('logo_left_margin', 0) ?>px;
    margin-top:     <?php echo get_theme_mod('logo_top_margin', 0) ?>px;
    margin-right:   <?php echo get_theme_mod('logo_right_margin', 0) ?>px;
    margin-bottom:  <?php echo get_theme_mod('logo_bottom_margin', 0) ?>px;
}

<?php if(get_theme_mod('nav_bg_color')) { ?>
    #navbar {
        background-color : <?php echo get_theme_mod('nav_bg_color') ?>;
    }

    <?php $rgba = jeg_hex2RGB(get_theme_mod('nav_bg_color'), true); ?>
    .featured-post .caption .post-categories a {
        background-color : rgba(<?php echo esc_html( $rgba ) ?>, 0.75);
    }
<?php } if(get_theme_mod('nav_hover_color')) { ?>
    header ul.menu > li > a:hover, header ul.menu > li.sfHover > a, .mobile-toggle {
        background-color : <?php echo get_theme_mod('nav_hover_color') ?>
    }
<?php } if(get_theme_mod('global_font_color')) { ?>
    body, html, button, input, select, textarea {
        color: <?php echo get_theme_mod('global_font_color') ?>
    }
<?php } if(get_theme_mod('nav_text_color')) { ?>
    header ul.menu > li > a, .top-socials li a, .top-search-toggle, .top-search button, .top-search [name='s'] {
        color: <?php echo get_theme_mod('nav_text_color') ?>
    }
<?php } if(get_theme_mod('nav_top_border_color')) { ?>
    header ul.menu > li > a:before {
        background-color: <?php echo get_theme_mod('nav_top_border_color') ?>
    }
<?php } if(get_theme_mod('nav_line_color')) { ?>
    .header-style-1 .logo, .right-nav, .right-menu {
        border-color: <?php echo get_theme_mod('nav_line_color') ?> !important
    }
<?php } if(get_theme_mod('nav_top_bg_color')) { ?>
    #top {
        background-color: <?php echo get_theme_mod('nav_top_bg_color') ?>
    }
<?php } if(get_theme_mod('nav_top_height')) { ?>
    #top {
        height: <?php echo get_theme_mod('nav_top_height') ?>px;
    }

<?php } if(get_theme_mod('nav_search_toggle_bg')) { ?>
    .top-search-toggle { background-color: <?php echo get_theme_mod('nav_search_toggle_bg') ?>;}
<?php } if(get_theme_mod('nav_search_toggle_color')) { ?>
    .top-search-toggle { color: <?php echo get_theme_mod('nav_search_toggle_color') ?>;}

<?php } if(get_theme_mod('global_alternate_color')) { ?>
    a, .section-heading strong, .archive-heading strong, .article-content.dropcap > p:first-child:first-letter,
    .article-content p.dropcap:first-letter, .dropcaps, .popup-heading,
    .commentlist .bypostauthor > .comment-body > .comment-author > .fn,
    .price-info strong, .productinfo a.aff-link, .article-content .subheading,
    .topcart .empty-cart a {
        color: <?php echo get_theme_mod('global_alternate_color') ?>;
    }
    ::-moz-selection {
        background: <?php echo get_theme_mod('global_alternate_color') ?>;
    }
    ::selection {
        background: <?php echo get_theme_mod('global_alternate_color') ?>;
    }
    .featured-slider-thumbnail .owl-item.active img {
        border-color: <?php echo get_theme_mod('global_alternate_color') ?>;
    }
    #postloader {
        border-top-color : <?php echo get_theme_mod('global_alternate_color') ?>;
    }
<?php } ?>




<?php if(get_theme_mod('breaking_background')) {
    $rgba = jeg_hex2RGB(get_theme_mod('breaking_background'), true);
?>
    .breakingnews { background: <?php echo get_theme_mod('breaking_background'); ?> }
    .owl-breakingnews .owl-wrapper-outer:after {
        background: -moz-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%, rgba(<?php echo esc_html( $rgba ) ?>,1) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(<?php echo esc_html( $rgba ) ?>,0)), color-stop(100%,rgba(<?php echo esc_html( $rgba ) ?>,1))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%); /* IE10+ */
        background: linear-gradient(to right,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%); /* W3C */
    }
    .breakingnews-marquee ul:before {
        background: -moz-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,1) 0%, rgba(<?php echo esc_html( $rgba ) ?>,0) 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(<?php echo esc_html( $rgba ) ?>,1)), color-stop(100%,rgba(<?php echo esc_html( $rgba ) ?>,0)));
        background: -webkit-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,1) 0%,rgba(<?php echo esc_html( $rgba ) ?>,0) 100%);
        background: -o-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,1) 0%,rgba(<?php echo esc_html( $rgba ) ?>,0) 100%);
        background: -ms-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,1) 0%,rgba(<?php echo esc_html( $rgba ) ?>,0) 100%);
        background: linear-gradient(to right,  rgba(<?php echo esc_html( $rgba ) ?>,1) 0%,rgba(<?php echo esc_html( $rgba ) ?>,0) 100%);
    }

    .breakingnews-marquee ul:after {
        background: -moz-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%, rgba(<?php echo esc_html( $rgba ) ?>,1) 100%);
        background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(<?php echo esc_html( $rgba ) ?>,0)), color-stop(100%,rgba(<?php echo esc_html( $rgba ) ?>,1)));
        background: -webkit-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%);
        background: -o-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%);
        background: -ms-linear-gradient(left,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%);
        background: linear-gradient(to right,  rgba(<?php echo esc_html( $rgba ) ?>,0) 0%,rgba(<?php echo esc_html( $rgba ) ?>,1) 100%);
    }
<?php } if(get_theme_mod('breaking_color')) { ?>
    .breakingnews-item a, .breakingnews-item .post-title a, .owl-breakingnews .owl-buttons div, .breakingnews-marquee a, .breakingnews-marquee a:hover { color: <?php echo get_theme_mod('breaking_color'); ?> }
<?php } if(get_theme_mod('breaking_alt')) { ?>
    .breakingnews-item .post-date, .breakingnews-marquee .post-date { color: <?php echo get_theme_mod('breaking_alt'); ?> }
<?php } if(get_theme_mod('breaking_cat_color')) { ?>
    .breakingnews-item .post-category a, .breakingnews-marquee .post-category a { color: <?php echo get_theme_mod('breaking_cat_color'); ?> }
<?php } if(get_theme_mod('breaking_border')) { ?>
    .owl-breakingnews .owl-item, .owl-breakingnews .owl-buttons { border-color: <?php echo get_theme_mod('breaking_border'); ?>; }
<?php } if(get_theme_mod('breaking_text_title')) { ?>
    .breakingnews-heading { color: <?php echo get_theme_mod('breaking_text_title'); ?>; }
<?php } ?>

/* Side Feed  */
<?php if(get_theme_mod('feed_background')) { ?>
    #sidebar, .sidebar-footer { background: <?php echo get_theme_mod('feed_background'); ?> }
<?php } if(get_theme_mod('feed_border')) { ?>
    .sidebar-post-item, .sidebar-loadmore-wrapper, .sidebar-footer .bottom { border-color: <?php echo get_theme_mod('feed_border'); ?> }
<?php } if(get_theme_mod('feed_heading_color')) { ?>
    .sidebar-heading { color: <?php echo get_theme_mod('feed_heading_color'); ?> }
<?php } if(get_theme_mod('feed_text_color')) { ?>
    .sidebar-posts .post-title a { color: <?php echo get_theme_mod('feed_text_color'); ?> }
<?php } if(get_theme_mod('feed_cat_color')) { ?>
    .sidebar-posts .post-meta .post-category a { color: <?php echo get_theme_mod('feed_cat_color'); ?>; }
<?php } if(get_theme_mod('feed_date_color')) { ?>
    .sidebar-posts .post-meta .post-date { color: <?php echo get_theme_mod('feed_date_color'); ?>; }
<?php } if(get_theme_mod('feed_star_color')) { ?>
    .sidebar-posts .post-rating-star { color: <?php echo get_theme_mod('feed_star_color'); ?> }
<?php } ?>

/* Side Feed Active */
<?php if(get_theme_mod('feed_active_bg_color')) { ?>
    .active.sidebar-post-item { background-color: <?php echo get_theme_mod('feed_active_bg_color'); ?> }
<?php } if(get_theme_mod('feed_active_border')) { ?>
    .active.sidebar-post-item { border-color: <?php echo get_theme_mod('feed_active_border'); ?> }
<?php } if(get_theme_mod('feed_active_star_color')) { ?>
    .sidebar-posts .active .post-rating-star { color: <?php echo get_theme_mod('feed_active_star_color'); ?> }
<?php } if(get_theme_mod('feed_active_text_color')) { ?>
    .sidebar-posts .active .post-title a { color: <?php echo get_theme_mod('feed_active_text_color'); ?> }
<?php } if(get_theme_mod('feed_active_cat_color')) { ?>
    .sidebar-posts .active .post-meta .post-category a { color: <?php echo get_theme_mod('feed_active_cat_color'); ?>; }
<?php } if(get_theme_mod('feed_active_date_color')) { ?>
    .sidebar-posts .active .post-meta .post-date { color: <?php echo get_theme_mod('feed_active_date_color'); ?>; }
<?php } if(get_theme_mod('feed_footer_color')) { ?>
    .sidebar-footer .copyright { color: <?php echo get_theme_mod('feed_footer_color'); ?> }

<?php } if(get_theme_mod('review_bar')) { ?>
    .review-bars .bar-bg { background: <?php echo get_theme_mod('review_bar'); ?> }
<?php } if(get_theme_mod('review_bar_background')) {
        $rgba = jeg_hex2RGB(get_theme_mod('review_bar_background'), true);
?>
    .review-bars .bar-bg { background: <?php echo get_theme_mod('review_bar_background'); ?> }
    .review-bars .bar-wrap {
        -webkit-box-shadow: inset 0 -2px 0 rgba(<?php echo esc_html( $rgba ) ?>,0.1);
        box-shadow: inset 0 -2px 0 rgba(<?php echo esc_html( $rgba ) ?>,0.1);
    }
<?php } if(get_theme_mod('rating_great')) { ?>
    .score-great {background: <?php echo get_theme_mod('rating_great'); ?>; }
<?php } if(get_theme_mod('rating_great_alt')) { ?>
    .score-great .score-desc {background: <?php echo get_theme_mod('rating_great_alt'); ?>; }
<?php } if(get_theme_mod('rating_good')) { ?>
    .score-good {background: <?php echo get_theme_mod('rating_good'); ?>; }
<?php } if(get_theme_mod('rating_good_alt')) { ?>
    .score-good .score-desc {background: <?php echo get_theme_mod('rating_good_alt'); ?>; }
<?php } if(get_theme_mod('rating_average')) { ?>
    .score-average {background: <?php echo get_theme_mod('rating_average'); ?>; }
<?php } if(get_theme_mod('rating_average_alt')) { ?>
    .score-average .score-desc {background: <?php echo get_theme_mod('rating_average_alt'); ?>; }
<?php } if(get_theme_mod('rating_bad')) { ?>
    .score-bad {background: <?php echo get_theme_mod('rating_bad'); ?>; }
<?php } if(get_theme_mod('rating_bad_alt')) { ?>
    .score-bad .score-desc {background: <?php echo get_theme_mod('rating_bad_alt'); ?>; }
<?php } ?>

<?php if (get_theme_mod('loader_color_1')) { ?>
.jpreloader span { background : <?php echo get_theme_mod('loader_color_1', '#FCDCD9'); ?>; }
<?php } ?>

<?php if (get_theme_mod('loader_color_1') && get_theme_mod('loader_color_2') &&
          get_theme_mod('loader_color_3') && get_theme_mod('loader_color_4') ) { ?>
@-webkit-keyframes jpreloader {
    0% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_1', '#FCDCD9'); ?>;}
    25% {height:12px;transform:translateY(3px);background:<?php echo get_theme_mod('loader_color_2', '#ef4135'); ?>;}
    50% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_3', '#F4837B'); ?>;}
    100% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_4', '#FCDCD9'); ?>;}
}
@-moz-keyframes jpreloader {
    0% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_1', '#FCDCD9'); ?>;}
    25% {height:12px;transform:translateY(3px);background:<?php echo get_theme_mod('loader_color_2', '#ef4135'); ?>;}
    50% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_3', '#F4837B'); ?>;}
    100% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_4', '#FCDCD9'); ?>;}
}
@-o-keyframes jpreloader {
    0% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_1', '#FCDCD9'); ?>;}
    25% {height:12px;transform:translateY(3px);background:<?php echo get_theme_mod('loader_color_2', '#ef4135'); ?>;}
    50% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_3', '#F4837B'); ?>;}
    100% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_4', '#FCDCD9'); ?>;}
}
@keyframes jpreloader {
    0% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_1', '#FCDCD9'); ?>;}
    25% {height:12px;transform:translateY(3px);background:<?php echo get_theme_mod('loader_color_2', '#ef4135'); ?>;}
    50% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_3', '#F4837B'); ?>;}
    100% {height:6px;transform:translateY(0px);background:<?php echo get_theme_mod('loader_color_4', '#FCDCD9'); ?>;}
}
<?php } ?>

<?php if(get_theme_mod('footer_background')) { ?>
    #footer-content { background: <?php echo get_theme_mod('footer_background'); ?> }
<?php } if(get_theme_mod('footer_text_color')) { ?>
    #footer-content, #footer-content a { color: <?php echo get_theme_mod('footer_text_color'); ?> }
<?php } if(get_theme_mod('footer_text_heading_color')) { ?>
    #footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6 { color: <?php echo get_theme_mod('footer_text_heading_color'); ?>; }
<?php } if(get_theme_mod('footer_text_menu_color')) { ?>
    .footer-bottom a {
        color: <?php echo get_theme_mod('footer_text_menu_color'); ?>;
        text-shadow: none;
    }
<?php } if(get_theme_mod('footer_text_copyright_color')) { ?>
    .footer-bottom { color: <?php echo get_theme_mod('footer_text_copyright_color'); ?>; }
<?php } ?>




<?php if(get_theme_mod('website_color_background')) { ?>
    #main { background-color: <?php echo get_theme_mod('website_color_background'); ?>; }
<?php
    } if(get_theme_mod('website_image_background')) {
    $backgroundimage = get_theme_mod('website_image_background');
    if(ctype_digit($backgroundimage) || is_int($backgroundimage)) {
        $backgroundimage = wp_get_attachment_image_src($backgroundimage, "full");
        $backgroundimage = $backgroundimage[0];
    }
?>
    #main { background-image: url('<?php echo esc_html( $backgroundimage ); ?>'); }
<?php } if(get_theme_mod('website_background_repeat')) { ?>
    #main { bsackground-repeat: <?php echo get_theme_mod('website_background_repeat'); ?>; }
<?php } if(get_theme_mod('website_background_fullscreen')) { ?>
    #main { background-attachment: fixed; -webkit-background-size: cover; -o-background-size: cover; -moz-background-size: cover; background-size: cover; }
<?php } ?>

#main { background-position: <?php echo get_theme_mod('website_background_vertical_position', 'center'); ?> <?php echo get_theme_mod('website_background_horizontal_position', 'center'); ?>; }


<?php if(get_theme_mod('mobile_menu_bg')) { ?>
    .mobile-menu-container, .mobile-search .search-form [name='s'] { background-color: <?php echo get_theme_mod( 'mobile_menu_bg' ); ?> }
<?php } if(get_theme_mod('mobile_border_color')) { ?>
    #mobile-menu ul > li > a, .mobile-search { border-color: <?php echo get_theme_mod( 'mobile_border_color' ); ?> }
<?php } if(get_theme_mod('mobile_menu_color')) { ?>
    #mobile-menu ul > li > a { color: <?php echo get_theme_mod( 'mobile_menu_color' ); ?> }

<?php } if(get_theme_mod('mobile_hover_menu_bg')) { ?>
    #mobile-menu ul > li > a:hover, #mobile-menu ul > li > a:active { background-color: <?php echo get_theme_mod( 'mobile_hover_menu_bg' ); ?> }
<?php } if(get_theme_mod('mobile_hover_menu_color')) { ?>
    #mobile-menu ul > li > a:hover, #mobile-menu ul > li > a:active { color: <?php echo get_theme_mod( 'mobile_hover_menu_color' ); ?> }
<?php } ?>

<?php if(get_theme_mod('mobile_nav_fix', 0)) { ?>
    @media only screen and (min-width : 320px) and (max-width : 1024px) {
        body > header:after { content: ""; display: block; position: relative; height: 60px; width: 100%; }
        #navbar { position: fixed; z-index: 14; }
    }
<?php }  if(get_theme_mod('mobile_nav_height', 60)) { ?>
    @media only screen and (min-width : 320px) and (max-width : 1024px) {
        .mobile-toggle, #navbar, .header-style-1 .logo, .top-search [name='s'] {
            height: <?php echo get_theme_mod('mobile_nav_height', 60); ?>px;
            line-height: <?php echo get_theme_mod('mobile_nav_height', 60); ?>px;
        }
    }
<?php } ?>


<?php
    $backgroundads = vp_option('joption.enable_background_ads');
    if($backgroundads) {
        $background960 = vp_option('joption.background_ads_image_960');
        $background830 = vp_option('joption.background_ads_image_830');
?>
    #main .section-wrap .wrapper {
        background-position: top center;
        background-repeat: no-repeat;
        background-size: auto;
    }

    #main .section-wrap .wrapper {
        background-image: url('<?php echo esc_html( $background960 ); ?>');
    }

    @media (max-width: 1599px) {
        #main .section-wrap .wrapper {
            background-image: url('<?php echo esc_html( $background830 ); ?>');
        }
    }

    @media (max-width: 1024px) {
        #main .section-wrap .wrapper {
            background: none;
        }
    }
    <?php

    }
?>

/*** additional css ***/
<?php echo vp_option('joption.styleeditor'); ?>