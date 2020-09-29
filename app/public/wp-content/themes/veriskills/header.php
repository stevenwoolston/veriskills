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
    if (has_nav_menu('primary')):
?>
        <div class="nav-container">
            <nav class="navbar navbar-expand-lg">
    <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
    <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="las"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">    
    <?php
    wp_nav_menu(
        array( 
            'theme_location'  => 'primary',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'div',
            'container_class' => 'collapse navbar-collapse ml-auto',
            'container_id'    => 'bs-example-navbar-collapse-1',
            'menu_class'      => 'navbar-nav ml-auto mt-auto',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        )
    );
    ?>
                </div>
            </nav>
        </div>
<?php
    endif; 
?>
    </div>
</header>