<?php
get_header();
$paged = jeg_get_query_paged();
$term = get_queried_object();

$firsttitle = __('Latest ','jeg_textdomain');
$secondtitle = __('Content','jeg_textdomain');
if(is_tag()) {
    $firsttitle = '#' . $term->name;
    $secondtitle = '';
}
?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container home-content">
    <section class="post-one-column section">
        <div class="row clearfix">
            <div class="col-md-12 section-heading-wrapper">
                <?php if($paged === 1) { ?>
                    <h3 class="archive-heading"><?php echo esc_html( $firsttitle ); ?>  <strong> <?php echo esc_html( $secondtitle ); ?></strong></h3>
                <?php } else { ?>
                    <h3 class="section-heading"><?php echo esc_html( $firsttitle ); ?>  <strong> <?php echo esc_html( $secondtitle ); ?></strong></h3>
                <?php } ?>
            </div>
            <?php


            if(have_posts()) :
                while(have_posts()) : the_post();
                    echo jeg_post_article_normal_block();
                endwhile;
            endif;
            ?>
        </div>
    </section>
    <?php
        get_template_part('fragment/archive-ads');
        global $wp_query;
        echo jeg_build_pagination($paged, $wp_query->max_num_pages);
    ?>
    <?php get_template_part('fragment/side-ads'); ?>
</div>

<?php
get_footer();
?>
