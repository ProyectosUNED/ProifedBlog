<?php

$term = get_queried_object();
$page = jeg_get_query_paged();

if(have_posts()) :
    echo
    '<section class="post-one-column section">
        <div class="row clearfix">
            <div class="col-md-12 section-heading-wrapper">
                <h3 class="section-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
            </div>';

    while(have_posts()) : the_post();
        echo jeg_post_article_normal_block();
    endwhile;
    echo
        '</div>
    </section>';

    get_template_part('fragment/archive-ads');
    global $wp_query;
    echo jeg_build_pagination($page, $wp_query->max_num_pages);
endif;