<?php get_header(); ?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container">
    <?php
    $term = get_queried_object();

    $category_creator = get_option('category_creator');
    $category_layout = get_option('category_layout');

    if(isset($category_creator[$term->term_id]) && !empty($category_creator[$term->term_id])) {
        get_template_part('fragment/category-builder');
    } else {
        $usedlayout =  ( isset($category_layout[$term->term_id]) && !empty($category_layout[$term->term_id]) ) ?
            $category_layout[$term->term_id] : '1';

        get_template_part('fragment/category', $usedlayout);
    }
    ?>
    <?php get_template_part('fragment/side-ads'); ?>
</div>

<?php get_footer(); ?>