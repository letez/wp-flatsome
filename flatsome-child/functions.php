<?php
// ENQUEUE WP SCRIPTS
function enqueueScripts($hook) {
    // CSS
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() .'/flatsome.min.css', array(), '1.1', 'all');
	wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() .'/theme.min.css', array(), '1.1', 'all');
    // JAVASCRIPT
    if(!$_GET['uxb_iframe']) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), null, true);
    }
}
add_action( 'wp_enqueue_scripts', 'enqueueScripts', 1000);

// MAIN.JS, VUEjs, VUE-Loader
function main_js() {
	// wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js');
	wp_enqueue_script('vue-min', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js', array(), null, true);
	wp_enqueue_script('vue-loader', 'https://cdn.jsdelivr.net/npm/http-vue-loader@1.4.1/src/httpVueLoader.min.js', array(), null, true);
	wp_enqueue_script('axios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js', array(), null, true);
	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/main.js', array(), null, true);
}
add_action('wp_footer','main_js');

// WOOCOMMERCE ADDITIONAL TAB
function removeProductTabs( $tabs ) {
    unset( $tabs['additional_information'] );
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'removeProductTabs', 98 );

// WOOCOMMERCE SHOP BANNER
function addShopBnner() {
	$args = array(
      'name' => 'shop-banner',
      'post_type' => 'blocks',
      'post_status' => 'publish'
    );
	if(get_posts($args)) {
		echo do_shortcode( '[block id="shop-banner"]' );
	}
}
add_action( 'woocommerce_before_shop_loop', 'addShopBnner', 10 );
add_action( 'woocommerce_before_cart', 'addShopBnner', 10 );
add_action( 'woocommerce_before_checkout_form', 'addShopBnner', 10 );

// WOOCOMMERCE CUSTOM ORDER COMPLETE PAGE
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
add_action( 'woocommerce_thankyou_order_received_text', 'customOrderComplete' );

// SMALL FOOTER
function addSmallFooter(){
	$page_footer = get_post_meta( get_the_ID(), '_footer', true );
	if($page_footer == 'disabled') {
		echo do_shortcode( '[block id="footer-small"]' );
	}
}
add_action('wp_footer', 'addSmallFooter');

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
