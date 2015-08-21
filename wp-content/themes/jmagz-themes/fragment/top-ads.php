<?php
    $enable_top_ads = vp_option('joption.enable_top_wrapper_ads', 0);
    if($enable_top_ads) :
?>
    <div id="top-promotion">
        <?php echo jeg_render_ads('top_wrapper_ads'); ?>
    </div>
<?php
    endif;
?>