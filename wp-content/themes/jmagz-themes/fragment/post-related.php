<?php

    if ( has_category() ) :
        $categories = get_the_category();
        $category_ids = array();
        foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;

        $args = array(
            'category__in'        => $category_ids,
            'showposts'           => 6,
            'ignore_sticky_posts' => 1,
            'post__not_in'        => array(get_the_ID())
        );

        // The Query
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
?>

<section id="related-post" class="post-three-columns post-columns section">
    <div class="row clearfix">

        <div class="col-md-12 section-heading-wrapper">
            <h3 class="section-heading"><?php _e('Related','jeg_textdomain'); ?> <strong><?php _e('Posts','jeg_textdomain'); ?></strong></h3>
        </div>
    </div>

        <?php
            $index = 1;
            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                if(($index - 1) % 3 === 0) {
                    echo '<div class="row clearfix relatedfix">';
                }
        ?>

        <div class="col-md-4">
            <article class="post-list">
                <?php echo apply_filters('jeg_featured_figure_lazy', null, 'half-post-featured'); ?>
                <header class="content">
                    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                    <div class="post-meta">
                        <span class="post-author"><?php _e('By','jeg_textdomain'); ?>
                            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?php echo apply_filters('jeg_get_author_name', null); ?></a>
                        </span>
                        <time class="post-date" datetime="<?php echo get_the_time("Y-m-d H:i:s"); ?>">
                            <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain'); ?>
                        </time>
                    </div>
                </header>
            </article>
        </div>
        <?php
                if($index % 3 === 0) echo "</div> <!-- related fix -->";
            $index++;
            endwhile;
            if( ( $index - 1 ) % 3 !== 0 ) echo "</div>";
        ?>

</section>

<?php
        endif;
        wp_reset_postdata();
    endif;
?>