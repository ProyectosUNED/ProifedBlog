<?php
$term = get_queried_object();
$paged = jeg_get_query_paged();
$index = 1;

if(have_posts()) :
    while(have_posts()) : the_post();
        if($index === 1 && $paged == 1) {
            echo
                '<section class="section">
                    <div class="row clearfix">
                        ' . jeg_post_article_featured_block() . '
                    </div>
                </section>';
        } else {

            if( ( $index == 2 && $paged == 1 ) || ( $index == 1 && $paged != 1 )) {
                echo
                '<section class="post-one-column section">
                        <div class="row clearfix">';
            }
            echo jeg_post_article_normal_block();
        }
        $index++;
    endwhile;
    if($index != 2) {
        echo '</div></section>';
    }
    if($index === 2 && $paged === 2) {
        echo '</div></section>';
    }
    global $wp_query;
    get_template_part('fragment/archive-ads');
    echo jeg_build_pagination($paged, $wp_query->max_num_pages);
endif;