<?php

/** get video single **/
function jeg_get_video_single()
{
    $postid = $_REQUEST['postid'];
    $singlevideo = '';

    $videotype = vp_metabox('jmagz_blog_video.video_type', null, $postid);

    if($videotype === 'youtube') { ?>
        <div data-src="<?php echo vp_metabox('jmagz_blog_video.video_url', null, $postid) ?>" data-type="youtube" data-repeat="false" data-autoplay="false" class="youtube-class clearfix">
            <div class="video-container"></div>
        </div>

    <?php } else if($videotype === 'vimeo') { ?>
        <div data-src="<?php echo vp_metabox('jmagz_blog_video.video_url', null, $postid) ?>" data-type="vimeo" data-repeat="false" data-autoplay="false" class="vimeo-class clearfix">
            <div class="video-container"></div>
        </div>";

    <?php } else if($videotype === 'html5video') {

        $featuredimage = apply_filters('jeg_get_image_attachment', null, vp_metabox('jmagz_blog_video.video.0.bgfallback', null, $postid), 'full'); ?>

        <video width="640" height="360" style="width: 100%; height: 100%;" poster="<?php echo esc_attr( $featuredimage ); ?>" preload="none">
            <?php if(vp_metabox('jmagz_blog_video.video.0.videomp4', null, $postid) !== '') { ?>
                <source type="video/mp4" src="<?php echo esc_url( vp_metabox('jmagz_blog_video.video.0.videomp4', null, $postid) ); ?>">
            <?php }

            if(vp_metabox('jmagz_blog_video.video.0.videowebm', null, $postid) !== '') { ?>
                <source type="video/webm" src="<?php echo esc_url( vp_metabox('jmagz_blog_video.video.0.videowebm', null, $postid) ); ?>">
            <?php }

            if(vp_metabox('jmagz_blog_video.video.0.videoogg', null, $postid) !== '') { ?>
                <source type='video/ogg' src="<?php echo esc_attr( vp_metabox('jmagz_blog_video.video.0.videoogg', null, $postid) ); ?>">
            <?php } ?>
        </video>
        <?php
    }

    exit;
}

add_action('wp_ajax_get_video_single'				, 'jeg_get_video_single');
add_action('wp_ajax_nopriv_get_video_single'		, 'jeg_get_video_single');



/** get mega category **/
function jeg_get_mega_category_item()
{
    $categoryid = $_REQUEST['categoryid'];

    // get category id
    $statement = array(
        'post_type'             => "post",
        'orderby'               => "date",
        'order'                 => "DESC",
        'posts_per_page'        => vp_option('joption.mega_menu_number', 10),
        'category__in'          => $categoryid
    );

    $query = new WP_Query($statement);
    if ( $query->have_posts() ) { ?>

        <div data-content-category-id="<?php echo esc_attr( $categoryid ); ?>" data-load-status="loaded" class="newsfeed-container clearfix">

            <?php while ( $query->have_posts() )
            {
                $query->the_post();
                $formatclass = jeg_format_post(); ?>

                <div class="newsfeed-item <?php echo esc_attr( $formatclass ); ?>">
                    <?php echo apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') ?>
                    <h3 class="post-title"><a href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>"><?php the_title(); ?></a></h3>
                </div>
            <?php } ?>

        </div>
        <?php
    }
    wp_reset_postdata();

    exit;
}

add_action('wp_ajax_get_mega_category_item'				, 'jeg_get_mega_category_item');
add_action('wp_ajax_nopriv_get_mega_category_item'		, 'jeg_get_mega_category_item');



/** get mega review **/
function jeg_get_mega_review_item()
{
    $categoryid = $_REQUEST['categoryid'];

    // get category id
    $statement = array(
        'post_type'				=> "review",
        'orderby'				=> "date",
        'order'					=> "DESC",
        'posts_per_page'		=> vp_option('joption.mega_menu_number', 10),
        'tax_query'             => array(
            array(
                'taxonomy' => 'review-category',
                'terms' => $categoryid,
                'field' => 'id',
            )
        )
    );

    $query = new WP_Query($statement);
    if ( $query->have_posts() ) { ?>

        <div data-content-category-id="<?php echo esc_attr( $categoryid ); ?>" data-load-status="loaded" class="newsfeed-container clearfix">

        <?php while ( $query->have_posts() )
        {
            $query->the_post();
            $formatclass = jeg_format_post();

            $mean = get_post_meta(get_the_ID(),'rating_mean'); ?>

            <div class='newsfeed-item newsfeed-review {$formatclass}'>
                <?php echo apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured'); ?>
                <h3 class="post-title"><a href="<?php echo esc_url( get_permalink(get_the_ID()) ); ?>"><?php the_title(); ?></a></h3>
                <?php echo apply_filters('jeg_build_rating', null, $mean); ?>
            </div>

            <?php
        } ?>

        </div>

        <?php
    }
    wp_reset_postdata();

    exit;
}

add_action('wp_ajax_get_mega_review_item'				, 'jeg_get_mega_review_item');
add_action('wp_ajax_nopriv_get_mega_review_item'		, 'jeg_get_mega_review_item');



/** get sidebar feed **/
function jeg_feed_do_query($query, $active = '') {
    $recentfeed = '';
    $index = 0;
    $enablesidefeedads = vp_option('joption.enable_sidefeed_ads', 0);
    $sidefeedorder = vp_option('joption.sidefeed_ads_order', 3);

    if ( $query->have_posts() ) {
        while ( $query->have_posts() )
        {

            if($enablesidefeedads && $index == $sidefeedorder) {
                $recentfeed .= "<div class='sidebar-post-item sidebar-promotion clearfix'>" . jeg_render_ads('sidefeed_ads') . "</div>" ;
            }

            $query->the_post();
            $categoryarray = get_the_category();
            $categorytext = $timeformat = '';

            if(!empty($categoryarray)) {
                $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";
            }

            if(vp_option('joption.sidebar_date') === 'dateago') {
                $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') . "</time>";
            } else {
                $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
            }

            $formatclass = jeg_format_post();
            $recentfeed .=
                "<div class='" . $active . " sidebar-post-item clearfix " . $formatclass . "' data-id='" . get_the_ID() . "'>
                    " . apply_filters('jeg_featured_figure_lazy', null, 'square-thumbnail', null, 'ajax') . "
                    <div class='content'>
                        <h3 class='post-title'><a class='ajax' href='" . get_permalink(get_the_ID()) . "'>" . get_the_title() . "</a></h3>
                        <footer class='post-meta'>
                            " . $categorytext . $timeformat . "
                        </footer>
                    </div>
                </div>";
            $index++;
        }
    }
    return $recentfeed;
}

function jeg_get_sidebar_feed()
{
    $page = 1;
    $perload = vp_option('joption.side_feed_number', 10);
    $recentfeed = '';
    $postid = $ajaxisblog = 0;

    if (defined('DOING_AJAX') && DOING_AJAX) {
        $page = $_REQUEST['page'];
        $postid = $_REQUEST['postid'];
        $ajaxisblog = $_REQUEST['isblog'];
    } else {
        $postid = get_the_ID();
    }

    // check if currently on post
    if( ( !is_page() && is_single() && $page === 1 ) || ( $ajaxisblog && $page === 1 )) {
        $query = new WP_Query( 'p=' . $postid );
        $recentfeed .= jeg_feed_do_query($query, 'active');
        wp_reset_postdata();
    }

    // and build other list
    $statement = array(
        'post_type'             => 'post',
        'post_status'			=> array('publish'),
        'orderby'				=> 'date',
        'order'					=> 'DESC',
        'posts_per_page'		=> $perload,
        'paged'                  => $page
    );

    if( ( !is_page() && is_single() ) || $ajaxisblog ) {
        $statement['post__not_in'] = array($postid);
    }

    $query = new WP_Query($statement);
    $recentfeed .= jeg_feed_do_query($query);
    wp_reset_postdata();


    if (defined('DOING_AJAX') && DOING_AJAX) {
        print($recentfeed);
        exit;
    } else {
        return $recentfeed;
    }
}

add_action('wp_ajax_get_sidebar_feed'				, 'jeg_get_sidebar_feed');
add_action('wp_ajax_nopriv_get_sidebar_feed'		, 'jeg_get_sidebar_feed');



/** review feed */

function jeg_review_feed_do_query($query, $active = '') {
    $recentfeed = '';
    if ( $query->have_posts() ) {
        while ( $query->have_posts() )
        {
            $query->the_post();
            $categoryarray = get_the_terms(get_the_ID(), 'review-category');
            $categorytext = $timeformat = '';

            if(!empty($categoryarray)) {
                foreach($categoryarray as $cat) {
                    $categorytext = "<span class='post-category'><a href='" . get_term_link($cat->term_id, 'review-category') . "' rel='category'>" . $cat->name . "</a></span>";
                }
            }

            if(vp_option('joption.sidebar_date') === 'dateago') {
                $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') . "</time>";
            } else {
                $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
            }

            $mean = get_post_meta(get_the_ID(),'rating_mean');
            $starrating = apply_filters('jeg_build_rating', null, $mean);;

            $formatclass = jeg_format_post();
            $recentfeed .=
                "<div class='" . $active . " sidebar-post-item clearfix " . $formatclass . "' data-id='" . get_the_ID() . "'>
                    " . apply_filters('jeg_featured_figure_lazy', null, 'square-thumbnail', null, 'ajax') . "
                    <div class='content'>
                        <h3 class='post-title'><a class='ajax' href='" . get_permalink(get_the_ID()) . "'>" . get_the_title() . "</a></h3>
                        $starrating
                        <footer class='post-meta'>
                            " . $categorytext . $timeformat . "
                        </footer>
                    </div>
                </div>";
        }
    }
    return $recentfeed;
}

function jeg_get_sidebar_review()
{
    $page = 1;
    $perload = vp_option('joption.side_feed_number', 10);
    $recentfeed = '';
    $postid = $ajaxisreview = 0;

    if (defined('DOING_AJAX') && DOING_AJAX) {
        $page = $_REQUEST['page'];
        $postid = $_REQUEST['postid'];
        $ajaxisreview = $_REQUEST['isblog'];
    } else {
        $postid = get_the_ID();
    }

    // check if currently on post
    if( ( !is_page() && is_single() && $page === 1 ) || ( $ajaxisreview && $page === 1 )) {
        $query = new WP_Query( array(
            'p' => $postid,
            'post_type' => 'review',
        ));
        $recentfeed .= jeg_review_feed_do_query($query, 'active');
        wp_reset_postdata();
    }

    // and build other list
    $statement = array(
        'post_type'             => 'review',
        'post_status'			=> array('publish'),
        'orderby'				=> 'date',
        'order'					=> 'DESC',
        'posts_per_page'		=> $perload,
        'paged'                  => $page
    );

    if( ( !is_page() && is_single() ) || $ajaxisreview ) {
        $statement['post__not_in'] = array($postid);
    }

    $query = new WP_Query($statement);
    $recentfeed .= jeg_review_feed_do_query($query);
    wp_reset_postdata();


    if (defined('DOING_AJAX') && DOING_AJAX) {
        print($recentfeed);
        exit;
    } else {
        return $recentfeed;
    }
}

add_action('wp_ajax_get_sidebar_review'				, 'jeg_get_sidebar_review');
add_action('wp_ajax_nopriv_get_sidebar_review'		, 'jeg_get_sidebar_review');


/** ajax live search */

function jeg_search_feed_do_query($query) {
    $recentfeed = '';
    if ( $query->have_posts() ) {
        while ( $query->have_posts() )
        {
            $query->the_post();

            if(get_post_type() == 'post') {
                $categoryarray = get_the_category();
                $categorytext = $timeformat = '';

                if(!empty($categoryarray)) {
                    $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";
                }

                if(vp_option('joption.sidebar_date') === 'dateago') {
                    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') . "</time>";
                } else {
                    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
                }

                $formatclass = jeg_format_post();
                $recentfeed .=
                    "<div class='search-item clearfix " . $formatclass . "'>
                        " . apply_filters('jeg_featured_figure', null, 'square-thumbnail') . "
                        <div class='content'>
                            <h3 class='post-title'><a class='ajax' href='" . get_permalink(get_the_ID()) . "'>" . get_the_title() . "</a></h3>
                            <footer class='post-meta'>
                                " . $categorytext . $timeformat . "
                            </footer>
                        </div>
                    </div>";
            } else if(get_post_type() == 'review') {
                $categoryarray = get_the_terms(get_the_ID(), 'review-category');
                $categorytext = $timeformat = '';

                if(!empty($categoryarray)) {
                    foreach($categoryarray as $cat) {
                        $categorytext = "<span class='post-category'><a href='" . get_term_link($cat->term_id, 'review-category') . "' rel='category'>" . $cat->name . "</a></span>";
                    }
                }

                if(vp_option('joption.sidebar_date') === 'dateago') {
                    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') . "</time>";
                } else {
                    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";
                }

                $mean = get_post_meta(get_the_ID(),'rating_mean');
                $starrating = apply_filters('jeg_build_rating', null, $mean);

                $formatclass = jeg_format_post();
                $recentfeed .=
                    "<div class='search-item clearfix" . $formatclass . "' data-id='" . get_the_ID() . "'>
                        " . apply_filters('jeg_featured_figure', null, 'square-thumbnail') . "
                        <div class='content'>
                            <h3 class='post-title'><a class='ajax' href='" . get_permalink(get_the_ID()) . "'>" . get_the_title() . "</a></h3>
                            $starrating
                            <footer class='post-meta'>
                                " . $categorytext . $timeformat . "
                            </footer>
                        </div>
                    </div>";
            }

        }
    }
    return $recentfeed;
}

function jeg_ajax_live_search() {
    $recentfeed = '';

    $posttypeoption = vp_option('joption.search_type', 'onlypost');
    $postnumber = vp_option('joption.live_search_number');

    $statement = array(
        's'                     => $_REQUEST['s'],
        'post_type'             => array('post','review'),
        'post_status'			=> array('publish'),
        'orderby'				=> 'date',
        'order'					=> 'DESC',
        'posts_per_page'		=> $postnumber,
        'paged'                 => 1
    );

    if($posttypeoption === 'onlypost') {
        $statement['post_type'] = 'post';
    }

    $query = new WP_Query($statement);
    $recentfeed .= jeg_search_feed_do_query($query);
    wp_reset_postdata();
    print($recentfeed);
    exit;
}


add_action('wp_ajax_get_ajax_live_search'				, 'jeg_ajax_live_search');
add_action('wp_ajax_nopriv_get_ajax_live_search'		, 'jeg_ajax_live_search');


function jeg_extract_value($value) {
    $arr = array();
    if(!empty($value)) {
        foreach($value as $val) {
            $arr[] = $val['value'];
        }
    }

    return $arr;
}

function jeg_ajax_add_cart() {
    get_template_part('fragment/top-cart');
    exit;
}


add_action('wp_ajax_get_ajax_add_cart'				, 'jeg_ajax_add_cart');
add_action('wp_ajax_nopriv_get_ajax_add_cart'		, 'jeg_ajax_add_cart');