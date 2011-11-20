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
				<h1 class="first">Quel constat ?</h1>
				<p>
					Depuis que je m'intéresse à la politique et aussi loin que j'ai pu remonter, je constate que <span>les problèmes sont toujours les mêmes</span>, 
					que les hommes et femmes politiques proposent <span>toujours les mêmes solutions</span>,
					et que la situation <span>n'évolue pas</span>. Au fur et à mesure de mes investigations dans plusieurs domaines, j'ai pu me rendre compte que des solutions existaient et qu'elles avaient déjà fait leur preuves pour certaines.
				</p>
				<p>
					Pour moi, le problème de notre système est que l'on <span>ne parle pas des vrais problèmes</span>. Que l'on s'occupe des cas particuliers mais qu'on laisse l'état général se dégrader. 
					Les politiques de tous bords se combattent sur des détails sans prendre de recul (volontairement?) pour adresser les problèmes globaux et essentiels.
				</p>
				
				<h1>Pour quelle solution ?</h1>
				<p>
					Je pense que la solution à cette situation de déni de réalité est que chaque citoyen <span>réinvestisse le champ politique</span>. 
					Bien sur, <info title="Vote tous les 5 ans, pas de référendum populaires, professionnalisation de la politique">tout a été fait pour nous dégouter</info> et
					nous faire croire que l'on ne peut rien changer à notre petit niveau. 
					Cela permet aux politiques d'agir en toute liberté sans être sérieusement remis en question.
				</p>
				<p>
					C'est donc l'objet de ce site : permettre à chacun de <span>s'exprimer et découvrir les opinions</span> des autres. 
					J'espère de cette manière que les discussions feront ressortir les sujets les plus importants et amèneront des propositions et des expérimentations de solutions.
				</p>
				<p>
					J'ai moi même des idées pour changer les choses en profondeur, à commencer par une sérieuse modification de notre processus de pris de décision collective (gouvernement et institutions) 
					et une clarification et réattribution des rôles de chacun des acteurs.
					La partie économique et monétaire me parrait, elle aussi, essentielle car c'est l'un des grands pouvoir actuel. 
					Je n'ai pas encore eu le temps d'écrire des articles pour étailler mes propos et présenter les solutions que j'envisage mais je prévois de le faire rapidement.
				</p>
				<p>
					Vous l'aurez compris, ce site souhaite privilégier la <span>réflexion de fond sur les sujets essentiels</span>. C'est pourquoi je tiens à ce qu'il ne soit pas mis en relation avec l'actualité politique.
				</p>
				
				<h1>C'est bien beau mais, quoi faire ?</h1>
				<p>
					C'est là où les choses deviennent difficiles. N'ayant pas de pouvoir, il est difficile de faire vraiment changer les choses.<br/>
					Heureusement, il arrive toujours un moment de basculement, où les personnes détenant le pouvoir deviennent plus fragiles et où il devient possible de changer le système en profondeur.
					Si nous nous sommes <span>préalablements mis d'accord</span> et que nous savons ce vers quoi nous souhaitons aller, 
					ce changement peut se faire de manière pacifique et surtout amener vers une organisation mûrement réfléchie et bien plus adaptée à nos souhaits.
					Mais c'est avant qu'il faut savoir ce que l'on souhaite, sinon, le moment venu, il sera difficile de se faire entendre et de créer un consensus.
				</p>
				<p>
					Il est donc très important de <span>diffuser dès maintenant vos idées</span> et de débattre autours de vous.<br/>
					Il est très important de politiser un maximum de personnes, non pas pour qu'elles aillent voter blanc ou noir 
					mais pour qu'elles commencent à réfléchir sérieusement à quelle alternative serait la plus souhaitable !<br/>
					Il est essentiel que les gens prennent concience que les choses risquent de changer et il faut qu'ils soient préparés et sachent ce qu'ils veulent avant que ce moment arrive.
				</p>
				<p>
					<br/>
					<span>Soyez tous candidats,<br/>
					proposez tous un programme,<br/>
					parlez autours de vous<br/>
					et devenez le moteur d'un nouveau système à votre image !<span>
				</p>
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