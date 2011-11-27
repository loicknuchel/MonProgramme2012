<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr, $server_path);
	
	$page = 'events.php';
	$page_id = $pageId['event']['id'];
	
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

<?php echo generateHead(' - Les évènements organisés', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Pourquoi des évènements ?</h1>
				<p>
					Comme beaucoup de personnes que je rencontre, j'apprécie beaucoup parler de politique. Je lis et je discute beaucoup sur des journaux en ligne, des blogs ou des forums et cela m'enrichi beaucoup.
					Toutefois, toute cette activité est faite en ligne, donc sans réelle interaction avec des personnes.
				</p>
				<p>
					C'est pourquoi, je souhaite mettre en place des rencontres afin de pouvoir échanger avec d'autres personnes lors d'une discution (ce qui est beaucoup plus stimulant). 
					L'autre avantage, pour moi, est de pouvoir rencontrer des personnes qui ont les mêmes centres d'intérêt et ainsi rester motivé et continuer d'agir (voire m'inpliquer encore plus) sur ces enjeux de société.
				</p>
				<p>
					Je vous propose donc des rendez-vous de discution, ouverts (bien entendu) à tous.
				</p>
				<p>
					Je vous demanderais juste de vous inscrire afin de pouvoir prévoir le nombre de personnes (et ainsi ne pas se retrouver seul ou en surnombre) et éventuellement adapter le lieu de rendez-vous.
				</p>
			</div>
			
			<div class="article">
				<h1 class="first">Premier contact</h1>
				<p>
					<?php
						$params = null;
						$params['type'] = 'event';
						$params['id'] = 1;
						$params['noheaders'] = 1;
						$json = apiGetRessourceSuivi($usr, $params, $server_path);
						$eventResult = json_decode($json, true);
						$status_code = isset($eventResult['status']['code']) ? $eventResult['status']['code'] : null;
						$nbInscrits = 0;
						if($status_code == 200){
							$nbInscrits = $eventResult['response']['total_suivis'];
						}
					?>
					
					Pour ce premier essai de rendez-vous, je vous propose de le faire la semaine du 9 (au 15) janvier.<br/>
					Comme c'est une première, et afin d'éviter que l'on soit trop ou trop peu, la réalisation de cet évènement est soumis à des conditions de nombre d'inscrits.
					Si vous êtes intéressés par venir discuter à cette rencontre, inscrivez vous ici pour être comptabilisés dans les présents et être tenu au courant des détails.<br/>
					
					<form class="formEvent" action="" method="post" style="float:left;">
						<fieldset>
							<input type="hidden" name="formEventId" value="<?php echo $params['id']; ?>" />
							<input type="text" name="formEventName" placeholder="Entrez votre nom *" />
							<input type="text" name="formEventSubject" placeholder="Centre(s) d'intérêts" />
							<input type="text" name="formEventEmail" placeholder="Entrez votre adresse mail *" />
							<input type="submit" value="S'inscrire !" /> 
							<span style="font-size: 1.2em;">(<span class="nbInscrits"><?php echo $nbInscrits; ?></span> inscrits !)</span>
						</fieldset>
					</form>
					
					<div class="presents" style="margin-left: 250px;">
						<h2>Personnes inscrites (<span class="nbInscrits"><?php echo $nbInscrits; ?></span>) :</h2>
						<table>
						<?php
							for($i=0; $i<$nbInscrits; $i++){
								echo '<tr><td>'.$eventResult['response']['suivi'][$i]['name'].'</td><td>( intéréssé par : '.$eventResult['response']['suivi'][$i]['info'].' )</td></tr>';
							}
						?>
						</table>
					</div>
					
					<div class="clear"></div>
				</p>
			</div>
			<?php
				
				$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
				
				if($result['response']['nbcomments'] > 0){
					$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
					$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
					
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, $page.'?p='); }
					echo generateCommentsBlock($comments, $rel_to_root);
					if($total_comment_pages > 1){ echo generateCommentPager($total_comment_pages, $current_comment_page, $page.'?p='); }
				}
				
				$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
				echo generateCommentForm($usr, $server_path, $commentResult, $page.'?p='.$lastPage, 'page', $page_id);
			?>
		</div>
	</div>
	
	<?php echo generateFooter($rel_to_root); ?>
	
	<?php echo generateScriptsJs($rel_to_root); ?>
	
	<?php
		echo '<script src="'.$rel_to_root.'js/events.js"></script>';
		if(isset($commentResult)){
			if($commentResult['status']['code'] == 200){
				echo '<script>displayInfo("success", "commentaire enregistré");</script>';
			}
			else{
				echo '<script>displayInfo("error", "Erreur ('.$commentResult['status']['code'].') lors de la sauvegarde du commentaire");</script>';
			}
		}
	?>
</body>
</html>