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
