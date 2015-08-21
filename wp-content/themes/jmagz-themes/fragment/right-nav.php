<?php global $woocommerce; ?>
<div class="right-nav">

    <?php if(function_exists('is_woocommerce')) : ?>
    <ul class="right-menu menu">
        <li>
            <a href="#"><i class="fa fa-user"></i></a>
            <?php if ( !is_user_logged_in() ) : ?>
            <ul>
                <li class="toplogin">
                    <a href="<?php echo get_page_link ( wc_get_page_id( 'myaccount' ) ); ?>">Login or Register</a>
                </li>
            </ul>
            <?php else : ?>
            <ul>
                <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e('My Account', 'jeg_textdomain'); ?></a></li>
                <li><a href="<?php echo wc_customer_edit_account_url(); ?>"><?php _e('Edit Account', 'jeg_textdomain'); ?></a></li>
                <li><a href="<?php echo wc_get_endpoint_url('edit-address'); ?>"><?php _e('Edit Address', 'jeg_textdomain'); ?></a></li>
                <li><a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>"><?php _e('Sign Out', 'jeg_textdomain'); ?></a></li>
            </ul>
            <?php endif; ?>
        </li>
        <li><a href="#"><i class="fa fa-shopping-cart"></i></a>
            <ul class="topcart"></ul>
        </li>
    </ul>
    <?php endif; ?>

    <?php if(!get_theme_mod('hide_social_head', false)) : ?>
        <ul class="top-socials">
            <?php
                $topsocial = jeg_populate_social();
                foreach($topsocial as $social){
                    echo "<li><a target='_blank' href='". $social['url'] ."'><i class='". $social['icon'] ."'></i></a></li>";
                }
            ?>
        </ul><!-- /.top-socials -->
    <?php endif; ?>
    <?php if(!get_theme_mod('hide_search_head', false)) : ?>
        <div class="top-search no-active">
            <a href="#" class="top-search-toggle"><i class="fa fa-search"></i></a>
            <?php get_search_form(); ?>
            <div class="search-result">
                <div class="search-result-wrapper">

                </div>
                <div class="search-noresult">
                    <?php _e('No Result', 'jeg_textdomain'); ?>
                </div>
                <div class="search-all-button">
                    <?php _e('View All Result', 'jeg_textdomain'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div><!-- /.right-nav -->