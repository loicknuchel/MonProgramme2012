function displayInfo(type, text){
	if(type == 'warning' || type == 'error' || type == 'debug'){
		$('#info').html(text).delay(500).slideDown().delay(4000).slideUp();
	}
	else if(type == 'info'){
		$('#info').html(text).delay(500).slideDown().delay(2500).slideUp();
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
