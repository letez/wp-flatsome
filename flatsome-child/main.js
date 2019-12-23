( function() {

	let component_path = '/../wp-content/themes/flatsome-child/components/';

	new Vue({
		el: document.querySelector('#app'),
        components: {
			'my-component-name': window.httpVueLoader(component_path + 'component.vue')
	  }
	});
})
(Vue);

(function($) {
	$("section.fold-master").css({
		'min-height': window.innerHeight - $("section.fold-slider").height() + 'px'
	});
	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
