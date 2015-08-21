<section class="prevnext-post">

    <?php
    $prev_post = get_previous_review();
    if (empty( $prev_post )) $prev_post = 0;
    $prev_post = $prev_post[0];
    ?>
    <a href="<?php echo get_permalink($prev_post->ID) ?>" class="post prev-post">
        <?php if (!empty( $prev_post )): ?>
            <span class="caption"><?php _e('Prev Post', 'jeg_textdomain'); ?></span>
            <h3 class="post-title"><?php echo esc_html( $prev_post->post_title ) ?></h3>
        <?php endif; ?>
    </a>

    <?php
    $next_post = get_next_review();
    if (empty( $next_post )) $next_post = 0;
    $next_post = $next_post[0];
    ?>
    <a href="<?php echo get_permalink($next_post->ID) ?>" class="post next-post">
        <?php if (!empty( $next_post )): ?>
            <span class="caption"><?php _e('Next post', 'jeg_textdomain'); ?></span>
            <h3 class="post-title"><?php echo esc_html( $next_post->post_title ) ?></h3>
        <?php endif; ?>
    </a>
</section>