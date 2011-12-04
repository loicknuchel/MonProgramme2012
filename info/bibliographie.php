<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr, $server_path);
	
	$page = 'bibliographie.php';
	$page_id = $pageId['biblio']['id'];
	
	$params = null;
	$params['type'] = 'page';
	$params['id'] = $page_id;
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

<?php echo generateHead(' - Bibliographie', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper"> 
			<div class="article">
				<h1 class="first">Les personnes qui m'ont inspiré ce site :</h1>
				<p>
					Parce que je n'ai pas eu l'illumination un matin en me levant, la décision de créer ce site a été prise lors d'un processus de prise de concience globale qu'il fallait vraiment changer les choses.
					Cette prise de concience s'est faite au travers de la découverte de beaucoup de personnes annimant des conférences, des médias ou simplement des mouvements citoyens.<br/>
					Je souhaiterais donc ici les mettre en avant afin de les remercier explicitement et de vous les faire découvrir si vous le souhaitez.
				</p>
				<p>
					<dl>
						<dt id="reflets">Reflets</dt>
						<dd>
							<a href="http://reflets.info/">Reflets</a> est un média en ligne où écrivent entre autre <a href="https://twitter.com/bluetouff">@bluetouff</a>, <a href="https://twitter.com/epelboin">@epelboin</a>, <a href="https://twitter.com/_Kitetoa_">@kitetoa</a>. 
							Il traite principalement des sujets informatiques et financiers.
							Les rédacteurs fabriquent l'information (au sens où ils effectuent les recherches nécessaire pour trouver de l'information non publiée) 
							et n'ont pas leur langue dans leur poche sur des articles réellement engagés.<br/>
							C'est pour moi un moyen d'information essentiel sur des problématiques qui me touchent.<br/>
							Ils sont proches d'association ou de groupement de personnes tels que <a href="http://telecomix.org/">telecomix</a> ou <a href="http://owni.fr/">OWNI</a>.
						</dd>
						<dt id="franckLepage">Franck Lepage</dt>
						<dd>
							Franck Lepage et son association <a href="http://www.scoplepave.org/">le pavé</a> organisent des <a href="http://www.scoplepave.org/conferences-gesticulees">conférences gesticulées</a>
							très divertissantes et didactiques. Notamment les confrénces <a href="http://www.youtube.com/watch?v=V-EERZNEOAM">inculture(s) 1</a>[1h23] et <a href="http://www.youtube.com/watch?v=YTSDeVquHks">inculture(s) 2</a>[2h26].<br/>
							D'autres sketchs sont aussi très sympa : <a href="http://www.youtube.com/watch?v=Ei8q0fn0Xc8">L'enjeu des retraites</a>[22min] et <a href="http://www.youtube.com/watch?v=VRkDgujIMpg">la langue de bois</a>[5min].
						</dd>
						<dt id="etienneChouard">Etienne Chouard</dt>
						<dd>
							<a href="http://etienne.chouard.free.fr/Europe/">Etienne Chouard</a> est un ardent défenseur de la démocratie réelle par le tirage au sort. Intuitivement cette idée semble un peu fantaisiste mais
							il faut <a href="http://etienne.chouard.free.fr/Europe/tirage_au_sort.php">regarder ses conférences</a> pour vraiment voir les vertues de ce système.<br/>
							Il parle aussi beaucoup de <a href="http://www.dailymotion.com/video/xhiymd_entretien-avec-etienne-chouard-1-l-argent-dette_news">création monétaire</a> et de 
							<a href="http://www.dailymotion.com/video/xkkyxc_etienne-chouard-10-raisons-de-sortir-de-l-union-europeenne_news">l'europe</a>[59min].
						</dd>
						<dt id="annieLacroix-Riz">Annie Lacroix-Riz</dt>
						<dd>
							Annie Lacroix-Riz a pour moi été une révélation. Sa <a href="http://www.dailymotion.com/video/x5njza_le-choix-de-la-defaite-annie-lacroi_news">conférence</a>[3h22] sur son nouveau livre : 
							"Le choix de la défaite"est édifiante. Elle y détaille les relations de pouvoir entre les politique, les militaire et les industriels. 
							Certes, les faits remontent à presque un siècle mais il est aisé d'imaginer que les choses ne se sont pas arrangées (voire qu'elles ont certainement empirées!).<br/>
							Elle fait aussi une analyse (actuelle) de la crise actuelle et de la guerre contre les salaires : <a href="http://www.dailymotion.com/video/xlkni0_conference-d-annie-lacroix-riz-27-09-2011_news">vidéo</a>.[1h18]<br/>
							Son travail et sa conférence sont réellement passionnants.
						</dd>
						<dt id="bernardFriot">Bernard Friot</dt>
						<dd>
							Bernard Friot fait une <a href="http://www.dailymotion.com/video/xh1foy_conference-bernard-friot-de-l-emploi-a-la-qualification_news">conférence sur l'enjeu des retraites</a>[2h24]. 
							Il remet en cause la notion même de travail et réfléchi de manière globale et radicalement différente sur les tenants et aboutissants de cette valeur.
						</dd>
						<dt id="jFNoubel">Jean-François Noubel</dt>
						<dd>
							J'ai découvert Jean-François Noubel dans une <a href="http://www.youtube.com/watch?v=PuZgkL5BEBk">conférence TEDxParis</a>[14min]. Il y parle de manière très imagée et très didactique de la création monétaire.
							Il prône les monnaies libres et plurielles. Pour lui l'argent régalien (cad contrôlé par des autorités suppérieures) arrive en fin de vie. Chacun devrait pouvoir créer sa monnaie.<br/>
							Le projet est présenté et détaillé sur le site <a href="http://people.thetransitioner.org/">thetransitioner.org</a>.
						</dd>
						<dt id="autres">...</dt>
						<dd>
							Et beaucoup d'autres comme les journaux <a href="http://owni.fr/">OWNI</a> et <a href="http://www.numerama.com/">numerama</a>.
						</dd>
					</dl>
				</p>
				<br/>
				<p>
					Cette liste et ces descriptions s'étofferont avec le temps au fur et à mesure de mes découvertes.<br/>
					J'espère que vous apprécierez ces informations qui mes semblent essentielles.<br/>
					<br/>
					Et vous ? Avez vous des <span>réflexions ou des auteurs à partager ?</span>
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
				echo generateCommentForm($usr, $server_path, $commentResult, $page.'?p='.$lastPage, '#comment_block', 'page', $page_id);
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