<?php
/*
@package: wwd blankslate
*/
require get_template_directory() . '/inc/theme-support.php';

function wwd_load_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', false, '3.3.1', true);

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900', array(), '1.0', 'all');
    wp_enqueue_style('icon-fonts', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '1.0.0', 'all');
    wp_enqueue_style('wwd-core-css', get_template_directory_uri() . '/css/style.min.css', array(), '1.0.4', 'all');

    wp_enqueue_script('fitvids', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.5.0', true);
    wp_enqueue_script('wwd-core-js', get_template_directory_uri() . '/js/core.min.js', array('jquery'), '1.0.4', true);
}
add_action('wp_enqueue_scripts', 'wwd_load_scripts');

function wwd_custom_post_types() {
    if (function_exists('wwd_generic_taxonomy')) {
        wwd_generic_taxonomy('builder_component', 'Component Location', 'Component Locations', 'builder-component', array('layout'));
        wwd_generic_taxonomy('faq_category', 'FAQ Header', 'FAQ Headers', 'faq-category', array('faq'));
    }

    if (function_exists('wwd_add_custom_post')) {
        wwd_add_custom_post('layout', 'Layout Builder', 'Layout Builders', 'dashicons-book-alt', array('post'));
        wwd_add_custom_post('faq', 'FAQ', 'FAQs', 'dashicons-book-alt', array('post'));
    }
}
add_action('init', 'wwd_custom_post_types');

function wwd_search_filter($query) {

    if (is_admin() || !$query->is_main_query()) { return $query; }

    global $wp_post_types;
    $wp_post_types['layout']->exclude_from_search = true;

    $meta_query = [];

    if ($query->is_archive) {
        // var_dump($query);

        if (isset($query->query['post_type']) && $query->query['post_type'] == 'faq') {
                $query->set('order', 'ASC');
                $query->set('orderby', 'menu_order');
                $query->set('posts_per_page', -1);
        }

    }

    $query->set('meta_query', $meta_query);
    return $query;
}
add_action('pre_get_posts', 'wwd_search_filter');