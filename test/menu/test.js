$(document).ready(function(){  
  
    $("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)  
	
	$("ul.topnav li").hover(
		function() { $(this).find('span').addClass("subhover"); }, //On hover over, add class "subhover"  
		function() { $(this).find('span').removeClass("subhover"); } //On hover out, remove class "subhover"  
    );
	
    $("ul.topnav li").toggle(
		function() {
			$(this).find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click  
	  
			$(this).hover(
				function() {}, 
				function() { $(this).find("ul.subnav").slideUp('slow'); } //When the mouse hovers out of the subnav, move it back up  
			);
		},
		function(){
			$(this).find("ul.subnav").slideUp('slow');
		}
	);
});