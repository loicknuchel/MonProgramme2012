<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$page = 'discutions.php';
	$page_id = $pageId['chat']['id'];
?>

<?php echo generateHead(' - Le chat', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Salon de discutions</h1>
				<p>
					
				</p>
			</div>
		</div>
	</div>
	
	<?php echo generateFooter($rel_to_root); ?>
	
	<?php echo generateScriptsJs($rel_to_root); ?>
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>