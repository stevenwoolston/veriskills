<?php
/*
@package: wwd blankslate
*/
?>
<footer class="page-footer container-fluid">
    <div class="row mb-2 by-line">
        <div class="col">
        <?php
    if (has_custom_logo()):
?>
            <div class="footer-logo text-center">
        <?php the_custom_logo(); ?>
            </div>
<?php endif ?>
        </div>
    </div>
    <div class="row">
        <div class="col office-locations fade-white-bg">
            <h2>Contact Us</h3>
            <ul>
                <li>
                    <h5><i class="las la-map-marker"></i>Caboolture</h5>
                </li>
            </ul>

            <div class="socials">
                <ul>
                    <li><h5>Find Us On</h5></li>
                    <li>
                        <a href="https://www.facebook.com">
                            <i class="lab la-facebook"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col fade-white-bg">
            <?php echo do_shortcode('[wpforms id="90"]'); ?>
        </div>
    </div>
    <div class="row footer-references">
        <div class="col text-center">
            <?php echo '&copy;&nbsp;', date( 'Y' ).' ', esc_html( get_bloginfo( 'name' ) ); ?>
        </div>
        <div class="col text-center">
            Design by <a href="https://www.woolston.com.au" target="_blank">Woolston Web Design</a>
        </div>
    </div>
    <div class="row footer-references">
        <div class="col text-center">
            <small>&copy; <?php esc_html(get_bloginfo('name')) ?></small>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>