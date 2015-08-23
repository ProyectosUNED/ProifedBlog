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

    $indexhtml = array();
    $indexcontent = '';

    while(have_posts()) : the_post();
        $categoryarray = get_the_category();
        $categorytext = '';

        if(!empty($categoryarray)) {
            $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";
        }

        $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
        $authorurl = get_author_posts_url(get_the_author_meta('ID'));
        $authorname = apply_filters('jeg_get_author_name', null);

        if($page === 1) {
            if($index <= 3) {
                if($index == 1) {
                    $indexhtml[$index] =
                    '<article class="latest-post-big">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'two-third-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            <div class="post-meta">
                                <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                ' . $timeformat .  '
                            </div>
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
                            <div class="post-meta">
                                <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                ' . $timeformat .  '
                            </div>
                        </header>
                    </article><!-- /.latest-post-feed -->';
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
                                <div class="post-meta">
                                    <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                    ' . $timeformat .  '
                                </div>
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
                            <div class="post-meta">
                                <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                ' . $timeformat .  '
                            </div>
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
                <h3 class="archive-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
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
                    <h3 class="section-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
                </div>
            </div>
            ' . $indexcontent . '
        </section>';
    }
    get_template_part('fragment/archive-ads');
    global $wp_query;
    echo jeg_build_pagination($page, $wp_query->max_num_pages);
endif;