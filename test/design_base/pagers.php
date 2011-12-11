<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title></title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	<link rel="stylesheet" href="css/style.css?v=2">
	<link rel="stylesheet" href="css/pagers.css?v=2">

	<script src="js/libs/modernizr-1.7.min.js"></script>
</head>
<body>
	<div style="width: 1000px; margin: auto; margin-bottom: 100px; padding: 20px;">
		<a href="./"><= return</a><br/>
		<br/>
		<?php 
			include '../../fragments/pagers.php';
			$pagerWidth = 3;
			$nbPages['small'] = 1;
			$nbPages['mediaum'] = 10;
			$nbPages['large'] = 20;
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$baseUrl = 'pagers.php?p=';
			$anchor = '#coucou';
		?>
		Blue Pager : 
		<?php 
			$pagerClass = 'blue_pager';
			echo generatePager($pagerClass, $pagerWidth, $nbPages['small'], 	$curPage, $baseUrl, $anchor); 
			echo generatePager($pagerClass, $pagerWidth, $nbPages['mediaum'], 	$curPage, $baseUrl, $anchor); 
			echo generatePager($pagerClass, $pagerWidth, $nbPages['large'], 	$curPage, $baseUrl, $anchor);
		?>
		
		Red Pager :
		<?php 
			$pagerClass = 'red_pager';
			echo generatePager($pagerClass, $pagerWidth, $nbPages['small'], 	$curPage, $baseUrl, $anchor); 
			echo generatePager($pagerClass, $pagerWidth, $nbPages['mediaum'], 	$curPage, $baseUrl, $anchor); 
			echo generatePager($pagerClass, $pagerWidth, $nbPages['large'], 	$curPage, $baseUrl, $anchor);
		?>
		
		
		
		
	</div>
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="js/pagers.js"></script>
	<!--[if lt IE 7 ]>
	<script src="js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
</body>
</html>