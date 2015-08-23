<?php

function jeg_review_content_excerpt_latest_length(  )
{
    return 22;
}
add_filter( 'excerpt_length', 'jeg_review_content_excerpt_latest_length', 999 );

function jeg_review_content_excerpt_latest_more()
{
    return "...";
}
add_filter('excerpt_more', 'jeg_review_content_excerpt_latest_more');

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

    $indexhtml = array();
    $indexcontent = '';

    while($query->have_posts()) : $query->the_post();

        $mean = get_post_meta(get_the_ID(),'rating_mean');
        $starrating = apply_filters('jeg_build_rating', null, $mean);;

        if($page === 1) {
            if($index <= 3) {
                if($index == 1) {
                    $indexhtml[$index] =
                        '<article class="latest-post-big">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'two-third-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            ' . $starrating . '
                        </header>
                        <div class="post-excerpt">
                            <p>'.  get_the_excerpt() .'</p>
                            <a href="'. get_permalink(get_the_ID()) .'" class="read-more">Continue reading &rarr;</a>
                        </div>
                    </article>';
                } else {
                    $indexhtml[$index] =
                        '<article class="latest-post-feed">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            ' . $starrating . '
                        </header>
                    </article>';
                }
            } else if ($index > 3) {
                if(($index - 1) % 3 === 0) {
                    $indexcontent .= '<div class="row clearfix">';
                }
                $indexcontent .=
                    '<div class="col-md-4 column">
                        <article class="post-list">
                            ' . apply_filters('jeg_featured_figure_lazy', null, 'one-third-post-featured') . '
                            <header class="content">
                                <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                                ' . $starrating . '
                            </header>
                        </article><!-- /.latest-post-big -->
                    </div>';
                if($index % 3 === 0) {
                    $indexcontent .= '</div>';
                }
            }
        } else {
            if(($index - 1) % 3 === 0) {
                $indexcontent .= '<div class="row clearfix">';
            }
            $indexcontent .=
                '<div class="col-md-4 column">
                    <article class="post-list">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'one-third-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            ' . $starrating . '
                        </header>
                    </article><!-- /.latest-post-big -->
                </div>';
            if($index % 3 === 0) {
                $indexcontent .= '</div>';
            }
        }

        $index++;
    endwhile;

    if(($index - 1) % 3 !== 0) {
        $indexcontent .= '</div>';
    }

    if($page === 1) {

        $indexhtml[1] = isset($indexhtml[1]) ? $indexhtml[1] : '';
        $indexhtml[2] = isset($indexhtml[2]) ? $indexhtml[2] : '';
        $indexhtml[3] = isset($indexhtml[3]) ? $indexhtml[3] : '';

        echo
            '<section class="cat-latest-post section">
            <div class="section-heading-wrapper">
                <h3 class="archive-heading">' . __('Featured ','jeg_textdomain') . ' <strong>' . __('Review','jeg_textdomain') . '</strong></h3>
            </div>

            <div class="row clearfix">
                <div class="col-md-7 column">
                    ' . $indexhtml[1] . '
                </div>
                <div class="col-md-5 column">
                    ' . $indexhtml[2] . '
                    ' . $indexhtml[3] . '
                </div>
            </div>
        </section>';

        if($index > 4) {
            echo
                '<section class="post-three-columns post-columns section">
                ' . $indexcontent . '
            </section>';
        }
    } else {
        echo
            '<section class="post-three-columns post-columns section">
            <div class="row clearfix">
                <div class="col-md-12 column section-heading-wrapper">
                    <h3 class="section-heading">' . __('Featured ','jeg_textdomain') . ' <strong>' . __('Review','jeg_textdomain') . '</strong></h3>
                </div>
            </div>
            ' . $indexcontent . '
        </section>';
    }

    get_template_part('fragment/archive-ads');
    echo jeg_build_pagination($page, $query->max_num_pages);
endif;