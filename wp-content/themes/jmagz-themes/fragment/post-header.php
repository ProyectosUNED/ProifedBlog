<header class="post-header clearfix">
    <?php if(!vp_option('joption.hide_post_topbar', 0)) { ?>
    <div class="post-top-meta clearfix">
        <?php echo jeg_build_breadcrumb(); ?>
        <div class="post-date">
            <time class="post-date" itemprop="dateCreated" datetime="<?php echo get_the_time("Y-m-d H:i:s"); ?>"><?php echo get_the_time("l, F j, Y") ?></time>
            <meta itemprop="datePublished" content="<?php echo get_the_time("Y-m-d H:i:s"); ?>">
        </div>
    </div>
    <?php } ?>
    <div class="post-header-container">
        <h1 class="post-title" itemprop="name"><?php the_title(); ?></h1>
        <?php if(!vp_option('joption.hide_post_meta', false)) : ?>
            <div class="post-bottom-meta">
                <span class="post-author"><a itemprop="author" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo apply_filters('jeg_get_author_name', null); ?></a></span>
                <time class="post-date" itemprop="dateCreated" datetime="<?php echo get_the_time("Y-m-d H:i:s"); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . __(' ago', 'jeg_textdomain') ?></time>
                <?php if ( comments_open() ) {
                    $commenttype = apply_filters('jeg_comment_type', vp_option('joption.comment_type', 'wordpress'));
                    if ($commenttype === 'wordpress') {
                ?>
                        <span class="post-total-comment"><a href="#comments"><?php comments_number(__('No Comment Yet', 'jeg_textdomain'), __('1 Comment', 'jeg_textdomain'), __('% Comments', 'jeg_textdomain')); ?></a></span>
                        <meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number(); ?>"/>
                <?php
                        } else {
                            echo '<span class="post-total-comment"><a href="#comments">' . __('Comment', 'jeg_textdomain') . '</a></span>';
                        }
                    }
                ?>
            </div>
        <?php endif; ?>
    </div>
</header>