<section class="author-box">
    <div class="author-image">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 180, null, apply_filters('jeg_get_author_name', null)) ?>
    </div>
    <div class="author-content">
        <h2 class="author-title"><?php _e('Author','jeg_textdomain') ?></h2>
        <h3 class="author-name">
            <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo apply_filters('jeg_get_author_name', null); ?></a>
        </h3>
        <div class="author-socials">
            <?php if ( get_the_author_meta( 'facebook' ) ): ?>
                <a href="<?php the_author_meta( 'facebook' ); ?>" class="facebook"><i class="fa fa-facebook-square"></i></a>
            <?php endif ?>
            <?php if ( get_the_author_meta( 'twitter' ) ): ?>
                <a href="<?php the_author_meta( 'twitter' ); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
            <?php endif ?>
            <?php if ( get_the_author_meta( 'google' ) ): ?>
                <a href="<?php the_author_meta( 'google' ); ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <?php endif ?>
            <?php if ( get_the_author_meta( 'linkedin' ) ): ?>
                <a href="<?php the_author_meta( 'linkedin' ); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <?php endif ?>
        </div>
        <p class="author-description">
            <?php echo get_the_author_meta('description'); ?>
        </p>
        <?php if ( get_the_author_meta('user_url') ): ?>
        <p class="author-link"><i class="fa fa-link"></i>
            <a target="_blank" href="<?php the_author_meta('user_url'); ?>"><?php the_author_meta('user_url'); ?></a>
        </p>
        <?php endif ?>
    </div>
</section>