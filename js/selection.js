function show_selection_form(html_block, meth){
	html_block.find('form').css('visibility', 'visible');
	html_block.find('form .text_input').focus();
	
	html_block.find('form .send').click(function(){
		post_new_selection(html_block, meth);
		return false;
	});
	
	html_block.find('form .cancel').click(function(){
		$(this).parent().css('visibility', 'hidden');
		return false;
	});
	
	return false;
}

function post_new_selection(html_block, meth){
	var sel_name = html_block.find('form input[type="text"]').val();
	var quote_ids = build_quote_ids("selection");
	
	if(meth == 'local'){
		var url = base_url+'selection.php';
		$.post(url, { quoteids: quote_ids, sel: sel_name, key: api_key, noheaders: 1 },
		function(data) {
			call_success(jQuery.parseJSON(data));
		});
	}
	else{
		var url = base_url+'selection.php?quoteids='+quote_ids+'&sel='+sel_name+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
		$.ajax({
			url: url,
			success: function(data) {
				call_success(data);
			},
			dataType: 'jsonp'
		});
	}
	
	function call_success(obj){
		if(obj != null && obj['status']['code'] == 200){
			displayInfo('success', s_selection.saved);
			html_block.find('form .text_input').val('');
			empty_selection("selection");
			window.location.replace('selection.php?sel='+obj['response']['selection']['id']);
		}
		else{
			var errno = ' ';
			if(obj != null){errno = ' ('+obj['status']['code']+') ';}
			
			displayInfo('error', s_selection.err_save_1 + errno + s_selection.err_save_2);
		}
	}
	
	return false;
}
