$('#et-top-navigation li.menu-item-has-children').on('click touchstart', function () {
	$(this).children('.sub-menu').slideToggle();
	$(this).toggleClass('switch');
});

$('#et-top-navigation .menu-item-has-children').css('cursor', 'pointer');

$('#et-top-navigation .sub-menu li').on('click touchstart', function (e) {
	e.stopPropagation();
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