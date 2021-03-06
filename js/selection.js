function selection_actions(){
	// UI : name field in "new selection" become red if selection already exist
	var sel_list = new Array();
	$('form.add_to_selection select option').each(function(){
		if($(this).html() != ''){
			sel_list.push($(this).html());
		}
	});
	$('form.new_selection input[name="name"]').keyup(function(event){
		if(in_array(sel_list, $(this).val())){
			$(this).addClass('FV_error');
			$(this).next().addClass('FV_error');
		}
		else{
			$(this).removeClass('FV_error');
			$(this).next().removeClass('FV_error');
		}
	});
	
	// send new selection
	$('form.new_selection .send').click(function(){
		post_new_selection($(this).parents('form'), meth);
		return false;
	});
	
	// send add to selection
	$('form.add_to_selection .send').click(function(){
		//var res = verif_form($(this).parents('form'));
		//if(res == true){
			post_add_to_selection($(this).parents('form'), meth);
		//}
		return false;
	});
}

function post_new_selection(form_block, meth){
	var sel_name = form_block.find('input[name="name"]').val();
	var sel_pass = form_block.find('input[name="pass"]').val();
	var quote_ids = build_quote_ids("selection");
	
	if(meth == 'local'){
		var url = base_url+'selection.php';
		$.post(url, { quoteids: quote_ids, sel: sel_name, pass: sel_pass, key: api_key, noheaders: 1 },
		function(data) {
			call_success(jQuery.parseJSON(data));
		});
	}
	else{
		var url = base_url+'selection.php?quoteids='+quote_ids+'&sel='+sel_name+'&pass='+sel_pass+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
			empty_selection("selection");
			window.location.replace('list.php?type=selection&sel='+obj['response']['selection']['id']);
		}
		else{
			var errno = ' ';
			if(obj != null){errno = ' ('+obj['status']['code']+') ';}
			
			displayInfo('error', s_selection.err_save_1 + errno + s_selection.err_save_2);
		}
	}
	
	return false;
}

function post_add_to_selection(form_block, meth){
	var sel_id = form_block.find('select[name="sel"]').val();
	var sel_pass = form_block.find('input[name="pass"]').val();
	var add_ids = build_quote_ids("selection");
	
	if(sel_id != '' && sel_id != null && sel_pass != '' && sel_pass != null){
		if(meth == 'local'){
			var url = base_url+'selection.php';
			$.post(url, { sel: sel_id, addids: add_ids, pass: sel_pass, key: api_key, noheaders: 1 },
			function(data) {
				call_success(jQuery.parseJSON(data));
			});
		}
		else{
			var url = base_url+'selection.php?sel='+sel_id+'&addids='+add_ids+'&pass='+sel_pass+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
			$.ajax({
				url: url,
				success: function(data) {
					call_success(data);
				},
				dataType: 'jsonp'
			});
		}
	}
	else{
		displayInfo('info', 'Tous les champs n\'ont pas été remplis...');
	}
	
	function call_success(obj){
		if(obj != null && obj['status']['code'] == 200){
			displayInfo('success', s_selection.updated);
			empty_selection("selection");
			window.location.replace('list.php?type=selection&sel='+sel_id);
		}
		else if(obj != null && obj['status']['code'] == 406){
			displayInfo('error', 'Mot de passe de la sélection incorrect !');
		}
		else{
			var errno = ' ';
			if(obj != null){errno = ' ('+obj['status']['code']+') ';}
			
			displayInfo('error', s_selection.err_save_1 + errno + s_selection.err_save_2);
		}
	}
	
	return false;
}
