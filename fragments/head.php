<?php

function generateHead($titre, $jsEnv, $rel_to_root = './'){
	$html = '<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<title>Mon Programme 2012'.$titre.'</title>
	<meta name="description" content="">
	<meta name="author" content="">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="'.$rel_to_root.'favicon.ico">
	<link rel="apple-touch-icon" href="'.$rel_to_root.'apple-touch-icon.png">
	<link rel="stylesheet" href="'.$rel_to_root.'js/libs/fancybox/jquery.fancybox-1.3.4.css">
	<link rel="stylesheet" href="'.$rel_to_root.'js/libs/contactable.1.3/contactable.css">
	<link rel="stylesheet" href="'.$rel_to_root.'themes/main/styles.css?v=2">

	<script src="'.$rel_to_root.'js/libs/modernizr-1.7.min.js"></script>
	<script src="'.$rel_to_root.'js/strings.js"></script>
	'.$jsEnv.'
</head>';
	return $html;
}

?>