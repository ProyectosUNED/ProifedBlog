<?php
    get_header();
    $authorurl = get_author_posts_url(get_the_author_meta('ID'));
?>

    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container home-content">
        <?php get_template_part('fragment/post-author-box'); ?>
        <section class="archive-tabs section">
            <div class="archive-tabs-header">
                <ul>
                    <li class="<?php echo !isset($_REQUEST['action']) || empty($_REQUEST['action']) ? "active" : ""; ?>">
                        <a href="<?php echo esc_url( $authorurl ); ?>"><?php _e('Posts', 'jeg_textdomain'); ?></a>
                    </li>
                    <li class="<?php echo isset($_REQUEST['action']) && $_REQUEST['action'] === 'review' ? "active" : ""; ?>">
                        <a href="<?php echo add_query_arg(array('action' => 'review'), $authorurl); ?>"><?php _e('Reviews', 'jeg_textdomain'); ?></a>
                    </li>
                </ul>
            </div>
        </section>

        <?php
            if(isset($_REQUEST['action']) && $_REQUEST['action'] === 'review') {
                get_template_part('fragment/author-review');
            } else {
                get_template_part('fragment/author-post');
            }
        ?>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>

<?php get_footer(); ?>