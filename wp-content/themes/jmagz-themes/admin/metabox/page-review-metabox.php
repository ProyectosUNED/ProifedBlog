<?php

return array(
    'id'          => 'jmagz_review',
    'types'       => array('page'),
    'title'       => 'Jmagz Review Metabox',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'radioimage',
            'name' => 'review_layout',
            'label' => 'Review Layout',
            'description' => 'Choose your review layout',
            'item_max_height' => '800',
            'item_max_width' => '400',
            'items' => array(
                array(
                    'value' => 'review-1',
                    'label' => 'Review Layout 1',
                    'img' => get_template_directory_uri() . '/public/img/category1.jpg',
                ),
                array(
                    'value' => 'review-2',
                    'label' => 'Review Layout 2',
                    'img' => get_template_directory_uri() . '/public/img/category2.jpg',
                ),
            ),
            'default' => array(
                'review-1',
            ),
        ),
    ),
);