<?php
	include_once './fragments/utils.php';
	include_once './fragments/head.php';
	include_once './fragments/header.php';
	include_once './fragments/quote.php';
	include_once './fragments/comments.php';
	include_once './fragments/forms.php';
	include_once './fragments/footer.php';
	include_once './fragments/scripts.php';
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