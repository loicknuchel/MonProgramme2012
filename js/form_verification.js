function FV_Form_Verification(inner_html){
	/***********************************
	 * Form Verification :
	 * ********************************/
	
	$(inner_html+'.FV_required').each(function(){
		$(this).attr('placeholder', $(this).attr('placeholder')+' *');
	});
	
	function updateInputCpt(input, val){
		input.next().html(val);
		/*if(val < 0){
			input.addClass('FV_error');
			input.next().addClass('FV_error');
			//alert($(this).val());
			//input.css('background', 'red');
		}
		else{
			input.addClass('FV_error');
			input.next().addClass('FV_error');
		}*/
	}
	
	// text cpt
	$(inner_html+'input.FV_length').each(function(){
		$(this).after('<span class="text_leave_char">'+$(this).attr('maxsize')+'</span>');
	});
	$(inner_html+'input.FV_length').focus(function(){
		$(this).next().html(eval($(this).attr('maxsize'))-eval($(this).val().length));
		$(this).keyup(function(event){
			updateInputCpt($(this), eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
		$(this).keydown(function(event){
			updateInputCpt($(this), eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
	});
	
	// textarea cpt
	$(inner_html+'textarea.FV_length').each(function(){
		$(this).after('<span class="area_leave_char">'+$(this).attr('maxsize')+'</span>');
	});
	$(inner_html+'textarea.FV_length').focus(function(){
		$(this).next().html(eval($(this).attr('maxsize'))-eval($(this).val().length));
		$(this).keyup(function(event){
			updateInputCpt($(this), eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
		$(this).keydown(function(event){
			updateInputCpt($(this), eval($(this).attr('maxsize'))-eval($(this).val().length));
		});
	});
	
	
	$(inner_html+'form').submit(function(){
		var sendForm = true;
		
		$(this).find('FV_error').each(function(){
			$(this).removeClass('FV_error');
		});
		
		$(this).find('.FV_required').each(function(){
			if($(this).val() == '' || $(this).val() == null){
				alert(s_form_verification.field+' "'+$(this).attr('placeholder')+'" '+s_form_verification.required);
				$(this).addClass('FV_error');
				$(this).next().addClass('FV_error');
				sendForm = false;
			}
		});
		
		$(this).find('.FV_length').each(function(){
			var maxsize = $(this).attr('maxsize');
			if($(this).val().length > maxsize){
				alert(s_form_verification.field+' "'+$(this).attr('placeholder')+'" '+s_form_verification.lessthan+' '+maxsize+' '+s_form_verification.stringunit);
				$(this).addClass('FV_error');
				$(this).next().addClass('FV_error');
				sendForm = false;
			}
		});
		
		$(this).find('.FV_number').each(function(){
			
		});
		
		$(this).find('.FV_site').each(function(){
			
		});
		
		$(this).find('.FV_mail').each(function(){
			
		});
		
		$(this).find('.FV_date').each(function(){
			
		});
		
		// enregistrement des variables d'identifications dans le local storage
		if(localStorage && sendForm == true){
			if($(this).hasClass('FV_comment')){ // formulaire de commentaires
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.comment = new Object();
				formDatas.comment.pseudo = $(this).find('input[name="pseudo"]').val();
				formDatas.comment.mail = $(this).find('input[name="mail"]').val();
				formDatas.comment.site = $(this).find('input[name="site"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
			else if($(this).hasClass('FV_quote')){ // formulaire de citations
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.quote = new Object();
				formDatas.quote.publisher = $(this).find('input[name="pub"]').val();
				formDatas.quote.publisher_info = $(this).find('textarea[name="pubinfo"]').val();
				formDatas.quote.mail = $(this).find('input[name="mail"]').val();
				formDatas.quote.site = $(this).find('input[name="site"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
			else if($(this).parent().hasClass('FV_contactable')){ // formulaire de feedback
				var formDatas = JSON.parse(localStorage.getItem('form_data'));
				if(formDatas == null){
					var formDatas = new Object();
				}
				formDatas.feedback = new Object();
				formDatas.feedback.nom = $(this).find('input[name="name"]').val();
				formDatas.feedback.mail = $(this).find('input[name="email"]').val();
				localStorage.setItem('form_data', JSON.stringify(formDatas));
			}
		}
		
		$(this).find('.FV_nosend').each(function(){
			sendForm = false;
		});
		
		return sendForm;
	});
}