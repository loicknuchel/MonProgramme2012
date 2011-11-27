function footer_actions(){
	$('.article .formEvent input[type="submit"]').click(function(){
		var form_html = $(this).parent().parent();
		var eventid_field = $(this).parent().find('input[name="formEventId"]');
		var name_field = $(this).parent().find('input[name="formEventName"]');
		var subject_field = $(this).parent().find('input[name="formEventSubject"]');
		var mail_field = $(this).parent().find('input[name="formEventEmail"]');
		var id = eventid_field.val();
		var name = name_field.val();
		var subjects = subject_field.val();
		var mail = mail_field.val();
		
		var sendForm = true;
		if(id == '' || id == null){
			alert('Une erreur est survenue. Veillez recharger la page.');
			sendForm = false;
		}
		if(name == '' || name == null){
			alert(s_form_verification.field+' "'+name_field.attr('placeholder')+'" '+s_form_verification.required);
			name_field.addClass('FV_error');
			sendForm = false;
		}
		if(mail == '' || mail == null){
			alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.required);
			mail_field.addClass('FV_error');
			sendForm = false;
		}
		else if(!checkEmail(mail)){
			alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.mustbemail);
			mail_field.addClass('FV_error');
			sendForm = false;
		}
		
		if(sendForm == true){
			name_field.removeClass('FV_error');
			mail_field.removeClass('FV_error');
			sendSubscribeEvent(form_html, id, name, subjects, mail, meth);
		}
		return false;
	});
	
	function sendSubscribeEvent(form_html, id, name, subjects, mail, meth){
		if(meth == 'local'){
			var url = base_url+'suivi.php';
			$.post(url, { mail: mail, name: name, info: subjects, type: 'event', id: id, action: 'follow', key: api_key, noheaders: 1 },
			function(data) {
				successCall(jQuery.parseJSON(data), mail);
			});
		}
		else{
			var url = base_url+'suivi.php?mail='+mail+'&name='+name+'&info='+subjects+'&type=event&id='+id+'&action=follow&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
			$.ajax({
				url: url,
				success: function(data) {
					console.log(data);
					successCall(data, mail);
				},
				dataType: 'jsonp'
			});
		}
		
		function successCall(obj, mail){
			if(obj != null && obj['status']['code'] == 200){
				displayInfo('success', "Votre inscription à l'évènement a bien été prise en compte.");
				
				form_html.parent().find('.presents table').append('<tr><td>'+form_html.find('input[name="formEventName"]').val()+'</td><td>( intéréssé par : '+form_html.find('input[name="formEventSubject"]').val()+' )</td></tr>');
				form_html.parent().find('.nbInscrits').html(eval(eval(form_html.parent().find('.nbInscrits').html())+1));
				
				form_html.find('input[name="formEventName"]').val('');
				form_html.find('input[name="formEventSubject"]').val('');
				form_html.find('input[name="formEventEmail"]').val('');
			}
			else{
				var errno = '';
				if(obj != null){errno = ' (code: '+obj['status']['code']+') ';}
				
				displayInfo('error', 'Une erreur est survenue lors de l\'enregistrement votre inscription à l\'évènement'+errno);
			}
		}
		
		return false;
	}
}
