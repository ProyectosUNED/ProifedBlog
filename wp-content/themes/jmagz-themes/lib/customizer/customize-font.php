<?php

/*** Navigation Styling **/
function jeg_customize_font($wp_customize)
{
    $googlefont = jeg_get_google_font();
    new Jeg_Customizer_Framework(array(
        'name'			=> 'jeg_font',
        'title'			=> 'Font Switcher',
        'priority' 		=> 30,
        'description'	=> 'Switch themes font'
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

    ), $wp_customize);
}