<?php
$enable_mobile_ads = vp_option('joption.enable_mobile_floating_ads', 0);
if($enable_mobile_ads && wp_is_mobile()) :
    ?>
    <div id="mobile-promotion">
        <?php echo jeg_render_ads('mobile_floating_ads'); ?>
    </div>
<?php
endif;
?>