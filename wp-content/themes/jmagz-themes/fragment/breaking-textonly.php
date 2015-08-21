<section class="breakingnews">
    <div class="breakingnews-marquee">
        <strong class="breakingnews-heading"><i class="fa fa-bookmark-o"></i> <?php _e('BREAKING', 'jeg_textdomain'); ?></strong>
        <ul>
            <?php
            $statement = array(
                'post_type'				=> "post",
                'orderby'				=> "date",
                'order'					=> "DESC",
                'posts_per_page'		=> vp_option('joption.breaking_post_number')
            );

            $filter = vp_option('joption.breaking_filter_type');
            $filter_rule = vp_option('joption.breaking_filter_rule');

            if($filter === 'category')
            {
                if($filter_rule === 'include') {
                    $statement['category__in'] = vp_option('joption.breaking_filter_category');
                } else {
                    $statement['category__not_in'] = vp_option('joption.breaking_filter_category');
                }
            } else if($filter === 'tags')
            {
                if($filter_rule === 'include') {
                    $statement['tag__in'] = vp_option('joption.breaking_filter_tags');
                } else {
                    $statement['tag__not_in'] = vp_option('joption.breaking_filter_tags');
                }
            }

            $query = new WP_Query($statement);
            if ( $query->have_posts() ) {
                while ( $query->have_posts() )
                {
                    $query->the_post();
                ?>
                    <li>
                        <?php echo jeg_display_breaking_time(); ?>
                        <a href="<?php echo get_permalink(get_the_ID()); ?>"><?php the_title(); ?></a>
                    </li>
                <?php
                }
            }
            wp_reset_postdata();
            ?>
        </ul>
    </div>
</section>