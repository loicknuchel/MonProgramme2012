<?php
	include './inc/server_link.php';
	
	$commentResult = sendCommentForm($usr, $server_path);
	
	$params = null;
	$params['quoteid'] = isset($_GET['id']) ? $_GET['id'] : null;
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetQuoteById($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
	
	$_GET['id'] = $result['response']['id'];
?>

<?php echo generateHead(' - Proposition #'.$params['quoteid'], $jsEnv); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$quote = isset($result['response']) ? $result['response'] : null;
				$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
				
				echo generateQuoteBlock($quote, true);
				
				if($quote['total_comments'] > 0){
					$quote_id = isset($result['response']['id']) ? $result['response']['id'] : null;
					$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
					$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
					
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'quote.php?id='.$quote_id.'&p='); }
					echo generateCommentsBlock($comments);
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'quote.php?id='.$quote_id.'&p='); }
					
				}
				
				$id = isset($_GET['id']) ? $_GET['id'] : (isset($_POST['id']) ? $_POST['id'] : '');
				$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
				echo generateCommentForm($usr, $server_path, $commentResult, 'quote.php?id='.$id.'&p='.$lastPage, 'quote', $id);
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	
	<?php
		if(isset($commentResult)){
			if($commentResult['status']['code'] == 200){
				echo '<script>displayInfo("success", "commentaire enregistré");</script>';
			}
			else{
				echo '<script>displayInfo("error", "Erreur ('.$commentResult['status']['code'].') lors de la sauvegarde du commentaire");</script>';
			}
		}
	?></body>
</html>