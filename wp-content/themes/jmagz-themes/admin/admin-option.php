<?php

/**
 * @author Jegtheme
 */

function jeg_dashboard_option() {
    return array(
        'title' =>  'JMagz' ,
        'logo' => '',
        'menus' => array(
            array(
                'title' =>  'General Setting' ,
                'name' => 'generalsetting',
                'icon' => 'font-awesome:fa-check',
                'menus' => array(

                    array(
                        'title' =>  'General Option' ,
                        'name' => 'website_option',
                        'icon' => 'font-awesome:fa-globe',
                        'controls' => array(
                            array(
                                'type' => 'section',
                                'title' =>  'Ajax Post' ,
                                'name' => 'Ajax Post',
                                'fields' => array(
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'enable_ajax_post',
                                        'label' => 'Enable Ajax post load From Side Feed',
                                        'description' => "when your visitor click link from left feed, it will load by ajax. and it will only load by ajax if you currently on single blog page. <strong>Please note that this option may break on several plugin. Please read documentation for more detail to solve technical issues of this method.</strong>",
                                        'default' => '0',
                                    ),
                                )
                            ),
                            array(
                                'type' => 'toggle',
                                'name' => 'enable_image_zoom',
                                'label' => 'Enable Jmagz image zoom',
                                'description' => 'use jmagz image zoom, please choose attachment when you select image to zoom',
                                'default' => '1',
                            ),

                        )
                    ),

                    array(
                        'title' =>  'IOS Bookmarklet' ,
                        'name' => 'ios_bookmarklet',
                        'icon' => 'font-awesome:fa-asterisk',
                        'controls' => array(

                            array(
                                'type' => 'section',
                                'title' =>  'IOS Bookmarklet' ,
                                'name' => 'ios_bookmarklet_logo ',
                                'description' =>  'Upload logo for Apple Device Bookmark' ,
                                'fields' => array(
                                    array(
                                        'type' => 'upload',
                                        'name' => 'apple_iphone_icon',
                                        'label' =>  'Apple iPhone icon' ,
                                        'description' =>  'Upload logo with 57px square size' ,
                                        'default' => get_template_directory_uri() . '/public/img/appleicon.png'
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'apple_iphone_retina_icon',
                                        'label' =>  'Apple iPhone retina icon' ,
                                        'description' =>  'Upload logo with 120px square size' ,
                                        'default' => get_template_directory_uri() . '/public/img/appleicon.png'
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'apple_ipad_icon',
                                        'label' =>  'Apple iPad icon' ,
                                        'description' =>  'Upload logo with 72px square size' ,
                                        'default' => get_template_directory_uri() . '/public/img/appleicon.png'
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'apple_ipad_retina_icon',
                                        'label' =>  'Apple iPad retina icon' ,
                                        'description' =>  'Upload logo with 144px square size' ,
                                        'default' => get_template_directory_uri() . '/public/img/appleicon.png'
                                    ),
                                )
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Mega menu option' ,
                        'name' => 'mega_menu_option',
                        'icon' => 'font-awesome:fa-navicon',
                        'controls' => array(
                            array(
                                'type' => 'slider',
                                'name' => 'mega_menu_number',
                                'label' => 'Category Mega menu post number',
                                'min' => '5',
                                'max' => '20',
                                'step' => '1',
                                'default' => '10',
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Side Feed Setting' ,
                        'name' => 'sidebar_feed',
                        'icon' => 'font-awesome:fa-newspaper-o',
                        'controls' => array(
                            array(
                                'type' => 'textbox',
                                'name' => 'sidebar_text',
                                'label' =>  'Sidebar latest news Text ex : latest news',
                                'default' => 'Latest News',
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'sidebar_review_text',
                                'label' =>  'Sidebar Latest Review text ex : Latest Review',
                                'default' => 'Latest Review',
                            ),
                            array(
                                'type' => 'radiobutton',
                                'name' => 'sidebar_date',
                                'label' => 'Sidebar Date Option',
                                'description' => 'choose date option for sidebar feed',
                                'items' => array(
                                    array(
                                        'value' => 'dateago',
                                        'label' => 'Time Ago',
                                    ),
                                    array(
                                        'value' => 'normaldate',
                                        'label' => 'Normal date',
                                    ),
                                ),
                                'default' => array(
                                    'dateago',
                                ),
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'sidebar_copy',
                                'label' =>  'Sidebar Copyright',
                                'default' => '&copy; 2014 JMAGZ. All Rights Reserved.',
                            ),
                            array(
                                'type' => 'slider',
                                'name' => 'side_feed_number',
                                'label' => 'Side feed number per load',
                                'min' => '2',
                                'max' => '20',
                                'step' => '1',
                                'default' => '8',
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Search Option' ,
                        'name' => 'search_option',
                        'icon' => 'font-awesome:fa-search',
                        'controls' => array(
                            array(
                                'type' => 'select',
                                'name' => 'search_type',
                                'label' => 'Search Post Type',
                                'description' => 'filter which post type to show',
                                'items' => array(
                                    array(
                                        'value' => 'onlypost',
                                        'label' => 'Only Search Post Content',
                                    ),
                                    array(
                                        'value' => 'both',
                                        'label' => 'Search Review &amp; Post',
                                    ),
                                ),
                                'default' => array(
                                    'onlypost',
                                ),
                            ),
                            array(
                                'type' => 'slider',
                                'name' => 'live_search_number',
                                'label' => 'Max number of content on live search',
                                'min' => '1',
                                'max' => '10',
                                'step' => '1',
                                'default' => '5',
                            ),
                            array(
                                'type' => 'slider',
                                'name' => 'search_result_number',
                                'label' => 'Max number of search result',
                                'min' => '1',
                                'max' => '25',
                                'step' => '1',
                                'default' => '12',
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Post Option' ,
                        'name' => 'post_option',
                        'icon' => 'font-awesome:fa-keyboard-o',
                        'controls' => array(

                            array(
                                'type' => 'section',
                                'title' =>  'Show / Hide Post Meta' ,
                                'name' => 'post_meta',
                                'fields' => array(
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_post_topbar',
                                        'label' => 'Hide Post Top Bar',
                                        'description' => 'hide post top bar, that hold breadcrumb and date',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_post_meta',
                                        'label' => 'Hide Post Meta',
                                        'description' => 'hide post meta bellow title',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_share_bar',
                                        'label' => 'Hide Share Bar',
                                        'description' => 'hire post share bar',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_author_box',
                                        'label' => 'Hide Author Box',
                                        'description' => 'hide post author box',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_post_tag',
                                        'label' => 'Hide Post Tag',
                                        'description' => 'hide list of post tag bellow of article',
                                        'default' => '0',
                                    ),
                                )
                            ),


                            array(
                                'type' => 'section',
                                'title' =>  'Show / Hide Related Content' ,
                                'name' => 'related_post',
                                'fields' => array(
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'show_related_post',
                                        'label' => 'Show Related Post in Article',
                                        'description' => 'show related post inside article on every post',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'slider',
                                        'name' => 'related_post_number',
                                        'label' => 'Related News Post Number',
                                        'min' => '1',
                                        'max' => '10',
                                        'step' => '1',
                                        'default' => '5',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_related_post_bottom',
                                        'label' => 'Hide Related Post on bottom of post',
                                        'description' => 'hide related post on bottom of article',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_next_prev_post',
                                        'label' => 'Hide Next and Prev Post',
                                        'description' => 'hide next previous post',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_post_popup',
                                        'label' => 'Hide Post Recommendation Popup',
                                        'description' => 'hide post recommendation popup that will show when scrolling',
                                        'default' => '0',
                                    ),
                                )
                            ),

                        )
                    ),

                    array(
                        'title' =>  'Review Option' ,
                        'name' => 'review_option',
                        'icon' => 'font-awesome:fa-star',
                        'controls' => array(
                            array(
                                'type'  => 'select',
                                'name'  => 'review_page',
                                'label' => 'Choose your review page',
                                'default' => '{{first}}',
                                'items' => array(
                                    'data' => array(
                                        array(
                                            'source' => 'function',
                                            'value'  => 'jeg_get_review_page',
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Review Price' ,
                                'name' => 'related_post',
                                'fields' => array(
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'review_price_front',
                                        'label' =>  'Text in front of price text',
                                        'description' => 'ex : $, &euro;',
                                        'default' => '$'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'review_price_behind',
                                        'label' =>  'Text behind of price text',
                                        'default' => ''
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'show_price_widget',
                                        'label' => 'Show Price Widget',
                                        'description' => 'show price widget',
                                        'items' => array(
                                            array(
                                                'value' => 'none',
                                                'label' => 'Don\'t show price widget',
                                            ),
                                            array(
                                                'value' => 'reviewbox',
                                                'label' => 'Show on Review Box',
                                            ),
                                            array(
                                                'value' => 'onarticle',
                                                'label' => 'Show on Article',
                                            ),
                                            array(
                                                'value' => 'both',
                                                'label' => 'Show on Review Box and Article',
                                            ),
                                        ),
                                        'default' => array(
                                            'none',
                                        ),
                                    ),
                                )
                            ),

                            array(
                                'type' => 'section',
                                'title' =>  'Show / Hide Review Meta' ,
                                'name' => 'review_meta',
                                'fields' => array(
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_review_topbar',
                                        'label' => 'Hide Review Top Bar',
                                        'description' => 'hide review top bar, that hold breadcrumb and date',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_review_meta',
                                        'label' => 'Hide Review Meta',
                                        'description' => 'hide review meta bellow title',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_share_bar_review',
                                        'label' => 'Hide Share Bar',
                                        'description' => 'hide review share bar',
                                        'default' => '0',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_author_box',
                                        'label' => 'Hide Author Box',
                                        'description' => 'hide post author box',
                                        'default' => '0',
                                    ),
                                )
                            ),

                            array(
                                'type' => 'section',
                                'title' =>  'Show / Hide Related Review' ,
                                'name' => 'related_review',
                                'fields' => array(
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'hide_next_prev_review',
                                        'label' => 'Hide Next and Prev Review',
                                        'description' => 'hide next previous review',
                                        'default' => '0',
                                    ),
                                )
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Breaking News' ,
                        'name' => 'breaking_news_section',
                        'icon' => 'font-awesome:fa-bookmark-o',
                        'controls' => array(

                            array(
                                'type' => 'toggle',
                                'name' => 'enable_breakingnews',
                                'label' => 'Enable Breaking News',
                                'description' => 'Show breaking news bellow main navigation',
                                'default' => '1',
                            ),

                            array(
                                'type' => 'toggle',
                                'name' => 'show_only_homepage',
                                'label' => 'Show Breaking News only on Homepage',
                                'description' => 'show breaking news only on homepage, other page won\'t show breaking news',
                                'default' => '1',
                            ),

                            array(
                                'type' => 'radiobutton',
                                'name' => 'breaking_date',
                                'label' => 'Breaking News Date Option',
                                'description' => 'choose date option for breaking news',
                                'items' => array(
                                    array(
                                        'value' => 'dateago',
                                        'label' => 'Time Ago',
                                        'description' => 'ex : 1 minute ago, 2 days ago',
                                    ),
                                    array(
                                        'value' => 'normal date',
                                        'label' => 'Normal date',
                                        'description' => 'ex : 12/04/14',
                                    ),
                                ),
                                'default' => array(
                                    'dateago',
                                ),
                            ),

                            array(
                                'type' => 'section',
                                'title' =>  'Content Builder for Breaking News' ,
                                'name' => 'content_builder_breaking_news ',
                                'description' =>  'Content included within breaking news ticker' ,
                                'fields' => array(

                                    array(
                                        'type' => 'slider',
                                        'name' => 'breaking_post_number',
                                        'label' => 'Breaking News Post Number',
                                        'min' => '4',
                                        'max' => '20',
                                        'step' => '1',
                                        'default' => '10',
                                    ),
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'breaking_filter_type',
                                        'label' => 'Filter By',
                                        'items' => array(
                                            array(
                                                'value' => 'category',
                                                'label' => 'Category',
                                            ),
                                            array(
                                                'value' => 'tags',
                                                'label' => 'Tags',
                                            ),
                                        ),
                                        'default' => array(
                                            'category',
                                        ),
                                    ),
                                    array(
                                        'type' => 'multiselect',
                                        'name' => 'breaking_filter_category',
                                        'label' => 'Category',
                                        'description' => 'Include this category, leave empty to select all',
                                        'items' => array(
                                            'data' => array(
                                                array(
                                                    'source' => 'function',
                                                    'value'  => 'vp_get_categories',
                                                ),
                                            ),
                                        ),
                                        'dependency' => array(
                                            'field'    => 'breaking_filter_type',
                                            'function' => 'vp_dep_is_category',
                                        ),
                                    ),
                                    array(
                                        'type' => 'multiselect',
                                        'name' => 'breaking_filter_tags',
                                        'label' => 'Include Tag(s)',
                                        'description' => 'Tag(s) to filter, leave empty to select all',
                                        'items' => array(
                                            'data' => array(
                                                array(
                                                    'source' => 'function',
                                                    'value'  => 'vp_get_tags',
                                                ),
                                            ),
                                        ),
                                        'dependency' => array(
                                            'field'    => 'breaking_filter_type',
                                            'function' => 'vp_dep_is_tags',
                                        ),
                                    ),

                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'breaking_filter_rule',
                                        'label' => 'Filter Rule',
                                        'description' => 'filter content by this rule',
                                        'default' => 'include',
                                        'items' => array(
                                            array(
                                                'value' => 'include',
                                                'label' => 'Include',
                                            ),
                                            array(
                                                'value' => 'exclude',
                                                'label' => 'Exclude',
                                            ),
                                        ),
                                    ),
                                )
                            )
                        )
                    ),


                    array(
                        'title' =>  'Ads Setting' ,
                        'name' => 'ads_section',
                        'icon' => 'font-awesome:fa-certificate',
                        'controls' => array(



                            array(
                                'type' => 'toggle',
                                'name' => 'enable_sidefeed_ads',
                                'label' => 'Enable Sidefeed Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Sidefeed Ads Setting' ,
                                'name' => 'sidefeed_ads',
                                'dependency' => array(
                                    'field'    => 'enable_sidefeed_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'sidefeed_ads_type',
                                        'label' => 'Sidefeed ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'slider',
                                        'name' => 'sidefeed_ads_order',
                                        'label' => 'Sidefeed Order',
                                        'description' => 'on which news feed order you want to show ads per load, please don\'t give bigger number than sidefeed load per page',
                                        'min' => '1',
                                        'max' => '20',
                                        'step' => '1',
                                        'default' => '3',
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'sidefeed_ads_image',
                                        'label' =>  'Upload your sidefeed ads image',
                                        'description' => 'Upload 300x250 Image size',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'sidefeed_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'sidefeed_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'sidefeed_ads_image_new_tab',
                                        'label' => 'Sidefeed ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'sidefeed_ads_code',
                                        'label' =>  'Sidefeed Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'sidefeed_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'sidefeed_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'sidefeed_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'sidefeed_ads_google_tab',
                                        'label' => 'Tab Ads Size',
                                        'description' => 'Choose ad size to show on tablet, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'sidefeed_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'sidefeed_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),

                                )
                            ),




                            array(
                                'type' => 'toggle',
                                'name' => 'enable_top_menu_ads',
                                'label' => 'Enable Top Menu Ads ',
                                'description' => 'Two line menu',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Top Menu Ads (only for two line menu setting)' ,
                                'name' => 'top_menu_ads',
                                'dependency' => array(
                                    'field'    => 'enable_top_menu_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'top_menu_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'top_menu_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 728x90 Image size',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_menu_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_menu_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'top_menu_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'top_menu_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_menu_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_menu_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_menu_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_menu_ads_google_tab',
                                        'label' => 'Tab Ads Size',
                                        'description' => 'Choose ad size to show on tablet, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_menu_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_menu_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),





                            array(
                                'type' => 'toggle',
                                'name' => 'enable_top_wrapper_ads',
                                'label' => 'Enable Top Wrapper Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Top Wrapper Ads' ,
                                'name' => 'top_wrapper_ads',
                                'dependency' => array(
                                    'field'    => 'enable_top_wrapper_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'top_wrapper_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'top_wrapper_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 728x90 Image size',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_wrapper_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_wrapper_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'top_wrapper_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'top_wrapper_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),
                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_wrapper_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'top_wrapper_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_wrapper_ads_google_desktop',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_wrapper_ads_google_tab',
                                        'label' => 'Tab Ads Size',
                                        'description' => 'Choose ad size to show on tablet, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'top_wrapper_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'top_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),




                            array(
                                'type' => 'toggle',
                                'name' => 'enable_side_left_wrapper_ads',
                                'label' => 'Enable Side Left Wrapper Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Side Left Wrapper Ads' ,
                                'name' => 'side_left_wrapper_ads',
                                'dependency' => array(
                                    'field'    => 'enable_side_left_wrapper_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'side_left_wrapper_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'side_left_wrapper_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 160x600 Image size',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_left_wrapper_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_left_wrapper_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'side_left_wrapper_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'side_left_wrapper_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_left_wrapper_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_left_wrapper_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'side_left_wrapper_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'side_left_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),



                            array(
                                'type' => 'toggle',
                                'name' => 'enable_side_right_wrapper_ads',
                                'label' => 'Enable Side Right Wrapper Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Side Right Wrapper Ads' ,
                                'name' => 'side_right_wrapper_ads',
                                'dependency' => array(
                                    'field'    => 'enable_side_right_wrapper_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'side_right_wrapper_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'side_right_wrapper_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 160x600 Image size',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_right_wrapper_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_right_wrapper_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'side_right_wrapper_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'side_right_wrapper_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_right_wrapper_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'side_right_wrapper_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'side_right_wrapper_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'side_right_wrapper_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),




                            array(
                                'type' => 'toggle',
                                'name' => 'enable_inline_content_ads',
                                'label' => 'Enable Inline Content Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Inline Content Ads' ,
                                'name' => 'inline_content_ads',
                                'dependency' => array(
                                    'field'    => 'enable_inline_content_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'inline_content_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),

                                    array(
                                        'type' => 'radioimage',
                                        'name' => 'inline_content_ads_position',
                                        'label' => 'Ads Position',
                                        'description' => 'Choose where your ads will shown',
                                        'item_max_height' => '80',
                                        'item_max_width' => '80',
                                        'items' => array(
                                            array(
                                                'value' => 'promotion_center',
                                                'label' => 'Ads Center',
                                                'img' => get_template_directory_uri() . '/public/img/ad-center.png',
                                            ),
                                            array(
                                                'value' => 'promotion_right',
                                                'label' => 'Ads Right',
                                                'img' => get_template_directory_uri() . '/public/img/ad-right.png',
                                            ),

                                        ),
                                        'default' => array(
                                            'promotion_center',
                                        ),
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'inline_content_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'inline_content_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'inline_content_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'inline_content_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'inline_content_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'inline_content_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'inline_content_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),

                                    array(
                                        'type' => 'slider',
                                        'name' => 'inline_content_ads_paragraph',
                                        'label' => 'Before which paragraph you want to show the ads',
                                        'min' => '0',
                                        'max' => '20',
                                        'step' => '1',
                                        'default' => '3',
                                    ),

                                    array(
                                        'type' => 'toggle',
                                        'name' => 'inline_content_ads_int_system',
                                        'label' => 'Intelegent Ads System',
                                        'description' => 'by enabling this option, try to prevent ads blindness, all option bellow will be ignored.',
                                        'default' => '0',
                                    ),

                                    array(
                                        'type' => 'select',
                                        'name' => 'inline_content_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'inline_content_ads_google_tab',
                                        'label' => 'Tab Ads Size',
                                        'description' => 'Choose ad size to show on tablet, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'inline_content_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'inline_content_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),




                            array(
                                'type' => 'toggle',
                                'name' => 'enable_archive_bottom_ads',
                                'label' => 'Enable Archive & Search Bottom Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Archive & Search Wrapper Bottom Ads' ,
                                'name' => 'archive_bottom_ads',
                                'dependency' => array(
                                    'field'    => 'enable_archive_bottom_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'archive_bottom_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'archive_bottom_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 728x90 Image size',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'archive_bottom_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'archive_bottom_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'archive_bottom_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'archive_bottom_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),
                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'archive_bottom_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'archive_bottom_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'archive_bottom_ads_google_desktop',
                                        'label' => 'Desktop Ads Size',
                                        'description' => 'Choose ad size to show on desktop, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'archive_bottom_ads_google_tab',
                                        'label' => 'Tab Ads Size',
                                        'description' => 'Choose ad size to show on tablet, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'archive_bottom_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'archive_bottom_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),



                            array(
                                'type' => 'toggle',
                                'name' => 'enable_mobile_floating_ads',
                                'label' => 'Enable Floating Mobile Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Floating Mobile Ads' ,
                                'name' => 'mobile_floating_ads',
                                'dependency' => array(
                                    'field'    => 'enable_mobile_floating_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'radiobutton',
                                        'name' => 'mobile_floating_ads_type',
                                        'label' => 'Ads type',
                                        'description' => 'Choose which type of ads you want to use',
                                        'default' => 'imageads',
                                        'items' => array(
                                            array(
                                                'value' => 'imageads',
                                                'label' => 'Image Ads',
                                            ),
                                            array(
                                                'value' => 'googleads',
                                                'label' => 'Google Ads',
                                            ),
                                            array(
                                                'value' => 'code',
                                                'label' => 'Script Code',
                                            ),
                                        ),
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'mobile_floating_ads_image',
                                        'label' =>  'Upload your ads image',
                                        'description' => 'Upload 320x50 Image size',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'mobile_floating_ads_image_link',
                                        'label' =>  'Ads Image link',
                                        'description' => 'please put where this ads image will heading',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),

                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'mobile_floating_ads_image_text',
                                        'label' =>  'Image Alternate Text',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'mobile_floating_ads_image_new_tab',
                                        'label' => 'Ads image open new tab',
                                        'default' => '0',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_image_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textarea',
                                        'name' => 'mobile_floating_ads_code',
                                        'label' =>  'Ads code' ,
                                        'description' => 'put your script right here',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_code_ads',
                                        ),
                                    ),

                                    // google ads
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'mobile_floating_ads_google_publisher',
                                        'label' =>  'Publisher ID',
                                        'description' => 'data-ad-client / google_ad_client content',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'mobile_floating_ads_google_id',
                                        'label' =>  'Ads Slot ID',
                                        'description' => 'data-ad-slot / google_ad_slot content',
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                    array(
                                        'type' => 'select',
                                        'name' => 'mobile_floating_ads_google_phone',
                                        'label' => 'Phone Ads Size',
                                        'description' => 'Choose ad size to show on phone, recommended to use auto instead',
                                        'items' => jeg_get_ads_size(),
                                        'default' => array('auto'),
                                        'dependency' => array(
                                            'field'    => 'mobile_floating_ads_type',
                                            'function' => 'jeg_is_google_ads',
                                        ),
                                    ),
                                )
                            ),




                            array(
                                'type' => 'toggle',
                                'name' => 'enable_background_ads',
                                'label' => 'Enable Background Ads',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'section',
                                'title' =>  'Background Ads' ,
                                'name' => 'background_ads',
                                'dependency' => array(
                                    'field'    => 'enable_background_ads',
                                    'function' => 'vp_dep_boolean',
                                ),
                                'fields' => array(
                                    array(
                                        'type' => 'notebox',
                                        'name' => 'bgads_info',
                                        'label' =>  'Background Ads Info' ,
                                        'description' =>  'This setting will overwrite background themes setting on themes. Enable this setting will also affected side wrapper ads.' ,
                                        'status' => 'info',
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'background_ads_image_960',
                                        'label' =>  'Background Ads Image for 960px',
                                        'description' => 'Background ads for wrapper 960 pixel'
                                    ),
                                    array(
                                        'type' => 'upload',
                                        'name' => 'background_ads_image_830',
                                        'label' =>  'Background Ads Image for 830px',
                                        'description' => 'Background ads for wrapper 830 pixel'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'background_ads_url',
                                        'label' =>  'Background Ads URL',
                                    ),
                                    array(
                                        'type' => 'toggle',
                                        'name' => 'background_ads_new_tab',
                                        'label' => 'Background Ads open new tab',
                                        'default' => '0',
                                    ),
                                )
                            ),

                        )
                    ),


                    array(
                        'title' =>  'Website Footer' ,
                        'name' => 'footer_section',
                        'icon' => 'font-awesome:fa-th',
                        'controls' => array(

                            array(
                                'type' => 'textbox',
                                'name' => 'footer_copyright',
                                'label' =>  'Footer Copyright',
                                'default' => '&copy; 2014 JMAGZ - The Real Magazine WordPress Theme. All right reserved.'
                            ),

                            array(
                                'type' => 'radioimage',
                                'name' => 'footer_layout',
                                'label' => 'Footer Layout',
                                'description' => 'Choose your footer layout',
                                'item_max_height' => '80',
                                'item_max_width' => '80',
                                'items' => array(
                                    array(
                                        'value' => 'footer_layout_1',
                                        'label' => 'Three Column Footer ( 4 + 4 + 4 )',
                                        'img' => get_template_directory_uri() . '/public/img/footer-1.png',
                                    ),
                                    array(
                                        'value' => 'footer_layout_2',
                                        'label' => 'Two Column ( 8 + 4 )',
                                        'img' => get_template_directory_uri() . '/public/img/footer-2.png',
                                    ),
                                    array(
                                        'value' => 'footer_layout_3',
                                        'label' => 'Two Column ( 4 + 8 )',
                                        'img' => get_template_directory_uri() . '/public/img/footer-3.png',
                                    ),
                                    array(
                                        'value' => 'footer_layout_4',
                                        'label' => 'One Column',
                                        'img' => get_template_directory_uri() . '/public/img/footer-4.png',
                                    ),
                                    array(
                                        'value' => 'footer_layout_5',
                                        'label' => 'Three Column ( 5 + 2 ( with 1 offset ) + 4 )',
                                        'img' => get_template_directory_uri() . '/public/img/footer-5.png',
                                    ),
                                ),
                                'default' => array(
                                    'footer_layout_1',
                                ),
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Social Icon' ,
                        'name' => 'social_icon',
                        'icon' => 'font-awesome:fa-share',
                        'controls' => array(

                            array(
                                'type' => 'section',
                                'title' =>  'Insert URL of your social profile' ,
                                'name' => 'right_mouse_click_behaviour',
                                'description' =>  'Social profile will only shown if you are adding url inside this page' ,
                                'fields' => array(
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_facebook',
                                        'label' =>  'Facebook'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_twitter',
                                        'label' =>  'Twitter'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_linkedin',
                                        'label' =>  'Linkedin'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_googleplus',
                                        'label' =>  'Google Plus'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_pinterest',
                                        'label' =>  'Pinterest'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_github',
                                        'label' =>  'Github'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_flickr',
                                        'label' =>  'Flickr'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_tumblr',
                                        'label' =>  'Tumblr'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_dribbble',
                                        'label' =>  'Dribbble'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_soundcloud',
                                        'label' =>  'Soundcloud'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_lastfm',
                                        'label' =>  'Fastfm'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_behance',
                                        'label' =>  'Behance'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_instagram',
                                        'label' =>  'Instagram'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_vimeo',
                                        'label' =>  'Vimeo'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_youtube',
                                        'label' =>  'Youtube'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_500px',
                                        'label' =>  '500px'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_vk',
                                        'label' =>  'VK'
                                    ),
                                    array(
                                        'type' => 'textbox',
                                        'name' => 'social_rss',
                                        'label' =>  'RSS'
                                    ),
                                )
                            ),
                        )
                    ),


                    array(
                        'title' =>  'Additional Code' ,
                        'name' => 'additionalcode',
                        'icon' => 'font-awesome:fa-code',
                        'controls' => array(
                            array(
                                'type' => 'notebox',
                                'name' => 'additionalinfo',
                                'label' =>  'Custom CSS Info' ,
                                'description' =>  'put your additional css right here. so if you updating themes, you wont lose any of your additonal css' ,
                                'status' => 'info',
                            ),
                            array(
                                'type' => 'codeeditor',
                                'name' => 'styleeditor',
                                'label' =>  'Custom CSS' ,
                                'description' =>  'Put your custom css right here.' ,
                                'theme' => 'github',
                                'mode' => 'css',
                            ),
                            array(
                                'type' => 'notebox',
                                'name' => 'additionalinfo',
                                'label' =>  'Custom Javascript Info' ,
                                'description' =>  'put your additional javascript right here. You can use it for your tracking (like google analytic or else)' ,
                                'status' => 'info',
                            ),
                            array(
                                'type' => 'codeeditor',
                                'name' => 'jseditor',
                                'label' =>  'Additional Javascript' ,
                                'description' =>  'Put your additional javascript right here. You don\'t need to include script tag' ,
                                'theme' => 'github',
                                'mode' => 'javascript',
                            ),
                        )
                    ),


                    array(
                        'title' =>  'Additional Font' ,
                        'name' => 'fontadditioanl',
                        'icon' => 'font-awesome:fa-font',
                        'controls' => array(
                            array(
                                'type' => 'notebox',
                                'name' => 'additionalfontinfo',
                                'label' =>  'Info',
                                'description' =>
                                    "<ol>
                                    <li>If you upload font on this additional font block, google font on customizer will be disabled and overwrited by this item setup</li>
                                    <li>Please fill all font. if you having only one kind of font, you can geenerate all of font combination on : <a href='http://www.fontsquirrel.com/tools/webfont-generator' target='_blank'>font squirrel generator</a></li>
                                </ol>",
                                'status' => 'info',
                            ),

                            array(
                                'type' => 'section',
                                'title' =>  'First Additional Font Block' ,
                                'name' => 'additional_font_1',
                                'fields' => array(

                                    array(
                                        'type' => 'textbox',
                                        'name' => 'additional_font_1_fontname',
                                        'label' =>  'Font Name' ,
                                        'description' =>  'please fill your font name...' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_1_eot',
                                        'label' =>  'EOT File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_1_woff',
                                        'label' =>  'WOFF File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_1_ttf',
                                        'label' =>  'TTF File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_1_svg',
                                        'label' =>  'SVG File' ,
                                    ),
                                )
                            ),

                            array(
                                'type' => 'section',
                                'title' =>  'Second Additional Font Block' ,
                                'name' => 'additional_font_2',
                                'fields' => array(

                                    array(
                                        'type' => 'textbox',
                                        'name' => 'additional_font_2_fontname',
                                        'label' =>  'Font Name' ,
                                        'description' =>  'please fill your font name...' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_2_eot',
                                        'label' =>  'EOT File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_2_woff',
                                        'label' =>  'WOFF File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'additional_font_2_ttf',
                                        'label' =>  'TTF File' ,
                                    ),

                                    array(
                                        'type' => 'upload',
                                        'name' => 'svg',
                                        'label' =>  'SVG File' ,
                                    ),
                                )
                            ),

                        )
                    ),



                    array(
                        'title' =>  'Google' ,
                        'name' => 'google',
                        'icon' => 'font-awesome:fa-google',
                        'controls' => array(
                            array(
                                'type' => 'textbox',
                                'name' => 'google_analytic_code',
                                'label' =>  'Google analytic',
                                'description' => 'example : UA-12345-1'
                            ),
                        )
                    ),

                    array(
                        'title' =>  'Facebook' ,
                        'name' => 'facebook',
                        'icon' => 'font-awesome:fa-facebook',
                        'controls' => array(
                            array(
                                'type' => 'toggle',
                                'name' => 'enable_og_content',
                                'label' => 'Enable build-in Open Graph meta',
                                'description' => 'Open Graph used with facebook for more engaging experience',
                                'default' => '0',
                            ),
                            array(
                                'type' => 'notebox',
                                'name' => 'support_request',
                                'label' =>  'Facebook Author' ,
                                'description' =>  'If you enable Open Graph, please add FB link URL on profile page' ,
                                'status' => 'info',
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'og_app_id',
                                'label' =>  'Facebook App ID',
                                'description' => 'The unique ID that lets Facebook know the identity of your site. This is crucial for Facebook Insights to work properly.'
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'og_publisher',
                                'label' =>  'Article Publisher',
                                'description' => 'The target of this property must be a Facebook Page. When displayed in the News Feed, Facebook may offer the ability to like the publisher. Note that this tag is only available to media publishers.'
                            ),
                        )
                    ),


                    array(
                        'title' =>  'Comment Setting' ,
                        'name' => 'comment',
                        'icon' => 'font-awesome:fa-comment-o ',
                        'controls' => array(
                            array(
                                'type' => 'radiobutton',
                                'name' => 'comment_type',
                                'label' => 'Comment Type',
                                'description' => 'Choose which comment platform to use',
                                'default' => 'wordpress',
                                'items' => array(
                                    array(
                                        'value' => 'wordpress',
                                        'label' => 'WordPress build in Comment',
                                    ),
                                    array(
                                        'value' => 'facebook',
                                        'label' => 'Facebook Comment',
                                    ),
                                    array(
                                        'value' => 'disqus',
                                        'label' => 'Disqus Comment',
                                    ),
                                ),
                            ),
                            array(
                                'type' => 'textbox',
                                'name' => 'disqus_shortname',
                                'label' =>  'Your Website Shortname',
                                'description' => 'Please register your website first and get shortname for your website. We need this value to make it work properly with Disqus.',
                                'dependency' => array(
                                    'field'    => 'comment_type',
                                    'function' => 'jeg_is_disqus',
                                ),
                            ),
                        )
                    ),
                )
            ),





            array(
                'title' =>  'Woocomerce Setting' ,
                'name' => 'woosetting',
                'icon' => 'font-awesome:fa-shopping-cart',
                'menus' => array(
                    array(
                        'title' =>  'Shop Page' ,
                        'name' => 'shoppage',
                        'icon' => 'font-awesome:fa-star',
                        'controls' => array(

                            array(
                                'type' => 'slider',
                                'name' => 'product_number',
                                'label' =>  'Product Number Per Page' ,
                                'description' =>  'set your product number per page on your your shop page' ,
                                'min' => '1',
                                'max' => '40',
                                'step' => '1',
                                'default' => '12',
                            ),
                        )
                    ),
                )
            ),





            array(
                'title' =>  'Support' ,
                'name' => 'support',
                'icon' => 'font-awesome:fa-medkit',
                'menus' => array(
                    array(
                        'title' =>  'Tips & Support' ,
                        'name' => 'support',
                        'icon' => 'font-awesome:fa-h-square',
                        'controls' => array(

                            array(
                                'type' => 'notebox',
                                'name' => 'support_request',
                                'label' =>  'How to requesting support' ,
                                'description' =>  'if you have question related with this themes, please send your question to <a href="http://support.jegtheme.com/" target="_blank">our forum support</a>' ,
                                'status' => 'info',
                            ),
                        )
                    )
                )
            )
        )
    );
}

