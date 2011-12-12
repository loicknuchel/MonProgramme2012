<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr);
	
	$page = 'projet.php';
	$page_id = $pageId['projet']['id'];
	$result = api_call('GET', $usr['api_url'].'comment.php', array('key'=>$usr['key'],'type'=>'page','id'=>$page_id,'p'=>isset($_GET['p']) ? $_GET['p'] : null));
?>

<?php echo generateHead(' - Le projet', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Pourquoi ce site ?</h1>
				<p>
					Tout d'abord, il me parait essentiel de préciser que ce site est <span>l'initiative personnelle</span> d'un simple citoyen n'ayant souscrit à <span>aucun parti ou association politique</span>.<br/>
					Cette précision faite, on peut se demander : pourquoi un tel site ?<br/>
					Tout simplement parce que de fil en aiguille, j'ai été amené à m'intéresser à diverses personnalités qui développent des réflexions très pertinentes et intéressantes sur notre système politique ;
					que ce soit 
					<span>Franck Lepage</span> avec ses <a href="http://www.scoplepave.org/la-culture">conférences gesticulées</a> sur l'éducation (très divertissantes), 
					<span>Etienne Chouard</span> lors de <a href="http://etienne.chouard.free.fr/Europe/tirage_au_sort.php">conférences</a> passionnantes sur la démocratie grecque et le processus de création monétaire ou
					<span>Annie Lacroix-Riz</span> dans ses <a href="http://www.dailymotion.com/video/x5njza_le-choix-de-la-defaite-annie-lacroi_news">propos sur l'histoire</a>.
					Chacun d'eux m'a permis de me rendre compte, qu'en dehors des discours de politiciens, des solutions existaient et n'attendaient que d'être diffusées pour pouvoir être mises en place.
				</p>
				<h1>Mais dans quel but ?</h1>
				<p>
					Le but de ce site est de <span>permettre à chacun de s'exprimer</span> sur ce qu'il souhaite pour 2012.<br/>
					Quels changements doivent s'opérer ? Quelles initiatives soutenir ? Quelles réformes devraient être mises en place ?<br/>
					Ce site se veut un <span>espace d'échange</span> et de <span>découvertes d'idées</span>.
				</p>
				<p>
					Concrêtement, le site est basé sur les propositions des visiteurs. Elles sont catégorisées et classées par nombre de votes afin de faire ressortir les plus populaires.
					Elles peuvent être commentées pour créer un débat autour de celles-ci.
					Chaque proposition possède aussi une pétition, ce qui permet de la soutenir de manière plus concrète qu'un simple vote.<br/>
					Ce site est en perpétuelle évolution, vous pouvez consulter la liste des évolutions prévues dans <a href="<?php echo $rel_to_root.'info/faq.php#guide'; ?>">le FAQ</a>.
				</p>
				<h1>Parler, certes, mais à quoi cela sert-il ?</h1>
				<p>
					Il me semble essentiel de réellement se rendre compte que politiquement, <span>tout est fait pour nous dégouter de la politique</span> et nous maintenir dans une spirale pessimiste.
					Nous avons toujours des "connaissances insuffisantes" (comme s'il fallait être spécialiste pour en discuter!), on nous culpabilise à la moindre bêtise que l'on dit, 
					nous vivons dans un monde trop complexe (il paraît!), nos appels à discussion avec les politiciens n'ont jamais de réponse, nos initiatives sont souvent ignorées, 
					nos votes sont bafoués par les politiciens (et le vote blanc ignoré!)...
				</p>
				<p>
					Cet état de fait n'est pas là par hasard, il est sciemment mis en place afin que l'on 
					<a href="http://pourquoijevoteoupas.eu/index.php?id=143" title="Parce que si nous ne nous occupons pas de politique, les politiques s'occupent de nous !">s'intéresse le moins possible aux affaires politiques</a>.
					Ce <span>manque d'intérêt nous est fatal</span> lors des prises de décisions et permet aux politiciens d'agir librement.
				</p>
				<p>
					Il est essentiel de voir que des alternatives existent, qu'elles peuvent nous permettre de vivre radicalement mieux et que ce ne sont pas des utopies. Lorsque nous sommes convaincus que les choses
					peuvent réellement s'améliorer si <span>on se mobilise</span> et qu'à son tour <span>on mobilise son entourage</span> en leur demandant d'en faire autant, alors il est très facile de rester optimiste et de faire tout 
					ce qui est en notre	pouvoir pour faire évoluer les choses (chacun avec ses moyens).<br/>
					Le <a href="http://pourquoijevoteoupas.eu/index.php?id=16" title="Si faire l'amour tous les 5 ans ce n'est pas une vie sexuelle, voter tous les 5 ans est-ce une vie démocratique ?">vote seul ne suffira jamais</a>
					à provoquer de vrais changements positifs.
				</p>
				<h1>Que faire maintenant ?</h1>
				<p>
					Il est, je pense, <span>nécessaire de s'informer</span> auprès de personnes proposant des <span>alternatives positives</span> sur des sujets très variés. 
					Je peux vous suggérer de jeter un coup d'oeil à la <a href="<?php echo $rel_to_root.'info/bibliographie.php'; ?>">bibliographie</a> que j'ai faite et qui m'a personnellement motivé pour monter ce site 
					et participer à d'autres actions.<br/>
					Il est également important de participer à des actions pour se rendre compte que <span>beaucoup de personnes sont actives</span>, chacunes à leur manière, et trouver la bonne idée à lancer ou à rejoindre.<br/>
					Enfin, parler autour de soi de tout ce que l'on a pu découvrir, partager et proposer aux personnes de s'impliquer elles aussi dans les actions dans lesquelles elles croient.
				</p>
				<h1>Et c'est tout ?</h1>
				<p>
					Et bien non, je suis en train de prospecter pour <span>organiser des rencontres sur Paris</span> afin de discuter de tout ceci.<br/>
					Si tu es intéressé(e), tu peux <a href="#" class="contact_direct">me contacter directement</a>, laisser un commentaire ici et/ou t'inscrire à la newsletter (dans le pied de page) pour être tenu(e) au courant.<br/>
					L'objectif est toujours de partager des idées, rencontrer des personnes et créer une dynamique qui entretienne la motivation.
				</p>
				<br/>
				<br/>
				<h3>Et toi, qu'est-ce qui te motive ?</h3>
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