function displayInfo(type, text){
	if(type == 'warning' || type == 'error' || type == 'info' || type == 'success'){
		$('#info').removeClass().addClass(type).html(text).delay(500).slideDown().click(function(event){
			$(this).hide();
		}).delay(5000).slideUp();
	}
	else if(type == 'debug'){
		$('#info').removeClass().addClass(type).html(text).delay(0).slideDown().delay(10000).slideUp();
	}
	else if(type == 'else'){
		return false;
	}
	else{
		return false; // ERREUR ! ne dois jamais arriver ici...
	}
}

function toggleBlock(idf_click, idf_block, text_hidden, text_display, callShow, callHide){
	$(idf_click).toggle(
		function() {$(this).html(text_display); $(idf_block).slideDown(300); callShow();},
		function() {$(this).html(text_hidden); $(idf_block).slideUp(300); callHide();}
	);
}

function in_array(array, value){
	for(key in array){
		if(array[key] == value){
			return true;
		}
	}
	return false;
}

function checkEmail(mail) {
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (filter.test(mail)) {
		return true;
	}
	return false;
}

function commentToCodeFormat(comment_html){
	var header = comment_html.find('.comment_header');
	var name = header.find('.comment_pseudo').html();
	var date = header.find('.comment_date span').html();
	var time = header.find('.comment_time').html();
	var id = header.find('.comment_no').html();
	var string = comment_html.find('.comment_text').html();
	
	var endLines = /<br>|<br\/>|<br \/>/g;
	var Links = /<a href="((ftp|http|https):\/\/(\w+:{0,1}\w*@)?([\S]+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\/\-]))?)"( title="([^"]*)")?( target="_blanck")?>([^"]+)<\/a>/g;
	var startBlocks = /<div class="quoted_comment">(<div class="ref">(<span class="name">([^"]*)<\/span>)?((, )?le <span class="date">([a-zA-Z0-9 à\/:]*)<\/span>)?( :)?(<span class="time">([0-9]*)<\/span>)?(<span class="comment">([0-9]*)<\/span>)?<\/div>)?([\s\r\n ]*)/g;
	var endBlocks = /([\s\r\n ]*)<\/div>/g;
	
	string = string.replace(endLines, "\r\n");
	string = string.replace(Links, "$1");
	string = string.replace(startBlocks, '\r\n[quote name="$3" date="$6" time="$9" comment="$11"]\r\n');
	string = string.replace(endBlocks, '\r\n[/quote]\r\n');
	
	string = '[quote name="'+name+'" date="'+date+'" time="'+time+'" comment="'+id+'"]\r\n'+string+'\r\n[/quote]\r\n';
	
	return string;
}
