<?php
    $mean = get_post_meta(get_the_ID(),'rating_mean');
?>

<div class="review-box">
    <h3 class="subheading"><?php _e('The Review', 'jeg_textdomain'); ?></h3>
    <h2 class="post-title" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
        <span itemprop="name">
            <?php echo vp_metabox('jmagz_review_meta.product_name'); ?>
        </span>
    </h2>

    <div class="clearfix" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
        <meta itemprop="worstRating" content="1">
        <meta itemprop="ratingValue" content="<?php echo esc_attr( $mean[0] ); ?>">
        <meta itemprop="bestRating" content="10">
        <div class="rating-score score-<?php echo esc_attr(jeg_get_score_name($mean[0])); ?>">
            <strong class="score-value"><?php echo esc_html( $mean[0] ); ?></strong>
            <span class="score-desc"><?php _e('Score', 'jeg_textdomain') ?></span>
        </div>
        <div class="review-shortdesc">
            <p itemprop="description">"<?php echo vp_metabox('jmagz_review_meta.product_summary'); ?>"</p>
        </div>
    </div>

    <?php
        $pricewidgetlocation = vp_option('joption.show_price_widget', 'none');
        $pricelist = vp_metabox('jmagz_review_price.price');

        if(!empty($pricelist)) {
            if($pricewidgetlocation == 'reviewbox' || $pricewidgetlocation == 'both') {
                $pricehtml = '';
                foreach($pricelist as $pricestore) {
                    $price = vp_option('joption.review_price_front', '$') . $pricestore['price'] . vp_option('joption.review_price_behind');
                    $pricehtml .=
                        '<li>
                            <strong class="store-name">' . $pricestore['shop'] . '</strong>
                            <div class="store-aff">
                                <a target="_blank" href="' . $pricestore['link'] . '" class="aff-price">' . $price . '</a>
                                <a target="_blank" href="' . $pricestore['link'] . '" class="aff-link">' . __('Buy', 'jeg_textdomain') . '</a>
                            </div>
                        </li>';
                }
                $lowestprice = get_post_meta(get_the_ID(),'price_lowest');
                $lowestprice = vp_option('joption.review_price_front', '$') . $lowestprice[0] . vp_option('joption.review_price_behind');
                echo
                    '<div class="productinfo clearfix">
                        <div class="price-info">
                            <h4 class="info-title">' . __('Lowest Price at:', 'jeg_textdomain') . ':</h4>
                            <strong>' . $lowestprice .'</strong>
                        </div>
                        <div class="store-info">
                            <h4 class="info-title">' . __('Where to buy:', 'jeg_textdomain') . '</h4>
                            <ul class="stores">
                                ' . $pricehtml . '
                            </ul>
                        </div>
                    </div>';
            }
        }
    ?>

    <div class="review-goodbad row clearfix">
        <?php
            $goods = vp_metabox('jmagz_review_good_bad.good');
            if($goods) {
        ?>
        <div class="col-md-6">

            <h3 class="subheading"><i class="fa fa-check"></i> <?php _e('The Good', 'jeg_textdomain'); ?></h3>
            <ul class="fa-ul">
                <?php
                    foreach($goods as $good) {
                        echo '<li><i class="fa fa-li fa-circle"></i> ' . $good['good_text'] . '</li>';
                    }
                ?>
            </ul>
        </div>
        <?php
            }
            $bads = vp_metabox('jmagz_review_good_bad.bad');
            if($bads) {
        ?>
        <div class="col-md-6">
            <h3 class="subheading"><i class="fa fa-close"></i> <?php _e('The Bad', 'jeg_textdomain'); ?></h3>
            <ul class="fa-ul">
                <?php
                    foreach($bads as $bad) {
                        echo '<li><i class="fa fa-li fa-circle"></i> ' . $bad['bad_text'] . '</li>';
                    }
                ?>
            </ul>
        </div>
        <?php
            }
        ?>
    </div>

    <div class="review-scores review-bars clearfix">
        <h3 class="subheading lined"><?php _e('Breakdown', 'jeg_textdomain'); ?></h3>
        <ul>
            <?php
            $reviews = vp_metabox('jmagz_review_rating.rating');
            foreach($reviews as $review) {
                $ratingvalue = $review['rating_number'] * 10;
                echo
                '<li>
                    <em>' . $review['rating_text'] . '</em> <strong class="bar-score">' . $ratingvalue . '%</strong>
                    <div class="bar-wrap">
                        <span data-width="' . $ratingvalue . '" class="' . jeg_get_score_name($review['rating_number']) . '-bar bar-bg"></span>
                    </div>
                </li>';
            }
            ?>
        </ul>
    </div>
</div>