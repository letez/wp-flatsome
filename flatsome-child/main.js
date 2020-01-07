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
			(/Mobi/.test(navigator.userAgent)) ? let = mobileAddressBar = 55 : let = mobileAddressBar = 0;
			$("section.fold-top div.flickity-viewport").css({
				'max-height': $(window).height() - $("section.fold-bottom").height() + 'px'
			})
		});
	} else {
		$("section.fold-top").css({
			'height': $(window).height() - $("section.fold-bottom").height() + 'px'
		})
	}

 	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
