<?php

if ( post_password_required() )
    return;

$featured_img = wp_get_attachment_url( get_post_thumbnail_id());
?>
<section class="article-sharer section container clearfix">
    <div class="socials-share">
        <a target="_blank" data-shareto="Facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo wp_get_shortlink() ?>" class="social-share share-facebook">
            <i class="fa fa-facebook"></i><span class="share-text">Compartir en Facebook</span>
        </a>
        <a target="_blank" data-shareto="Twitter" href="https://twitter.com/home?status=<?php echo urlencode(__('Check this awesome article : ','jeg_textdomain') . esc_url( wp_get_shortlink() )); ?>" class="social-share share-twitter">
            <i class="fa fa-twitter"></i><span class="share-text">Compartir en Twitter</span>
        </a>
        <a target="_blank" data-shareto="Google" href="https://plus.google.com/share?url=<?php echo wp_get_shortlink() ?>" class="social-share share-google-plus">
            <i class="fa fa-google-plus"></i>
        </a>
        <a target="_blank" data-shareto="Pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo wp_get_shortlink() ?>&amp;media=<?php echo esc_url( $featured_img ); ?>&amp;description=<?php urlencode(esc_url( get_the_title() )); ?>" class="social-share share-pinterest">
            <i class="fa fa-pinterest"></i>
        </a>
        <a target="_blank" data-shareto="Linked In" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo wp_get_shortlink() ?>&amp;title=<?php urlencode(esc_url( get_the_title() )) ?>&amp;summary=<?php echo urlencode( wp_strip_all_tags( get_the_excerpt() )) ?>&amp;source=<?php urlencode( esc_url( get_bloginfo( 'name' ) ) ) ?>" class="social-share share-linkedin">
            <i class="fa fa-linkedin"></i>
        </a>
    </div>
    <div class="article-shorturl">
        <input type="text" id="shorturl" class="shorturl" data-clipboard-text="<?php echo wp_get_shortlink() ?>" value="<?php echo wp_get_shortlink() ?>">
    </div>
</section>
<div class="dummy-share-block"></div>