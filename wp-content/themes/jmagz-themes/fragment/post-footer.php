<!-- FOOTER -->
<footer id="footer">
    <div id="footer-content" class="container clearfix">
        <?php
        $footerlayout = vp_option('joption.footer_layout', 'footer_layout_1');
        switch($footerlayout) {
            case 'footer_layout_1':
            ?>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </aside>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </aside>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </aside>
            <?php
                break;
            case 'footer_layout_2':
            ?>
                <aside class="col-md-8 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </aside>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </aside>
            <?php
                break;
            case 'footer_layout_3':
            ?>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </aside>
                <aside class="col-md-8 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </aside>
            <?php
                break;
            case 'footer_layout_4':
            ?>
                <aside class="col-md-12 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </aside>
            <?php
                break;
            case 'footer_layout_5':
            ?>
                <aside class="col-md-5 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_1); ?> </aside>
                <aside class="col-md-2 col-md-offset-1 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_2); ?> </aside>
                <aside class="col-md-4 column"> <?php dynamic_sidebar(JEG_FOOTER_WIDGET_3); ?> </aside>
            <?php
                break;
            default :
                break;
        }
        ?>
    </div>
    <!-- /.footer-wrapper -->

    <div class="footer-bottom container center" >
        <?php jeg_bottom_navigation(); ?>
        <p class="copyright"><?php echo vp_option('joption.footer_copyright'); ?></p>
    </div>
    <!-- /.footer-bottom -->
</footer>
<!-- /#footer -->