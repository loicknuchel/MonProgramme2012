function quote_actions(){
	
	// UI : met les quotes sélectionnées dans l'état selected et les quotes des favoris dans l'état infavoris
	$('.quote .quote_header .options').css('display', 'inline-block'); // pour que ce soit affiché uniquement s'il y a le js activé
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
	
	// supprimer de la sélection (visible quand on affiche une sélection)
	$('.quote .quote_header .options .selectRem').click(function(event){
		rem_quote_from_selection($(this).parents('.quote'), meth);
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
	
	// garder la citation en haut de la page
	if($('#footerQuoteSlider').html() != null){ // si on est sur la page d'une citation
		// Dock only proposition
		var prop = $('.quote .quote_text').get(0);
		var nextElem = $('.quote .quote_text').next().get(0);
		var elemMargin = $('.quote .quote_text').next().css('margin-top');
		elemMargin = elemMargin.substring(0, elemMargin.length - 2);
		var init = prop.offsetTop;
		var docked = false;
		
		window.onscroll = function () {
			if (!docked && (prop.offsetTop - scrollTop() < 0)) {
				prop.style.top = 0;
				prop.style.position = 'fixed';
				prop.className = 'docked ' + prop.className;
				nextElem.style.marginTop = eval(eval(prop.offsetHeight) + eval(elemMargin))+'px';
				docked = true;
			} else if (docked && scrollTop() <= init) {
				prop.style.position = 'static';
				prop.className = prop.className.replace('docked ', '');
				nextElem.style.marginTop = elemMargin+'px';
				docked = false;
			}
		};
		
		// Dock all quote
		/*var quote = $('.quote').get(0);
		var nextElem = $('.quote').next().get(0);
		var elemMargin = $('.quote').next().css('margin-top');
		elemMargin = elemMargin.substring(0, elemMargin.length - 2);
		var init = quote.offsetTop;
		var docked = false;
		
		window.onscroll = function () {
			if (!docked && (quote.offsetTop - scrollTop() < 0)) {
				quote.style.top = 0;
				quote.style.position = 'fixed';
				quote.className = 'docked ' + quote.className;
				nextElem.style.marginTop = eval(eval(quote.offsetHeight) + eval(elemMargin) + 60)+'px'; // 60px = marge de la citation
				docked = true;
			} else if (docked && scrollTop() <= init) {
				quote.style.position = 'static';
				quote.className = quote.className.replace('docked ', '');
				nextElem.style.marginTop = elemMargin+'px';
				docked = false;
			}
		};*/
		
		function scrollTop() {
			return document.body.scrollTop || document.documentElement.scrollTop;
		}
	}
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

function rem_quote_from_selection(html_quote, meth){
	var sel_id = $('.sel_id').html();
	var sel_pass = prompt('mot de passe de la sélection :', '');
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	
	if(sel_pass != null && sel_pass != ''){
		if(meth == 'local'){
			var url = base_url+'selection.php';
			$.post(url, { sel: sel_id, remids: quote_id, pass: sel_pass, key: api_key, noheaders: 1 },
			function(data) {
				call_success(jQuery.parseJSON(data));
			});
		}
		else{
			var url = base_url+'selection.php?sel='+sel_id+'&remids='+quote_id+'&pass='+sel_pass+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
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
				displayInfo('success', s_selection.updated);
				html_quote.slideUp();
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
	}
	else{
		displayInfo('info', 'Pour modifier une sélection, vous devez saisir son mot de passe.');
	}
	return false;
}

/************************************
 * Local Storage Manipulation
************************************/
function quote_is_selected(quote_id, localStorageKey){
	if(isLocalStrorage()){
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
	
	if(isLocalStrorage()){
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
	if(isLocalStrorage()){
		localStorage.removeItem(localStorageKey);
	}
}

/************************************
 * Selection fonctions
************************************/
function quote_add_selection(html_quote){
	var quote_id = eval(html_quote.find('.quote_header .quote_number a span').html());
	var localStorageKey = "selection";
	
	if(isLocalStrorage()){
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
	
	if(isLocalStrorage()){
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
	
	if($('#quotelist_selected').html() != null){
		html_quote.slideUp();
	}
}

function identify_selected_quotes(){
	if(isLocalStrorage()){
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
		$('#header .topnav .selection a').attr("href", 'list.php?type=selected&quoteids='+ids);
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
	
	if(isLocalStrorage()){
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
	
	if(isLocalStrorage()){
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
	if(isLocalStrorage()){
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
