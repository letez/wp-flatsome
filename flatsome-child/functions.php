<?php
// ENQUEUE WP SCRIPTS
function enqueueScripts() {
	wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() .'/theme.css', array(), '1.1', 'all');
}
add_action( 'wp_enqueue_scripts', 'enqueueScripts');
// MAIN.JS, VUEjs, VUE-Loader
function main_js() {
	wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
	wp_enqueue_script('vue-loader', 'https://cdn.jsdelivr.net/npm/http-vue-loader@1.4.1/src/httpVueLoader.min.js');
	wp_enqueue_script('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js');
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/main.js');
}
add_action('wp_footer','main_js');
// WOOCOMMERCE ADDITIONAL TAB
function removeProductTabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'removeProductTabs', 98 );
// WOOCOMMERCE SHOP BANNER
add_action( 'woocommerce_before_shop_loop', 'addShopBnner', 10 );
add_action( 'woocommerce_before_cart', 'addShopBnner', 10 );
add_action( 'woocommerce_before_checkout_form', 'addShopBnner', 10 );
function addShopBnner() {
	$args = array(
      'name' => 'shop-banner',
      'post_type' => 'blocks',
      'post_status' => 'publish'
    );
	if(get_posts($args)) {
		echo do_shortcode( '[block id="shop-banner"]' );
	}
};
// WOOCOMMERCE CUSTOM ORDER COMPLETE PAGE
add_action( 'woocommerce_thankyou_order_received_text', 'customOrderComplete' );
function customOrderComplete() {
	$args = array(
      'name' => 'order-complete',
      'post_type' => 'blocks',
      'post_status' => 'publish'
    );
	if(get_posts($args)) {
		echo do_shortcode( '[block id="order-complete"]' );
	} else { echo("Thank you. Your order has been received."); }
}
// SMALL FOOTER
add_action('wp_footer', 'addSmallFooter');
function addSmallFooter(){
	$page_footer = get_post_meta( get_the_ID(), '_footer', true );
	if($page_footer == 'disabled') {
		echo do_shortcode( '[block id="footer-small"]' );
	}
}
// OPEN GRAPH META TAGS
function fbogmeta_header() {
    // if (is_single()) {
        $postsubtitrare = get_post_meta($post->ID, 'id-subtitrare', true);
        $post_subtitrare = get_post($postsubtitrare);
        $content = limit(strip_tags($post_subtitrare-> post_content),297);
        ?>
        <meta property="og:title" content="<?php bloginfo('name'); ?>"/>
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:url" content="<?php the_permalink(); ?>"/>
        <?php $fb_image = wp_get_attachment_image_src(get_post_thumbnail_id(     get_the_ID() ), 'thumbnail'); ?>
        <?php if ($fb_image) : ?>
        <meta property="og:image" content="<?php echo $fb_image[0]; ?>" />
        <?php endif; ?>
        <meta property="og:type" content="<?php
        if (is_single() || is_page()) { echo "article"; } else { echo "website";}     ?>"
        />
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
        <?php
        // }
}
add_action('wp_head', 'fbogmeta_header');

//function to limit description to 300 characters
function limit($var, $limit) {
    if ( strlen($var) > $limit ) {
        return substr($var, 0, $limit) . '...';
    }
    else {
        return $var;
    }
}

// THEME FUNCTIONS
include "theme.php";
?>
