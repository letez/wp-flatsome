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
			console.log($(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px');
			$("section.fold-top").css({
				'padding-top': topBarHeight + 'px',
				'height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px !important'
			})
			$("section.fold-top div.flickity-viewport").css({
				'height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px'
			}).find('div.banner').css({
				'min-height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px'
			})
		});
	} else if($("section.fold-top").find("div.banner").length !== 0)  {
		$("section.fold-top div.banner-layers").ready( () => {
			($("#top-bar").length !== 0) ? topBarHeight = $("#top-bar").height() : topBarHeight = 0;
			$("section.fold-top").css({
				'padding-top': topBarHeight + 'px',
				'height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px !important'
			}).find("div.banner").css({
				'height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px'
			})
		});
	} else {
		$("section.fold-top").css({
			'height': $(window).height() - $("section.fold-bottom").height() - topBarHeight + 'px !important'
		})
	};

	// MainMenu DropDown Fix
	$('li.has-dropdown').hover(function(){
		$(this).find('ul.nav-dropdown').each(function(){
			if($(this).find('.sub-menu').length >= 1){
				let width = null;
				$(this).find("ul").each(function(){
					if($(this).find(".row").css('max-width')){
						width += parseInt($(this).find(".row").css('max-width'),10);
					} else {
						width += $(this).width();
					}
				})
				$(this).css({
					'width': width + 40,
					'flex-direction': 'row'
				});
			} else {
				$(this).css({
					'flex-direction': 'column'
				});
			}
		})
	});


	// WooCommerce Message Box
	// $('[class*="woocommerce-"] [role="alert"]').css({
	// 	'bottom': '0'
	// }).delay(6000).queue(function (next) {
    // 	$(this).css({
	// 		'bottom': '-50%'
	// 	})
    // 	next();
  	// });
	// Mobile
 	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
