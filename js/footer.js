function footer_actions(){
	$('#footer #formMailList #formMailListSubmit').click(function(){
		var mail_field = $('#footer #formMailList #formMailListEmail');
		var sendForm = true;
		if(mail_field.val() == '' || mail_field.val() == null){
			alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.required);
			sendForm = false;
		}
		else if(!checkEmail(mail_field.val())){
			alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.mustbemail);
			sendForm = false;
		}
		
		if(sendForm == true){
			mail_field.removeClass('FV_error');
			var mail = mail_field.val();
			if(mail != ''){
				sendSuiviSite(mail, meth);
			}
		}
		else{
			mail_field.addClass('FV_error');
		}
		return false;
	});
	
	function sendSuiviSite(mail, meth){
		if(meth == 'local'){
			var url = base_url+'suivi.php';
			$.post(url, { mail: mail, type: 'site', id: '1', action: 'follow', key: api_key, noheaders: 1 },
			function(data) {
				successCall(jQuery.parseJSON(data), mail);
			});
		}
		else{
			var url = base_url+'suivi.php?mail='+mail+'&type=site&id=1&action=follow&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
				displayInfo('success', "Votre suivi des proposition a été activée.");
				$('#footer #formMailList #formMailListEmail').val('');
			}
			else{
				var errno = '';
				if(obj != null){errno = ' ('+obj['status']['code']+') ';}
				
				displayInfo('error', 'Une erreur est survenue lors de l\'enregistrement du suivi'+errno);
			}
		}
		
		return false;
	}
}
