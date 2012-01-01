$(document).ready(function () {
	
	// gère les actions des différents formulaires
	action_forms();
	
	dropdown_menu();
	footer_actions();
	
	// effectue les actions sur les citations (quote.js)
	quote_actions();
	
	// effectue les actions sur les commentaires (comment.js)
	comment_actions();
	
	// s'occupe du slider des commentaires (comment_slider.js)
	comment_slider();
	
	// génère les fancyboxes (fancybox.js)
	set_fancyboxes(rel_to_root);
	
	// crée le feedback et les liens sur lui (contactable.js)
	setContactable(rel_to_root);
	
	// formate et vérifie les formulaires (form_verification.js)
	FV_Form_Verification('');
	fill_forms();
	
	// affiche le formulaire d'envoi pour une nouvelle sélection (selection.js)
	selection_actions();
	
	// catch ajax errors
	$('#info').ajaxError(function(e, jqxhr, settings, exception) {
		displayInfo('debug', '<br/>'+s_ajax.error.def+'<br/>Error :<br/><br/>'+settings.url+'<br/><br/>'+jqxhr.responseText+'<br/>');
	});
});