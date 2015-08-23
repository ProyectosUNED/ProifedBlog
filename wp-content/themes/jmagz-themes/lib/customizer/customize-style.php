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
            'default' 	=> 'center',
            'choices'	=> array(
                'clean'		=> 'Clean Style',
                'flat'		=> 'Flat Style',
                'dark'		=> 'Dark Style',
            )
        ),

    ), $wp_customize);
}