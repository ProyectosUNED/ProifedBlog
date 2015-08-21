<?php

return array(
    'id'          => 'jeg_category_builder',
    'types'       => array('cat_builder'),
    'title'       => 'Jmagz Category Builder',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'radioimage',
            'name' => 'feed_layout',
            'label' => 'Feed Layout',
            'description' => 'Choose your category feed layout',
            'item_max_height' => '800',
            'item_max_width' => '400',
            'items' => array(
                array(
                    'value' => 'feed-1',
                    'label' => 'Category Feed 1',
                    'img' => get_template_directory_uri() . '/public/img/footcategory1.jpg',
                ),
                array(
                    'value' => 'feed-2',
                    'label' => 'Category Feed 2',
                    'img' => get_template_directory_uri() . '/public/img/footcategory2.jpg',
                ),
            ),
            'default' => array(
                'feed-1',
            ),
        ),
    ),
);