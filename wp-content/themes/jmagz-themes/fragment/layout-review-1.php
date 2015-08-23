<?php
$page = jeg_get_query_paged();
$index = 1;

$statement = array(
    'post_type'             => 'review',
    'post_status'			=> array('publish'),
    'orderby'				=> 'date',
    'order'					=> 'DESC',
    'paged'                 => $page
);

$query = new WP_Query($statement);

if($query->have_posts()) :
    while($query->have_posts()) : $query->the_post();
        if($index === 1 && $page == 1) {
            echo
                '<section class="cat-latest-post featured-review section">
                    <h3 class="archive-heading">' . __('Featured ','jeg_textdomain') . ' <strong>' . __('Review', 'jeg_textdomain') . '</strong></h3>
                    <div class="row clearfix">
                        ' . jeg_review_article_featured_block() . '
                    </div>
                </section>';
        } else {

            if( ( $index == 2 && $page == 1 ) || ( $index == 1 && $page != 1 )) {
                echo
                '<section class="post-one-column section">
                    <div class="row clearfix">';
            }
            if($page != 1 && $index == 1) {
                echo '<div class="col-md-12 section-heading-wrapper">
                        <h3 class="section-heading">' . __('Latest ','jeg_textdomain') . ' <strong>' . __('Review','jeg_textdomain') . '</strong></h3>
                    </div>';
            }
            echo jeg_review_article_normal_block();

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
    echo jeg_build_pagination($page, $query->max_num_pages);
endif;