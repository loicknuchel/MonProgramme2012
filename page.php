<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/conventions.php';
	
	if(isset($_GET['id'])){
		foreach($pageId as $content){
			if($_GET['id'] == $content['id']){
				header('Location: '.$content['link']);
				exit();
			}
		}
		header('Location: 404.php');
		exit();
	}
	else{
		header('Location: 404.php');
		exit();
	}
?>