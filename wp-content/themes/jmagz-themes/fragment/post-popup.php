<?php
$other_post = get_next_post(true);
if(empty($other_post)) {
    $other_post = get_previous_post(true);
}

if(!empty($other_post))  :
    $imgsrc = apply_filters('jeg_get_image_attachment', null, get_post_thumbnail_id($other_post->ID), 'square-thumbnail');
?>

<section class="popup-post">
    <strong class="popup-heading"><?php _e('Up Next','jeg_textdomain'); ?></strong>
    <div class="popup-content">
        <?php if ( has_post_thumbnail($other_post->ID) ) : ?>
        <figure class="thumb">
            <a href="<?php echo get_permalink($other_post->ID); ?>"><img src="<?php echo esc_url( $imgsrc ); ?>" alt="<?php esc_attr( $other_post->post_title ) ?>"></a>
        </figure>
        <?php endif; ?>
        <h3 class="post-title"><a href="<?php echo get_permalink($other_post->ID); ?>"><?php echo esc_html( $other_post->post_title ); ?></a></h3>
    </div>
    <a href="#" class="popup-close"><i class="fa fa-close"></i></a>
</section>

<?php
    endif;
?>