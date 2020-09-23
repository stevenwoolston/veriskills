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
add_action('admin_enqueue_scripts', 'tm_theme_add_editor_styles');

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

function wwd_posted_meta() {
    $posted_on = human_time_diff( get_the_time('U'), current_time('timestamp') );
    $categories = get_the_category();
    $separator = ", ";
    $output = '';
    $i = 1;

    if (!empty($categories)) {
        foreach($categories as $category) {
            if ($i > 1) { $output .= $separator; }
            $output .= '<a href="'. esc_url(get_category_link($category->term_id)) . '" alt="'. esc_attr('View all posts in %s', $category->name) . '">' . esc_html($category->name) .'</a>';
            $i++;
        }
    }
    return '<span class="posted-on">Posted <a href="'. esc_url(get_permalink()) .'">' . $posted_on . '</a> ago</span> &nbsp;&raquo;&nbsp; <span class="posted-in">'. $output .'</span>';
}



add_action('admin_menu', 'add_appearance_menu');    
function add_appearance_menu() {
    add_submenu_page( 'themes.php', 'Custom Stylesheet', 'Custom Stylesheet', 'manage_options', 'customstyle', '__return_null'); 
}

//  DO NOT TURN THIS ON FOR JUST ANYONE
//add_action( 'load-appearance_page_customstyle', 'custom_redirect' );
function custom_redirect() {
    if ( 'customstyle' === filter_input( INPUT_GET, 'page' ) ) {
        $file2edit = "customstyles.css"; // change this to your needs
        $location = get_admin_url().'theme-editor.php?file='.$file2edit.'&theme='. get_stylesheet().'&scrollto=0';
        wp_redirect( $location, 301);
        exit();
    }
}

//  Special methods for adding dashboard videos.
function wwd_dashboard_videos()
{
    $videos = array(
        array(
            'url' => 'https://res.cloudinary.com/woolston-web-design/video/upload/v1593785366/focussed_marketing/lacuna-editing-navigating.mp4', 
            'title' => '04/07/2020: Editing Layout Content'
        ),
        array(
            'url' => 'https://res.cloudinary.com/woolston-web-design/video/upload/v1593083090/focussed_marketing/lacuna.mp4', 
            'title' => 'Development Methodology'
        )
    );
    if (function_exists('wwd_render_videos') && count($videos) > 0) {
        echo wwd_render_videos($videos);
    } else {
        echo "<h2>No videos at this time</h2>";
    }
}    
