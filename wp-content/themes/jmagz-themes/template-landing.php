<?php
/**
Template Name: Landing Page
 */
    get_header();
    the_post();
?>
    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container home-content">
        <?php the_content(); ?>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>
<?php
    get_footer();
?>