function popupInitiate() {
	
	if ($.cookie('popup') == 'closed') {
		$('.cookies-mc').hide();
	}
	
	else {
		setTimeout(function(){
			$('.cookies-mc').fadeIn();
		}, 5000);
	}
}

function exitPopup() {

$('.mc-popup-form .fa.fa-close').click(function() {
	$.cookie('popup','closed', { path: '/' });
	$(this).parent().parent().parent().fadeOut();
});

}

$(document).ready(function() {
	popupInitiate();
	exitPopup();
});