$('#et-top-navigation .menu-item-has-children').click(function() {
	return false;
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

/*function artistVideos() {
	var children = $('.artist-videos li').length;
	var videos = $('.artist-videos li');
	if (children < 2 ) {
		videos.css('flex-basis', '100%');
	}
}*/

$(document).ready(function () {
	cptMainContentHeight();
	heroHeight();
	
	$('.artist-grid').masonry({
		itemSelector: '.grid-item',
		columnWidth: '.grid-sizer',
		gutter: '.gutter-sizer',
		percentPosition: true
	});
});

/*$(window).load(function () {
	artistVideos();
});*/

$(window).resize(function () {
	cptMainContentHeight();
	heroHeight();
});