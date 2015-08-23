<?php

/********** save review *****************/

function jeg_save_post_review() {
    global $post;
    if(isset($post->post_type) && $post->post_type == 'review'){

        // rating
        $ratingarray = $_REQUEST['jmagz_review_rating']['rating'];
        $total = 0;
        foreach($ratingarray as $rating){
            if($rating['rating_number'] != 0) {
                $total += $rating['rating_number'];
            }
        }

        $mean = $total / sizeof($ratingarray);
        $mean = round($mean, 1);
        update_post_meta($post->ID, 'rating_mean', $mean);

        // price lowest
        $pricearray = $_REQUEST['jmagz_review_price']['price'];
        $lowest = 9999999999;
        $changed = false;
        foreach($pricearray as $price){
            if($price['price'] != 0) {
                if($price['price'] < $lowest) {
                    $lowest = $price['price'];
                    $changed = true;
                }
            }
        }
        if($changed) {
            update_post_meta($post->ID, 'price_lowest', $lowest);
        } else {
            update_post_meta($post->ID, 'price_lowest', 0);
        }
    }
    return true;
}

add_action('save_post','jeg_save_post_review', 99);


/********** review metabox *****************/

function jeg_review_metabox_setup ()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/review-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/review-good-bad-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/review-rating-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/review-price-metabox.php');
}

add_action('after_setup_theme', 'jeg_review_metabox_setup');

function load_additional_script_for_review() {
    $screen = get_current_screen();
    if($screen->post_type === 'review' && is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_style('jeg-pagebuilder-metabox', get_template_directory_uri() . '/public/css/backend/metabox.css', null, null);
    }
}

add_action('current_screen', 'load_additional_script_for_review');




/********** page metabox *****************/

function jeg_pagemetabox_setup ()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/dummy-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page-review-metabox.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/page-index-metabox.php');
}

add_action('after_setup_theme', 'jeg_pagemetabox_setup');

function load_additional_script_for_page() {
    $screen = get_current_screen();
    if($screen->post_type === 'page' && is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jeg-page-metabox', get_template_directory_uri() . '/public/js/backend/pagemetabox.js', null, null);
        wp_enqueue_style('jeg-pagebuilder-metabox', get_template_directory_uri() . '/public/css/backend/metabox.css', null, null);
    }
}

add_action('current_screen', 'load_additional_script_for_page');


/********** blog metabox *****************/

function jeg_blogmetabox_setup ()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/gallery.php');
    new VP_Metabox(get_template_directory() . '/admin/metabox/video.php');
}

add_action('after_setup_theme', 'jeg_blogmetabox_setup');


function load_additional_script_for_blog() {
    $screen = get_current_screen();
    if( ( $screen->post_type === 'post' || $screen->post_type === 'review' ) && is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jeg-blog-metabox', get_template_directory_uri() . '/public/js/backend/blogmetabox.js', null, null);
        wp_enqueue_style('jeg-blog-metabox', get_template_directory_uri() . '/public/css/backend/metabox.css', null, null);
    }
}

add_action('current_screen', 'load_additional_script_for_blog');


/********** category builder metabox ************/


function jeg_builder_metabox_setup ()
{
    new VP_Metabox(get_template_directory() . '/admin/metabox/catbuilder.php');
}

add_action('after_setup_theme', 'jeg_builder_metabox_setup');

function load_additional_script_for_cat_builder() {
    $screen = get_current_screen();
    if($screen->post_type === 'cat_builder' && is_admin()) {
        wp_enqueue_script('jquery');
        wp_enqueue_style('jeg-pagebuilder-metabox', get_template_directory_uri() . '/public/css/backend/metabox.css', null, null);
    }
}

add_action('current_screen', 'load_additional_script_for_cat_builder');



/************ global css script ****************/

function load_additional_style() {
    if(is_admin()) {
        wp_enqueue_style ('jeg-global-css', get_template_directory_uri() . '/public/css/backend/global.css', null, null);
    }
}

add_action('current_screen', 'load_additional_style');