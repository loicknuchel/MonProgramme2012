$(document).ready(function () {
	
	// UI : show options quote
	$('.quote .quote_header .options').hover(
		function() { $(this).find("ul").slideDown('fast'); $(this).addClass("selected"); }, 
		function() { $(this).find("ul").slideUp('fast'); $(this).removeClass("selected"); }
	);
	
	// UI : toggle meta infos
	$('.quote_footer .more').toggle(
		function(event){ $(this).parents('.quote').find('.quote_expand').slideDown(); $(this).find('a').html('[ - ]'); },
		function(event){ $(this).parents('.quote').find('.quote_expand').slideUp(); $(this).find('a').html('[ + ]'); }
	);
	
});
