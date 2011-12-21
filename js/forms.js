

function action_forms(){
	// UI : toggle les informations facultatives
	$('.more_datas').css('display','none');
	$('.show_more_datas').toggle(
		function() {$(this).parent().find('.more_datas').slideDown(300); $(this).addClass('visible');},
		function() {$(this).parent().find('.more_datas').slideUp(300); $(this).removeClass('visible');}
	);
	
	
	// UI : radio button set
	$(".switch input").css('display', 'none');
	$(".switch label").click(function(){
		$(this).parents('.switch').find('label').removeClass('selected');
		$(this).addClass('selected');
	});
	
	
	// set required mail when you want to be notify
	$('form .suivi input[type="checkbox"]').click(function(){
		mail_field = $(this).parents('form').find('input[name="mail"]');
		if($(this).attr('checked') == 'checked'){
			if(mail_field.hasClass('FV_required')){
				mail_field.addClass('FV_required_2');
			}
			else{
				mail_field.addClass('FV_required');
				mail_field.attr('placeholder', mail_field.attr('placeholder')+' *');
			}
		}
		else{
			if(mail_field.hasClass('FV_required_2')){
				mail_field.removeClass('FV_required_2');
			}
			else{
				mail_field.removeClass('FV_required');
				mail_field.attr('placeholder', mail_field.attr('placeholder').substr(0, mail_field.attr('placeholder').length - 2));
			}
		}
	});
}

function fill_forms(){
	if(localStorage){
		var formDatas = JSON.parse(localStorage.getItem('form_data'));
		if(formDatas == null){ return false; }
		
		if(formDatas.comment != null && formDatas.comment.pseudo != '' && $("#leave_comment form.FV_comment").length){
			if($('.FV_comment input[name="pseudo"]').val() == '' && formDatas.comment.pseudo != ''){$('.FV_comment input[name="pseudo"]').val(formDatas.comment.pseudo); $('.FV_comment .no_meta_info .pseudo').html(formDatas.comment.pseudo);}
			if($('.FV_comment input[name="mail"]').val() == '' && formDatas.comment.mail != ''){$('.FV_comment input[name="mail"]').val(formDatas.comment.mail); $('.FV_comment .no_meta_info .mail').html(formDatas.comment.mail);}
			if($('.FV_comment input[name="site"]').val() == '' && formDatas.comment.site != ''){$('.FV_comment input[name="site"]').val(formDatas.comment.site); $('.FV_comment .no_meta_info .site').html(formDatas.comment.site);}
			$("#leave_comment form.FV_comment .meta_info").hide();
			$("#leave_comment form.FV_comment .no_meta_info").show();
			$("#leave_comment form.FV_comment textarea[name=\"comment\"]").addClass('inc_meta_info');
			$("#leave_comment form.FV_comment .no_meta_info .modify a").click(function(){
				$("#leave_comment form.FV_comment textarea[name=\"comment\"]").removeClass('inc_meta_info');
				$("#leave_comment form.FV_comment .meta_info").slideDown();
				$("#leave_comment form.FV_comment .no_meta_info").slideUp();
				return false;
			});
		}
		
		if(formDatas.quote != null){
			if($('.FV_quote input[name="pub"]').val() == ''){$('.FV_quote input[name="pub"]').val(formDatas.quote.publisher);}
			if($('.FV_quote textarea[name="pubinfo"]').val() == ''){$('.FV_quote textarea[name="pubinfo"]').val(formDatas.quote.publisher_info);}
			if($('.FV_quote input[name="mail"]').val() == ''){$('.FV_quote input[name="mail"]').val(formDatas.quote.mail);}
			if($('.FV_quote input[name="site"]').val() == ''){$('.FV_quote input[name="site"]').val(formDatas.quote.site);}
		}
		
		if(formDatas.feedback != null){
			if($('.FV_contactable input[name="name"]').val() == ''){$('.FV_contactable input[name="name"]').val(formDatas.feedback.nom);}
			if($('.FV_contactable input[name="email"]').val() == ''){$('.FV_contactable input[name="email"]').val(formDatas.feedback.mail);}
		}
	}
}

