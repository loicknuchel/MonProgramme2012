<?php 
	if(isset($_GET['q'])){
		header('Location: quote.php?id='.$_GET['q']);
	}
	else{
		header('Location: list.php?type=top');
	}
	exit();
	/*
	CHANSON : tiken jah fakoly : Gauche Droite
	
	
	
	examples : http://labs.syropia.net/
	
	beau design				http://tutorialzine.com/2011/07/about-page-vcard-php-css/
	beau design				http://tutorialzine.com/2010/02/html5-css3-website-template/
	comming soon page		http://tutorialzine.com/2010/10/ajaxed-coming-soon-page/
	feedback				http://tutorialzine.com/2010/09/quick-feedback-form-php-jquery/
	tweet to download		http://tutorialzine.com/2011/05/tweet-to-download-jquery/
	cookies in PHP			http://tutorialzine.com/2010/03/microtut-getting-and-setting-cookies-with-jquery-php/
	mobile app				http://tutorialzine.com/2010/07/making-slick-mobileapp-website-jquery-css/
	page navigation			http://tutorialzine.com/2010/05/sweet-pages-a-jquery-pagination-solution/
	download counter		http://tutorialzine.com/2010/02/php-mysql-download-counter/
	login system			http://tutorialzine.com/2009/10/cool-login-system-php-jquery/
	notes					http://tutorialzine.com/2010/01/sticky-notes-ajax-php-jquery/
	générer des fichiers 	http://tutorialzine.com/2011/05/generating-files-javascript-php/
	beau menu				http://tutorialzine.com/2011/05/css3-animated-navigation-menu/
	chat					http://tutorialzine.com/2010/10/ajax-web-chat-php-mysql/
	who is online			http://tutorialzine.com/2010/03/who-is-online-widget-php-mysql-jquery/
	*/
?>