<?php
get_header('review');
?>

    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container home-content">
        <?php
            get_template_part('fragment/review-search-header');

            $term = get_queried_object();
            $paged =  jeg_get_query_paged();
            $index = 1;

            if(have_posts()) :
                while(have_posts()) : the_post();

                    $firsttitle = '';
                    $secondtitle = '';

                    $term = get_queried_object();

                    if($term->taxonomy === 'review-brand') {
                        $firsttitle = __('Latest Review of ','jeg_textdomain');
                        $secondtitle = $term->name . __(' Product','jeg_textdomain');
                    } else if ($term->taxonomy === 'review-category') {
                        $firsttitle = __('Latest  ','jeg_textdomain');
                        $secondtitle = $term->name . __(' Review','jeg_textdomain');
                    }

                    if($index === 1 && $paged == 1) {
                        echo
                        '<section class="cat-latest-post featured-review section">
                            <h3 class="archive-heading">' . $firsttitle . ' <strong>' . $secondtitle . '</strong></h3>
                            <div class="row clearfix">
                                ' . jeg_review_article_featured_block() . '
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
                                <h3 class="archive-heading">' . $firsttitle . ' <strong>' . $secondtitle . '</strong></h3>
                            </div>';
                        }
                        echo jeg_review_article_normal_block();
                    }
                    $index++;
                endwhile;
            else :
                echo "<div class='no-result col-md-12 section-heading-wrapper'><span>" . __('No Result', 'jeg_textdomain') . "</span></div>";
            endif;
            if($index != 2) {
                echo '</div></section>';
            }
            if($index === 2 && $paged === 2) {
                echo '</div></section>';
            }
            get_template_part('fragment/archive-ads');
            global $wp_query;
            echo jeg_build_pagination($paged, $wp_query->max_num_pages);
        ?>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>
<?php get_footer(); ?>