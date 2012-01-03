<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr);
	
	$page = 'le-vote-electronique.php';
	$page_id = $pageId['voteelectronique']['id'];
	$result = api_call('GET', $usr['api_url'].'comment.php', array('key'=>$usr['key'],'type'=>'page','id'=>$page_id,'p'=>isset($_GET['p']) ? $_GET['p'] : null));
?>

<?php echo generateHead(' - Le vote électronique', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($usr, $rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Le vote électronique</h1>
				<p>
					Le vote électronique est peut être un des sujet brûlants du moment. 
					Beaucoup de personnes et associations condamnent ce système de vote à cause de l'impossibilité actuelle de garantir suffisament de sécurité, de fiabilité et de transparence.
					Personnellement, je ne peux qu'être d'accord sur ces points, l'informatique est certainement l'un des domaines où il est le plus difficile à garantir une fiabilité et une transparence, surtout sur des sujets
					d'enjeux nationnaux.
				</p>
				<p>
					Toutefois, en prenant un peu de recul, il me semble que ce système de vote devienne incontournable dans l'avenir. 
					Il ne sera pas possible sur le long terme, même avec les meilleurs arguments, d'empêcher les responsables politiques de mettre en place ce système (ça commence d'ailleurs, ici et là...).<br/>
					Partant de ce constat, il me semble nécessaire de participer à la réflexion sur le sujet et, si possible de l'orienter dans la meilleure direction.
				</p>
				<p>
					<h2>Quels avantages ?</h2>
					Malgré tout, si une solution pouvait apporter les garanties nécessaires à un tel système, le vote électronique pourrait beaucoup apporter au processus de prise de décision collectif.
					En effet, la possibilité de 
				</p>
			</div>
			<?php
				
				$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
				
				if($result['response']['nbcomments'] > 0){
					$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
					$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
					
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, $page.'?p=', '#comment_block'); }
					echo generateCommentsBlock($comments, $rel_to_root);
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, $page.'?p=', '#comment_block'); }
				}
				
				$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
				echo generateCommentForm($usr, $commentResult, $page.'?p='.$lastPage, '#comment_block', 'page', $page_id);
			?>
		</div>
	</div>
	
	<?php echo generateFooter($rel_to_root); ?>
	
	<?php echo generateScriptsJs($rel_to_root); ?>
	
	<?php
		if(isset($commentResult)){
			if($commentResult['status']['code'] == 200){
				echo '<script>displayInfo("commentaire enregistré");</script>';
			}
			else{
				echo '<script>displayInfo("Erreur ('.$commentResult['status']['code'].') lors de la sauvegarde du commentaire");</script>';
			}
		}
	?>
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>