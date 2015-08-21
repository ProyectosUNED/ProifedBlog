<aside id="sidebar">
    <section class="sidebar-posts">
        <div class="sidebar-post-wrapper">
            <h2 class="sidebar-heading"><?php echo vp_option('joption.sidebar_text', 'Latest News'); ?></h2>
            <?php echo jeg_get_sidebar_feed(); ?>
        </div>
        <div class="sidebar-loadmore-wrapper">
            <div class="sidebar-loadmore btn btn-small btn-default" data-page="1" data-end="<?php _e('End of Content','jeg_textdomain'); ?>" data-loading="<?php _e('Loading...','jeg_textdomain'); ?>" data-loadmore="<?php _e('Load More','jeg_textdomain'); ?>">
                <i class="btn-icon fa fa-refresh"></i>
                <strong><?php _e('Load More','jeg_textdomain'); ?></strong>
            </div>
        </div>
    </section>

    <div class="sidebar-footer">
        <footer class="bottom">
            <p class="copyright"><?php echo vp_option('joption.sidebar_copy'); ?></p>
        </footer>
    </div>
</aside>