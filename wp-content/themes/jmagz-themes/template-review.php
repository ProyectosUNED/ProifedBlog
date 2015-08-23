<?php
/**
Template Name: Review Page
 */
get_header('review');
?>
    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container home-content">
        <?php
            get_template_part('fragment/review-search-header');
            if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'search') {
                get_template_part('fragment/review-search-result');
            } else {
                $reviewlayout = vp_metabox('jmagz_review.review_layout');
                get_template_part('fragment/layout', $reviewlayout);
            }
        ?>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>
<?php
get_footer();
?>