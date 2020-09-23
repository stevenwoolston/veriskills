<?php
/*
@package: wwd blankslate
*/
?>
<footer class="page-footer">
    <div class="w-75 mx-auto">
        <div class="footer-headline">
            <h3>Be recognised.</h3>
        </div>
        <div class="text-center fade-white-bg footer-form-container">
            <?php echo do_shortcode('[contact-form-7 id="36" title="Footer Form"]'); ?>
        </div>
        <div class="footer-references">
            <div class="text-center">
                <?php echo '&copy;&nbsp;', date( 'Y' ).' ', esc_html( get_bloginfo( 'name' ) ); ?>
            </div>
            <div class="text-center">
                Design by <a href="https://www.woolston.com.au" target="_blank">Woolston Web Design</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>