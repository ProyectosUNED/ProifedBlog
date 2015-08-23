<?php

/**
 * @author Jegtheme
 */

function jlog($var) {
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

function jeg_get_author_name_jmagz( $value, $author_id='' ) {
    $author_name = trim( get_the_author_meta( 'user_firstname', $author_id ) .' '. get_the_author_meta( 'user_lastname', $author_id ) );
    return empty( $author_name ) ? get_the_author( $author_id ) : $author_name;
}

add_filter('jeg_get_author_name', 'jeg_get_author_name_jmagz', null, 2);

function jeg_build_rating_jmagz($value, $rating) {
    $rating = $rating[0] / 2;
    $html = '<div class="post-rating-star">';

    for($i = 0; $i < 5 ; $i++) {
        if($rating >= 1) {
            $html .= '<span class="fa fa-star"></span>';
        } else if ($rating >= 0.5 && $rating < 1 ) {
            $html .= '<span class="fa fa-star-half-o"></span>';
        } else if($rating < 0.5) {
            $html .= '<span class="fa fa-star-o"></span>';
        }
        $rating = $rating - 1;
    }

    $html .= '</div>';

    return $html;
}

add_filter('jeg_build_rating', 'jeg_build_rating_jmagz', null, 2);

function jeg_featured_figure_jmagz($value, $size, $additional = '', $aclass = '') {
    $imgsrc = apply_filters('jeg_get_image_attachment', null, get_post_thumbnail_id(get_the_ID()), $size);
    $formatclass = apply_filters('jeg_format_post_class', null, get_the_ID());

    if($imgsrc) {
        $featured = "<img src='" . $imgsrc . "' alt='" . get_the_title() . "'>";
    } else {
        $featured = "<div class='no-thumbnail-wrapper {$formatclass}'><div class='no-thumbnail-inner'><i class='fa'></i></div></div>";
    }

    if($size === 'square-slider-thumbnail' || $size === 'square-thumbnail') {
        $thumbsize = '';
    } else {
        $thumbsize = 'half-thumb';
    }

    return '<figure class="thumb ' . $thumbsize . ' ' . $additional . '">
                <a href="'. get_permalink(get_the_ID()) .'" class="' . $aclass . '">
                    ' . $featured . '
                </a>
            </figure>';
}

add_filter('jeg_featured_figure', 'jeg_featured_figure_jmagz', null, 4);

function jeg_featured_figure_lazy_jmagz($value, $size, $additional = '', $aclass = '') {
    $imgsrc = apply_filters('jeg_get_image_attachment', null, get_post_thumbnail_id(get_the_ID()), $size);
    $formatclass = apply_filters('jeg_format_post_class', null, get_the_ID());

    $placeholder_dir = get_template_directory_uri() .'/public/placeholder/';

    $placeholder = '';
    $thumbsize = 'half-thumb';

    switch ($size) {
        case 'square-thumbnail':
            $thumbsize = '';
            $placeholder = '75x75.png';
            break;

        case 'square-slider-thumbnail':
            $thumbsize = '';
            $placeholder = '300x300.png';
            break;

        case 'mini-post-featured':
            $placeholder = '150x75.png';
            break;

        case 'one-third-post-featured':
            $placeholder = '300x150.png';
            break;

        case 'half-post-featured':
            $placeholder = '450x225.png';
            break;

        case 'two-third-post-featured':
            $placeholder = '600x300.png';
            break;

        case 'post-featured':
            $placeholder = '900x450.png';
            break;

        default:
            $placeholder = '300x300.png';
            break;
    }

    if($imgsrc) {
        $featured = "<img class='lazyOwl unveil' src='".  $placeholder_dir . $placeholder ."' data-src='" . $imgsrc . "' alt='" . get_the_title() . "'>";
    } else {
        $featured = "<div class='no-thumbnail-wrapper {$formatclass}'><div class='no-thumbnail-inner'><i class='fa'></i></div></div>";
    }

    return '<figure class="thumb ' . $thumbsize . ' ' . $additional . '">
                <a href="'. get_permalink(get_the_ID()) .'" class="' . $aclass . '">
                    ' . $featured . '
                </a>
            </figure>';
}

add_filter('jeg_featured_figure_lazy', 'jeg_featured_figure_lazy_jmagz', null, 4);

function jeg_get_image_attachment_jmagz($value, $imageid, $size) {
    $imagedata = wp_get_attachment_image_src($imageid, $size);
    return $imagedata[0];
}

add_filter('jeg_get_image_attachment', 'jeg_get_image_attachment_jmagz', null, 3);


function jeg_format_post_class_jmagz() {
    $format = get_post_format();
    $formatclass = '';

    switch($format) {
        case "video" :
            $formatclass = "post-video";
            break;
        case "gallery" :
            $formatclass = "post-gallery";
            break;
    }
    return $formatclass;
}

add_filter('jeg_format_post_class', 'jeg_format_post_class_jmagz');

function jmagz_plugin_check() {
    if(!defined('JEG_PLUGIN_VERSION')) {
        function vp_option($key, $default = null){ return null; }
        function vp_metabox($key, $default = null, $post_id = null){ return null; }
    }
    if(!defined('JEG_PLUGIN_VERSION') && !is_admin()) {
        function vp_get_gwf_style() { return null; }
        function vp_get_gwf_weight() { return null; }
    }
}

add_action('plugins_loaded', 'jmagz_plugin_check');

function jeg_get_ads_size() {
    return array(
        array( 'value' => 'auto',           'label' => 'Auto' ),
        array( 'value' => 'hide',           'label' => 'Hide' ),
        array( 'value' => '120x90' ,        'label' => '120 x 90'),
        array( 'value' => '120x240' ,       'label' => '120 x 240'),
        array( 'value' => '120x600' ,       'label' => '120 x 600'),
        array( 'value' => '125x125' ,       'label' => '125 x 125'),
        array( 'value' => '160x90' ,        'label' => '160 x 90'),
        array( 'value' => '160x600' ,       'label' => '160 x 600'),
        array( 'value' => '180x90' ,        'label' => '180 x 90'),
        array( 'value' => '180x150' ,       'label' => '180 x 150'),
        array( 'value' => '200x90' ,        'label' => '200 x 90'),
        array( 'value' => '200x200' ,       'label' => '200 x 200'),
        array( 'value' => '234x60' ,        'label' => '234 x 60'),
        array( 'value' => '250x250' ,       'label' => '250 x 250'),
        array( 'value' => '320x100' ,       'label' => '320 x 100'),
        array( 'value' => '300x250' ,       'label' => '300 x 250'),
        array( 'value' => '300x600' ,       'label' => '300 x 600'),
        array( 'value' => '320x50' ,        'label' => '320 x 50'),
        array( 'value' => '336x280' ,       'label' => '336 x 280'),
        array( 'value' => '468x15' ,        'label' => '468 x 15'),
        array( 'value' => '468x60' ,        'label' => '468 x 60'),
        array( 'value' => '728x15' ,        'label' => '728 x 15'),
        array( 'value' => '728x90' ,        'label' => '728 x 90'),
        array( 'value' => '970x90' ,        'label' => '970 x 90'),
        array( 'value' => '240x400' ,       'label' => '240 x 400'),
        array( 'value' => '250x360' ,       'label' => '250 x 360'),
        array( 'value' => '580x400' ,       'label' => '580 x 400'),
        array( 'value' => '750x100' ,       'label' => '750 x 100'),
        array( 'value' => '750x200' ,       'label' => '750 x 200'),
        array( 'value' => '750x300' ,       'label' => '750 x 300'),
        array( 'value' => '980x120' ,       'label' => '980 x 120'),
        array( 'value' => '930x180' ,       'label' => '930 x 180')
    );
}

function jeg_get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = preg_split('/\n+/', trim($the_excerpt));
    $the_excerpt = implode(" ", $the_excerpt);
    return $the_excerpt;
}

function jeg_generate_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function jeg_render_ads_int ($adslocation , $size ) {
    $adshtml = '';
    $randomstring = jeg_generate_random_string();
    $adshtml .= "<style type='text/css' scoped>\n";

    $publisherid = vp_option('joption.' . $adslocation . '_google_publisher');
    $slotid = vp_option('joption.' . $adslocation . '_google_id');

    $adshtml .= ".adsslot_{$randomstring}{ width:{$size['desktop'][0]}px !important; height:{$size['desktop'][1]}px !important; }\n";
    $adshtml .= "@media (max-width:1199px) { .adsslot_{$randomstring}{ width:{$size['tab'][0]}px !important; height:{$size['tab'][0]}px !important; } }\n";
    $adshtml .= "@media (max-width:767px) { .adsslot_{$randomstring}{ width:{$size['phone'][0]}px !important; height:{$size['phone'][0]}px !important; } }\n";


    $adshtml .= "</style>\n\n";
    $adshtml .= "<ins class=\"adsbygoogle adsslot_{$randomstring}\" style=\"display:inline-block;\" data-ad-client=\"{$publisherid}\" data-ad-slot=\"{$slotid}\" data-ad-format=\"horizontal\"></ins>\n";
    $adshtml .= "<script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>\n";
    $adshtml .= "<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>\n";

    return $adshtml;
}

function jeg_render_ads($adslocation, $addclass = '') {
    $adsenabled = vp_option('joption.enable_' . $adslocation , 0);
    if($adsenabled) {
        $adstype = vp_option('joption.' . $adslocation . '_type', 'imageads');
        $adshtml = '';
        if($adstype === 'imageads') {
            $opennewtab = vp_option('joption.' . $adslocation . '_image_new_tab', 0) ? "target='_blank'" : "";
            $adshtml .=
                '<a class="' . $addclass . '" href="' . vp_option('joption.' . $adslocation . '_image_link') . '" ' . $opennewtab . '>
                    <img src="' . vp_option('joption.' . $adslocation . '_image') . '" alt="' . vp_option('joption.' . $adslocation . '_image_text') . '">
                </a>';
        } else if($adstype === 'code') {
            $adshtml = vp_option('joption.' . $adslocation . '_code');
        } else if($adstype === 'googleads') {

            $publisherid = vp_option('joption.' . $adslocation . '_google_publisher');
            $slotid = vp_option('joption.' . $adslocation . '_google_id');

            $desktopsize_ad = array();
            $tabsize_ad = array();
            $phonesize_ad = array();

            $desktopsize    = vp_option('joption.' . $adslocation . '_google_desktop', 'hide');
            $tabsize        = vp_option('joption.' . $adslocation . '_google_tab', 'hide');
            $phonesize      = vp_option('joption.' . $adslocation . '_google_phone', 'hide');

            if($adslocation === 'sidefeed_ads') {
                $desktopsize_ad = array('300','250');
                $tabsize_ad = array('200','200');
                $phonesize_ad = array('200', '200');
            }
            if($adslocation === 'top_menu_ads') {
                $desktopsize_ad = array('728','90');
                $tabsize_ad = array('468','60');
                $phonesize_ad = array('320', '50');
            }
            if($adslocation === 'top_wrapper_ads') {
                $desktopsize_ad = array('728','90');
                $tabsize_ad = array('468','60');
                $phonesize_ad = array('320', '50');
            }
            if($adslocation === 'side_left_wrapper_ads') {
                $desktopsize_ad = array('160','600');
                $tabsize_ad = array('','');
                $phonesize_ad = array('', '');
            }
            if($adslocation === 'side_right_wrapper_ads') {
                $desktopsize_ad = array('160','600');
                $tabsize_ad = array('','');
                $phonesize_ad = array('', '');
            }
            if($adslocation === 'inline_content_ads') {
                $desktopsize_ad = array('300','250');
                $tabsize_ad = array('300','250');
                $phonesize_ad = array('300', '250');
            }
            if($adslocation === 'archive_bottom_ads') {
                $desktopsize_ad = array('728','90');
                $tabsize_ad = array('468','60');
                $phonesize_ad = array('320', '50');
            }
            if($adslocation === 'mobile_floating_ads') {
                $desktopsize_ad = array('','');
                $tabsize_ad = array('','');
                $phonesize_ad = array('320', '50');
            }

            if($desktopsize !== 'auto') {
                $desktopsize_ad = explode('x', $desktopsize);
            }
            if($tabsize !== 'auto') {
                $tabsize_ad = explode('x', $tabsize);
            }
            if($phonesize !== 'auto') {
                $phonesize_ad = explode('x', $phonesize);
            }
            $adshtml .= "<div class=\"{$addclass}\">\n";

            /* css style */
            $randomstring = jeg_generate_random_string();
            $adshtml .= "<style type='text/css' scoped>\n";

            if($desktopsize !== 'hide') {
                $adshtml .= ".adsslot_{$randomstring}{ width:{$desktopsize_ad[0]}px !important; height:{$desktopsize_ad[1]}px !important; }\n";
            }

            if($tabsize !== 'hide') {
                $adshtml .= "@media (max-width:1199px) { .adsslot_{$randomstring}{ width:{$tabsize_ad[0]}px !important; height:{$tabsize_ad[1]}px !important; } }\n";
            }

            if($phonesize !== 'hide') {
                $adshtml .= "@media (max-width:767px) { .adsslot_{$randomstring}{ width:{$phonesize_ad[0]}px !important; height:{$phonesize_ad[1]}px !important; } }\n";
            }

            $adshtml .= "</style>\n\n";
            $adshtml .= "<ins class=\"adsbygoogle adsslot_{$randomstring}\" style=\"display:inline-block;\" data-ad-client=\"{$publisherid}\" data-ad-slot=\"{$slotid}\"></ins>\n";
            $adshtml .= "<script async src='//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js'></script>\n";
            $adshtml .= "<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>\n";

            $adshtml .= "</div>\n";
        }
        return $adshtml;
    }
    return '';
}

function jeg_get_google_font() {
    $font = vp_get_gwf_family();
    $fontlist = array();
    $fontlist[] = '';
    foreach($font as $fl){
        $fontlist[$fl['value']] = $fl['label'];
    }
    return $fontlist;
}

/** archive builder start */
function jeg_article_excerpt_latest_length(){ return 22; }
function jeg_article_excerpt_latest_more() { return "..."; }

function jeg_review_article_featured_block ()
{
    add_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length', 999 );
    add_filter('excerpt_more', 'jeg_article_excerpt_latest_more');

    $mean = get_post_meta(get_the_ID(),'rating_mean');
    $starrating = apply_filters('jeg_build_rating', null, $mean);;

    $price = get_post_meta(get_the_ID(),'price_lowest');
    $price = vp_option('joption.review_price_front', '$') . $price[0] . vp_option('joption.review_price_behind');

    $stores = vp_metabox('jmagz_review_price.price');
    $storehtml = '';
    if(!empty($stores)) {
        $storehtml = array();
        foreach($stores as $i => $store) {
            $storehtml[$i] = '<strong>' . $store['shop'] . '</strong> ';
            if(!empty($store['link'])) {
                $storehtml[$i] .= '<a href="' . $store['link'] . '" class="external-link"><i class="fa fa-external-link"></i></a>';
            }
        }
        $storehtml = implode(' , ', $storehtml);
    }

    $htmlcontent =
    '<article class="latest-post-big">
        <div class="col-md-7">
            ' . apply_filters('jeg_featured_figure_lazy', null, 'two-third-post-featured') . '
        </div>
        <div class="col-md-5">
            <header class="content">
                <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title().'</a></h1>
                ' . $starrating . '
            </header>
            <div class="post-excerpt">
                <p>'.  get_the_excerpt() .'</p>
            </div>
            <div class="review-info">
                <div class="price-info">
                    <h4 class="info-title">' . __('Priced At:','jeg_textdomain') . '</h4>
                    <strong>' . $price . '</strong>
                </div>
                <div class="store-info">
                    <h4 class="info-title">' . __('Available At:','jeg_textdomain') . '</h4>
                    ' . $storehtml . '
                </div>
            </div>
        </div>
    </article>';

    remove_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length');
    remove_filter( 'excerpt_more', 'jeg_article_excerpt_latest_more');

    return $htmlcontent;
}

function jeg_review_article_normal_block()
{
    add_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length', 999 );
    add_filter('excerpt_more', 'jeg_article_excerpt_latest_more');

    $mean = get_post_meta(get_the_ID(),'rating_mean');
    $starrating = apply_filters('jeg_build_rating', null, $mean);;

    $price = get_post_meta(get_the_ID(),'price_lowest');
    $price = vp_option('joption.review_price_front', '$') . $price[0] . vp_option('joption.review_price_behind');

    $stores = vp_metabox('jmagz_review_price.price');
    $storehtml = '';
    if(!empty($stores)) {
        $storehtml = array();
        foreach($stores as $i => $store) {
            $storehtml[$i] = '<strong>' . $store['shop'] . '</strong> ';
            if(!empty($store['link'])) {
                $storehtml[$i] .= '<a href="' . $store['link'] . '" class="external-link"><i class="fa fa-external-link"></i></a>';
            }
        }
        $storehtml = implode(' , ', $storehtml);
    }

    $post_class = get_post_class(array('review-list', 'clearfix'), get_the_ID());

    $htmlcontent =
        '<article class="'. implode(' ', $post_class) .'">
            <div class="col-md-5">
                ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
            </div>

            <div class="col-md-7">
                <div class="review-content">
                    <header class="content">
                        <h1 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title() .'</a></h1>
                        ' . $starrating . '
                    </header>
                    <div class="post-excerpt">
                        <p>'.  get_the_excerpt() .'</p>
                    </div>
                </div>
                <div class="review-info">
                    <div class="price-info">
                        <h4 class="info-title">' . __('Priced At:','jeg_textdomain') . '</h4>
                        <strong>' . $price . '</strong>
                    </div>
                    <div class="store-info">
                        <h4 class="info-title">' . __('Available At:','jeg_textdomain') . '</h4>
                        ' . $storehtml . '
                    </div>
                </div>
            </div>
        </article>';

    remove_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length');
    remove_filter( 'excerpt_more', 'jeg_article_excerpt_latest_more');

    return $htmlcontent;
}

function jeg_post_article_featured_block ($usecategory = false)
{
    add_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length', 999 );
    add_filter('excerpt_more', 'jeg_article_excerpt_latest_more');

    /* time */
    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";

    /* category */
    $categoryarray = get_the_category();
    $categorytext = '';
    if(!empty($categoryarray))
        $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";

    /* author */
    $authorurl = get_author_posts_url(get_the_author_meta('ID'));
    $authorname = apply_filters('jeg_get_author_name', null);
    $authortext = '<span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>';

    $firsttext = $authortext;
    if($usecategory) {
        $firsttext = $categorytext;
    }

    if(is_sticky()) {
        $htmlcontent =
            '<article class="latest-post-big">
                <div class="col-md-6">
                    ' . apply_filters('jeg_featured_figure_lazy', null, 'two-third-post-featured') . '
                </div>
                <div class="col-md-6">
                    <header class="content">
                        <h1 class="post-title"><a href="' . get_permalink(get_the_ID()) . '">' . get_the_title() . '</a></h1>
                    </header>
                    <div class="post-meta">
                        ' . $firsttext . '
                        ' . $timeformat . '
                    </div>
                    <div class="post-excerpt">
                        <p>' . get_the_excerpt() . '</p>
                    </div>
                </div>
            </article>';
    } else {
        $htmlcontent =
            '<article class="latest-post-big">
                <div class="col-md-7">
                    ' . apply_filters('jeg_featured_figure_lazy', null, 'two-third-post-featured') . '
                </div>
                <div class="col-md-5">
                    <header class="content">
                        <h1 class="post-title"><a href="' . get_permalink(get_the_ID()) . '">' . get_the_title() . '</a></h1>
                    </header>
                    <div class="post-meta">
                        ' . $firsttext . '
                        ' . $timeformat . '
                    </div>
                    <div class="post-excerpt">
                        <p>' . get_the_excerpt() . '</p>
                    </div>
                </div>
            </article>';
    }

    remove_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length');
    remove_filter( 'excerpt_more', 'jeg_article_excerpt_latest_more');

    return $htmlcontent;
}

function jeg_post_article_normal_block ($usecategory = false)
{
    add_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length', 999 );
    add_filter('excerpt_more', 'jeg_article_excerpt_latest_more');

    /* time */
    $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("F j, Y ")  . "</time>";

    /* category */
    $categoryarray = get_the_category();
    $categorytext = '';
    if(!empty($categoryarray))
        $categorytext = "<span class='post-category'><a href='" . get_category_link($categoryarray[0]->term_id) . "' rel='category'>" . $categoryarray[0]->name . "</a></span>";

    /* author */
    $authorurl = get_author_posts_url(get_the_author_meta('ID'));
    $authorname = apply_filters('jeg_get_author_name', null);
    $authortext = '<span class="post-author">'. __('By', 'jeg_textdomain') . ' <a href="' . $authorurl .'" rel="author">' . $authorname .'</a></span>';

    $firsttext = $authortext;
    if($usecategory) {
        $firsttext = $categorytext;
    }

    $post_class = get_post_class(array('review-list', 'clearfix'), get_the_ID());

    if(is_sticky()) {
        $htmlcontent =
            '<article class="'. implode(' ', $post_class) .'">
                <div class="col-md-6">
                    ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
                </div>
                <div class="col-md-6">
                    <div class="">
                        <header class="content">
                            <h2 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title() .'</a></h2>
                        </header>
                        <div class="post-meta">
                            ' . $firsttext . '
                            ' . $timeformat .  '
                        </div>
                        <div class="post-excerpt">
                            <p>'.  get_the_excerpt() .'</p>
                        </div>
                    </div>
                </div>
            </article>';
    } else {
        $htmlcontent =
            '<article class="'. implode(' ', $post_class) .'">
            <div class="col-md-5">
                ' . apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured') . '
            </div>
            <div class="col-md-7">
                <div class="">
                    <header class="content">
                        <h2 class="post-title"><a href="'. get_permalink(get_the_ID()) .'">'. get_the_title() .'</a></h2>
                    </header>
                    <div class="post-meta">
                        ' . $firsttext . '
                        ' . $timeformat .  '
                    </div>
                    <div class="post-excerpt">
                        <p>'.  get_the_excerpt() .'</p>
                    </div>
                </div>
            </div>
        </article>';
    }

    remove_filter( 'excerpt_length', 'jeg_article_excerpt_latest_length');
    remove_filter( 'excerpt_more', 'jeg_article_excerpt_latest_more');

    return $htmlcontent;
}


/** archive builder end */

function jeg_get_query_paged () {
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $page = ( get_query_var('page') ) ? get_query_var('page') : 1;
    return ( $paged > $page ) ? $paged : $page;
}


function jeg_build_pagination($curpage, $totalPage, $step = 2)
{
    $html = '';

    if($totalPage > 1) {
        $pagingCount = ( $step * 2 ) + 1;

        $html = '<div id="pagination" class="center">';

        if( $curpage > $step + 1 && $totalPage > $pagingCount ) {
            $html .= "<a data-page='1' href='" . get_pagenum_link(1) . "'><span>&laquo</span></a>";
        }
        if( $curpage > 1 && $pagingCount < $totalPage ) {
            $html .= get_previous_posts_link('<span>&lsaquo;</span>');
        }

        /** loop page **/
        for($i = jlimitme('low', $curpage - $step, 1) ; $i <= jlimitme('high', $totalPage , $curpage + $step) ; $i++){
            if($i == $curpage) {
                $html .= '<span class="page-item current">'.$i.'</span>';
            } else {
                $html .= '<span class="page-item"><a href="' . get_pagenum_link($i) . '">' . $i . '</a></span>';
            }
        }

        if( $curpage < $totalPage && $pagingCount < $totalPage ) {
            $html .= get_next_posts_link('<span>&rsaquo;</span>');
        }

        if( $curpage < $totalPage - 1 && $curpage + $step + 1 <= $totalPage && $pagingCount < $totalPage ) {
            $html .= "<a data-page='{$totalPage}' href='" . get_pagenum_link($totalPage) . "'><span>&raquo;</span></a>";
        }

        $html .= "</div>";
    }

    return $html;
}

/** page type checker **/
function jeg_check_page_type()
{
    $type = array();

    if(is_home()) 			array_push($type, 'is_home');
    if(is_front_page()) 	array_push($type, 'is_front_page');
    if(is_404()) 			array_push($type, 'is_404');
    if(is_search()) 		array_push($type, 'is_search');
    if(is_date()) 			array_push($type, 'is_date');
    if(is_author()) 		array_push($type, 'is_author');
    if(is_category()) 		array_push($type, 'is_category');
    if(is_tag()) 			array_push($type, 'is_tag');
    if(is_tax()) 			array_push($type, 'is_tax');
    if(is_archive()) 		array_push($type, 'is_archive');
    if(is_single()) 		array_push($type, 'is_single');
    if(is_attachment()) 	array_push($type, 'is_attachment');
    if(is_page()) 			array_push($type, 'is_page');

    return implode(', ', $type);
}



function jeg_get_score_name($score) {
    if($score >= 9 ) {
        return "great";
    }
    if($score >= 8 && $score < 9) {
        return "good";
    }
    if($score >= 6 && $score < 8) {
        return "average";
    }
    if($score < 6) {
        return "bad";
    }

}

function filter_where_prev($where) {
    global $post;
    $where .= " AND ID < " . $post->ID;
    return $where;
}

function filter_where_next($where) {
    global $post;
    $where .= " AND ID > " . $post->ID;
    return $where;
}

function get_previous_review() {
    $review_query = array(
        'post_type' => 'review',
        'orderby' => 'DATE',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'paged' => 1

    );

    add_filter('posts_where', 'filter_where_prev');
    $query = new WP_Query($review_query);
    remove_filter( 'posts_where', 'filter_where_prev');
    return $query->posts;
}

function get_next_review() {
    $review_query = array(
        'post_type' => 'review',
        'orderby' => 'DATE',
        'order' => 'ASC',
        'posts_per_page' => 1,
        'paged' => 1

    );

    add_filter('posts_where', 'filter_where_next');
    $query = new WP_Query($review_query);
    remove_filter( 'posts_where', 'filter_where_next');
    return $query->posts;
}

function jlimitme ($type = "high", $point, $limit)
{
    if ($type == "high") {
        return ($point > $limit) ? $limit : $point;
    } else {
        return ($point > $limit) ? $point : $limit;
    }
}

/** bread crumb */

function jeg_build_category_recursive($categoryarray, $parent, &$breadcrumbtext)
{
    if($categoryarray) {
        foreach($categoryarray as $cat) {
            if($cat->parent === $parent) {
                $breadcrumbtext .= "<span class=\"breadcrumb-item\" typeof=\"v:Breadcrumb\"><a href='" . get_category_link($cat->term_id) . "' rel=\"v:url\" property=\"v:title\"> " .$cat->name . "</a></span>";
                jeg_build_category_recursive($categoryarray, $cat->term_id, $breadcrumbtext);
            }
        }
    }
}

function jeg_build_breadcrumb() {
    $breadcrumbntext = "<div class=\"breadcrumb\" prefix=\"v: http://rdf.data-vocabulary.org/#\">";
    $breadcrumbntext .= "<span class=\"breadcrumb-item home-breadcrumb\" typeof=\"v:Breadcrumb\"><a href='" . home_url() . "' rel=\"v:url\" property=\"v:title\">" . __('Home','jeg_textdomain') . "</a></span>";


    $categoryarray = get_the_category();
    jeg_build_category_recursive($categoryarray, 0, $breadcrumbntext);
    $breadcrumbntext .= "</div>";

    return $breadcrumbntext;
}


function jeg_build_page_breadcrumb() {
    $breadcrumbntext = "<div class=\"breadcrumb\" prefix=\"v: http://rdf.data-vocabulary.org/#\">";
    $breadcrumbntext .= "<span class=\"breadcrumb-item home-breadcrumb\" typeof=\"v:Breadcrumb\"><a href='" . home_url() . "' rel=\"v:url\" property=\"v:title\">" . __('Home','jeg_textdomain') . "</a></span>";

    global $post;
    if($post->post_parent) {
        $query = new WP_Query(array(
            'post_type' => 'page',
            'p' => $post->post_parent
        ));

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $breadcrumbntext .= "<span class=\"breadcrumb-item\" typeof=\"v:Breadcrumb\"><a href='" . get_permalink() . "' rel=\"v:url\" property=\"v:title\"> " .get_the_title() . "</a></span>";
            }
        }
        wp_reset_postdata();
    }

    $breadcrumbntext .= "<span class=\"breadcrumb-item\" typeof=\"v:Breadcrumb\"><a href='" . get_permalink() . "' rel=\"v:url\" property=\"v:title\"> " .get_the_title() . "</a></span>";
    $breadcrumbntext .= "</div>";

    return $breadcrumbntext;
}


function jeg_build_review_category_recursive($categoryarray, $parent, &$breadcrumbtext)
{
    if($categoryarray) {
        foreach($categoryarray as $cat) {
            if($cat->parent === $parent) {
                $breadcrumbtext .= "<span class=\"breadcrumb-item\" typeof=\"v:Breadcrumb\"><a href='" . get_term_link($cat->term_id, 'review-category') . "' rel=\"v:url\" property=\"v:title\"> " .$cat->name . "</a></span>";
                jeg_build_review_category_recursive($categoryarray, $cat->term_id, $breadcrumbtext);
            }
        }
    }
}

function jeg_review_build_breadcrumb() {
    $breadcrumbntext = "<div class=\"breadcrumb\" prefix=\"v: http://rdf.data-vocabulary.org/#\">";
    $breadcrumbntext .= "<span class=\"breadcrumb-item home-breadcrumb\" typeof=\"v:Breadcrumb\"><a href='" . home_url() . "' rel=\"v:url\" property=\"v:title\">" . __('Home','jeg_textdomain') . "</a></span>";

    $termlist = get_the_terms(get_the_ID(), 'review-category');
    jeg_build_review_category_recursive($termlist, 0, $breadcrumbntext);

    $brands = get_the_terms(get_the_ID(), 'review-brand');
    if($brands) {
        foreach($brands as $brand) {
            $breadcrumbntext .= "<span class=\"breadcrumb-item\" typeof=\"v:Breadcrumb\"><a href='" . get_term_link($brand->term_id, 'review-brand') . "' rel=\"v:url\" property=\"v:title\"> " . $brand->name . "</a></span>";
        }
    }

    $breadcrumbntext .= "</div>";

    return $breadcrumbntext;
}


/**
 * Convert a hexa decimal color code to its RGB equivalent (http://php.net/manual/en/function.hexdec.php)
 *
 * @param string $hexStr (hexadecimal color value)
 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
 */
function jeg_hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}


function jeg_logo_title_alt()
{
    return "alt='" . get_bloginfo('description') . "'";
}

function jeg_format_post() {
    $format = get_post_format();
    $formatclass = '';

    switch($format) {
        case "video" :
            $formatclass = "post-video";
            break;
        case "gallery" :
            $formatclass = "post-gallery";
            break;
    }

    if(get_post_thumbnail_id()) {
        return $formatclass;
    } else {
        return '';
    }

}

/**
 * social icon
 */
function jeg_populate_social () {
    $socialarray = array();

    // facebook
    if(vp_option('joption.social_facebook')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-facebook',
            'class' => 'social-facebook',
            'url'	=> vp_option('joption.social_facebook'),
            'text'	=> 'Facebook'
        );
    }

    // twitter
    if(vp_option('joption.social_twitter')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-twitter',
            'class' => 'social-twitter',
            'url'	=> vp_option('joption.social_twitter'),
            'text'	=> 'Twitter'
        );
    }

    // linked in
    if(vp_option('joption.social_linkedin')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-linkedin',
            'class' => 'social-linkedin',
            'url'	=> vp_option('joption.social_linkedin'),
            'text'	=> 'Linked In'
        );
    }

    // Google Plus
    if(vp_option('joption.social_googleplus')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-google-plus',
            'class' => 'social-googleplus',
            'url'	=> vp_option('joption.social_googleplus'),
            'text'	=> 'Google Plus'
        );
    }

    // Pinterest
    if(vp_option('joption.social_pinterest')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-pinterest',
            'class' => 'social-pinterest',
            'url'	=> vp_option('joption.social_pinterest'),
            'text'	=> 'Pinterest'
        );
    }

    // Github
    if(vp_option('joption.social_github')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-github',
            'class' => 'social-github',
            'url'	=> vp_option('joption.social_github'),
            'text'	=> 'Github'
        );
    }

    // Flickr
    if(vp_option('joption.social_flickr')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-flickr',
            'class' => 'social-flickr',
            'url'	=> vp_option('joption.social_flickr'),
            'text'	=> 'Flickr'
        );
    }

    // Tumblr
    if(vp_option('joption.social_tumblr')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-tumblr',
            'class' => 'social-tumblr',
            'url'	=> vp_option('joption.social_tumblr'),
            'text'	=> 'Tumblr'
        );
    }

    // Dribbble
    if(vp_option('joption.social_dribbble')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-dribbble',
            'class' => 'social-dribbble',
            'url'	=> vp_option('joption.social_dribbble'),
            'text'	=> 'Dribbble'
        );
    }

    // Soundcloud
    if(vp_option('joption.social_soundcloud')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-soundcloud',
            'class' => 'social-soundcloud',
            'url'	=> vp_option('joption.social_soundcloud'),
            'text'	=> 'Soundcloud'
        );
    }

    // Behance
    if(vp_option('joption.social_behance')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-behance',
            'class' => 'social-behance',
            'url'	=> vp_option('joption.social_behance'),
            'text'	=> 'Behance'
        );
    }

    // instagram
    if(vp_option('joption.social_instagram')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-instagram',
            'class' => 'social-instagram',
            'url'	=> vp_option('joption.social_instagram'),
            'text'	=> 'Instagram'
        );
    }

    // Vimeo
    if(vp_option('joption.social_vimeo')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-vimeo-square',
            'class' => 'social-vimeo',
            'url'	=> vp_option('joption.social_vimeo'),
            'text'	=> 'Vimeo'
        );
    }

    // Youtube
    if(vp_option('joption.social_youtube')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-youtube',
            'class' => 'social-youtube',
            'url'	=> vp_option('joption.social_youtube'),
            'text'	=> 'youtube'
        );
    }

    // 500px
    if(vp_option('joption.social_500px')) {
        $socialarray[] = array(
            'icon'	=> 'icon-500px',
            'class' => 'social-500px',
            'url'	=> vp_option('joption.social_500px'),
            'text'	=> '500px'
        );
    }

    // vk
    if(vp_option('joption.social_vk')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-vk',
            'class' => 'social-vk',
            'url'	=> vp_option('joption.social_vk'),
            'text'	=> 'vk'
        );
    }

    // vk
    if(vp_option('joption.social_rss')) {
        $socialarray[] = array(
            'icon'	=> 'fa fa-rss',
            'class' => 'social-rss',
            'url'	=> vp_option('joption.social_rss'),
            'text'	=> 'vk'
        );
    }

    return $socialarray;
}

function jeg_display_breaking_time() {

    if(vp_option('joption.breaking_date') === 'dateago') {
        $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') . "</time>";
    } else {
        $timeformat = "<time class='post-date' datetime='" . get_the_time("Y-m-d H:i:s") . "'>" . get_the_time("d/m/y ")  . "</time>";
    }

    return $timeformat;
}

function jeg_get_featured_header() {

    $format = get_post_format();
    $featuredhtml = '';
    $imgid = get_post_thumbnail_id(get_the_ID());

    switch ($format) {
        case "video" :
            $videotype = vp_metabox('jmagz_blog_video.video_type');
            if($videotype === 'youtube') {
                $featuredhtml =
                    "<div class='featured featured-video'>
                        <div data-src='" . vp_metabox('jmagz_blog_video.video_url') . "' data-type='youtube' data-repeat='false' data-autoplay='false' class='youtube-class clearfix'>
                            <div class='video-container'></div>
                        </div>
                    </div> ";
            } else if($videotype === 'vimeo') {
                $featuredhtml =
                    "<div class='featured featured-video'>
                        <div data-src='" . vp_metabox('jmagz_blog_video.video_url') . "' data-type='vimeo' data-repeat='false' data-autoplay='false' class='vimeo-class clearfix'>
                            <div class='video-container'></div>
                        </div>
                    </div> ";
            } else if($videotype === 'html5video') {

                $mp4video = $webmvideo = $oggvideo = '';
                if(vp_metabox('jmagz_blog_video.video.0.videomp4') !== '') {
                    $mp4video = "<source type='video/mp4' src='" . vp_metabox('jmagz_blog_video.video.0.videomp4') . "'>";
                }
                if(vp_metabox('jmagz_blog_video.video.0.videowebm') !== '') {
                    $webmvideo = "<source type='video/webm' src='" . vp_metabox('jmagz_blog_video.video.0.videowebm') . "'>";
                }
                if(vp_metabox('jmagz_blog_video.video.0.videoogg') !== '') {
                    $oggvideo = "<source type='video/ogg' src='" . vp_metabox('jmagz_blog_video.video.0.videoogg') . "'>";
                }

                $featuredimage = apply_filters('jeg_get_image_attachment', null, vp_metabox('jmagz_blog_video.video.0.bgfallback'), 'full');
                $featuredhtml =
                    "<div class='featured featured-video'>
                        <video width='640' height='360' style='width: 100%; height: 100%;' poster='" . $featuredimage . "' preload='none'>"
                            .$mp4video . $webmvideo . $oggvideo .
                        "</video>
                    </div>";
            }
            break;
        case "gallery" :
            $bloggallery = vp_metabox('jmagz_blog_gallery.binding_group');
            $featuredhtml .= "<figure class='featured featured-gallery'>";
            if(!empty($bloggallery)) {
                foreach($bloggallery as $gallery) {
                    $featuredimg = apply_filters('jeg_get_image_attachment', null, $gallery['image'], 'post-featured');
                    $fullimage = apply_filters('jeg_get_image_attachment', null, $gallery['image'], 'full');
                    $featuredhtml .= "<a href='{$fullimage}'><img src='{$featuredimg}' alt='{$gallery['image_name']}'></a>";
                }
            }
            $featuredhtml .= "</figure>";
            break;
        default :
            if(has_post_thumbnail()) {
                $imgsrc = apply_filters('jeg_get_image_attachment', null, $imgid, 'post-featured');
                $imgalt = get_the_title($imgid);
                $featuredhtml .=
                    "<figure class='featured featured-image'>
                        <img itemprop='image' src='{$imgsrc}' alt='" . get_the_title() . "'>
                        <p class='wp-caption-text'>{$imgalt}</p>
                    </figure>";
            }
            break;
    }

    return $featuredhtml;
}