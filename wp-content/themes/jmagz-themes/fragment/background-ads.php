<?php
$backgroundads = vp_option('joption.enable_background_ads');
$backgroundurl = vp_option('joption.background_ads_url');
$opennewtab = vp_option('joption.background_ads_new_tab') ? "target='_blank'" : "";

if($backgroundads) {
?>
    <a style="width: 100%; position: absolute; top: 0; right: 0; bottom: 0; left: 0;" href="<?php echo esc_url($backgroundurl); ?>" <?php echo esc_attr($opennewtab); ?> class="background-ads"></a>
<?php
}
