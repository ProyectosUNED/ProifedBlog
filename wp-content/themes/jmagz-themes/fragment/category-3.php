<?php
    $term = get_queried_object();
    $page = jeg_get_query_paged();
    $index = 1;

    function jeg_cat_3_excerpt_latest_length(  )
    {
        return 22;
    }
    add_filter( 'excerpt_length', 'jeg_cat_3_excerpt_latest_length', 999 );

    function jeg_cat_3_excerpt_latest_more()
    {
        return "...";
    }
    add_filter('excerpt_more', 'jeg_cat_3_excerpt_latest_more');

    $indexhtml1 = array();
    $indexhtml2 = array();
    $indexhtml3 = array();
    $indexhtmlcontent = '';

    if(have_posts()) :
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
                $indexhtml1[] =
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
            } else if(($index - 1) % 3 === 1) {
                $indexhtml2[] =
                    '<article class="latest-post-feed">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            <div class="post-meta">
                                <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                ' . $timeformat .  '
                            </div>
                        </header>
                    </article>';
            } else if(($index - 1) % 3 === 2) {
                $indexhtml3[] =
                    '<article class="latest-post-feed">
                        ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
                        <header class="content">
                            <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                            <div class="post-meta">
                                <span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>
                                ' . $timeformat .  '
                            </div>
                        </header>
                    </article>';
            }

        $index++;
        endwhile;

        for($i = 0; $i < sizeof($indexhtml1); $i++) {
            $indexhtml1[$i] = isset($indexhtml1[$i]) ? $indexhtml1[$i] : '';
            $indexhtml2[$i] = isset($indexhtml2[$i]) ? $indexhtml2[$i] : '';
            $indexhtml3[$i] = isset($indexhtml3[$i]) ? $indexhtml3[$i] : '';

            $indexhtmlcontent .=
                '<div class="row clearfix">
                    <div class="col-md-7 column">
                        ' . $indexhtml1[$i] . '
                    </div>
                    <div class="col-md-5 column">
                        ' . $indexhtml2[$i] . '
                        ' . $indexhtml3[$i] . '
                    </div>
                </div>';
        }

        echo
            '<section class="cat-latest-post style2 section">
                <div class="row clearfix">
                    <div class="col-md-12 column section-heading-wrapper">
                        <h3 class="archive-heading">' . __('Latest on','jeg_textdomain') . ' <strong>' . $term->name . '</strong></h3>
                    </div>
                </div>
                ' . $indexhtmlcontent . '
            </section>';

        get_template_part('fragment/archive-ads');
        global $wp_query;
        echo jeg_build_pagination($page, $wp_query->max_num_pages);
    endif;