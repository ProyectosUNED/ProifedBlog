<?php
    get_header('nosidebar');
    the_post();
?>

    <?php get_template_part('fragment/background-ads'); ?>
    <div id="content" class="container">
        <article <?php post_class( 'post clearfix' ); ?>>
            <?php
                get_template_part('fragment/page-header');
                if(!vp_metabox('jmagz_page_metabox.hide_share')) {
                    get_template_part('fragment/post-social-share');
                }
            ?>

            <section class="article-content">
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

            <?php
                if(!vp_metabox('jmagz_page_metabox.hide_author_box')) {
                    get_template_part('fragment/post-author-box');
                }
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        </article>
        <?php get_template_part('fragment/side-ads'); ?>
    </div>
<?php get_footer('nosidebar'); ?>