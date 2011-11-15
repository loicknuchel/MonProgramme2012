function setContactable(rel_to_root){
	// set feedback
	$('#contactable').contactable({
		url: rel_to_root+'js/libs/contactable.1.3/mail.php',
		subject: s_contactable.subject, 				// object du mail
		
		name: s_contactable.name, 						// label du name
		email: s_contactable.email, 					// label du mail
		title: s_contactable.title, 					// label du title
		message : s_contactable.message, 				// label du message
		submit : s_contactable.submit, 					// label du button
		disclaimer: s_contactable.disclaimer, 			// disclaimer
		recievedMsg : s_contactable.recievedMsg, 		// success message
		notRecievedMsg : s_contactable.notRecievedMsg,	// failure message
		hideOnSubmit: true
	});
	
	// ouvre/ferme le formulaire par un click sur l'élément
	$('.footer_link').toggleContactable('contactable', s_contactable_subjects.footer_link);
	$('.submit_goal').toggleContactable('contactable', s_contactable_subjects.submit_goal);				// FAQ
	$('.new_question').toggleContactable('contactable', s_contactable_subjects.new_question);			// FAQ
	$('.demande_sources').toggleContactable('contactable', s_contactable_subjects.demande_sources);		// FAQ
	$('.new_feature').toggleContactable('contactable', s_contactable_subjects.new_feature);				// FAQ
	$('.comment_feature').toggleContactable('contactable', s_contactable_subjects.comment_feature);		// FAQ
	$('.comment_evolution').toggleContactable('contactable', s_contactable_subjects.comment_evolution);	// FAQ
	$('.ask_private_key').toggleContactable('contactable', s_contactable_subjects.ask_private_key);		// FAQ
}
