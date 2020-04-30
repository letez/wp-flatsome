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
	// Above the Fold Section - Slider / Banner Support (.fold-top, .fold-bottom)
	if($("section.fold-top").find("div.slider").length !== 0) {
		$("section.fold-top div.flickity-viewport").ready( () => {

			let topBarHeight = ($("header #top-bar").length !== 0) ? $("header #top-bar").height() : 0;
			let foldBottomHeight =  ($("section.fold-bottom").length !== 0) ? $("section.fold-bottom").height() : 0;
			let clientHeight = $(window).height();
			let foldTopHeight = clientHeight - foldBottomHeight - topBarHeight;

			$("section.fold-top").css({
				'padding-top': topBarHeight + 'px',
				'height': foldTopHeight + topBarHeight + 'px'
			}).find(".section-content").css({
				'max-height': foldTopHeight + 'px'
			}).find("div.flickity-viewport").css({
				'height': foldTopHeight + 'px'
			}).find('div.banner').css({
				'max-height': foldTopHeight + 'px'
			});

		});
	} else if($("section.fold-top").find("div.banner").length !== 0)  {
		$("section.fold-top div.banner-layers").ready( () => {

			let topBarHeight = ($("header #top-bar").length !== 0) ? $("header #top-bar").height() : 0;
			let foldBottomHeight =  ($("section.fold-bottom").length !== 0) ? $("section.fold-bottom").height() : 0;
			let clientHeight = $(window).height();
			let foldTopHeight = clientHeight - foldBottomHeight - topBarHeight;

			$("section.fold-top").css({
				'padding-top': topBarHeight + 'px',
				'height': foldTopHeight + topBarHeight + 'px'
			}).find("div.banner").css({
				'min-height': foldTopHeight + 'px'
			});

		});
	} else {

		let topBarHeight = ($("header #top-bar").length !== 0) ? $("header #top-bar").height() : 0;
		let foldBottomHeight =  ($("section.fold-bottom").length !== 0) ? $("section.fold-bottom").height() : 0;
		let clientHeight = $(window).height();
		let foldTopHeight = clientHeight - foldBottomHeight - topBarHeight;

		$("section.fold-top").css({
			'height': foldTopHeight + topBarHeight + 'px'
		});
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
})( jQuery );
