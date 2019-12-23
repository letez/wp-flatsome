<?php
// MAIN.JS, VUEjs, VUE-Loader
function main_js() {
	wp_enqueue_script('vue', 'https://unpkg.com/vue');
	wp_enqueue_script('vue-loader', 'https://unpkg.com/http-vue-loader');
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/main.js');
}
add_action('wp_footer','main_js');
// WOOCOMMERCE ADDITIONAL TAB
add_filter( 'woocommerce_product_tabs', 'bbloomer_remove_product_tabs', 98 );
function bbloomer_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}
// SMALL FOOTER
add_action('wp_footer', 'small_footer');
function small_footer(){
	$page_footer = get_post_meta( get_the_ID(), '_footer', true );
	if($page_footer == 'disabled') {
		echo do_shortcode( '[block id="footer-small"]' );
	}
}
// THEME FUNCTIONS
include "theme.php";
?>
