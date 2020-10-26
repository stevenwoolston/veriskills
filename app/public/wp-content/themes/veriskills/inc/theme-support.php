<?php

/*
@package: wwd blankslate
*/

add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_post_type_support('layout', 'thumbnail');
add_image_size('medium_large', 600, 600);
add_filter( 'widget_text', 'do_shortcode' );

function tm_theme_add_editor_styles() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/css/style.min.css', false, '1.0.0' );
}
// add_action('admin_enqueue_scripts', 'tm_theme_add_editor_styles');

function wwd_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'wwd_custom_logo_setup' );