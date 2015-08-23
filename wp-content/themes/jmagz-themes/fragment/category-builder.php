<?php

$page = jeg_get_query_paged();
$term = get_queried_object();
$category_creator = get_option('category_creator');
$creatorid = $category_creator[$term->term_id];
$postid = '';

// page builder
$query = new WP_Query(array(
    'post_type' => 'cat_builder',
    'p' => $creatorid,
));

if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        $postid = get_the_ID();
        if($page === 1) {
            the_content();
        }
    }
}
wp_reset_postdata();

// layout feed
get_template_part('fragment/category',vp_metabox('jeg_category_builder.feed_layout', 'feed-1', $postid));


