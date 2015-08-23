<section class="breakingnews">
    <div class="breakingnews-carousel">
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
                    $categoryarray = get_the_category();
                    $categorytext = '';

                    $formatclass = jeg_format_post();
                    ?>
                    <div class="breakingnews-item <?php echo esc_attr($formatclass) ?>">
                        <?php echo apply_filters('jeg_featured_figure', null, 'square-thumbnail') ?>
                        <div class="content">
                            <h3 class="post-title"><a href="<?php echo get_permalink(get_the_ID()) ?>"><?php the_title(); ?></a></h3>
                            <footer class="post-meta">
                                <?php if(!empty($categoryarray)) : ?>
                                    <span class='post-category'>
                                        <a href="<?php echo get_category_link($categoryarray[0]->term_id) ?>" rel='category'><?php echo esc_html( $categoryarray[0]->name ); ?></a>
                                    </span>
                                <?php endif; ?>

                                <?php echo jeg_display_breaking_time(); ?>
                            </footer>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_postdata();
        ?>
    </div>
</section>