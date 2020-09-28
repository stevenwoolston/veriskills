<?php

/*
@package: wwd blankslate
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php
    $options = get_option('wwd-plugin');
    $meta_description = $options['seo']['meta_description'];

    if ( is_single() ) {
        $meta_description = $meta_description . ' ' . ($post->post_title) . ' ' . 
            preg_replace( "/\r|\n/", " ", ( strip_tags($post->post_excerpt ) ) );
    }
?>
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php endif; ?>
<?php   
    $options = get_option('wwd-plugin');
    $ga_option = $options['seo']['google_analytics_tracking_code'];

    if ( $ga_option != "" ) : ?>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga_option; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());

        gtag('config', '<?php echo $ga_option; ?>');
    </script>
<?php   endif ?>
    <title><?php
    if ( is_404() ) {
        echo "Nothing Found";
    } else if ( !is_home() ) {
        echo wp_title("-", false, "left") . " - ";
        echo bloginfo("description");
    } else {
        echo bloginfo("name") . " - " . $meta_description;
    }
?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="page-header py-1">
    <div class="nav-wrap">
<?php
    if (has_custom_logo()):
?>
        <div class="custom-logo">
            <?php the_custom_logo(); ?>
        </div>
<?php
    endif;

    if (has_nav_menu('primary')):
        //  Wordpress nav - no walker
        wp_nav_menu( 
            array(
                'theme_location' => 'primary',
                'container' => 'false',
                'menu_class' => 'nav navbar-nav flex-row ml-auto',
                'walker'          => new WP_Bootstrap_Navwalker()    
            )
        );
    endif; 
?>
    </div>
</header>