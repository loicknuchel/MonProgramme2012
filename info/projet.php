<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr, $server_path);
	
	$params = null;
	$params['type'] = 'page';
	$params['id'] = $pageId['projet']['id'];
	$params['p'] = isset($_GET['p']) ? $_GET['p'] : null;
	$params['noheaders'] = 1;
	$json = apiGetCommentsByTypeId($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: '.$rel_to_root.'404.php');   
		exit;
	}
	
?>

<?php echo generateHead(' - Le projet', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1>Quel constat ?</h1>
				<p>
					Depuis que je m'intéresse à la politique et aussi loin que j'ai pu remonter, je constate que les problèmes sont toujours les mêmes, que les hommes et femmes politiques proposent toujours les mêmes solutions,
					et que la situation n'évolue pas. 
				</p>
				<p>
					Je constate aussi que notre système politique ne permet pas que nous soyons acteurs de la politique.
					En effet, l'élection fait en sorte que nous n'ayons le choix qu'entre deux partis politiques (le PS et l'UMP actuellement).
				</p>
				
				<h1>Pour quelle solution ?</h1>
				
				
				<h1>Pourquoi ce site ?</h1>
				<h2>Le constat</h2>
				<p>Depuis plus de 30 ans, nos dirigeants politiques, de gauche comme de droite, font preuve d’une <span><a href="">irresponsabilité accablante</a></span>, quel que soit le domaine : économie, éducation, sécurité, etc. </p>
				<p>Ils ne se comportent plus comme des hommes et des femmes investis, censés diriger le pays dans l’intérêt collectif, mais comme des <span>marchands de voix.</span> </p>
				<p>De ce fait, à chaque élection, des millions de citoyens sont <span>résignés</span> à voter <span>sans aucune conviction</span>, parce qu’il faut bien remplir “son devoir civique”. La situation <span>se dégrade ainsi de plus en plus</span>, dans tous les domaines, quel que soit le “camp” politique qui se trouve aux responsabilités. </p>
				<p>Aujourd’hui, la crise financière, qui a été entièrement provoquée par les banques (<a href="">qui ont cru bon de jouer à un gigantesque casino mondial avec notre argent, pour gagner toujours plus</a>), nous met littéralement à genoux. </p>
				<p>Et nos dirigeants politiques, de gauche comme de droite, après avoir renfloué en 2008 ces banques avec l’argent public, n’ont qu’une solution à proposer : recommencer en faisant payer les contribuables que nous sommes, encore et toujours plus, plutôt que les véritables responsables, qui continueront ainsi à engranger des bénéfices et autres bonus aussi indécents que scandaleux. </p>
				<p>Ainsi, sous prétexte que les banques seraient le “moteur de l’économie” (quel moteur, en passant...), elles pourraient être à l’origine des pratiques les plus abjectes, en toute impunité... </p>
				<p>Partout dans le monde, récemment aux Etats-Unis (les indignés de Wall- Street), pourtant mère patrie du capitalisme pur et dur, les citoyens se révoltent, ne supportant plus de payer à la place des véritables responsables. </p>
				<p>D’autres problèmes graves apparaissent également plus que jamais, dans les domaines cités plus haut : éducation, sécurité, mais aussi découlant de la gestion calamiteuse de l’Etat dans nombre de secteurs. Sans compter les innombrables scandales politico-financiers... </p>
				<p>Pour rejeter cette pratique de la politique totalement archaïque et d’un autre âge, pour ne pas dire qu’elle relève tout simplement de la monarchie, il serait normal que le vote blanc soit comptabilisé dans les suffrages exprimés, car après tout, il s’agit bien d’une expression aussi légitime qu’une autre, mais les politiques le refusent obstinément (on comprend aisément pourquoi...) </p>
				<p>Les démarches, tout à fait louables, engagées récemment par Bruno Gaccio et Marie Naudet (”Blanc, c’est pas nul”), même s’il semblerait qu’elles puissent aboutir à une loi, ne changeraient en rien la situation, étant donné que les votes blancs n’entreraient pas dans les suffrages exprimés, et ne provoqueraient pas de blocage en cas de votes blancs massifs. </p>
				<p>En outre, cette loi n’entrerait pas en vigueur pour la prochaine élection présidentielle...</p>
				<h6>Loic Knuchel</h6>
			</div>
			<?php
				
				$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
				
				if($result['response']['nbcomments'] > 0){
					$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
					$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
					
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'projet.php?p='); }
					echo generateCommentsBlock($comments, $rel_to_root);
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, 'projet.php?p='); }
					
				}
				
				$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
				echo generateCommentForm($usr, $server_path, $commentResult, 'projet.php?p='.$lastPage, 'page', $pageId['projet']['id']);
			?>
		</div>
	</div>
	
	<?php echo generateFooter($rel_to_root); ?>
	
	<?php echo generateScriptsJs($rel_to_root); ?>
	
	<?php
		/*
		if(isset($commentResult)){
			if($commentResult['status']['code'] == 200){
				echo '<script>displayInfo("commentaire enregistré");</script>';
			}
			else{
				echo '<script>displayInfo("Erreur ('.$commentResult['status']['code'].') lors de la sauvegarde du commentaire");</script>';
			}
		}
		*/
	?>
</body>
</html>