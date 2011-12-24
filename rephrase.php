<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$rephraseResult = sendRephraseForm($usr);
	
	$result = api_call('GET', $usr['api_url'].'quote.php', array('key'=>$usr['key'],'quoteid'=>isset($_GET['id']) ? $_GET['id'] : null,'rephrase'=>1,'nocomment'=>1,'nopetition'=>1), true);
	$quote_id = isset($result['response']['id']) ? $result['response']['id'] : null;
?>

<?php echo generateHead(' - Rephrase proposition #'.$quote_id, $jsEnv); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$result = isset($result['response']) ? $result['response'] : null;
				//echo '<pre>'; print_r($result); echo '</pre>';
				
				echo generateRephraseForm($usr, $rephraseResult, $result);
				
				//echo generateQuoteBlock($result);
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?></body>
</html>