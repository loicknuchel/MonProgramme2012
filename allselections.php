<?php
	include './inc/server_link.php';
	
	$params = null;
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetSelections($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
?>

<?php echo generateHead(' - Toutes les sélections', $jsEnv); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$selections = isset($result['response']['selections']) ? $result['response']['selections'] : null;
				echo generateSelectionList($selections);
				
				$total_selection_pages = isset($result['response']['total_selection_pages']) ? $result['response']['total_selection_pages'] : null;
				$current_selection_page = isset($result['response']['current_selection_page']) ? $result['response']['current_selection_page'] : null;
				echo generateSelectionPager($total_selection_pages, $current_selection_page, 'allselections.php?p=');
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
</body>
</html>