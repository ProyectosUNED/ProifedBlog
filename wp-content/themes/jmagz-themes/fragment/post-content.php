<section class="article-content">
    <?php
        if(vp_option('joption.show_related_post', 0)) {
            echo jeg_relatedpost(array(
                'size' => vp_option('joption.related_post_number')
            ));
        }
        the_content();
        wp_link_pages(array(
            'before' => '<div id="pagination" class="article-pagination clearfix"><div class="pagination-number">',
            'link_before' => '<span class="page-item">',
            'link_after' => '</span>',
            'after' => '</div></div>'
        ));
    ?>

    <?php if ( has_tag() && !vp_option('joption.hide_post_tag', 0) ) : ?>
        <div class="article-tags">
            <i class="fa fa-tag"></i> <strong><?php _e('Topics:','jeg_textdomain'); ?></strong>
            <?php the_tags(''); ?>
        </div>
    <?php endif; ?>
    <div id="end-content"></div>
</section>