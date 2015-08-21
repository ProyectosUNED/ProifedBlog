<?php
    $term = get_queried_object();
    $paged = jeg_get_query_paged();
    $index = 1;

    if(have_posts()) :
        while(have_posts()) : the_post();
            if($index === 1 && $paged == 1) {
                echo
                '<section class="cat-latest-post featured-review section">
                    <h3 class="archive-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
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

                if($paged != 1 && $index == 1) {
                    echo '<div class="col-md-12 section-heading-wrapper">
                            <h3 class="section-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
                        </div>';
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
        get_template_part('fragment/archive-ads');
        global $wp_query;
        echo jeg_build_pagination($paged, $wp_query->max_num_pages);
    endif;