(function($) {
	$("section.fold-master").css({
		'min-height': window.innerHeight - $("section.fold-slider").height() + 'px'
	});
	if (/Mobi/.test(navigator.userAgent)) {

	}
})( jQuery );
