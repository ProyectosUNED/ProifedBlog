<?php get_header('nosidebar'); ?>

<?php get_template_part('fragment/background-ads'); ?>
<div id="content" class="container">
    <article class="post clearfix container-404">
        <section class="article-content">
            <h3><?php _e('Sorry, but the page you were trying to view does not exist.', 'jeg_textdomain'); ?></h3>
            <hr>
            <p><?php _e('Try using our navigation or simply search it:', 'jeg_textdomain'); ?></p>
            <div class="search-404">
                <form method="get" class="search-form" action="<?php echo home_url(); ?>/">
                    <input id="s" name="s" placeholder="<?php _e('Type and Enter to Search', 'jeg_textdomain'); ?>" type="text">
                </form>
            </div>
            <p>&nbsp;</p>
        </section>
    </article>
    <?php get_template_part('fragment/archive-ads'); ?>
    <?php get_template_part('fragment/side-ads'); ?>
</div>

<?php get_footer('nosidebar'); ?>