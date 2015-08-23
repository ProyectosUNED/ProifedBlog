<?php

return array(
    'id'          => 'jmagz_dummy_page',
    'types'       => array('cat_builder','page'),
    'title'       => 'Jmagz Dummy Page',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'select',
            'name' => 'dummy_select',
            'label' => 'Dummy Select',
            'items' => array(
                array(
                    'value' => '',
                    'label' => '',
                ),
            ),
        ),
    ),
);