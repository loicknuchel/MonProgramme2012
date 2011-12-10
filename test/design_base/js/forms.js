$(document).ready(function () {
	
	// UI : show more datas
	$('.more_datas').css('display','none');
	$('.show_more_datas').toggle(
		function() {$(this).parent().find('.more_datas').slideDown(300); $(this).addClass('visible');},
		function() {$(this).parent().find('.more_datas').slideUp(300); $(this).removeClass('visible');}
	);
	
});
