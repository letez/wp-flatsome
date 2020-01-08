( function() {
	let component_path = '/../wp-content/themes/flatsome-child/components/';

	new Vue({
		el: document.querySelector('#app'),
		mounted () {},
        components: {
			'customizer': window.httpVueLoader(component_path + 'customizer.vue')
	  }
	});
})
(Vue);

(function($) {
	// Above Fold Section Heights - Slider support
	if($("section.fold-top").find("div.slider").length !== 0) {

		$("section.fold-top div.flickity-viewport").ready( () => {
			// (/Mobi/.test(navigator.userAgent)) ? mobileAddressBar = 55 : mobileAddressBar = 0;
			($("#top-bar").length !== 0) ? topBarHeight = $("#top-bar").height() : topBarHeight = 0;
			$("section.fold-top").css({
				'padding-top': topBarHeight + 'px'
			})
			$("section.fold-top div.flickity-viewport").css({
				'max-height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px'
			}).find('div.banner').css({
				'max-height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px'
			})
		});
	} else {
		$("section.fold-top").css({
			'height': $(window).height() - $("section.fold-bottom").height() + 'px'
		})
	}
	// WooCommerce Message Box
	$('[class*="woocommerce-"] [role="alert"]').css({
		'bottom': '0'
	}).delay(6000).queue(function (next) {
    	$(this).css({
			'bottom': '-50%'
		})
    	next();
  	});
	// Mobile
 	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
