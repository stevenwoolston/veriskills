<?php
/*
@package: wwd blankslate
*/
?>
<footer class="page-footer">
    <div class="w-75 mx-auto">
        <div class="footer-headline">
<?php
    echo is_front_page() ? '<h3>Are you ready to be recognised?</h3>' : '<h3>Be recognised.</h3>';
?>
            <div class="contact-container">
                <div>
                    <i class="las la-phone"></i>
                    <a href="tel:0738581230">07 3858 1230</a>
                </div>
                <div>
                    <i class="las la-envelope"></i>
                    <a href="mailto:info@veriskills.com">info@veriskills.com</a>
                </div>
            </div>
        </div>
        <div class="text-center fade-white-bg footer-form-container">
<?php 
    echo is_front_page() ? do_shortcode('[contact-form-7 id="223" title="Contact Us"]') : 
        do_shortcode('[contact-form-7 id="36" title="Footer Form"]'); 
?>
        </div>
        <div class="footer-references">
            <div class="text-center">
                <span class="mr-2"><?php echo '&copy;&nbsp;', date( 'Y' ).' ', esc_html( get_bloginfo( 'name' ) ); ?></span>
                |
                <a class="ml-2" href='<?php echo get_site_url() ."/privacy-policy"; ?>'>Privacy Policy</a>
            </div>
            <div class="text-center">
                Design by <a href="https://www.focusedmarketing.com.au" target="_blank">Focused Marketing</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>