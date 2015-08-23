<?php

/*** Navigation Styling **/
function jeg_customize_style($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_styling',
        'title'			=> 'Color Scheme',
        'priority' 		=> 20,
        'description'	=> 'choose predefine color scheme you want to use for your website'
    ), array(

        array(
            'type' 		=> 'select',
            'name' 		=> 'color_scheme',
            'title' 	=> 'Color Scheme',
            'transport'	=> 'refresh',
            'default' 	=> 'default',
            'choices'	=> array(
                'default'	    => 'Red (Default)',
                'black'		    => 'Black',
                'blue'          => 'Blue',
                'green'         => 'Green',
                'midnightblue'  => 'Midnight Blue',
                'yellow'	    => 'Yellow',
            )
        ),

    ), $wp_customize);
}

function jeg_customize_font($wp_customize)
{
    $googlefont = jeg_get_google_font();
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_font',
        'title'			=> 'Font Setup',
        'priority' 		=> 30,
        'description'	=> 'themes font setup'
    ), array(
        // Global Font
        array(
            'type'      => 'subtitle',
            'name'      => 'font_body_subtitle',
            'title'     => 'Global Font',
            'description' => 'Base font for body, form, input, etc.'
        ),
        array(
            'type' 		=> 'select',
            'name' 		=> 'first_font',
            'title' 	=> 'First section font',
            'transport'	=> 'refresh',
            'default' 	=> null,
            'choices'	=> $googlefont
        ),
        // Menu
        array(
            'type'      => 'subtitle',
            'name'      => 'font_menu_subtitle',
            'title'     => 'Second Font section',
            'description' => 'Mainly usage for italic part of website'
        ),
        array(
            'type' 		=> 'select',
            'name' 		=> 'second_font',
            'title' 	=> 'Second section font',
            'transport'	=> 'refresh',
            'default' 	=> null,
            'choices'	=> $googlefont
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'global_font',
            'title'     => 'Body Color',
            'description' => 'body and input and other selector color'
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'global_font_color',
            'title' 	=>  'Body & Input Color Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'alternate_global_font',
            'title'     => 'Alternate Color',
            'description' => 'alternate color for anchor (a), second heading, loader, navigation block, and other'
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'global_alternate_color',
            'title' 	=>  'Alternate Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
    ), $wp_customize);
}

function jeg_customize_logo($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_logo',
        'title'			=> 'Website Logo',
        'priority' 		=> 40,
        'description'	=> 'Insert logo for your website'
    ), array(

        array(
            'type' 		=> 'subtitle',
            'name' 		=> 'desktop_logo_group',
            'title' 	=> 'Desktop Logo',
            'description' => ''
        ),

        array(
            'type' 		=> 'newupload',
            'name' 		=> 'website_logo',
            'title' 	=> 'Website logo',
            'transport' => 'refresh',
            'default' 	=> get_template_directory_uri() . '/public/img/logo.png'
        ),

        array(
            'type' 		=> 'newupload',
            'name' 		=> 'website_logo_retina',
            'title' 	=> 'Website logo retina',
            'transport' => 'refresh',
            'default' 	=> get_template_directory_uri() . '/public/img/logo.png'
        ),

        array(
            'type' 		=> 'slider',
            'name' 		=> 'logo_left_margin',
            'title' 	=>  'Logo Left Margin',
            'transport' => 'refresh',
            'default' 	=> 0,
            'min'		=> 0,
            'max'		=> 50,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'logo_top_margin',
            'title' 	=>  'Logo Top Margin',
            'transport' => 'refresh',
            'default' 	=> 0,
            'min'		=> 0,
            'max'		=> 50,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'logo_right_margin',
            'title' 	=>  'Logo Right Margin',
            'transport' => 'refresh',
            'default' 	=> 0,
            'min'		=> 0,
            'max'		=> 50,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'logo_bottom_margin',
            'title' 	=>  'Logo Bottom Margin',
            'transport' => 'refresh',
            'default' 	=> 0,
            'min'		=> 0,
            'max'		=> 50,
            'step'		=> 1
        ),

        array(
            'type' 		=> 'subtitle',
            'name' 		=> 'mobile_logo_group',
            'title' 	=> 'Mobile Logo',
            'description' => ''
        ),

        array(
            'type' 		=> 'newupload',
            'name' 		=> 'mobile_logo',
            'title' 	=> 'Mobile logo',
            'transport' => 'refresh',
            'default' 	=> get_template_directory_uri() . '/public/img/logo.png'
        ),

        array(
            'type' 		=> 'newupload',
            'name' 		=> 'mobile_logo_retina',
            'title' 	=> 'Mobile logo retina',
            'transport' => 'refresh',
            'default' 	=> get_template_directory_uri() . '/public/img/logo.png'
        ),

        array(
            'type' 		=> 'subtitle',
            'name' 		=> 'favicon_logo_group',
            'title' 	=> 'Favicon Logo',
            'description' => ''
        ),

        array(
            'type' 		=> 'newupload',
            'name' 		=> 'favicon_logo',
            'title' 	=> 'Favicon Logo',
            'transport' => 'refresh',
            'default' 	=> get_template_directory_uri() . '/public/img/favicon.ico'
        ),

    ), $wp_customize);
}

function jeg_customize_header($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_header',
        'title'			=> 'Header Option',
        'priority' 		=> 50,
        'description'	=> 'Choose header option'
    ), array(
        array(
            'type' 		=> 'radio',
            'name' 		=> 'header_layout',
            'title' 	=> 'Navigation',
            'transport'	=> 'refresh',
            'default' 	=> 'navigation-1',
            'choices'	=> array(
                'navigation-1' => 'One line navigation',
                'navigation-2' => 'Two line navigation',
            )
        ),
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'hide_search_head',
            'title' 	=> 'Hide Search Bar',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'hide_social_head',
            'title' 	=> 'hide social icon on header',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'nav_height',
            'title' 	=>  'Navigation Height',
            'transport' => 'refresh',
            'default' 	=> 60,
            'min'		=> 60,
            'max'		=> 100,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'nav_bg_color',
            'title' 	=>  'Navigation Background Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'nav_hover_color',
            'title' 	=>  'Navigation Hover Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'nav_text_color',
            'title' 	=>  'Navigation Text Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'nav_top_border_color',
            'title' 	=>  'Navigation Active Top Border Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'nav_line_color',
            'title'     => 'Line Separator Color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'subtitle',
            'name'      => 'two_line_color',
            'title'     => 'Two Line Navigation',
            'description' => 'Two line navigation option'
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'nav_top_height',
            'title' 	=>  'Navigation Top Height',
            'transport' => 'refresh',
            'default' 	=> 110,
            'min'		=> 50,
            'max'		=> 200,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'nav_top_bg_color',
            'title' 	=>  'Navigation Top Background Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'subtitle',
            'name'      => 'nav_search_subtitle',
            'title'     => 'Search Bar',
            'description' => 'Top search option'
        ),
        array(
            'type'      => 'color',
            'name'      => 'nav_search_toggle_color',
            'title'     => 'Search Toggle Color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'nav_search_toggle_bg',
            'title'     => 'Search Toggle Background Color',
            'transport' => 'refresh',
            'default'   => null,
        ),


    ), $wp_customize);
}






function jeg_customize_mobile($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_mobile_navigation',
        'title'			=> 'Mobile Navigation',
        'priority' 		=> 55,
        'description'	=> 'Choose mobile option'
    ), array(
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'mobile_nav_fix',
            'title' 	=> 'Mobile Navigation Fixed',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),
        array(
            'type' 		=> 'slider',
            'name' 		=> 'mobile_nav_height',
            'title' 	=>  'Mobile Navigation Height',
            'transport' => 'refresh',
            'default' 	=> 60,
            'min'		=> 50,
            'max'		=> 100,
            'step'		=> 1
        ),
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'mobile_breaking_hide',
            'title' 	=> 'Hide Breaking News Button on mobile',
            'transport'	=> 'refresh',
            'default' 	=> false
        ),

        array(
            'type'      => 'color',
            'name'      => 'mobile_menu_bg',
            'title'     => 'Menu background color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'mobile_menu_color',
            'title'     => 'Menu link color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'mobile_border_color',
            'title'     => 'Menu border color',
            'transport' => 'refresh',
            'default'   => null,
        ),

        array(
            'type'      => 'color',
            'name'      => 'mobile_hover_menu_bg',
            'title'     => 'Menu hover background color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'mobile_hover_menu_color',
            'title'     => 'Menu hover link color',
            'transport' => 'refresh',
            'default'   => null,
        ),

    ), $wp_customize);
}





function jeg_customize_breaking($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_breaking',
        'title'			=> 'Breaking Style',
        'priority' 		=> 60,
        'description'	=> 'To modify the content of breaking news, please refer to Jmagz dashboard > breaking news'
    ), array(
        array(
            'type' 		=> 'radio',
            'name' 		=> 'breaking_layout',
            'title' 	=> 'Breaking News Layout',
            'transport'	=> 'refresh',
            'default' 	=> 'featureimage',
            'choices'	=> array(
                'featureimage' => 'Featured Image breaking news',
                'textonly' => 'Text only breaking news',
            )
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'breaking_background',
            'title' 	=> 'Background color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'breaking_border',
            'title' 	=> 'Border color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'breaking_color',
            'title' 	=> 'Link color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'breaking_alt',
            'title' 	=> 'Post date color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'breaking_cat_color',
            'title'     => 'Post category color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'subtitle',
            'name'      => 'breaking_text',
            'title'     => 'Only text breaking news',
            'description' => ''
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'breaking_text_title',
            'title' 	=> 'Breaking news text title',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
    ), $wp_customize);
}



function jeg_customize_feed($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_feed',
        'title'			=> 'Side Feed',
        'priority' 		=> 70,
        'description'	=> 'For more option side content, please refer to Jmagz dashboard > Side Feed Setting'
    ), array(

        array(
            'type'      => 'color',
            'name'      => 'feed_heading_color',
            'title'     => 'Heading Text color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'feed_background',
            'title' 	=> 'Feed background color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_border',
            'title'     => 'Feed border color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'feed_text_color',
            'title' 	=> 'Feed Link color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'feed_date_color',
            'title' 	=> 'Post date color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_cat_color',
            'title'     => 'Post category color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_star_color',
            'title'     => 'Feed rating star color',
            'transport' => 'refresh',
            'default'   => null,
        ),

        // Active state
        array(
            'type'      => 'subtitle',
            'name'      => 'feed_active_state',
            'title'     => 'Feed Active State',
            'description' => ''
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_active_bg_color',
            'title'     => 'Feed active: background color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_active_border',
            'title'     => 'Feed active: border color',
            'transport' => 'refresh',
            'default'   => null,
        ),

        array(
            'type'      => 'color',
            'name'      => 'feed_active_text_color',
            'title'     => 'Post link color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_active_date_color',
            'title'     => 'Post date color',
            'transport' => 'refresh',
            'default'   => null,
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_active_cat_color',
            'title'     => 'Post Category color',
            'transport' => 'refresh',
            'default'   => null,
        ),

        array(
            'type'      => 'color',
            'name'      => 'feed_active_star_color',
            'title'     => 'Feed active: rating star color',
            'transport' => 'refresh',
            'default'   => null,
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'feed_footer_subtitle',
            'title'     => 'Side Footer',
            'description' => ''
        ),
        array(
            'type'      => 'color',
            'name'      => 'feed_footer_color',
            'title'     => 'Copyright Text Color',
            'transport' => 'refresh',
            'default'   => null,
        ),

    ), $wp_customize);
}



function jeg_customize_review($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_review_color',
        'title'			=> 'Review Style',
        'priority' 		=> 80,
        'description'	=> 'change style review page'
    ), array(
        array(
            'type' 		=> 'color',
            'name' 		=> 'star_color',
            'title' 	=> 'Star Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'review_bar',
            'title' 	=> 'Review bar color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'review_bar_background',
            'title' 	=> 'Review bar background color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),

        array(
            'type'      => 'subtitle',
            'name'      => 'rating_text',
            'title'     => 'Rating mean (score) background',
            'description' => 'background for every score background'
        ),

        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_great',
            'title' 	=> 'Rating Great',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_great_alt',
            'title' 	=> 'Rating Great alt',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_good',
            'title' 	=> 'Rating Good',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_good_alt',
            'title' 	=> 'Rating Good alt',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_average',
            'title' 	=> 'Rating Average',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_average_alt',
            'title' 	=> 'Rating Average alt',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_bad',
            'title' 	=> 'Rating Bad',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'rating_bad_alt',
            'title' 	=> 'Rating Bad alt',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
    ), $wp_customize);
}


function jeg_customize_loader($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_loader_color',
        'title'			=> 'Loader color',
        'priority' 		=> 90,
        'description'	=> 'Change preloader color of mega-menu newsfeed. Please set all colors to take effect.'
    ), array(
        array(
            'type' 		=> 'color',
            'name' 		=> 'loader_color_1',
            'title' 	=> 'Loader bar first color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'loader_color_2',
            'title' 	=> 'Loader bar second color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),array(
            'type' 		=> 'color',
            'name' 		=> 'loader_color_3',
            'title' 	=> 'Loader bar third color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),array(
            'type' 		=> 'color',
            'name' 		=> 'loader_color_4',
            'title' 	=> 'Loader bar forth color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
    ), $wp_customize);
}



function jeg_customize_footer($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_customize_footer',
        'title'			=> 'Footer style',
        'priority' 		=> 95,
        'description'	=> 'change footer style'
    ), array(
        array(
            'type' 		=> 'color',
            'name' 		=> 'footer_background',
            'title' 	=> 'Footer Background',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'footer_text_color',
            'title' 	=> 'Footer Text Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'footer_text_heading_color',
            'title' 	=> 'Footer Text Heading Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type'      => 'subtitle',
            'name'      => 'footer_subtitle_text',
            'title'     => 'Footer Menu Style',
            'description' => 'style for footer menu and also copyright'
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'footer_text_menu_color',
            'title' 	=> 'Footer Menu Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'color',
            'name' 		=> 'footer_text_copyright_color',
            'title' 	=> 'Footer Copyright Text Color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
    ), $wp_customize);
}




function jeg_customize_background($wp_customize)
{
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_background',
        'title'			=> 'Website Background',
        'priority' 		=> 96,
        'description'	=> 'This option will only valid if you are not overwrite background option on single post'
    ), array(

        array(
            'type' 		=> 'color',
            'name' 		=> 'website_color_background',
            'title' 	=> 'Website background color',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'newupload',
            'name' 		=> 'website_image_background',
            'title' 	=> 'Website Image Background',
            'transport'	=> 'refresh',
            'default' 	=> null,
        ),
        array(
            'type' 		=> 'select',
            'name' 		=> 'website_background_vertical_position',
            'title' 	=> 'Website image background vertical position',
            'transport'	=> 'refresh',
            'default' 	=> 'center',
            'choices'	=> array(
                'left'		=> 'Left',
                'center'	=> 'Center',
                'right'		=> 'Right',
            )
        ),
        array(
            'type' 		=> 'select',
            'name' 		=> 'website_background_horizontal_position',
            'title' 	=> 'Website image background horizontal position',
            'transport'	=> 'refresh',
            'default' 	=> 'center',
            'choices'	=> array(
                'top'		=> 'Top',
                'center'	=> 'Center',
                'bottom'	=> 'Bottom',
            )
        ),
        array(
            'type' 		=> 'select',
            'name' 		=> 'website_background_repeat',
            'title' 	=> 'Website image background repeat',
            'transport'	=> 'refresh',
            'default' 	=> 'repeat',
            'choices'	=> array(
                'repeat-x'		=> 'Repeat Horizontal',
                'repeat-y'		=> 'Repeat Vertical',
                'repeat'		=> 'Repeat Image',
                'no-repeat'		=> 'No Repeat'
            )
        ),
        array(
            'type' 		=> 'checkbox',
            'name' 		=> 'website_background_fullscreen',
            'title' 	=> 'Enable fullscreen background',
            'transport'	=> 'refresh',
            'default' 	=> false
        )

    ), $wp_customize);
}