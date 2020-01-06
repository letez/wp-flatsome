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
	$("section.fold-top").css({
		'min-height': window.innerHeight - $("section.fold-bottom").height() + 'px'
	});
	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
