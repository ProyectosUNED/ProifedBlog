<?php
    get_header();
    the_post();
?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container">
    <article <?php post_class( 'clearfix' ); ?> itemscope itemtype="http://schema.org/article">
        <?php
            get_template_part('fragment/post-header');
            get_template_part('fragment/post-featured-header');

            if(!vp_option('joption.hide_share_bar', 0)) {
                get_template_part('fragment/post-social-share');
            }

            get_template_part('fragment/post-content');

            if(!vp_option('joption.hide_author_box', 0)) {
                get_template_part('fragment/post-author-box');
            }

            if(!vp_option('joption.hide_post_popup', 0)) {
                get_template_part('fragment/post-popup');
            }

            if(!vp_option('joption.hide_next_prev_post', 0)) {
                get_template_part('fragment/post-prevnext');
            }

            if(!vp_option('joption.hide_related_post_bottom', 0)) {
                get_template_part('fragment/post-related');
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
