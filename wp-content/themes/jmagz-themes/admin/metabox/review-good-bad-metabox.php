<?php

return array(
    'id'          => 'jmagz_review_good_bad',
    'types'       => array('review'),
    'title'       => 'Good or Bad',
    'priority'    => 'high',
    'template'    => array(

        array(
            'type'      => 'group',
            'repeating' => true,
            'sortable'  => true,
            'name'      => 'good',
            'title'     => 'What good about this product',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'good_text',
                    'label' => 'Good',
                ),
            ),
            'attach_title' => true
        ),

        array(
            'type'      => 'group',
            'repeating' => true,
            'sortable'  => true,
            'name'      => 'bad',
            'title'     => 'What bad about this product',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'bad_text',
                    'label' => 'Bad',
                ),
            ),
            'attach_title' => true
        ),
    ),
);