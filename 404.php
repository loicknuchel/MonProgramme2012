<?php
	include_once './inc/utils.php';
	include_once './inc/head.php';
	include_once './inc/header.php';
	include_once './inc/quote.php';
	include_once './inc/comments.php';
	include_once './inc/forms.php';
	include_once './inc/footer.php';
	include_once './inc/scripts.php';
?>

<?php echo generateHead(' - Erreur 404 !', ''); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="404" style="margin-top: 30px;">
				<h1>ERREUR 404 !</h1>
				La page demandée n'a pas été trouvée.
			</div>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	<?php echo generateScriptsJs(); ?>
</body>
</html>