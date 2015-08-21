<?php

return array(
    'id'          => 'jmagz_page_index',
    'types'       => array('page'),
    'title'       => 'Jmagz Page Metabox',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'slider',
            'name' => 'index_number',
            'label' => 'Max number of Index Content',
            'min' => '1',
            'max' => '25',
            'step' => '1',
            'default' => '12',
        ),
    ),
);