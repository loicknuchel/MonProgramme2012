function comment_actions(){
	// UI : show more actions
	$('.comment').hover(
		function(event){ $(this).find('.comment_header .comment_report').show(); $(this).find('.comment_header .reponse').show(); },
		function(event){ $(this).find('.comment_header .comment_report').hide(); $(this).find('.comment_header .reponse').hide(); }
	);
	
	// comment vote up
	$('.comment .comment_vote .thumb_up').click(function(event){
		comment_vote('up', $(this).parent().parent(), meth);
		return false;
	});
	
	// comment vote down
	$('.comment .comment_vote .thumb_down').click(function(event){
		comment_vote('down', $(this).parent().parent(), meth);
		return false;
	});
	
	// report comment
	$('.comment .comment_header .comment_report').click(function(event){
		comment_report($(this).parent(), meth);
		return false;
	});
	
	// citer commentaire
	$('.comment .comment_header .reponse').click(function(event){
		var text = $(this).parent().parent().find('.comment_text').html();
		var comment = $('.leave_comment form textarea[name="comment"]');
		text = text.replace(/<div class="quoted_comment">/gi, '[quote]');
		text = text.replace(/<\/div>/gi, '[/quote]');
		text = text.replace(/<br>/gi, '');
		comment.val(comment.val() + '[quote]' + text + '[/quote]');
		window.scroll(0,10000);
		//comment.focus();
		return false;
	});
}


function comment_vote(vote, this_parent, meth){
	if(vote == 'up'){ op = 1; }
	else if(vote == 'down'){ op = -1; }
	else{ return false; }
	
	var comment_id = eval(this_parent.parent().find('.comment_no').html());
	var html_vote_value = this_parent.find('.val span');
	
	if(meth == 'local'){
		var url = base_url+'comment.php';
		$.post(url, { commentid: comment_id, vote: vote, key: api_key, noheaders: 1 },
		function(data) {
			call_success(jQuery.parseJSON(data));
		});
	}
	else{
		var url = base_url+'comment.php?commentid='+comment_id+'&vote='+vote+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
			displayInfo('info', s_ajax.vote.success);
			html_vote_value.html(eval(html_vote_value.html()) + op);
		}
		else{
			if(obj != null && obj['status']['code'] == 406){
				displayInfo('error', s_ajax.vote.err_406);
			}
			else{
				var errno = '';
				if(obj != null){errno = '('+obj['status']['code']+') ';}
				
				displayInfo('error', s_ajax.vote.err_default+' '+errno);
			}
		}
	}
	
	return false;
}

function comment_report(html_comment_header){
	cause = prompt(s_ajax.report.prompt_comment);
	
	if(cause != null){
		if(cause == ''){cause = null;}
		var comment_id = eval(html_comment_header.find('.comment_no').html());
		
		if(meth == 'local'){
			var url = base_url+'comment.php';
			$.post(url, { commentid: comment_id, report: '1', cause: cause, key: api_key, noheaders: 1 },
			function(data) {
				call_success(jQuery.parseJSON(data));
			});
		}
		else{
			var url = base_url+'comment.php?commentid='+comment_id+'&report=1&cause='+cause+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
			$.ajax({
				url: url,
				success: function(data) {
					call_success(data);
				},
				dataType: 'jsonp'
			});
		}
	}
	
	function call_success(obj){
		if(obj != null && obj['status']['code'] == 200){
			displayInfo('info', s_ajax.report.success);
			if(obj['response']['action'] == 'deleted'){
				html_comment_header.find('.comment_vote').fadeOut();
				html_comment_header.find('.comment_report').fadeOut();
				html_comment_header.find('.comment_report').html('');
				html_comment_header.find('.reponse').fadeOut();
				html_comment_header.find('.reponse').html('');
				html_comment_header.parent().find('.comment_text').slideUp().html(s_comment.deleted).slideDown();
			}
		}
		else{
			if(obj != null && obj['status']['code'] == 406){
				displayInfo('error', s_ajax.report.err_406_comment);
			}
			else{
				var errno = '';
				if(obj != null){errno = '('+obj['status']['code']+') ';}
				
				displayInfo('error', s_ajax.report.err_default+' '+errno);
			}
		}
	}
	
	return false;
}