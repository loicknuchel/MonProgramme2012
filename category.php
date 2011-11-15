<?php
	include './inc/server_link.php';
	
	$params = null;
	$params['cat'] = isset($_GET['cat']) ? $_GET['cat'] : null;
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetQuoteListByCategory($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
?>

<?php 
	$cat_name = isset($result['response']['category_name']) ? $result['response']['category_name'] : null;
	$cat_id = isset($result['response']['category_id']) ? $result['response']['category_id'] : null;
	echo generateHead(' - Catégorie '.$cat_name, $jsEnv);
?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				echo "<div class=\"category_disclaimer\">
					categorie : ".str_replace('é', 'e', $cat_name)."
				</div>";
				
				$quotes = isset($result['response']['quotes']) ? $result['response']['quotes'] : null;
				
				if($quotes != null){
					foreach($quotes as $key => $quote){
						echo generateQuoteBlock($quote);
					}
				}
				
				$total_quote_pages = isset($result['response']['total_quote_pages']) ? $result['response']['total_quote_pages'] : null;
				$current_quote_page = isset($result['response']['current_quote_page']) ? $result['response']['current_quote_page'] : null;
				echo generateQuotePager($total_quote_pages, $current_quote_page, 'category.php?cat='.$params['cat'].'&p=');
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
</body>
</html>