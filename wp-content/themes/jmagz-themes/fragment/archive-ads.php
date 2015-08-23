<?php
    $enableads = vp_option('joption.enable_archive_bottom_ads', 0);
    if($enableads) :
?>
    <section id="inside-ads" class="section">
        <?php echo jeg_render_ads('archive_bottom_ads') ?>
    </section>
<?php
    endif;
?>