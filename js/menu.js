function dropdown_menu(){
	$("ul.subnav").parent().addClass("dropdown");
	
	$("#header ul.topnav li").hover(
		function() { $(this).find('span').addClass("subhover"); }, //On hover over, add class "subhover"  
		function() { $(this).find('span').removeClass("subhover"); } //On hover out, remove class "subhover"  
    );
	
	$("#header ul.topnav li.dropdown .topnavtitle").click(function(){
		if($(this).parent().find("ul.subnav").css('display') == 'none'){
			$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click  
			
			$(this).parent().hover(
				function() {}, 
				function() { $(this).find("ul.subnav").slideUp('slow'); } //When the mouse hovers out of the subnav, move it back up  
			);
		}
		else{
			$(this).parent().find("ul.subnav").slideUp('slow');
		}
		return false;
	});
}