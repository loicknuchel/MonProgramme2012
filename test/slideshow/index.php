<?php
	$rel_to_root = '../../';
	include '../../inc/server_link.php';
	include '../../inc/conventions.php';
	
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
		//header('Location: '.$rel_to_root.'404.php');   
		//exit;
	}
	
?>

<?php echo generateHead(' - Le projet', $jsEnv, $rel_to_root); ?>
<link rel="stylesheet" href="test.css?v=2">
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1>Pourquoi ce site ?</h1>
				<h2>Le constat</h2>
				<p>Depuis plus de 30 ans, nos dirigeants politiques, de gauche comme de droite, font preuve d’une <span><a href="">irresponsabilité accablante</a></span>, quel que soit le domaine : économie, éducation, sécurité, etc. </p>
				<p>Ils ne se comportent plus comme des hommes et des femmes investis, censés diriger le pays dans l’intérêt collectif, mais comme des <span>marchands de voix.</span> </p>
				<p>De ce fait, à chaque élection, des millions de citoyens sont <span>résignés</span> à voter <span>sans aucune conviction</span>, parce qu’il faut bien remplir “son devoir civique”. La situation <span>se dégrade ainsi de plus en plus</span>, dans tous les domaines, quel que soit le “camp” politique qui se trouve aux responsabilités. </p>
				<p>Aujourd’hui, la crise financière, qui a été entièrement provoquée par les banques (<a href="">qui ont cru bon de jouer à un gigantesque casino mondial avec notre argent, pour gagner toujours plus</a>), nous met littéralement à genoux. </p>
				
				<div id="SlideShowContainer">
					<!--<h1><a href="http://www.snoupix.com">Slideshow avec jQuery</a></h1>-->
					<!-- Slideshow HTML -->
					<div id="slideshow">
						<div id="slidesContainer" style="overflow-x: hidden; overflow-y: hidden; ">
							<div id="slideInner">
								<div class="slide">
									<h2>Snoupix : Tutoriels Prog &amp; Design</h2>
									<p>
										<a href="http://www.snoupix.com"><img src="http://www.snoupix.com/demo/slider-jquery/img/img_slide_01.jpg" alt="Page d'accueil de Snoupix" width="215" height="145"></a>
										Si vous souhaitez en apprendre davantage sur le Web et tous ses secrets, alors le site Web <a href="http://www.snoupix.com">Snoupix.com</a> est fait pour vous.
									</p>
									<p>
										Vous y découvrerez un tas de tutos sur le développement en PHP/SQL/Javascript, l'intégration avec HTML/CSS ou encore la création d'interfaces de site web, en passant par l'ActionScript, 
										avec Flash &amp; Flex.
									</p>
								</div>
								<div class="slide">
									<h2>Galerie d'images AS3/XML</h2>
									<p>
										<a href="http://www.snoupix.com/galerie-d-image-en-as3-et-xml_tutorial_27.html"><img src="http://www.snoupix.com/demo/slider-jquery/img/img_slide_02.jpg" width="215" height="145" alt="Galerie AS3/XML"></a>
										<a href="http://www.snoupix.com/galerie-d-image-en-as3-et-xml_tutorial_27.html">Ce tutoriel</a> va vous apprendre à manipuler en ActionScript 3 un document XML afin d'en extraire du contenu. 
										Nous ferons appel à plusieurs outils de Flash avec la classe Tween (qui nous permettra de réaliser des effets) et d'autres composants comme les UILoader intégrés à Flash.
									</p>
									<p> 
									</p>
								</div>
								<div class="slide">
									<h2>Interface web sous Photoshop</h2>
									<p>
										<a href="http://www.snoupix.com/design-de-site-business_tutorial_23.html"><img src="http://www.snoupix.com/demo/slider-jquery/img/img_slide_03.jpg" width="215" height="145" alt="Interface web style business"></a>
										Voici un tutoriel Photoshop qui vous apprend à faire le design d'un site "business". Ce genre de design est plutôt destiné à des entreprises désirant posséder un site vitrine.
									</p>
									<p>
										En plus le fichier Photoshop est disponnible en téléchargement!
									</p>
								</div>
								<div class="slide">
									<h2>C'est la fin, Merci Six Revisions!</h2>
									<p>
										<a href="http://sixrevisions.com/tutorials/photoshop-tutorials/how-to-create-a-slick-and-clean-button-in-photoshop/">
											<img src="http://www.snoupix.com/demo/slider-jquery/img/img_slide_04.jpg" width="215" height="145" alt="Thumbnail image that says sleek button using photoshop that links to a Photoshop tutoril.">
										</a>
										Ceci est le dernier slide, si vous n'avez pas activé le retour automatique (dans le javascript), ce slide restera à jamais!
									</p>
									<p>
										Aussi, vous pouvez accéder aux tutos de <a href="http://sixrevisions.com/">Six Revisions</a> qui sont à l'origine de cette idée de tutorial (nous l'avons juste amélioré et traduit!). 
										Nous les remercions d'avoir accepter cette petite collaboration!
									</p>
								</div>
							</div>
						</div>
					</div>
					<!-- Slideshow HTML -->
					<!--<div id="slidefooter">
						<p><a href="admin/">Admin</a> - Créer un slideshow dynamique et accessible avec jQuery, par <a href="http://sixrevisions.com">Jacob Gube</a> et <a href="http://www.snoupix.com">Snoupix</a></p>
					</div>-->
				</div>
				
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
				echo generateCommentForm($usr, $server_path, $commentResult, 'projet.php?p='.$lastPage, 'page', $pageId['projet']);
			?>
		</div>
	</div>
	
	
	
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs($rel_to_root); ?>
	<script src="test.js"></script>
	
	<?php
	?>
</body>
</html>