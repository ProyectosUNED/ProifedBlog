<section class="article-content">
    <?php
    $pricewidgetlocation = vp_option('joption.show_price_widget', 'none');
    $pricelist = vp_metabox('jmagz_review_price.price');

    if(!empty($pricelist)) {
        if($pricewidgetlocation == 'onarticle' || $pricewidgetlocation == 'both') {
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
                '<aside class="aside-post">
                    <div class="productinfo">
                        <h3 class="product-name">' . vp_metabox('jmagz_review_meta.product_name') . '</h3>
                        <div class="price-info">
                            <h4 class="info-title">' . __('Lowest Price at:', 'jeg_textdomain') . '</h4>
                            <strong>' . $lowestprice . '</strong>
                        </div>
                        <div class="store-info">
                            <h4 class="info-title">' . __('Where to buy:', 'jeg_textdomain') . '</h4>
                            <ul class="stores">
                                ' . $pricehtml . '
                            </ul>
                        </div>
                    </div>
                </aside>';
        }
    }

    the_content();
    get_template_part('fragment/review-box');
    wp_link_pages(array(
        'before' => '<div id="pagination" class="article-pagination clearfix"><div class="pagination-number">',
        'link_before' => '<span class="page-item">',
        'link_after' => '</span>',
        'after' => '</div></div>'
    ));
    ?>
    <div id="end-content"></div>
</section>