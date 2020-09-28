<?php
/*
@package: wwd blankslate
*/

function wwd_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'wwd_add_woocommerce_support' );

function wwd_include_font_awesome_css() {
	// Enqueue Font Awesome from a CDN.
	wp_enqueue_style( 'font-awesome-cdn', get_template_directory_uri() . '/css/line-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'wwd_include_font_awesome_css' );

// Append cart item (and cart count) to end of main menu.
function wwd_append_cart_icon( $items, $args ) {
	$cart_item_count = WC()->cart->get_cart_contents_count();
	$cart_count_span = '';
	if ( $cart_item_count ) {
		$cart_count_span = '<span class="count">'.$cart_item_count.'</span>';

        $cart_link = '<li class="woocommerce-cart-icon menu-item menu-item-type-post_type menu-item-object-page">';
        $cart_link .= '<a href="' . get_permalink( wc_get_page_id( 'cart' ) ) . '">';
        $cart_link .= '<i class="las la-shopping-cart"></i></i><span class="badge badge-secondary">';
        $cart_link .= $cart_count_span.'</span></a></li>';
        // Add the cart link to the end of the menu.
        $items = $items . $cart_link;
    }
	return $items;
}
add_filter( 'wp_nav_menu_primary_items', 'wwd_append_cart_icon', 10, 2 );