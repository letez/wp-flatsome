<?php
// MAIN.JS, VUEjs, VUE-Loader
function main_js() {
	wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
	wp_enqueue_script('vue-loader', 'https://cdn.jsdelivr.net/npm/http-vue-loader@1.4.1/src/httpVueLoader.min.js');
	wp_enqueue_script('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js');
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
