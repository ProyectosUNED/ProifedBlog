<?php

return array(
    'id'          => 'jmagz_review_meta',
    'types'       => array('review'),
    'title'       => 'Product Meta',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type' => 'textbox',
            'name' => 'product_name',
            'label' => 'Product Name',
        ),
        array(
            'type' => 'textarea',
            'name' => 'product_summary',
            'label' => 'Product Summary',
        ),
    ),
);