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
	function replace_img(html_img, new_img){
		var link = html_img.attr('src');
		var lastSlash = link.lastIndexOf("/");
		var new_link = link.substring(0, lastSlash+1) + new_img;
		html_img.attr('src', new_link);
	}
	
	// toggle les informations facultatives pour une nouvelle citation
	$('.new_quote .more_datas').css('display','none');
	$('.new_quote .show_more_datas').toggle(
		function() {$('.new_quote .more_datas').slideDown(300); replace_img($('.new_quote .show_more_datas img'), 'arrow_down.png');},
		function() {$('.new_quote .more_datas').slideUp(300); replace_img($('.new_quote .show_more_datas img'), 'arrow_right.png');}
	);
	
	
	
	// toggle les informations complémentaires pour les pétitions
	$('.sign_quote .more_datas').css('display','none');
	$('.sign_quote .show_more_datas').toggle(
		function() {$('.sign_quote .more_datas').slideDown(300); replace_img($('.sign_quote .show_more_datas img'), 'arrow_down.png');},
		function() {$('.sign_quote .more_datas').slideUp(300); replace_img($('.sign_quote .show_more_datas img'), 'arrow_right.png');}
	);

}
