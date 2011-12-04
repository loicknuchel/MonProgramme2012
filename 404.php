<?php
	$rel_to_root = './';
	include_once $rel_to_root.'fragments/utils.php';
	include_once $rel_to_root.'fragments/head.php';
	include_once $rel_to_root.'fragments/header.php';
	include_once $rel_to_root.'fragments/quote.php';
	include_once $rel_to_root.'fragments/comments.php';
	include_once $rel_to_root.'fragments/forms.php';
	include_once $rel_to_root.'fragments/footer.php';
	include_once $rel_to_root.'fragments/scripts.php';
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
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>