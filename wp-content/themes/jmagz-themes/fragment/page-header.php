<header class="post-header clearfix">
    <?php
        if(!vp_metabox('jmagz_page_metabox.hide_breadcrumb')) {
    ?>
        <div class="post-top-meta clearfix">
            <?php echo jeg_build_page_breadcrumb(); ?>
        </div>
    <?php
        }
    ?>
    <div class="post-header-container page-header-container">
        <h1 class="post-title"><?php the_title(); ?></h1>
    </div>
</header>