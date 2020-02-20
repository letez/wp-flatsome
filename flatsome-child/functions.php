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
