$('#et-top-navigation .menu-item-has-children').click(function() {
	$(this).children('.sub-menu').slideToggle();
	$(this).toggleClass('switch');
});

$('.google-map').css(
	'height', $('.google-map').parent().outerHeight()
);

function cptMainContentHeight() {
	$('.single #main-content').css(
		'padding-top', $('.sticky-bar').height()
	);
}

function heroHeight() {
	$('#hero, .et_pb_gallery_fullwidth .et_pb_gallery_image img').height($(window).height());
}

$(document).ready(function () {
	cptMainContentHeight();
	heroHeight();
});

$(window).resize(function () {
	cptMainContentHeight();
	heroHeight();
});