<?php

$page = jeg_get_query_paged();
$statement = array(
    'post_type'             => 'review',
    'post_status'			=> array('publish'),
    'paged'                 => $page
);


if(isset($_REQUEST['keyword']) && !empty($_REQUEST['keyword']) ) {
    $statement['s'] = $_REQUEST['keyword'];
}

if(isset($_REQUEST['category']) && !empty($_REQUEST['category'])) {
    $statement['tax_query'][] = array(
        'taxonomy' => 'review-category',
        'terms' => $_REQUEST['category'],
        'field' => 'id',
    );
}

if(isset($_REQUEST['brand']) && !empty($_REQUEST['brand']) ) {
    $statement['tax_query'][] = array(
        'taxonomy' => 'review-brand',
        'terms' => $_REQUEST['brand'],
        'field' => 'id',
    );
}

if(isset($_REQUEST['category']) && !empty($_REQUEST['category']) && isset($_REQUEST['brand']) && !empty($_REQUEST['brand'])) {
    $statement['tax_query']['relation'] = 'AND';
}


if(isset($_REQUEST['sortby'])) {
    if($_REQUEST['sortby'] === 'date-desc') {
        $statement['orderby'] = 'date';
        $statement['order'] = 'desc';
    }
    if($_REQUEST['sortby'] === 'date-asc') {
        $statement['orderby'] = 'date';
        $statement['order'] = 'asc';
    }
    if($_REQUEST['sortby'] === 'price-desc') {
        $statement['orderby'] = 'meta_value_num';
        $statement['meta_key'] = 'price_lowest';
        $statement['order'] = 'desc';
    }
    if($_REQUEST['sortby'] === 'price-asc') {
        $statement['orderby'] = 'meta_value_num';
        $statement['meta_key'] = 'price_lowest';
        $statement['order'] = 'asc';
    }
    if($_REQUEST['sortby'] === 'rating-desc') {
        $statement['orderby'] = 'meta_value_num';
        $statement['meta_key'] = 'rating_mean';
        $statement['order'] = 'desc';
    }
    if($_REQUEST['sortby'] === 'rating-asc') {
        $statement['orderby'] = 'meta_value_num';
        $statement['meta_key'] = 'rating_mean';
        $statement['order'] = 'asc';
    }
}

$query = new WP_Query($statement);
if($query->have_posts()) :
    echo
        '<section class="cat-latest-post featured-review section">
                    <h3 class="archive-heading">' . __('Search ','jeg_textdomain') . ' <strong>' . __('Result', 'jeg_textdomain') . '</strong></h3>
                    <div class="row clearfix">';

    while($query->have_posts()) :
        $query->the_post();

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

        echo
            '<article class="review-list clearfix">
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
    endwhile;
    echo
            '</div>
        </section>';

    get_template_part('fragment/archive-ads');
    echo jeg_build_pagination($page, $query->max_num_pages);
else :
    echo "
    <section class='cat-latest-post featured-review section'>
        <div class='row clearfix'>
            <div class='no-result col-md-12 section-heading-wrapper'><span>" . __('No Result', 'jeg_textdomain') . "</span></div>
        </div>
    </section>";
    get_template_part('fragment/archive-ads');
endif;