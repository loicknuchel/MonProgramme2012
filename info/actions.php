<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr);
	
	$page = 'actions.php';
	$page_id = $pageId['actions']['id'];
	$result = api_call('GET', $usr['api_url'].'comment.php', array('key'=>$usr['key'],'type'=>'page','id'=>$page_id,'p'=>isset($_GET['p']) ? $_GET['p'] : null));
?>

<?php echo generateHead(' - Les actions citoyennes', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Les actions citoyennes ?</h1>
				<p>
					Avec les élections qui approchent, de nombreuses personnes s'investissent dans la campagne, que ce soit pour soutenir un candidat, créer un débat ou diffuser des informations les initiatives venant de la part
					de citoyens sont toujours intéressantes.<br/>
					Ces sites sont regroupés ici sans parti-pris.
				</p>
				
				<h2>Surveillance de nos institutions et élus</h2>
				<p>
					<dl>
						<dt><a target="_blanck" href="http://www.regardscitoyens.org">www.regardscitoyens.org</a></dt>
						<dd>
							Collectif qui se donne pour but de faciliter l'accès aux informations sur nos institutions.
						</dd>
						
						<dt><a target="_blanck" href="http://www.nosdeputes.fr">www.nosdeputes.fr</a></dt>
						<dd>
							Site regroupant l'activité parlementaire de manière détaillée. 
							Site conçu par le collectif <a target="_blanck" href="http://www.regardscitoyens.org/qui-sommes-nous/">Regards citoyens</a>.
						</dd>
						
						<dt><a target="_blanck" href="http://www.nossenateurs.fr">www.nossenateurs.fr</a></dt>
						<dd>
							Site regroupant l'activité sénatoriale de manière détaillée.
							Site conçu par le collectif <a target="_blanck" href="http://www.regardscitoyens.org/qui-sommes-nous/">Regards citoyens</a>.
						</dd>
						
						<dt><a target="_blanck" href="http://mon-depute.fr">mon-depute.fr</a></dt>
						<dd>
							Site détaillant l'activité de chaque député du point de vue de ses votes.
						</dd>
						
						<dt><a target="_blanck" href="http://memopol2.lqdn.fr">memopol2.lqdn.fr</a></dt>
						<dd>
							Site qui recense les députés européens ainsi que les informations sur leur parcourt et pour les contacter. 
							Site conçu par <a target="_blanck" href="http://www.laquadrature.net/fr/qui-sommes-nous">La quadrature du net</a>.
						</dd>
						
						<dt><a target="_blanck" href="http://politique.slate.fr">politique.slate.fr</a></dt>
						<dd>
							Wikipol est un site d'information sur les hommes et femmes qui joueront un rôle dans les élections de 2012.
							Site conçu par <a target="_blanck" href="http://www.slate.fr">Slate</a>.
						</dd>
					</dl>
					<br/>
				</p>
				
				<h2>Liberté d'expression et débats</h2>
				<p>
					<dl>
						<dt><a target="_blanck" href="http://monprogramme2012.lkws.fr/info/projet.php">monprogramme2012.lkws.fr</a></dt>
						<dd>
							Site d'initiative personnelle pour créer un débat réel sur de vrais sujets de société.
						</dd>
						
						<dt><a target="_blanck" href="http://www.2012memepaspeur.net">www.2012memepaspeur.net</a></dt>
						<dd>
							Site appelant à se mobiliser et organiser des évènements pour la campagne.
							Site créé par <a target="_blanck" href="http://www.2012memepaspeur.net/qui_sommes_nous.php">le réseau Animafac</a>.
						</dd>
						
						<dt><a target="_blanck" href="http://pourquoijevoteoupas.eu/">pourquoijevoteoupas.eu</a></dt>
						<dd>
							Exprimez votre avis sur le vote, irez vous voter ou pas ? Quelles sont vos raisons ?
						</dd>
						
						<dt><a target="_blanck" href="http://www.touscandidats2012.fr/">www.touscandidats2012.fr</a></dt>
						<dd>
							Site appelant chaque personne a être candidate et à proposer son programme.
							Site créé par <a target="_blanck" href="http://www.colibris-lemouvement.org/colibris/notre-mission">l'association Colibris</a>.
						</dd>
						
						<dt><a target="_blanck" href="http://www.mon-programme-presidentiel.com/">www.mon-programme-presidentiel.com</a></dt>
						<dd>
							Un site ayant un but très proche de celui-ci. Il vous propose d'écrire vous même votre programme et de le soumettre aux vote des internautes.
						</dd>
						
						<dt><a target="_blanck" href="http://politiko.fr/">politiko.fr</a></dt>
						<dd>
							Site d'actualité politique.
						</dd>
						
						<dt><a target="_blanck" href="http://www.talkeo.fr/">www.talkeo.fr</a></dt>
						<dd>
							Site de débat généraliste (pas forcément politique).
						</dd>
					</dl>
					<br/>
				</p>
				
				<h2>Sites engagés pour des actions précises</h2>
				<p>
					<dl>
						<dt><a target="_blanck" href="http://www.le-message.org">www.le-message.org</a></dt>
						<dd>
							Site prônant la création d'une assemblée constituante tirée au sort.
						</dd>
						<dt><a target="_blanck" href="http://pourunrevenusocial.org">pourunrevenusocial.org</a></dt>
						<dd>
							Site pour un revenu social, universel, inconditionnel, maintenu par le collectif PouRS.
						</dd>
						<dt><a target="_blanck" href="http://www.nevotezpas.fr">www.nevotezpas.fr</a></dt>
						<dd>
							Site défendant le vote blanc. Créé par <a target="_blanck" href="http://www.nevotezpas.fr/qui.php">Philippe Martin</a>.
						</dd>
					</dl>
					<br/>
				</p>
				<br/>
				<p>
					Cette liste est bien entendue non exaustive donc n'hésitez pas à me faire part des sites que vous connaissez et qui vous semblent importants dans l'action citoyenne, 
					<a href="#" class="actions_link">en me contactant directement</a> ou en laissant un commentaire expliquant le rôle et les origines du site.<br/>
					<br/>
					<br/>
					Que pensez vous de ces actions ?<br/>
					Vous ont-elles incité à agir et vous mobilisé d'une manière ou d'une autre ? 
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