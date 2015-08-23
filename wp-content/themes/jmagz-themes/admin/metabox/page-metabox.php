<?php

return array(
    'id'          => 'jmagz_page_metabox',
    'types'       => array('page'),
    'title'       => 'Jmagz Page Metabox',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'toggle',
            'name' => 'hide_breadcrumb',
            'label' => 'Hide Breadcrumb',
            'default' => '0',
        ),
        array(
            'type' => 'toggle',
            'name' => 'hide_share',
            'label' => 'Hide Share Bar',
            'default' => '0',
        ),
        array(
            'type' => 'toggle',
            'name' => 'hide_author_box',
            'label' => 'Hide author box',
            'default' => '0',
        ),
    ),
);