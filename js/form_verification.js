function FV_Form_Verification(inner_html){
	/***********************************
	 * Form Verification :
	 * ********************************/
	
	$(inner_html+'.FV_required').each(function(){
		$(this).attr('placeholder', $(this).attr('placeholder')+' *');
	});
	
	
	// text cpt
	$(inner_html+'input.FV_length').each(function(){
		$(this).after('<span class="text_leave_char">'+$(this).attr('maxsize')+'</span>');
	});
	$(inner_html+'input.FV_length').focus(function(){
		$(this).next().html(eval($(this).attr('maxsize'))-eval($(this).val().length));
		$(this).keyup(function(event){
			$(this).next().html(eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
		$(this).keydown(function(event){
			$(this).next().html(eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
	});
	
	// textarea cpt
	$(inner_html+'textarea.FV_length').each(function(){
		$(this).after('<span class="area_leave_char" style="visibility: hidden;"><span></span> caractères restants</span>');
	});
	$(inner_html+'textarea.FV_length').focus(function(){
		textarea_change_cpt_value($(this));
		$(this).keyup(function(event){
			textarea_change_cpt_value($(this));
		});
		$(this).keydown(function(event){
			textarea_change_cpt_value($(this));
		});
	});
	function textarea_change_cpt_value(textarea_html){
		var nb = eval(textarea_html.attr('maxsize'))-eval(textarea_html.val().length);
		textarea_html.next().find('span').html(nb);
		if(nb < 0){textarea_html.next().css('visibility', 'visible'); textarea_html.next().find('span').addClass('FV_error');}
		else if(nb < 200){textarea_html.next().css('visibility', 'visible'); textarea_html.next().find('span').removeClass('FV_error');}
		else{textarea_html.next().css('visibility', 'hidden'); textarea_html.next().find('span').removeClass('FV_error');}
	}
	
	
	
	$(inner_html+'form').submit(function(){
		return verif_form($(this));
	});
	
	function verif_form(html_form){
		var sendForm = true;
		
		html_form.find('FV_error').each(function(){
			$(this).removeClass('FV_error');
		});
		
		html_form.find('.FV_required').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				alert(s_form_verification.field+' "'+$(this).attr('placeholder')+'" '+s_form_verification.required);
				$(this).addClass('FV_error');
				$(this).next().addClass('FV_error');
				sendForm = false;
			}
		});
		
		html_form.find('.FV_length').each(function(){
			var maxsize = $(this).attr('maxsize');
			if($(this).val().length > maxsize){
				alert(s_form_verification.field+' "'+$(this).attr('placeholder')+'" '+s_form_verification.lessthan+' '+maxsize+' '+s_form_verification.stringunit);
				$(this).addClass('FV_error');
				if($(this).next().hasClass("text_leave_char")){$(this).next().addClass('FV_error');}
				sendForm = false;
			}
		});
		
		html_form.find('.FV_number').each(function(){
			
		});
		
		html_form.find('.FV_mail').each(function(){
			if($(this).val() != '' && checkEmail($(this).val()) == false){
				alert(s_form_verification.field+' "'+$(this).attr('placeholder')+'" '+s_form_verification.mustbemail);
				$(this).addClass('FV_error');
				$(this).next().addClass('FV_error');
				sendForm = false;
			}
		});
		
		html_form.find('.FV_site').each(function(){
			
		});
		
		html_form.find('.FV_date').each(function(){
			
		});
		
		// enregistrement des variables d'identifications dans le local storage
		if(localStorage && sendForm == true){
			if(html_form.hasClass('FV_comment')){ // formulaire de commentaires
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.comment = new Object();
				formDatas.comment.pseudo = html_form.find('input[name="pseudo"]').val();
				formDatas.comment.mail = html_form.find('input[name="mail"]').val();
				formDatas.comment.site = html_form.find('input[name="site"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
			else if(html_form.hasClass('FV_quote')){ // formulaire de citations
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.quote = new Object();
				formDatas.quote.publisher = html_form.find('input[name="pub"]').val();
				formDatas.quote.publisher_info = html_form.find('textarea[name="pubinfo"]').val();
				formDatas.quote.mail = html_form.find('input[name="mail"]').val();
				formDatas.quote.site = html_form.find('input[name="site"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
			else if(html_form.parent().hasClass('FV_contactable')){ // formulaire de feedback
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.feedback = new Object();
				formDatas.feedback.nom = html_form.find('input[name="name"]').val();
				formDatas.feedback.mail = html_form.find('input[name="email"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
		}
		
		html_form.find('.FV_nosend').each(function(){
			sendForm = false;
		});
		
		return sendForm;
	}
}