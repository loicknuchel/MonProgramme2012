<?php
	$rel_to_root = './';
	include_once $rel_to_root.'inc/server_link.php';
?>

<?php echo generateHead('Erreur 404 !', $jsEnv); ?>
<body>
	<?php echo generateHeader(null); ?>
	
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