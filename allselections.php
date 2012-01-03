<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$result = api_call('GET', $usr['api_url'].'selection.php', array('key'=>$usr['key'], 'p'=>'all' ), false );
?>

<?php echo generateHead(' - Toutes les sélections', $jsEnv); ?>
<body>
	<?php echo generateHeader($usr); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$selections = isset($result['response']['selections']) ? $result['response']['selections'] : null;
				echo generateSelectionBlock($selections);
				
				$total_selection_pages = isset($result['response']['total_selection_pages']) ? $result['response']['total_selection_pages'] : null;
				$current_selection_page = isset($result['response']['current_selection_page']) ? $result['response']['current_selection_page'] : null;
				if($total_selection_pages > 1){
					echo generateSelectionPager($total_selection_pages, $current_selection_page, 'allselections.php?p=');
				}
			?>
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