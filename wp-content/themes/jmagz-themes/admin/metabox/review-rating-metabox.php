<?php

return array(
    'id'          => 'jmagz_review_rating',
    'types'       => array('review'),
    'title'       => 'Product Rating',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type'      => 'group',
            'repeating' => true,
            'sortable'  => true,
            'name'      => 'rating',
            'title'     => 'This Product Rating',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'rating_text',
                    'label' => 'Rating Text',
                    'attach_title' => true
                ),
                array(
                    'type' => 'slider',
                    'name' => 'rating_number',
                    'label' => 'Rating Number',
                    'min' => '1',
                    'max' => '10',
                    'step' => '1',
                    'default' => '10',
                    'attach_title' => true
                ),
            ),
        ),

    ),
);