<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$params = null;
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetQuoteListByTopComment($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
?>

<?php echo generateHead(' - Propositions les plus commentées', $jsEnv); ?>
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
				echo generateQuotePager($total_quote_pages, $current_quote_page, 'top.php?p=');
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