<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr);
	$petitionResult = sendPetitionForm($usr);
	
	$pc = isset($_GET['pc']) ? $_GET['pc'] : null;
	$pp = isset($_GET['pp']) ? $_GET['pp'] : null;
	$result = api_call('GET', $usr['api_url'].'quote.php', array('key'=>$usr['key'],'quoteid'=>isset($_GET['id']) ? $_GET['id'] : null,'pc'=>$pc,'pp'=>$pp), true);
	$quote_id = isset($result['response']['id']) ? $result['response']['id'] : null;
?>

<?php echo generateHead('Proposition #'.$quote_id, $jsEnv); ?>
<body>
	<?php echo generateHeader($usr); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				$quote = isset($result['response']) ? $result['response'] : null;
				$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
				$signatures = isset($result['response']['signatures']) ? $result['response']['signatures'] : null;
				
				echo generateQuoteBlock($quote, 'expanded');
			?>
			
			<div id="footerQuoteSlider">
				<ul class="navigation">
					<li><a href="#commentContainer">Commentaires</a></li>
					<li><a href="#petitionContainer">Pétition</a></li>
					<!--<li><a href="#wikiContainer">Wiki</a></li>-->
				</ul>

				<!-- element with overflow applied -->
				<div class="scroll">
					<!-- the element that will be scrolled during the effect -->
					<div class="scrollContainer">
						<!-- our individual panels -->
						<div class="panel" id="commentContainer">
							<?php
								if($quote['total_comments'] > 0){
									$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
									$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
									
									if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'quote.php?id='.$quote_id.'&pp='.$pp.'&pc=', '#commentContainer'); }
									echo generateCommentsBlock($comments);
									if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'quote.php?id='.$quote_id.'&pp='.$pp.'&pc=', '#commentContainer'); }
								}
								
								$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
								echo generateCommentForm($usr, $commentResult, 'quote.php?id='.$quote_id.'&pp='.$pp.'&pc='.$lastPage, '#commentContainer', 'quote', $quote_id);
							?>
						</div>
						<div class="panel" id="petitionContainer">
							<?php
								$total_petition_pages = isset($result['response']['total_petition_pages']) ? $result['response']['total_petition_pages'] : null;
								$current_petition_page = isset($result['response']['current_petition_page']) ? $result['response']['current_petition_page'] : null;
								
								if($total_petition_pages > 1){ echo generatePetitionPager($total_petition_pages, $current_petition_page, 'quote.php?id='.$quote_id.'&pc='.$pc.'&pp=', '#petitionContainer'); }
								echo generatePetitionBlock($signatures, $quote['total_signatures']);
								if($total_petition_pages > 1){ echo generatePetitionPager($total_petition_pages, $current_petition_page, 'quote.php?id='.$quote_id.'&pc='.$pc.'&pp=', '#petitionContainer'); }
								
								echo generatePetitionForm($usr, $petitionResult, 'quote.php?id='.$quote_id.'&pc='.$pc.'&pp=1', '#petitionContainer', 'quote', $quote_id);
							?>
						</div>
						<!--<div class="panel" id="wikiContainer">
							<?php
								echo '
								<div>
									Le Wiki ici !
								</div>';
							?>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	
	<?php
		if(isset($commentResult)){
			if($commentResult['status']['code'] == 200){ echo '<script>displayInfo("success", "commentaire enregistré");</script>'; }
			else if($commentResult != 500){ echo '<script>displayInfo("error", "Erreur ('.$commentResult['status']['code'].') lors de la sauvegarde du commentaire");</script>'; }
		}
		if(isset($petitionResult)){
			if($petitionResult['status']['code'] == 200){ echo '<script>displayInfo("success", "signature enregistrée.<br/>Vous allez recevoir un mail pour confirmer votre signature !");</script>'; }
			else if($petitionResult == 500){ echo '<script>displayInfo("info", "Vous avez déjà signé cette pétition !");</script>'; }
			else{ echo '<script>displayInfo("error", "Erreur ('.$petitionResult['status']['code'].') lors de l\'enregistrement de votre signature");</script>'; }
		}
	?>
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?></body>
</html>