<?php
get_header();
$paged = jeg_get_query_paged();
?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container home-content">
    <section class="post-one-column section">
        <div class="row clearfix">
            <div class="col-md-12 section-heading-wrapper">
                <?php if($paged === 1) { ?>
                    <h3 class="archive-heading"><?php _e('Search for ','jeg_textdomain'); ?>  <strong> <?php echo '"'. get_search_query() .'"' ?></strong></h3>
                <?php } ?>
            </div>
            <?php

            $statement = array(
                's'                     => get_search_query(),
                'post_type'             => array('post','review'),
                'post_status'			=> array('publish'),
                'orderby'				=> 'date',
                'order'					=> 'DESC',
                'posts_per_page'        => vp_option('joption.search_result_number', 10),
                'paged'                 => $paged
            );

            $posttypeoption = vp_option('joption.search_type', 'onlypost');
            if($posttypeoption === 'onlypost') {
                $statement['post_type'] = 'post';
            }

            $query = new WP_Query($statement);
            if($query->have_posts()) :
                while($query->have_posts()) : $query->the_post();
                    if(get_post_type() === 'review') {
                        echo jeg_review_article_normal_block();
                    } else if(get_post_type() === 'post') {
                        echo jeg_post_article_normal_block();
                    }
                endwhile;
            else :
                echo "<div class='no-result col-md-12 section-heading-wrapper'><span>" . __('No Result', 'jeg_textdomain') . "</span></div>";
            endif;
            ?>
        </div>
    </section>
    <?php get_template_part('fragment/archive-ads'); ?>
    <?php echo jeg_build_pagination($paged, $query->max_num_pages); ?>
    <?php get_template_part('fragment/side-ads'); ?>
</div>

<?php
get_footer();
?>
