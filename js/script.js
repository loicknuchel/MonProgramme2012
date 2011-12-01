$(document).ready(function () {
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
	$('.new_selection a').click(function(){
		show_selection_form($(this).parent(), meth);
		return false;
	});
	
	// toggle les informations facultatives lors de l'envoi d'une citation
	toggleBlock('.new_quote .show_facultative_data a', '.new_quote .facultative_data', s_form.new_quote.show_facultative_fields, s_form.new_quote.hide_facultative_fields, function(){}, function(){});
	
	// catch ajax errors
	$('#info').ajaxError(function(e, jqxhr, settings, exception) {
		displayInfo('debug', s_ajax.error.def);
	});
});