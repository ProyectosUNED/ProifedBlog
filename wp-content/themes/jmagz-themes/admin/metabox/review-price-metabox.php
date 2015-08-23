<?php

return array(
    'id'          => 'jmagz_review_price',
    'types'       => array('review'),
    'title'       => 'Product Price',
    'priority'    => 'high',
    'template'    => array(
        array(
            'type'      => 'group',
            'repeating' => true,
            'sortable'  => true,
            'name'      => 'price',
            'title'     => 'This product price',
            'fields'    => array(
                array(
                    'type' => 'textbox',
                    'name' => 'shop',
                    'label' => 'Where to buy (ex : amazon, ebay)',
                    'attach_title' => true
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'price',
                    'label' => 'Price',
                    'attach_title' => true
                ),
                array(
                    'type' => 'textbox',
                    'name' => 'link',
                    'label' => 'Shop Link, you can also use your referral link',
                ),
            ),
        ),

    ),
);