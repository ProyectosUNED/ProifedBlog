<?php
    get_header('review');
    the_post();
?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container home-content">
    <article <?php post_class( 'post clearfix' ); ?> itemscope itemtype="http://schema.org/Review">

        <?php
        get_template_part('fragment/review-header');
        get_template_part('fragment/post-featured-header');

        if(!vp_option('joption.hide_share_bar_review', 0)) {
            get_template_part('fragment/post-social-share');
        }

        get_template_part('fragment/review-content');

        if(!vp_option('joption.hide_author_box', 0)) {
            get_template_part('fragment/post-author-box');
        }

        if(!vp_option('joption.hide_next_prev_review', 0)) {
            get_template_part('fragment/review-prev-next');
        }

        if ( comments_open() || '0' != get_comments_number() ) :
            comments_template();
        endif;
        ?>

    </article>
    <?php get_template_part('fragment/side-ads'); ?>
</div>

<?php
    get_footer();
?>