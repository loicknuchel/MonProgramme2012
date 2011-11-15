<?php
	include './inc/server_link.php';
	
	$params = null;
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetQuoteListByLasts($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
?>

<?php echo generateHead(' - Dernières propositions', $jsEnv); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$quotes = isset($result['response']['quotes']) ? $result['response']['quotes'] : null;
				
				if($quotes != null){
					foreach($quotes as $key => $quote){
						echo generateQuoteBlock($quote);
					}
				}
				
				$total_quote_pages = isset($result['response']['total_quote_pages']) ? $result['response']['total_quote_pages'] : null;
				$current_quote_page = isset($result['response']['current_quote_page']) ? $result['response']['current_quote_page'] : null;
				echo generateQuotePager($total_quote_pages, $current_quote_page, 'lasts.php?p=');
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
</body>
</html>