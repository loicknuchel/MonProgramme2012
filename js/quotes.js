function quote_actions(){
	
	// UI : met les quotes sélectionnées dans l'état selected et les quotes des favoris dans l'état infavoris
	$('.quote .quote_header .options').css('display', 'inline-block');
	identify_selected_quotes();
	identify_favoris_quotes();
	
	// UI : options quote
	$('.quote .quote_header .options').hover(
		function() { $(this).find("ul").slideDown('fast'); $(this).addClass("selected"); }, 
		function() { $(this).find("ul").slideUp('fast'); $(this).removeClass("selected"); }
	);
	
	// UI : show meta datas
	$('.quote .quote_footer .more a').html(s_quote.meta.expand);
	$('.quote .quote_footer .more').toggle(
		function(event){ $(this).parents('.quote').find('.quote_expand').slideDown(); $(this).find('a').html(s_quote.meta.expanded); },
		function(event){ $(this).parents('.quote').find('.quote_expand').slideUp(); $(this).find('a').html(s_quote.meta.expand); }
	);
	
	// ajouter la quote aux favoris
	$('.quote .quote_header .options .favoris').click(function(event){
		quote_add_to_favoris($(this).parents('.quote'));
		return false;
	});
	
	// proposer une nouvelle catégorie pour la quote
	/*$('.quote .quote_header .options .category').click(function(event){
		quote_new_category($(this).parents('.quote'));
		return false;
	});*/
	
	// ajouter une quote à la sélection
	$('.quote .quote_footer .quote_actions .select').click(function(){
		quote_add_selection($(this).parents('.quote'));
		return false;
	});
	
	// report quote
	$('.quote .quote_header .options .report').click(function(event){
		quote_report($(this).parents('.quote'), meth);
		return false;
	});
	
	// quote vote up
	$('.quote .quote_footer .quote_actions .thumb_up').click(function(event){
		quote_vote('up', $(this).parents('.quote'), meth);
		return false;
	});
	
	// quote vote down
	$('.quote .quote_footer .quote_actions .thumb_down').click(function(event){
		quote_vote('down', $(this).parents('.quote'), meth);
		return false;
	});
}


function quote_vote(vote, html_quote, meth){
	if(vote != 'up' && vote != 'down'){
		return false;
	}
	
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var html_vote = html_quote.find('.quote_footer .quote_actions ul li');
	var html_vote_up_value = html_vote.find('.val_up');
	var html_vote_down_value = html_vote.find('.val_down');
	var html_vote_bar = html_vote.find('.votebar');
	
	if(meth == 'local'){
		var url = base_url+'quote.php';
		$.post(url, { quoteid: quote_id, vote: vote, key: api_key, noheaders: 1 },
		function(data) {
			call_success(jQuery.parseJSON(data));
		});
	}
	else{
		var url = base_url+'quote.php?quoteid='+quote_id+'&vote='+vote+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
			displayInfo('success', s_ajax.vote.success);
			
			var up = eval(html_vote_up_value.html());
			var down = eval(html_vote_down_value.html());
			if(vote == 'up'){up = up + 1;}
			else if(vote == 'down'){down = down + 1;}
			
			var pc_up = Math.ceil((up / (up + down)) * 100);
			var pc_down = 100 - pc_up;
			
			html_vote_up_value.html(up);
			html_vote_down_value.html(down);
			html_vote_bar.find('.votebar-up').css('width', pc_up+'%');
			html_vote_bar.find('.votebar-down').css('width', pc_down+'%');
		}
		else{
			if(obj != null && obj['status']['code'] == 406){
				displayInfo('info', s_ajax.vote.err_406);
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

function quote_report(html_quote, meth){
	cause = prompt(s_ajax.report.prompt_quote);
	if(cause != null){
		if(cause == ''){cause = null;}
		var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
		
		if(meth == 'local'){
			var url = base_url+'quote.php';
			$.post(url, { quoteid: quote_id, report: '1', cause: cause, key: api_key, noheaders: 1 },
			function(data) {
				call_success(jQuery.parseJSON(data));
			});
		}
		else{
			var url = base_url+'quote.php?quoteid='+quote_id+'&report=1&cause='+cause+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
			displayInfo('success', s_ajax.report.success);
			if(obj['response']['action'] == 'deleted'){
				quote_delete_selection(html_quote);
				html_quote.slideUp();
			}
		}
		else{
			if(obj != null && obj['status']['code'] == 406){
				displayInfo('info', s_ajax.report.err_406_quote);
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

/************************************
 * Local Storage Manipulation
************************************/
function quote_is_selected(quote_id, localStorageKey){
	if(localStorage){
		var selection = JSON.parse(localStorage.getItem(localStorageKey));
		if(selection == null){
			return false;
		}
		else{
			for(var i=0; i<selection.quote.length; i++){
				if(selection.quote[i].id == quote_id){
					return true;
				}
			}
			return false;
		}
	}
	else{
		return false;
	}
}

function build_quote_ids(localStorageKey){
	var ids = '';
	
	if(localStorage){
		var selection = JSON.parse(localStorage.getItem(localStorageKey));
		if(selection != null){
			for(var i=0; i<selection.quote.length; i++){
				if(i==0){
					ids = selection.quote[i].id;
				}
				else{
					ids = ids + '/' + selection.quote[i].id;
				}
			}
		}
	}
	
	return ids;
}

function empty_selection(localStorageKey){
	if(localStorage){
		localStorage.removeItem(localStorageKey);
	}
}

/************************************
 * Selection fonctions
************************************/
function quote_add_selection(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var localStorageKey = "selection";
	
	if(localStorage){
		if(quote_is_selected(quote_id, localStorageKey) == false){
			var selection = JSON.parse(localStorage.getItem(localStorageKey));
			if(selection == null){
				var sel = new Object();
				sel.quote = new Array();
				sel.quote[0] = new Object();
				sel.quote[0].id = quote_id;
				localStorage.setItem(localStorageKey, JSON.stringify(sel));
				
				change_to_selected(html_quote);
				set_selection_no(1);
			}
			else{
				no_sel = selection.quote.length;
				selection.quote[no_sel] = new Object();
				selection.quote[no_sel].id = quote_id;
				localStorage.setItem(localStorageKey, JSON.stringify(selection));
				
				change_to_selected(html_quote);
				set_selection_no(no_sel+1);
			}
			
			displayInfo('success', s_quote.selection.saved);
		}
		else{
			displayInfo('warning', s_quote.selection.alreadySaved);
		}
	}
	else{
		displayInfo('error', s_error.noLocalStorage);
	}
	
	return false;
}

function quote_delete_selection(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var localStorageKey = "selection";
	
	if(localStorage){
		if(quote_is_selected(quote_id, localStorageKey) == true){
			var selection = JSON.parse(localStorage.getItem(localStorageKey));
			var decale = false;
			for(var i=0; i<selection.quote.length; i++){
				if(decale == true){ selection.quote[i-1] = selection.quote[i]; }
				if(selection.quote[i].id == quote_id){ decale = true; }
			}
			if(decale == true){selection.quote.pop();}
			localStorage.setItem(localStorageKey, JSON.stringify(selection));
			
			change_to_unselected(html_quote);
			set_selection_no(selection.quote.length);
			
			displayInfo('success', s_quote.selection.unsaved);
		}
		else{
			displayInfo('warning', s_quote.selection.notSaved);
		}
	}
	else{
		displayInfo('error', s_error.noLocalStorage);
	}
	
	return false;
}

function change_to_selected(html_quote){
	var select = html_quote.find('.quote_footer .quote_actions .select');
	select.html(s_quote.selection.item.selected);
	//select.addClass("unselect").removeClass("select");
	select.unbind('click');
	select.find('a').click(function(){
		quote_delete_selection(html_quote);
		return false;
	});
}

function change_to_unselected(html_quote){
	var select = html_quote.find('.quote_footer .quote_actions .select');
	select.html(s_quote.selection.item.notselected);
	//select.addClass("select").removeClass("unselect");
	select.unbind('click');
	select.find('a').click(function(){
		quote_add_selection(html_quote);
		return false;
	});
}

function identify_selected_quotes(){
	if(localStorage){
		var localStorageKey = "selection";
		var selection = JSON.parse(localStorage.getItem(localStorageKey));
		if(selection != null && selection.quote.length > 0){
			set_selection_no(selection.quote.length);
			$('.quote').each(function(){
				if(quote_is_selected($(this).find('.quote_header .quote_number a span').html(), localStorageKey)){
					change_to_selected($(this));
				}
				else{
					change_to_unselected($(this));
				}
			});
		}
		else{
			$('.quote').each(function(){
				change_to_unselected($(this));
			});
		}
	}
}

function set_selection_no(no_sel){
	var ids = build_quote_ids("selection");
	if(no_sel > 0 && ids != ''){
		$('#header .topnav li.selection div').html(no_sel);
		$('#header .topnav li.selection').show();
		$('#header .topnav .selection a').attr("href", 'list.php?type=custom&quoteids='+ids);
	}
	else{
		$('#header .topnav li.selection div').html('');
		$('#header .topnav li.selection').hide();
	}
}

/************************************
 * Favoris fonctions
************************************/
function quote_add_to_favoris(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var localStorageKey = "favoris";
	
	if(localStorage){
		if(quote_is_selected(quote_id, localStorageKey) == false){
			var selection = JSON.parse(localStorage.getItem(localStorageKey));
			if(selection == null){
				var sel = new Object();
				sel.quote = new Array();
				sel.quote[0] = new Object();
				sel.quote[0].id = quote_id;
				localStorage.setItem(localStorageKey, JSON.stringify(sel));
				
				change_to_infavoris(html_quote);
				set_favoris_link();
			}
			else{
				no_sel = selection.quote.length;
				selection.quote[no_sel] = new Object();
				selection.quote[no_sel].id = quote_id;
				localStorage.setItem(localStorageKey, JSON.stringify(selection));
				
				change_to_infavoris(html_quote);
				set_favoris_link();
			}
			
			displayInfo('success', s_quote.favoris.saved);
		}
		else{
			displayInfo('warning', s_quote.favoris.alreadySaved);
		}
	}
	else{
		displayInfo('error', s_error.noLocalStorage);
	}
	
	return false;
}

function quote_delete_to_favoris(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var localStorageKey = "favoris";
	
	if(localStorage){
		if(quote_is_selected(quote_id, localStorageKey) == true){
			var selection = JSON.parse(localStorage.getItem(localStorageKey));
			var decale = false;
			for(var i=0; i<selection.quote.length; i++){
				if(decale == true){ selection.quote[i-1] = selection.quote[i]; }
				if(selection.quote[i].id == quote_id){ decale = true; }
			}
			if(decale == true){selection.quote.pop();}
			localStorage.setItem(localStorageKey, JSON.stringify(selection));
			change_to_outfavoris(html_quote);
			set_favoris_link();
			
			displayInfo('success', s_quote.favoris.unsaved);
		}
		else{
			displayInfo('warning', s_quote.favoris.notSaved);
		}
	}
	else{
		displayInfo('error', s_error.noLocalStorage);
	}
	
	return false;
}

function change_to_infavoris(html_quote){
	var html_link = html_quote.find('.quote_header .options .favoris');
	html_link.html(s_quote.favoris.item.selected);
	html_link.unbind('click');
	html_link.click(function(){
		quote_delete_to_favoris(html_quote);
		return false;
	});
}

function change_to_outfavoris(html_quote){
	var html_link = html_quote.find('.quote_header .options .favoris');
	html_link.html(s_quote.favoris.item.notselected);
	html_link.unbind('click');
	html_link.click(function(){
		quote_add_to_favoris(html_quote);
		return false;
	});
}

function no_favoris(html_quote){
	html_quote.find('.quote_header .options .favoris').hide();
}

function identify_favoris_quotes(){
	if(localStorage){
		var localStorageKey = "favoris";
		var selection = JSON.parse(localStorage.getItem(localStorageKey));
		if(selection != null && selection.quote.length > 0){
			set_favoris_link();
			$('.quote').each(function(){
				if(quote_is_selected($(this).find('.quote_header .quote_number a span').html(), localStorageKey)){
					change_to_infavoris($(this));
				}
				else{
					change_to_outfavoris($(this));
				}
			});
		}
		else{
			$('.quote').each(function(){
				change_to_outfavoris($(this));
			});
		}
	}
	else{
		$('.quote').each(function(){
			no_favoris($(this));
		});
	}
}

function set_favoris_link(){
	var ids = build_quote_ids("favoris");
	if(ids != ''){
		$('#header .topnav .favoris').show();
		$('#header .topnav .favoris a').attr("href", 'list.php?type=favoris&quoteids='+ids);
	}
	else{
		$('#header .topnav .favoris').hide();
	}
}

/*function quote_new_category(html_quote){
	open_new_quote_category_fancybox(html_quote);
}*/
