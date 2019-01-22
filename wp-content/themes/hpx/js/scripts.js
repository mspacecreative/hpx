$('.menu-item-has-children').click(function() {
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

$(document).ready(function () {
	cptMainContentHeight();
});

$(window).resize(function () {
	cptMainContentHeight();
});