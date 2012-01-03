<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	$commentResult = sendCommentForm($usr);
	
	$page = 'help.php';
	$page_id = $pageId['help']['id'];
	$result = api_call('GET', $usr['api_url'].'comment.php', array('key'=>$usr['key'],'type'=>'page','id'=>$page_id,'p'=>isset($_GET['p']) ? $_GET['p'] : null));
?>

<?php echo generateHead(' - Le projet', $jsEnv, $rel_to_root); ?>
<body>
	<?php echo generateHeader($usr, $rel_to_root); ?>
	
	<div id="main">
		<div class="wrapper">
			<div class="article">
				<h1 class="first">Un peu perdu ?</h1>
				<p>
					Pour toute question, prise de contact, discussion vous pouvez utiliser le formulaire de feedback sur la gauche.<br/>
				</p>
				
				<h1>Fonctionnalités</h1>
				<p>
					Faisons un petit tour des fonctionnalités de ce site...<br/>
					Mon but premier est que le site reste très simple d'utilisation et qu'une personne le découvrant pour la première fois se sente à l'aise. 
					Toutefois, je poursuis aussi l'objectif d'organiser, hiérarchiser et rendre acessible le contenu. Que ce soit les propositions ou les débats, la richesse de ce site repose dans son contenu et sa clareté.
					Il est donc nécessaire d'implémenter un certain nombre de fonctionnalités collaboratives mais sans complexifier le site.<br/>
					Je vais vous présenter ici la plupart des fonctionnalités du site afin que vous puissiez facilement l'exploiter au maximum de ses possibilités pour en ressortir le meilleur.
					
					<h2 id="programmes">Programmes</h2>
					<p>
						Les programmes permettent à chacun de regrouper les propositions qui lui plaisent dans une sélection appelé programme.
						Cela permet à chacun de diffuser les propositions qu'il juge utiles en les isolant des autres.<br/>
						Si vous avez donné un mot de passe à votre programme, vous pourrez le modifier à volonté afin qu'il colle au mieux avec ce que vous souhaittez.
						<h3 id="programmes-creer">Créer un programme</h3>
						<p>
							Pour créer un programme, vous devez d'abord sélectionner les propositions que vous voulez y ajouter avec "<span>&#9734; Ajouter au programme</span>" qui se trouve au bas des propositions.<br/>
							Si des propositions sont sélectionnez, vous devez voir apparaitre un nouveau menu sur la droite : "<span>&#9733; 1</span>". Il permet d'accéder à la page d'enregistrement du programme.<br/>
							Cette page vous récapitule toutes les propositions que vous avez sélectionnées et vous propose soit de "<span>Créer un nouveau programme</span>" avec vos propositions soit d'"<span>Ajouter à un programme</span>" les propositions que vous avez sélectionnées.<br/>
							Pour créer votre programme, il vous faudra fournir votre nom (ou pseudo) et créer un mot de passe qui vous permettra de modifier votre programme par la suite (le mot de passe ne doit pas être vide !).<br/>
							Vous êtes ensuite redirigé vers votre programme que vous pouvez dès lors partager !
						</p>
						<h3 id="programmes-ajout">Ajouter à un programme</h3>
						<p>
							Pour ajouter des propositions à votre programme, la manipulation est similaire à l'ajout. Vous sélectionnez vos propositions et vous vous rendez sur la page d'enregistrement du programme.<br/>
							Vous ouvrez l'autre formulaire ("<span>Ajouter à un programme</span>"), indiquez quel est votre programme et donnez votre mot de passe. Toutes les propositions seront alors ajoutées à votre programme.
						</p>
						<h3 id="programmes-suppr">Supprimer d'un programme</h3>
						<p>
							Lorsque vous vous trouvez sur la page de votre programme, regardez les <span>options des propositions</span>.<br/>
							Un nouveau champ est disponible : "<span>Supprimer de la sélection</span>".
							En sélectionnant cette option, vous supprimerez la proposition concernée de votre programme (après saisie de votre mot de passe).
						</p>
					</p>
					
					<h2 id="reformulation">Reformulation</h2>
					<p>
						Parce qu'une proposition ne sera surrement jamais parfaite la première fois, il peut être utile de la faire évoluer pour qu'elle soit la plus pertinente.
						Il est possible de reformuler uniquement le proposition et sa description.<br/>
						Pour reformuler une proposition, allez dans les <span>options de la proposition</span> et cliquez sur "<span>Reformuler la proposition</span>".
						L'écran de reformulation vous affichera l'historique des reformulations afin que vous puissiez vous inspirer des précédentes versions de la proposition.
						Il vous suffit alors de modifier le texte et de valider le formulaire.<br/>
						ATTENTION, lorsque vous reformulez une proposition vous devez garder l'esprit de la proposition originale. Une reformulation n'est pas une modification mais un ajustement de la proposition suite à un débat !
					</p>
					
					<h2 id="suivis">Suivis</h2>
					<p>
						Afin d'être tenu au courant des nouveaux commentaires vous pouvez suivre une proposition ou n'importe quel fil de commentaires.
						A chaque nouveau commentaire vous recevrez un mail vous permettant d'accéder directement aux mises à jour.<br/>
						Pour ce faire, il existe deux possibilités. 
						Soit lorsque vous laissez un commentaire en cochant la cas "<span>Recevoir une notification de réponse aux commentaires par email</span>" (vous devrez bien évidemment renseigner le mail!).
						Soit (pour les propositions) en allant sur les <span>options d'une proposition</span> et en cliquant sur "<span>Suivre cette proposition</span>". Vous devrez alors renseigner le numéro de la sélection ainsi que votre mail.
						A partir ce cet popup, vous pouvez aussi consulter la liste de tous vos suivis pour voir où vous en êtes.<br/>
						L'arrêt du suivi se fait (pour le moment) uniquement lors de la réception d'un mail. Un lien direct vous permettra de vous désinscrire.
					</p>
					
					<h2 id="meta-infos">Méta-infos</h2>
					<p>
						En cliquant sur le "<span>[ + ]</span>" en bas à droite des propositions vous pouvez voir les méta-infos.
						Elles offrent des informations complémentaires sur la proposition : la date de publication, le publieur, le contexte, la source ainsi que les programmes qui intègrent cette proposition.
					</p>
					
					<h2 id="petitions">Pétitions</h2>
					<p>
						Afin de vraiment donner du poids à une proposition, vous pouvez signer la pétition qui va avec chacune d'elle.<br/>
						Comme toute pétition sur internet, elle est nominative et demande une confirmation par mail pour être validée.
					</p>
					
					<h2 id="sujets">Sujets</h2>
					<p>
						Les propositions sont classées par sujet. Ce qui permet d'identifier des grands thèmes.<br/>
						La liste des sujets et disponible à partir du menu. Vous pouvez alors voir toutes les propositions relatives au sujet.<br/>
						Lorsque vous postez une nouvelle proposition, vous pouvez créer un nouveau sujet si ceux existants ne sont pas suffisants.<br/>
						ATTENTION de ne pas créer trop de sujets sinon ils n'ont plus d'intérêt !!!
					</p>
					
					<h2 id="classement">Classements</h2>
					<p>
						Les propositions peuvent être classées de plusieurs manières en fonction de ce que vous recherchez.
						<ul>
							<li><span>Populaires</span> : Idéal pour parcourir rapidement les propositions. Classé par : (vote positifs - votes négatifs).</li>
							<li><span>Commentées</span> : Permet de voir les propositions qui entrainent des débats. Classé par : nombre de commentaires.</li>
							<li><span>Dernières</span> : Permet de rapidement voir les derniers ajouts de propositions. Classé par : date de publication.</li>
							<li><span>Dernières Activités</span> : Permet de voir les dernières publications. Classé par : dernière date d'ajout lisible (publication ou commentaire).</li>
						</ul>
					</p>
				</p>
				
				<h1>Qu'en pensez vous ?</h1>
				<p>
					Voilà, le petit des fonctionnalités et options et terminé.<br/>
					Comme je suis informaticien et que j'ai entièrement conçu ce site web, les fonctionnalités évoluent au fur et à mesure des besoin que je peux imaginer et des demandes des utilisateurs.<br/>
					Je maintien une liste des fonctinnalités que j'aimerais implémenter dans le <a href="<?php echo $rel_to_root.'articles/faq.php#guide'; ?>">FAQ</a>.
					Vous êtes bien sûr invités à y jeter un coup d'oeil, donner votre avis, proposer une nouvelle fonctionnalité.
					L'objectif étant de faire de ce site un espace d'échange politique agréable et organisé, je suis ouvert à toute proposition si elle est bénéfique au contenu du site ou aux utilisateurs...
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