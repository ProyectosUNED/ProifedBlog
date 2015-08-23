<?php
    $reviewpage = vp_option('joption.review_page');
?>
<section class="reviews-search section">
    <form action="<?php echo get_permalink($reviewpage) ?>" method="get" class="review-search-form">
        <div class="search-bar-wrapper">
            <label for="keyword" class="fa fa-search" rel="tooltip" title="keyword"></label>
            <input id="keyword" class="searchkeyword" name="keyword" value="<?php echo isset($_REQUEST['keyword']) ? $_REQUEST['keyword'] : ''; ?>" placeholder="<?php _e('Search review...','jeg_textdomain'); ?>" type="text">
            <input id="keyword-button" name="action" value="search" type="hidden">

            <span class="filter-toggle">
                <i class="fa fa-th-large"></i>
            </span>
        </div>

        <div class="search-filter-wrapper">
            <h3 class="section-heading"><?php _e('Advanced Filter','jeg_textdomain'); ?></h3>
            <div class="row">
                <div class="col-md-4">
                    <?php
                        $revcategory = array(
                            'orderby'            => 'name',
                            'show_option_none'   => __('All Category','jeg_textdomain'),
                            'option_none_value'  => '',
                            'hierarchical'       => 1,
                            'name'               => 'category',
                            'taxonomy'           => 'review-category',
                            'selected'           => isset($_REQUEST['category']) ? $_REQUEST['category'] : 0
                        );
                        wp_dropdown_categories( $revcategory );
                    ?>
                </div>

                <div class="col-md-4">
                    <?php
                        $revbrand = array(
                            'orderby'            => 'name',
                            'show_option_none'   => __('All Brand','jeg_textdomain'),
                            'option_none_value'  => '',
                            'hierarchical'       => 1,
                            'name'               => 'brand',
                            'taxonomy'           => 'review-brand',
                            'selected'           => isset($_REQUEST['brand']) ? $_REQUEST['brand'] : 0
                        );
                        wp_dropdown_categories( $revbrand );
                    ?>
                </div>

                <div class="col-md-4">
                    <select name="sortby" id="sortby" class="select-choosen" data-placeholder="<?php _e('Sort by','jeg_textdomain'); ?>">
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'date-desc' ) ? "selected='selected'" : ''; ?> value="date-desc"><?php _e('Newest First','jeg_textdomain'); ?></option>
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'date-asc' ) ? "selected='selected'" : ''; ?> value="date-asc"><?php _e('Oldest First','jeg_textdomain'); ?></option>
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'price-desc' ) ? "selected='selected'" : ''; ?> value="price-desc"><?php _e('Highest Price','jeg_textdomain'); ?></option>
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'price-asc' ) ? "selected='selected'" : ''; ?> value="price-asc"><?php _e('Lowest Price','jeg_textdomain'); ?></option>
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rating-desc' ) ? "selected='selected'" : ''; ?> value="rating-desc"><?php _e('Highest Rating','jeg_textdomain'); ?></option>
                        <option <?php echo ( isset($_REQUEST['sortby']) && $_REQUEST['sortby'] == 'rating-asc' ) ? "selected='selected'" : ''; ?> value="rating-asc"><?php _e('Lowest Rating','jeg_textdomain'); ?></option>
                    </select>
                </div>
            </div>

            <div class="filter-action">
                <input type="submit" class="btn btn-danger" id="filter-submit" value="Search Now">
            </div>
        </div>
    </form>
</section>