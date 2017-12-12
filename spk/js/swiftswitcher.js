$(document).ready(function() {

	$('ul#navigation li').click(function() {
		var number = $(this).index();
		$('.sec').hide().eq(number).show();
		$(this).toggleClass('active inactive');
		$('ul#navigation li').not(this).removeClass('active').addClass('inactive');
	});

	$('.sec').not(':first').hide();


});