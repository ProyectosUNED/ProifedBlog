<?php
    get_header('nosidebar');
    the_post();
?>
    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container">
        <article <?php post_class( 'post clearfix' ); ?>>
            <header class="post-header clearfix">
                <div class="post-header-container page-header-container">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </div>
            </header>

            <section class="section">
                <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div id="pagination" class="article-pagination clearfix"><div class="pagination-number">',
                        'link_before' => '<span class="page-item">',
                        'link_after' => '</span>',
                        'after' => '</div></div>'
                    ));
                ?>
            </section>

        </article>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>
<?php get_footer('nosidebar'); ?>