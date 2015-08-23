<?php

$term = get_queried_object();
$page = jeg_get_query_paged();
$index = 1;

function jeg_cat_2_excerpt_latest_length(  )
{
    return 22;
}
add_filter( 'excerpt_length', 'jeg_cat_2_excerpt_latest_length', 999 );

function jeg_cat_2_excerpt_latest_more()
{
    return "...";
}
add_filter('excerpt_more', 'jeg_cat_2_excerpt_latest_more');


if(have_posts()) :
    echo
    '<section class="post-three-columns post-columns section">
        <div class="row clearfix">
            <div class="col-md-12 section-heading-wrapper">
                <h3 class="section-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
            </div>
        </div>';

    while(have_posts()) : the_post();
        $categoryarray = get_the_category();
        $categorytext = '';

        if(!empty($categoryarray)) {
            $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";
        }

        $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
        $authorurl = get_author_posts_url(get_the_author_meta('ID'));
        $authorname = apply_filters('jeg_get_author_name', null);

        if(($index - 1) % 3 === 0) {
            echo '<div class="row clearfix">';
        }

        echo
            '<div class="col-md-4 column">
                <article class="post-list">
                    ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
                    <header class="content">
                        <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                        <div class="post-meta">
                            <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                            ' . $timeformat .  '
                        </div>
                    </header>
                </article>
            </div>';

        if($index % 3 === 0) {
            echo '</div>';
        }

        $index++;
    endwhile;
    if(($index - 1) % 3 !== 0) {
        echo '</div>';
    }

    echo '</section>';

    get_template_part('fragment/archive-ads');
    global $wp_query;
    echo jeg_build_pagination($page, $wp_query->max_num_pages);
endif;