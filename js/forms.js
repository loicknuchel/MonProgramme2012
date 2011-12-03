function fill_forms(){
	if(localStorage){
		var formDatas = JSON.parse(localStorage.getItem('form_data'));
		if(formDatas == null){ return false; }
		
		if(formDatas.comment != null){
			if($('.FV_comment input[name="pseudo"]').val() == ''){$('.FV_comment input[name="pseudo"]').val(formDatas.comment.pseudo);}
			if($('.FV_comment input[name="mail"]').val() == ''){$('.FV_comment input[name="mail"]').val(formDatas.comment.mail);}
			if($('.FV_comment input[name="site"]').val() == ''){$('.FV_comment input[name="site"]').val(formDatas.comment.site);}
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

function action_forms(){
	// toggle les informations facultatives
	$('.more_datas').css('display','none');
	function replace_img(html_img, new_img){
		var link = html_img.attr('src');
		var lastSlash = link.lastIndexOf("/");
		var new_link = link.substring(0, lastSlash+1) + new_img;
		html_img.attr('src', new_link);
	}
	$('.show_more_datas').toggle(
		function() {$(this).parent().find('.more_datas').slideDown(300); replace_img($(this).find('img'), 'arrow_down.png');},
		function() {$(this).parent().find('.more_datas').slideUp(300); replace_img($(this).find('img'), 'arrow_right.png');}
	);
	
	
	// radio button set
	$(".switch input").css('display', 'none');
	$(".switch label").click(function(){
		$(this).parents('.switch').find('label').removeClass('selected');
		$(this).addClass('selected');
	});
}




