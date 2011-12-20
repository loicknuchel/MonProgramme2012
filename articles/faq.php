<?php
	$rel_to_root = '../';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Mon Programme 2012 - FAQ</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../themes/main/img/favicon.ico">
	<link rel="stylesheet" href="../js/libs/contactable.1.3/contactable.css">
    <link rel="stylesheet" href="./faq.css">
</head>
<body>
	<section>
		
		<header id="main">
			<div class="content">
				<section id="intro">
					<img src="../themes/main/img/logo.gif" style="height: 150px; float: left; margin-top: 0px;" />
					<h2>Mon Programme 2012</h2>
					<h3>
						Mon Programme 2012 est un <span>site collaboratif</span> ayant pour but de <span>partager des propositions</span> pour 2012.<br/>
						Chaque proposition est soumise aux commentaires, au vote et à une pétition de sorte de pouvoir mesurer l'engouement qu'elle remporte.<br/>
						Il est aussi possible de constituer et d'enregistrer des sélections de propositions afin de les partager plus facilement. 
					</h3>
				</section>

				<section id="example">
					<p>Objectifs :</p>

					<pre><code>
						Ce site a été conçu en partant du constat que les avancées dont nous avons besoins ne pourront venir des politiciens.<br/>
						Il est alors nécessaire de se prendre en main et de, chacun à son échelle, <span class="string">participer la société que nous souhaitons construire</span>.<br/>
						Et cela passe d'abord par un <span class="string">débat</span> qu'il faut mettre en place entre citoyens pour <span class="string">repolitiser le plus de personnes possibles</span>.<br/>
						Ce n'est que par le nombre que nous pourrons faire passer nos idées.<br/>
						<br/>
						Ce site est pour moi une participation à la création de ce débat citoyen nécessaire.<br/>
						<br/>
						<span class="mixin">Nous devons reprendre la main sur le champ politique !</span>
					</code></pre>
					
					<!--<p>Qui sommes nous :</p>
<pre></pre>-->

				</section>
			</div>
			<div style="clear: both"></div>
		</header>

		<section id="menu" style="position: absolute; top: 418px; " class=""> <!-- top = #main #intro {height} + 68px (ligne 212) -->
		<!--<section id="menu" style="position: absolute; top: 0px; " class="">-->
			<div class="content">
				<nav>
					<a href="#main">overview</a>
					<a href="#synopsis">F.A.Q.</a>
					<a href="#guide">Evolutions</a>
					<a href="#docs" id="guide-link">API</a>
					<a href="https://github.com/loicknuchel/MonProgramme2012">sources</a>
					<a href="#about">about</a>
					<a href="../">retour site</a>
				</nav>
				<div id="dropdown">
					<ul>
						<li><a href="#-connexion_API">Connexion à l'API</a></li>
						<li><a href="#-API_ressources">API ressources</a></li>
						<li><a href="#-codes_erreur">Codes d'erreur</a></li>
					</ul>
				</div>
			</div>
		</section>

		<section id="synopsis" class="page">
			<div class="content">
				<h1>Questions en vrac</h1>
				
				<div class="question">
					<h2>Quel est le but ?</h2>
					<p>
						Le but de ce site est relativement simple. Il est de montrer, autant aux politiciens qu'aux autres citoyens, que les français s'intéressent à la politique et que leurs opinions comptent.<br/>
						Plutôt que chacun râle dans son salon, toujours sur la même chose, il est plus utile de venir en discuter, de s'organiser pour voir comment faire évoluer les choses et surtout de faire entendre ses opinions.<br/>
					</p>
					<ul>
						<li class="title">Les objectifs affichés ici sont :</li>
						<li>Agir pour ne plus être exclu de la vie politique</li>
						<li>Ne plus subir les sujets de débats des hommes politiques et imposer les notres</li>
						<li>Débattre et rassembler les aspirations et propositions des français</li>
						<li>
							Ainsi que tout ce que vous ferez de cet outil... 
							(<a href="#" class="submit_goal" title="Parlez de vos envies d'objectif affiché, d'améliorations de l'outil ou tout autre...">faites des propositions</a>)
						</li>
					</ul>
				</div>
				
				<div class="question">
					<h2>Politique de confidentialité</h2>
					<p>
						Pour moi, l'anonymat et la liberté d'expression sont essentiels. Je relève donc des informations nécessaires (adresse ip) dans un but de lutte anti-spam.<br/>
						Les données relevées ne seront transmises sous aucune condition à un tiers et pourront être détruites en cas de problème.<br/>
						Concernant les données publiées, elle sont accessibles à tous à travers ce site ainsi que l'API mise en place. Le contenu étant totalement libre, il peut être dupliqué (que ce soit avec l'API ou sur
						demande d'une copie de la base de donnée).<br/>
						<br/>
						Il n'y a aucun système d'autentification et l'administration doit donc se faire en signalant les contenus abusifs.
					</p>
				</div>
				
				<div class="question">
					<h2>Technologies</h2>
					<p>
						Ce site a été développé entièrement avec PHP et MySQL.<br/>
						Dans un objectif de généricité, la partie persistance et la partie présentation ont été isolées :<br/>
						 - Une API s'occupe de la persistance des données (CroudQuotes).<br/>
						 - Un front est utilisé pour présenter les données issues de l'API et interragir avec celle-ci (MonProgramme2012).<br/>
						 <br/>
						 La partie CroudQuotes peut compartimenter et gérer différentes bases de données ce qui permet de créer des sites différents qui accèdent à des données isolées mais sur la même API.<br/>
						 Sur cette idée, une base de test existe avec laquelle vous pouvez faire des essais (cf <a href="#docs">la documentation de l'API</a>).
					</p>
				</div>
				
				<br/>
				<div class="question">
					<h3>D'autres questions ?</h3>
					<p>Si vous n'avez pas trouvé la réponse à votre question, vous pouvez <a href="#" class="new_question">la poser ici</a>.</p>
				</div>
			</div>
		</section>

		<section id="guide" class="page">
			<div class="content">
				<h1>Evolutions prévues pour le site</h1>
				<p>
					Voici la liste des évolutions techniques, fonctionnelles ou d'orientation du site qui sont prévues à plus ou moins long terme.<br/>
					Vous pouvez <a href="#" class="new_feature">proposer d'autres évolutions</a> ou <a href="#" class="comment_feature">commenter et organiser</a> celles que vous voyez ici (que ce soit sur la pertinence, la priorité ou la réalisation).
				</p>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #10</a> : Améliorer le système de commentaires</h2>
					<p>L'objectif est de mettre en avant les commentaires constructifs et de stimuler les débats sur le fond.</p>
					<ul>
						<li class="title">Pistes d'actions concrètes:</li>
						<li>mettre en avant les commentaires les mieux notés</li>
						<li>permettre de répondre à un commentaire spécifique</li>
						<li>se connecter au site pour pouvoir commenter (afin d'éviter les usurpations d'identité) => <a href="#" class="comment_evolution">A discuter !</a></li>
					</ul>
					<p>S'inspirer du système de commentaires sur <a href="http://www.rue89.com/2011/08/27/valerie-pecresse-lache-le-petit-secret-de-la-regle-dor-219551" target="_blanck">rue89</a> par exemple...</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #8</a> : Mettre une page de wiki par proposition</h2>
					<p>Chaque proposition aurait un espace wiki où il serait possible d'établir un texte de manière collaborative.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #7</a> : Signaler une proposition similaire</h2>
					<p>Afin de ne pas revoir plusieurs fois la même proposition, il serait possible de déclarer que deux propositions sont identiques. A ce moment là, les visiteurs seraient redirigés vers la proposition principale.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #6</a> : Possibilité de reformuler une proposition</h2>
					<p>Le but ici est d'avoir les propositions les plus claires possibles. Le texte serait donc choisi par un système de votes.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #5</a> : Possibiliter de fermer les commentaires</h2>
					<p>Cela pourra être utilisé temporairement si un débat devient inintéressant ou de manière permanente si la proposition est identique à une autre.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #4</a> : Classement des propositions par les dernières commentées</h2>
					<p>Ce classement permettrait de voir les derniers commentaires laissés sur les citations et ainsi participer aux sujets actifs du moment.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #3</a> : Pouvoir suggérer une autre catégorie pour une proposition</h2>
					<p></p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #2</a> : Agrandissement possible des zones de saisie de texte</h2>
					<p>Au fur et à mesure que l'on écrit un texte dans les zones prévues, la zone de texte s'agrandit pour que l'on voie l'ensemble de son texte sans barre de défilement.</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #1</a> : Enregistrer des sélections privées</h2>
					<p>Actuellement toutes les sélections sont publiques. Il pourrait être intéressant d'avoir des sélections visibles uniquement si l'on possède un mot de passe (donné lors de son enregistrement).</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #11</a> : Suivre une proposition <= FAIT !</h2>
					<p>S'inscrire au suivi pour une proposition nous tiens au courant par mail des activités de cette proposition (nouveaux commentaires, mises à jour, etc.)</p>
				</div>
				
				<div class="evolution">
					<h2><a href="#" class="comment_evolution">Evolution #9</a> : Créer une pétition pour chaque proposition <= FAIT</h2>
					<p>Cela permettrait de pouvoir donner plus de poids à une proposition que de simples votes. La pétition serait signée nominativement et serait ainsi importante pour donner du poids aux propositions.</p>
				</div>
			</div>
		</section>

		<section id="docs" class="page">
			<h1>API documentation</h1>
			<div class="content">
				<?php
					$APIdatas['base_url'] = 'http://croudquotes.lkws.fr/api/1.0/';
					$APIdatas['public_key_test'] = 'aff83ccf08f1dd28ee330b0b07de4f3b985a81d4'; // TODO: MODIFIER ICI CLE PUBLIQUE SUR LA BASE DE TEST
					$APIdatas['public_key'] = '84e9fda1261fb973721ef8cb2a381f969667cb35'; // TODO: MODIFIER ICI CLE PUBLIQUE SUR L'APPLI
				?>
				
				<p>Ce site est composé de deux parties : un service de persistance mettant à disposition une API (nommé CroudQuotes) et un front permettant de visualiser les données stockées (MonProgramme2012).</p>
				<p>Cette API est publique et donne accès à toutes les données et actions possibles. Vous trouverez ici les indications pour pouvoir vous en servir.</p>
				
				<h2 id="-connexion_API">Connexion à l'API</h2>
				<p>La racine de l'API se trouve à cette adresse : <a href="<?php echo $APIdatas['base_url']; ?>"><em><?php echo $APIdatas['base_url']; ?></em></a></p>
				<p>
					Pour se connecter à l'API, il est nécessaire de posséder une clé.<br/>
					Une clé identifie non seulement un utilisateur (et limite un quota d'utilisation de l'API) mais identifie aussi le service auquel vous souhaitez vous connecter. <br/>
					Par exemple, la clé publique pour MonProgramme2012 est : <b><?php echo $APIdatas['public_key']; ?></b>.<br/>
					La clé publique pour la base de test est : <b><?php echo $APIdatas['public_key_test']; ?></b>.<br/>
					Vous pouvez vous connecter aux services avec les clés publiques mais vous devrez partager le quota avec les autres utilisateurs de cette clé.<br/>
					Pour posséder un quota réservé pour vous, il vous faut faire une demande de clé privée (via le <a href="#" class="ask_private_key">formulaire de feedback</a>).
				</p>
				<p>Le quota de requêtes a pour principal but de limiter la charge sur le serveur. Il est actuellement de <em>40 requêtes par minutes et par clé</em>. Le quota peut être modifié à la demande et au cas par cas.</p>
				<p>Les données sont renvoyées par l'API au <em>format JSON</em> avec un encodage en <em>UTF8</em>.</p>

				<h2 id="-API_ressources">API ressources</h2>
				<ul>
					<li><a href="#-API_ressources-quotes">Citations</a></li>
					<li><a href="#-API_ressources-quotes-lists">Listes de citations</a></li>
					<li><a href="#-API_ressources-comments">Commentaires</a></li>
					<li><a href="#-API_ressources-categories">Catégories</a></li>
					<li><a href="#-API_ressources-selections">Sélections</a></li>
					<li><a href="#-API_ressources-suivi">Suivi d'éléments</a></li>
					<li><a href="#-API_ressources-petition">Signer des éléments</a></li>
					<li><a href="#-API_ressources-parameters">Paramètres</a></li>
				</ul>
				<?php
				function generateParameters($params){
					$html = '<div class="parameters">
								<a href="#" class="display_params">Afficher les paramètres</a>
								<table>';
					
					foreach($params as $key => $value){
						$html .= '<tr><td>'.$value['name'].' <span>'.$value['status'].'</span></td><td>'.$value['use'].'</td></tr>';
					}
					
					$html .= '</table>
							</div>';
					return $html;
				}
				
				function indentJson($json){
					return str_replace(',', ',<br/>', 
							str_replace('[', '[<div class="indent">', 
								str_replace(']', '</div>]', 
									str_replace('{', '{<div class="indent">', 
										str_replace('}', '</div>}', $json)))));
				}
				
				function generateSample($sample){
					if($sample == null){return '';}
					if($sample['methode'] == 'POST'){$spe = '&meth=post';}
					else{$spe = '';}
					$html = '<div class="sample">
								<a href="#" class="display_sample">Afficher un exemple</a>
								<div class="text">
									<div class="requete">'.$sample['methode'].' '.$sample['requete'].' (<a href="'.$sample['requete'].''.$spe.'" target="_blanck">tester</a>)</div>
									<pre class="reponse">'.indentJson($sample['reponse']).'</pre>
								</div>
							</div>';
					return $html;
				}
				
				function generateAPIRessource($ressource, $params, $sample){
					return '<tr>'.
						'<td>'.$sample['methode'].' '.$ressource['ressource'].generateParameters($params).'</td>'.
						'<td>'.$ressource['use'].'</td>'.
					'</tr>
					<tr>
						<td colspan="2">'.generateSample($sample).'</td>
					</tr>';
				}
				?>
				<?php
				// GET
				$key_param['name'] = 'key'; 				$key_param['status'] = 'requis'; 			$key_param['use'] = "clé, publique ou privée, donnant accès à un service de l'API.";
				$quoteidget_param['name'] = 'quoteid'; 		$quoteidget_param['status'] = 'requis'; 	$quoteidget_param['use'] = "Id de la citation souhaitée. Peut aussi prendre la valeur <span class=\"val\">random</span> pour une citation au hasard.";
				$type_param['name'] = 'type';				$type_param['status'] = 'requis';			$type_param['use'] = "Valeurs possibles : <span class=\"val\">quote</span> ou <span class=\"val\">page</span>. désigne le type de ressource voulu.";
				$typesuivi_param['name'] = 'type';			$typesuivi_param['status'] = 'requis';		$typesuivi_param['use'] = "Valeurs possibles : <span class=\"val\">quote</span>, <span class=\"val\">page</span>, <span class=\"val\">site</span> ou <span class=\"val\">event</span>. Désigne le type de ressource voulu.";
				$typesign_param['name'] = 'type';			$typesign_param['status'] = 'requis';		$typesign_param['use'] = "Valeurs possibles : <span class=\"val\">quote</span> ou <span class=\"val\">site</span>. Désigne le type de ressource voulu.";
				$id_param['name'] = 'id'; 					$id_param['status'] = 'requis'; 			$id_param['use'] = "Id de la ressource souhaitée.";
				$pc_comment_param['name'] = 'pc'; 			$pc_comment_param['status'] = 'optionnel'; 	$pc_comment_param['use'] = "Numéro de la page de commentaires.";
				$pp_comment_param['name'] = 'pp'; 			$pp_comment_param['status'] = 'optionnel'; 	$pp_comment_param['use'] = "Numéro de la page de la pétition.";
				$p_comment_param['name'] = 'p'; 			$p_comment_param['status'] = 'optionnel'; 	$p_comment_param['use'] = "Numéro de la page de commentaires.";
				$p_quote_param['name'] = 'p'; 				$p_quote_param['status'] = 'optionnel'; 	$p_quote_param['use'] = "Numéro de la page de citations.";
/*4*/			$p_selection_param['name'] = 'p'; 			$p_selection_param['status'] = 'optionnel'; $p_selection_param['use'] = "Numéro de la page de sélections.";
				$p_category_param['name'] = 'p'; 			$p_category_param['status'] = 'optionnel';	$p_category_param['use'] = "Numéro de la page de catégories.";
				$p_petition_param['name'] = 'p'; 			$p_petition_param['status'] = 'optionnel';	$p_petition_param['use'] = "Numéro de la page de pétition.";
				$rephrase_param['name'] = 'rephrase';		$rephrase_param['status'] = 'optionnel';	$rephrase_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>. Ajoute à la réponse la liste des réécritures de la proposition.";
				$nocomment_param['name'] = 'nocomment';		$nocomment_param['status'] = 'optionnel';	$nocomment_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>. Les commentaires ne seront pas dans la réponse (pour alléger le trafic réseau).";
				$nopetition_param['name'] = 'nopetition';	$nopetition_param['status'] = 'optionnel';	$nopetition_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>. La pétition ne sera pas dans la réponse (pour alléger le trafic réseau).";
				$orderlist_param['name'] = 'list';			$orderlist_param['status'] = 'requis';		$orderlist_param['use'] = "Valeurs possibles : <span class=\"val\">top</span> (votes), <span class=\"val\">topcomment</span> (nombre de commentaires), <span class=\"val\">lasts</span> (date de publication), <span class=\"val\">lastactivity</span> (date de la dernière activité). Les citations sont classées de manière décroissante selon les différents critères.";
				$cat_param['name'] = 'cat';					$cat_param['status'] = 'requis';			$cat_param['use'] = "Identifie une catégorie. Prend la valeur de l'id ou du nom de la catégorie.";
/*9*/			$sel_param['name'] = 'sel';					$sel_param['status'] = 'requis';			$sel_param['use'] = "Identifie une sélection. Prend la valeur de l'id ou du nom de la sélection.";
				$quoteids_param['name'] = 'quoteids';		$quoteids_param['status'] = 'requis';		$quoteids_param['use'] = "Fourni la liste de citations à partir de leurs id. Chaque id est un entier et est séparé des autres par un '/'.";
				
				// POST
				$quote_param['name'] = 'quote'; 			$quote_param['status'] = 'requis';				$quote_param['use'] = "Contenu de la nouvelle citation.";
				$explication_param['name'] = 'expl';		$explication_param['status'] = 'optionnel';		$explication_param['use'] = "Texte précisant la citation.";
				$explicationreq_param['name'] = 'expl';		$explicationreq_param['status'] = 'requis';		$explicationreq_param['use'] = "Texte précisant la citation.";
				$categorie_param['name'] = 'cat'; 			$categorie_param['status'] = 'optionnel';		$categorie_param['use'] = "Catégorie à laquelle appartient la citation (nom ou id).";
/*14*/			$source_param['name'] = 'src'; 				$source_param['status'] = 'optionnel';			$source_param['use'] = "Texte désignant la source de la citation.";
				$context_param['name'] = 'ctx'; 			$context_param['status'] = 'optionnel';			$context_param['use'] = "Texte désignant le contexte de la citation.";
				$auteur_param['name'] = 'auth'; 			$auteur_param['status'] = 'optionnel';			$auteur_param['use'] = "Nom de l'auteur de la citation.";
				$publieur_param['name'] = 'pub';			$publieur_param['status'] = 'optionnel';		$publieur_param['use'] = "Nom (ou pseudo) de la personne qui publie.";
				$reqpublieur_param['name'] = 'pub';			$reqpublieur_param['status'] = 'requis';		$reqpublieur_param['use'] = $publieur_param['use'];
/*19*/			$publieur_info_param['name'] = 'pubinfo';	$publieur_info_param['status'] = 'optionnel';	$publieur_info_param['use'] = "Informations relatives à la personne qui publie.";
				$mail_param['name'] = 'mail'; 				$mail_param['status'] = 'optionnel';			$mail_param['use'] = "Adresse mail de la personne qui publie.";
				$site_param['name'] = 'site'; 				$site_param['status'] = 'optionnel';			$site_param['use'] = "Adresse web de la personne qui publie.";
				$quoteid_param['name'] = 'quoteid'; 		$quoteid_param['status'] = 'requis';			$quoteid_param['use'] = "Identifie une citation avec son id (entier).";
				$vote_param['name'] = 'vote'; 				$vote_param['status'] = 'requis';				$vote_param['use'] = "Valeurs possibles : <span class=\"val\">up</span> ou <span class=\"val\">down</span>. Indique le sens du vote voulu.";
/*24*/			$report_param['name'] = 'report'; 			$report_param['status'] = 'requis';				$report_param['use'] = "Unique valeur : <span class=\"val\">1</span>.";
				$cause_param['name'] = 'cause'; 			$cause_param['status'] = 'optionnel';			$cause_param['use'] = "Texte servant à préciser les raisons de la signalisation.";
				$name_param['name'] = 'name'; 				$name_param['status'] = 'optionnel';			$name_param['use'] = "Champ servant a communiquer le nom de la personne qui demande le suivit.";
				$info_param['name'] = 'info'; 				$info_param['status'] = 'optionnel';			$info_param['use'] = "Champ servant a communiquer des inforations supplémentaires sur la personne qui demande le suivit.";
				$avis_param['name'] = 'avis';		 		$avis_param['status'] = 'optionnel';			$avis_param['use'] = "Valeurs possibles : <span class=\"val\">pour</span> ou <span class=\"val\">contre</span>. Précise comment le commentaire se positionne par rapport à la ressource commentée.";
				$comment_param['name'] = 'comment'; 		$comment_param['status'] = 'requis';			$comment_param['use'] = "Contenu du nouveau commentaire.";
				$commentid_param['name'] = 'commentid'; 	$commentid_param['status'] = 'requis';			$commentid_param['use'] = "Identifie un commentaire avec son id (entier).";
				$newsel_param['name'] = 'sel';				$newsel_param['status'] = 'optionnel';			$newsel_param['use'] = "Permet de donner un nom à la sélection à créer.";
/*29*/			$newcat_param['name'] = 'cat';				$newcat_param['status'] = 'requis';				$newcat_param['use'] = "Nom de la nouvelle catégorie à créer.";
				
				$mailsuivi_param['name'] = 'mail'; 			$mailsuivi_param['status'] = 'requis';			$mailsuivi_param['use'] = "Adresse mail où sont envoyés les mails du suivi.";
				$mailsign_param['name'] = 'mail'; 			$mailsign_param['status'] = 'requis';			$mailsign_param['use'] = "Adresse mail qui signe la pétition. Nécessaire pour recevoir le code de validation de la signature.";
				$suiviaction_param['name'] = 'action'; 		$suiviaction_param['status'] = 'requis'; 		$suiviaction_param['use'] = "Valeurs possibles : <span class=\"val\">follow</span> ou <span class=\"val\">unfollow</span>. Indique l'action qui doit être effetuée lors de cet appel.";
				
				$confirm_param['name'] = 'confirm'; 		$confirm_param['status'] = 'requis';			$confirm_param['use'] = "Clé de confirmation de la signature (hash sha1)";
				$prenom_param['name'] = 'prenom'; 			$prenom_param['status'] = 'requis';				$prenom_param['use'] = "Prenom de la personnes souhaitant signer la pétition";
				$nom_param['name'] = 'nom'; 				$nom_param['status'] = 'requis';				$nom_param['use'] = "Nom de la personnes souhaitant signer la pétition";
				$genre_param['name'] = 'genre'; 			$genre_param['status'] = 'optionnel';			$genre_param['use'] = "Valeurs possibles : <span class=\"val\">Mr</span> ou <span class=\"val\">Mme</span>. Genre de la personnes souhaitant signer la pétition";
				$age_param['name'] = 'age'; 				$age_param['status'] = 'optionnel';				$age_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>(0 à 18ans), <span class=\"val\">2</span>(18 à 25ans), <span class=\"val\">3</span>(25 à 50ans), <span class=\"val\">4</span>(>50ans). Age de la personnes souhaitant signer la pétition";
				$profession_param['name'] = 'profession'; 	$profession_param['status'] = 'optionnel';		$profession_param['use'] = "Profession de la personnes souhaitant signer la pétition";
				$zipcode_param['name'] = 'zipcode'; 		$zipcode_param['status'] = 'optionnel';			$zipcode_param['use'] = "Code postal de la personnes souhaitant signer la pétition";
				$message_param['name'] = 'message'; 		$message_param['status'] = 'optionnel';			$message_param['use'] = "Message complémentaire à la signature";
				
				// pour tous
				$noheaders_param['name'] = 'noheaders'; $noheaders_param['status'] = 'optionnel';	$noheaders_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>. Cela permet que les headers ne soient pas envoyés s'ils l'ont déjà été.";
/*35*/			$callback_param['name'] = 'callback'; 	$callback_param['status'] = 'optionnel'; 	$callback_param['use'] = "Nom de la fonction qui sera appelée par le jsonp.";
				$format_param['name'] = 'format'; 		$format_param['status'] = 'optionnel'; 		$format_param['use'] = "Valeurs possibles : <span class=\"val\">jsonp</span>. Fonctionne avec le paramètre '".$callback_param['name']."' pour faire du jsonp.";
				
				// spécial
				$meth_param['name'] = 'meth'; 			$meth_param['status'] = 'spécial';			$meth_param['use'] = "Valeur unique : <span class=\"val\">post</span>. Lorsque ce paramètre est présent, on peut utiliser la méthode GET au lieu de la méthode POST.";
				
				?>
				<?php
					echo '<table class="API_ressources" id="-API_ressources-quotes">
					<tr class="title">
						<td colspan="2">
							<h1>Citations</h1> <a href="#-API_ressources-quotes-lists">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quoteid={quoteid}';
					$ressource['use'] = "Retourne la citation identifiée avec l'id passé en paramètre ainsi que les informations s'y rapportant (commentaires, auteur, etc.).";
					$params[0] = $key_param;		// 0
					$params[1] = $quoteidget_param;
					$params[2] = $pc_comment_param;
					$params[3] = $pp_comment_param;
					$params[4] = $rephrase_param;
					$params[5] = $nocomment_param;
					$params[6] = $nopetition_param;
					$params[7] = $noheaders_param;
					$params[8] = $format_param;
					$params[9] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=1&rephrase=1';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"id":2,"post_timestamp":1312036074,"post_date":"30/07/2011 à 16:27","quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","origin_quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","source":"","context":"","explanation":"","origin_explanation":"","author":"georges","publisher":"","publisher_info":"","site":"","category":"geek","category_id":3,"up":6,"down":1,"total_comments":24,"total_signatures":2,
					"rephrase":[
						{"post_timestamp":1312036074,"post_date":"30/07/2011 à 16:27","publisher":"","site":"","quote":"Il est temps de travailler...","explanation":"Première quote !"}
					],"nbrephrases":1,
					"comments":[
						{"id":120,"post_timestamp":1321534716,"post_date":"17/11/2011 à 13:58","avis":""<span class="comment">Valeurs possibles : "pour" ou "contre".</span>,"publisher":"toto","site":"","comment":"qsd","up":0,"down":0,"reported":0},
						{"id":133,"post_timestamp":1322438577,"post_date":"28/11/2011 à 01:02","avis":"pour","publisher":"toto","site":"","comment":"mon comment","up":0,"down":0,"reported":0}
					],"nbcomments":2,"size_comment_page":20,"current_comment_page":2,"total_comment_pages":2,
					"signatures":[
						{"no":2,"post_date":"01/12/2011 à 16:40","genre":"Mme"<span class="comment">Valeurs possibles : "Mr" ou "Mme".</span>,"age":""<span class="comment">Valeurs possibles : "0 à 18 ans" ou "18 à 25 ans" ou "25 à 50 ans" ou ">50 ans".</span>,"prenom":"tata","nom":"dupont","site":"https://twitter.com","profession":"facteur","code_postal":"75000","message":"Bonjour"},
						{"no":1,"post_date":"01/12/2011 à 16:33","genre":"","age":"25 à 50 ans","prenom":"toto","nom":"dupont","site":"","profession":"","code_postal":"","message":""}
					],"nbsignatures":2,"size_petition_page":40,"current_petition_page":1,"total_petition_pages":1},
					"info":{"remaining_queries":35,"next_restart":8}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quote={quote}';
					$ressource['use'] = "Ajoute une nouvelle citation. Retourne l'id de la nouvelle citation si l'ajout a réussi.";
					$params[0] = $key_param;
					$params[1] = $quote_param;
					$params[2] = $explication_param;
					$params[3] = $categorie_param;
					$params[4] = $source_param;
					$params[5] = $context_param;
					$params[6] = $auteur_param;
					$params[7] = $publieur_param;
					$params[8] = $publieur_info_param;
					$params[9] = $mail_param;
					$params[10] = $site_param;
					$params[11] = $noheaders_param;
					$params[12] = $format_param;
					$params[13] = $callback_param;
					$params[14] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quote=Ma+première+citation+:)';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"id":33},"info":{"remaining_queries":38,"next_restart":2}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quoteid={quoteid}&vote={valeur}';
					$ressource['use'] = "Permet de voter pour la citation identifiée par quoteid.";
					$params[0] = $key_param;
					$params[1] = $quoteid_param;
					$params[2] = $vote_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$params[6] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=5&vote=up';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quoteid={quoteid}&report=1';
					$ressource['use'] = "Permet de signaler une citation par son id.";
					$params[0] = $key_param;
					$params[1] = $quoteid_param;
					$params[2] = $report_param;
					$params[3] = $cause_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$params[7] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=3&report=1';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"action":"none"<span class="comment">Autre valeur : "deleted". C\'est l\'état de la citation après signalement.</span>},"info":{"remaining_queries":37,"next_restart":29}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quoteid={quoteid}&cat={cat_id|cat_name}';
					$ressource['use'] = "Permet de proposer une autre catégorie à la citation identifiée par son id. Retourne la catégorie 'officielle' de la citation (celle qui a le plus d'occurence pour la citation).";
					$params[0] = $key_param;
					$params[1] = $quoteid_param;
					$params[2] = $cat_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$params[6] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=3&cat=2';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"category":{"id":1,"name":"loic quotes"}},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote.php?key={key}&amp;quoteid={quoteid}&amp;quote={quote}&expl={expl}';
					$ressource['use'] = "Permet de proposer une reformulation de la citation identifiée par quoteid et de sa description";
					$params[0] = $key_param;
					$params[1] = $quoteid_param;
					$params[2] = $quote_param;
					$params[3] = $explicationreq_param;
					$params[4] = $publieur_param;
					$params[5] = $mail_param;
					$params[6] = $site_param;
					$params[7] = $noheaders_param;
					$params[8] = $format_param;
					$params[9] = $callback_param;
					$params[10] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=3&amp;quote=ma+proposition&expl=super+non+?';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-quotes-lists">
					<tr class="title">
						<td colspan="2">
							<h1>Listes de citations</h1> <a href="#-API_ressources-comments">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list={order}';
					$ressource['use'] = "Retourne une page de citations par ordre de vote décroissant.";
					$params[0] = $key_param;
					$params[1] = $orderlist_param;
					$params[2] = $p_quote_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=top';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"quotes":[
						{"id":12,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"LOOOL","origin_quote":"LOOOL","source":"","context":"","explanation":"","origin_explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},
						{"id":13,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Que signifie lol? valeur absolue de zéro!","origin_quote":"Que signifie lol? valeur absolue de zéro!","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0},
						{"id":14,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Il était une fois","origin_quote":"Il était une fois","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":0,"total_comments":0},
						{"id":15,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Hello","origin_quote":"Hello","source":"","context":"","explanation":"","origin_explanation":"","author":"tim","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},
						{"id":1,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Il est temps de travailler...","origin_quote":"Il est temps de travailler...","source":"","context":"","explanation":"Première quote !","origin_explanation":"Première quote !","author":"loic","publisher":"","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":1},
						{"id":17,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:27","quote":"même citation mais sans remplir le site...","origin_quote":"même citation mais sans remplir le site...","source":"source","context":"context","explanation":"explanation","origin_explanation":"explanation","author":"author","publisher":"publisher","publisher_info":"Quelques informations...","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},
						{"id":16,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:16","quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","origin_quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","source":"Tiré d\'un article du monde...","context":"Pour faire un exemple de context : je cherche à customiser les méta infos","explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","origin_explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","author":"Mon cher nico !","publisher":"loic","publisher_info":"","site":"http://lkws.fr/cq/","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},
						{"id":7,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Quand un geek pense, il n oublie pas /* */ .","origin_quote":"Quand un geek pense, il n oublie pas /* */ .","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":3,"total_comments":0}
					],"nbquotes":8,"size_quote_page":10,"current_quote_page":2,"total_quote_pages":2},
					"info":{"remaining_queries":38,"next_restart":30}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list=category&cat={cat_id|cat_name}';
					$ressource['use'] = "Retourne une page de citations de la catégorie voulue (par id ou par nom) par ordre de date de publication décroissante.";
					$params[0] = $key_param;
					$params[1]['name'] = 'list';		$params[1]['status'] = 'requis';		$params[1]['use'] = "Valeur : <span class=\"val\">category</span>";
					$params[2] = $cat_param;
					$params[3] = $p_quote_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=category&cat=3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"quotes":[
						{"id":24,"post_timestamp":"1312036","post_date":"16/08/2011 à 18:19","quote":"Nouvelle citation avec description....","origin_quote":"Nouvelle citation avec description....","source":"","context":"","explanation":"Voilà une super citation !!\n\nJe ne sais pas ce que vous en pensez mais moi je la trouve géniale. Je l\'ai entendue sur un forum informatique.\n\nTop non ?","origin_explanation":"Voilà une super citation !!\n\nJe ne sais pas ce que vous en pensez mais moi je la trouve géniale. Je l\'ai entendue sur un forum informatique.\n\nTop non ?","author":"","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":1,"down":0,"total_comments":2},
						{"id":2,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","origin_quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","source":"","context":"","explanation":"","origin_explanation":"","author":"georges","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":5,"down":1,"total_comments":0},
						{"id":7,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Quand un geek pense, il n oublie pas /* */ .","origin_quote":"Quand un geek pense, il n oublie pas /* */ .","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":3,"total_comments":0},
						{"id":9,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Le comble du Geek est de s inscrire sur un réseau social.","origin_quote":"Le comble du Geek est de s inscrire sur un réseau social.","source":"","context":"","explanation":"","origin_explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0},
						{"id":11,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Windows, ou l art de prendre les gens pour de bêta-testeurs.","origin_quote":"Windows, ou l art de prendre les gens pour de bêta-testeurs.","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":1,"down":0,"total_comments":0},
						{"id":13,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Que signifie lol? valeur absolue de zéro!","origin_quote":"Que signifie lol? valeur absolue de zéro!","source":"","context":"","explanation":"","origin_explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0}
					],"nbquotes":6,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1,"category_id":3,"category_name":"geek"},
					"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list=selection&sel={sel_id|sel_name}';
					$ressource['use'] = "Retourne une page de citations d'une sélection voulue (par id ou par nom) par ordre de date de publication décroissante.";
					$params[0] = $key_param;
					$params[1]['name'] = 'list';		$params[1]['status'] = 'requis';		$params[1]['use'] = "Valeur : <span class=\"val\">selection</span>";
					$params[2] = $sel_param;
					$params[3] = $p_quote_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=selection&sel=2';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"quotes":[
						{"id":17,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:27","quote":"même citation mais sans remplir le site...","origin_quote":"même citation mais sans remplir le site...","source":"source","context":"context","explanation":"explanation","origin_explanation":"explanation","author":"author","publisher":"publisher","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},
						{"id":16,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:16","quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","origin_quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","source":"Tiré d\'un article du monde...","context":"Pour faire un exemple de context : je cherche à customiser les méta infos","explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","origin_explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","author":"Mon cher nico !","publisher":"loic","publisher_info":"","site":"http://lkws.fr/cq/","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0}
					],"nbquotes":2,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1,"selection_id":2,"selection_name":"zetr"},
					"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list=custom&amp;quoteids={id1/id2/id3}';
					$ressource['use'] = "Retourne toutes les citations demandées par ordre de date de publication décroissante.";
					$params[0] = $key_param;
					$params[1]['name'] = 'list';		$params[1]['status'] = 'requis';		$params[1]['use'] = "Valeur : <span class=\"val\">custom</span>";
					$params[2] = $quoteids_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=custom&amp;quoteids=2/15/6/8';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"quotes":[
						{"id":15,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Hello","origin_quote":"Hello","source":"","context":"","explanation":"","origin_explanation":"","author":"tim","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},
						{"id":8,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Aujourd hui, cela fait trois mois que ma copine a ses règles. C est louche.","origin_quote":"Aujourd hui, cela fait trois mois que ma copine a ses règles. C est louche.","source":"","context":"","explanation":"","origin_explanation":"","author":"fergie","publisher":"","publisher_info":"","site":"","category":"vdm","category_id":"2","up":1,"down":1,"total_comments":2},
						{"id":6,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Biloute !","origin_quote":"Biloute !","source":"","context":"","explanation":"","origin_explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},
						{"id":2,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","origin_quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","source":"","context":"","explanation":"","origin_explanation":"","author":"georges","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":5,"down":1,"total_comments":0}
					],"nbquotes":4,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1},
					"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-comments">
					<tr class="title">
						<td colspan="2">
							<h1>Commentaires</h1> <a href="#-API_ressources-categories">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'comment.php?key={key}&type={type}&id={id}';
					$ressource['use'] = "Récupère les commentaires pour la ressource du type désigné et avec l'id voulu.";
					$params[0] = $key_param;
					$params[1] = $type_param;
					$params[2] = $id_param;
					$params[3] = $p_comment_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'comment.php?key='.$APIdatas['public_key_test'].'&type=quote&id=5';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"comments":[
					{"id":84,"post_timestamp":"1315086","post_date":"03/09/2011 à 23:43","avis":""<span class="comment">Valeurs possibles : "pour" ou "contre".</span>,"publisher":"kas","site":"","comment":"Hello !","up":0,"down":0,"reported":0},
					{"id":85,"post_timestamp":"1315086","post_date":"03/09/2011 à 23:44","avis":"contre","publisher":"kas","site":"","comment":"coucou","up":0,"down":0,"reported":0},
					{"id":108,"post_timestamp":"1315910","post_date":"13/09/2011 à 12:47","avis":"pour","publisher":"leclown","site":"http://twitter.com/leclown","comment":"j\'adore! tiens je vais commander une pomme par internet","up":0,"down":0,"reported":0}],
					"nbcomments":3,"size_comment_page":20,"current_comment_page":1,"total_comment_pages":1},
					"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'comment.php?key={key}&amp;quoteid={quoteid}&comment={comment}&pub={publisher}';
					$ressource['use'] = "Ajoute un nouveau commentaire à la citation désignée par son id. Retourne l'id du nouveau commentaire si l'ajout a réussi.";
					$params[0] = $key_param;
					$params[1] = $quoteid_param;
					$params[2] = $comment_param;
					$params[3] = $reqpublieur_param;
					$params[4] = $mail_param;
					$params[5] = $site_param;
					$params[6] = $avis_param;
					$params[7] = $noheaders_param;
					$params[8] = $format_param;
					$params[9] = $callback_param;
					$params[10] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'comment.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=3&comment=premier+commentaire&pub=toto';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"id":62},"info":{"remaining_queries":37,"next_restart":44}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'comment.php?key={key}&type={type}&id={id}&comment={comment}&pub={publisher}';
					$ressource['use'] = "Ajoute un nouveau commentaire à la ressource désignée par son type et son id. Retourne l'id du nouveau commentaire si l'ajout a réussi.";
					$params[0] = $key_param;
					$params[1] = $type_param;
					$params[2] = $id_param;
					$params[3] = $comment_param;
					$params[4] = $reqpublieur_param;
					$params[5] = $mail_param;
					$params[6] = $site_param;
					$params[7] = $avis_param;
					$params[8] = $noheaders_param;
					$params[9] = $format_param;
					$params[10] = $callback_param;
					$params[11] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'comment.php?key='.$APIdatas['public_key_test'].'&type=quote&id=3&comment=premier+commentaire&pub=toto';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"id":62},"info":{"remaining_queries":37,"next_restart":44}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'comment.php?key={key}&commentid={commentid}&vote={valeur}';
					$ressource['use'] = "Permet de voter pour le commentaire identifiée par commentid.";
					$params[0] = $key_param;
					$params[1] = $commentid_param;
					$params[2] = $vote_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$params[6] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'comment.php?key='.$APIdatas['public_key_test'].'&commentid=5&vote=down';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'comment.php?key={key}&commentid={commentid}&report=1';
					$ressource['use'] = "Permet de signaler un commentaire par son id.";
					$params[0] = $key_param;
					$params[1] = $commentid_param;
					$params[2] = $report_param;
					$params[3] = $cause_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$params[7] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'comment.php?key='.$APIdatas['public_key_test'].'&commentid=8&report=1';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"action":"none"<span class="comment">Autre valeur : "deleted". C\'est l\'état de la citation après signalement.</span>},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-categories">
					<tr class="title">
						<td colspan="2">
							<h1>Catégories</h1> <a href="#-API_ressources-selections">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'category.php?key={key}';
					$ressource['use'] = "Retourne une page de catégories par ordre alphabétique.";
					$params[0] = $key_param;
					$params[1] = $p_category_param;
					$params[2] = $noheaders_param;
					$params[3] = $format_param;
					$params[4] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'category.php?key='.$APIdatas['public_key_test'].'';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"categories":[{"id":4,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","name":"autres"},{"id":3,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","name":"geek"},{"id":2,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","name":"vdm"}],"nbcategories":3,"size_category_page":20,"current_category_page":1,"total_category_pages":1},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'category.php?key={key}&cat={cat_name}';
					$ressource['use'] = "Permet de créer une nouvelle catégorie. Renvoie l'id de la nouvelle catégorie.";
					$params[0] = $key_param;
					$params[1] = $newcat_param;
					$params[2] = $noheaders_param;
					$params[3] = $format_param;
					$params[4] = $callback_param;
					$params[5] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'category.php?key='.$APIdatas['public_key_test'].'&cat=ma+categorie';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"id":5},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-selections">
					<tr class="title">
						<td colspan="2">
							<h1>Sélections</h1> <a href="#-API_ressources-suivi">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'selection.php?key={key}';
					$ressource['use'] = "Retourne une page de sélections par ordre alphabétique.";
					$params[0] = $key_param;
					$params[1] = $p_selection_param;
					$params[2] = $noheaders_param;
					$params[3] = $format_param;
					$params[4] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'selection.php?key='.$APIdatas['public_key_test'].'';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"selections":[{"id":1,"post_timestamp":"1312036","post_date":"30/07/2011 à 22:46","name":"klm"},{"id":3,"post_timestamp":"1312036","post_date":"16/08/2011 à 19:40","name":"undefined"},{"id":2,"post_timestamp":"1312036","post_date":"15/08/2011 à 16:31","name":"zetr"}],"nbselections":3,"size_selection_page":20,"current_selection_page":1,"total_selection_pages":1},"info":{"remaining_queries":38,"next_restart":16}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'selection.php?key={key}&amp;quoteids={id1/id2/id3}';
					$ressource['use'] = "Permet de créer une nouvelle sélection de citations. Renvoie l'id et le nom de la nouvelle sélection.";
					$params[0] = $key_param;
					$params[1] = $quoteids_param;
					$params[2] = $newsel_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$params[6] = $meth_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'selection.php?key='.$APIdatas['public_key_test'].'&amp;quoteids=8/1/5/12/4/3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"selection":{"id":4,"name":"selection_4"}},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-suivi">
					<tr class="title">
						<td colspan="2">
							<h1>Suivi d\'éléments</h1> <a href="#-API_ressources-petition">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'suivi.php?key={key}&mail={mail}';
					$ressource['use'] = "Retourne la liste des ressources suivies par le mail donné.";
					$params[0] = $key_param;
					$params[1] = $mailsuivi_param;
					$params[2] = $noheaders_param;
					$params[3] = $format_param;
					$params[4] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'suivi.php?key='.$APIdatas['public_key_test'].'&mail=toto@example.com';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"mail":"toto@example.com","suivis":{"page":[2],"quote":[1,3,12,24,31,57]},"total_suivis":7},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'suivi.php?key={key}&type={type}&id={id}';
					$ressource['use'] = "Retourne la liste des personnes qui suivent la ressource donnée.";
					$params[0] = $key_param;
					$params[1] = $typesuivi_param;
					$params[2] = $id_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'suivi.php?key='.$APIdatas['public_key_test'].'&type=quote&id=3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"elt":"event","id":"1","suivi":[{"name":"loic","info":"Informaticien et intéressé par la politique"},{"name":"toto","info":"artiste"},{"name":"yohan","info":""}],
					"total_suivis":3},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'suivi.php?key={key}&mail={mail}&type={type}&id={id}&action={action}';
					$ressource['use'] = "Crée ou met a jour le suivi par l'adresse mail d'une ressource désignée par son type et son id.";
					$params[0] = $key_param;
					$params[1] = $typesuivi_param;
					$params[2] = $id_param;
					$params[3] = $mailsuivi_param;
					$params[4] = $suiviaction_param;
					$params[5] = $name_param;
					$params[6] = $info_param;
					$params[7] = $noheaders_param;
					$params[8] = $format_param;
					$params[9] = $callback_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'suivi.php?key='.$APIdatas['public_key_test'].'&mail=toto@example.com&amp;quoteid=1&newcomments=1';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-petition">
					<tr class="title">
						<td colspan="2">
							<h1>Signer des éléments</h1> <a href="#-API_ressources-parameters">next</a> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'petition.php?key={key}&type={type}&id={id}';
					$ressource['use'] = "Retourne la liste des signataires de l'élément indiqué.";
					$params[0] = $key_param;
					$params[1] = $typesign_param;
					$params[2] = $id_param;
					$params[3] = $p_petition_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'petition.php?key='.$APIdatas['public_key_test'].'&type=quote&id=3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},
					"response":{"elt":"quote","id":3,"petition":[
					{"no":1,"post_date":"01/12/2011 à 16:33","genre":""<span class="comment">Valeurs possibles : "Mr" ou "Mme".</span>,"age":""<span class="comment">Valeurs possibles : "0 à 18 ans" ou "18 à 25 ans" ou "25 à 50 ans" ou ">50 ans".</span>,"prenom":"toto","nom":"dupont","site":"","profession":"","code_postal":"","message":""},
					{"no":1,"post_date":"01/12/2011 à 16:40","genre":"Mme","age":"0 à 18 ans","prenom":"tata","nom":"dupont","site":"https://twitter.com","profession":"facteur","code_postal":"","message":"Bonjour"}],
					"nbsignatures":2,"size_petition_page":40,"current_petition_page":1,"total_petition_pages":1},
					"info":{"remaining_queries":39,"next_restart":42}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'petition.php?key={key}&type={type}&id={id}&mail={mail}&prenom={prenom}&nom={nom}';
					$ressource['use'] = "Permet de signer la pétition pour l'élément indiqué.";
					$params[0] = $key_param;
					$params[1] = $typesign_param;
					$params[2] = $id_param;
					$params[3] = $mailsign_param;
					$params[4] = $prenom_param;
					$params[5] = $nom_param;
					$params[6] = $genre_param;
					$params[7] = $age_param;
					$params[8] = $site_param;
					$params[9] = $profession_param;
					$params[10] = $zipcode_param;
					$params[11] = $message_param;
					$params[12] = $noheaders_param;
					$params[13] = $format_param;
					$params[14] = $callback_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'petition.php?key='.$APIdatas['public_key_test'].'&type=quote&id=3&mail=toto@example.com&prenom=toto&nom=dupont';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'petition.php?key={key}&confirm={validation_key}';
					$ressource['use'] = "Confirme une signature avec le code reçu (nécessaire pour qu'elle soit validée)";
					$params[0] = $key_param;
					$params[1] = $confirm_param;
					$params[2] = $noheaders_param;
					$params[3] = $format_param;
					$params[4] = $callback_param;
					$sample['methode'] = 'POST';
					$sample['requete'] = $APIdatas['base_url'].'petition.php?key='.$APIdatas['public_key_test'].'&confirm=???';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-parameters">
					<tr class="title">
						<td colspan="2">
							<h1>Paramètres</h1> <a href="#-API_ressources">top</a>
						</td>
					</tr>
					<tr style="display: none;">
						<td colspan="2"></td>
					</tr>';
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'params.php?key={key}';
					$ressource['use'] = "Retourne l'ensembles des paramètres de configuration de l'application.";
					$params[0] = $key_param;
					$params[1] = $noheaders_param;
					$params[2] = $format_param;
					$params[3] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'params.php?key='.$APIdatas['public_key_test'].'';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"textMaxSize":{"quote":"140","comment":"2048","source":"256","context":"1024","explanation":"1024","author":"56","publisher":"56","publisher_info":"1024","mail":"140","site":"256","category":"56","selection":"56","tag":"56"}},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					echo '</table>';
				?>
				
				<h2 id="-codes_erreur">Codes d'erreur</h2>
				<?php
				function generateErrorCode($datas){
					$html = '<div class="error_code">
								<div class="desc_error">'.$datas['desc'].'</div>
								<div class="text">
									<pre class="reponse">'.indentJson($datas['json']).'</pre>
								</div>
							</div>';
					return $html;
				}
				?>
				<?php
					$datas = null;
					$datas['code'] = 400;
					$datas['desc'] = 'L\'erreur 400 signale qu\'une requête a été mal formatée : oubli de paramètres obligatoire généralement.'; // cela peut aussi provenir d'une incohérence de constantes dans l'API
					$datas['json'] = '{"status":{"code":400,"message":"Requête invalide: erreur de paramètres."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 401;
					$datas['desc'] = 'Le code 401 est renvoyé lorsque l\'accès a été refusé.<br/>Cela se produit généralement lorsque la clé de connexion est incorrecte, qu\'elle a été oubliée ou qu\'elle a été bannie.';
					$datas['json'] = '{"status":{"code":401,"message":"pas d\'autorisation d\'accès à la ressource."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 402;
					$datas['desc'] = 'L\'erreur 402 signale un dépassement du quota de requêtes. Par défaut, vous avez droit à 40 requêtes à l\'API toutes les minutes par clé d\'identification, après ce quota vous ne recevrez tout le temps ce message d\'erreur. Le quota  peut être augmenté sur demande et au cas par cas.';
					$datas['json'] = '{"status":{"code":402,"message":"Vous avez dépassé votre quota de requêtes."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 403;
					$datas['desc'] = 'Le code 403 est renvoyé lorsque l\'opération demandée aurait du être réalisé mais qu\'elle a échoué pour une raison inconnue. Certainement un bug de l\'API :( ...<br/> Vous pouvez signaler ces erreurs pour tenter de les résoudres.';
					$datas['json'] = '{"status":{"code":403,"message":"Problème interne dans la persistance de données."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 404;
					$datas['desc'] = 'Le code 404 indique que la ressource demandée n\'existe pas. Soit elle n\'a jamais existé, soit elle a été supprimé pour la plupart des cas.';
					$datas['json'] = '{"status":{"code":404,"Ressource innexistante."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 405;
					$datas['desc'] = 'Le code 405 indique que la version de la base de donnée ne correspond pas à la version nécessaire de celle-ci pour CroudQuotes.';
					$datas['json'] = '{"status":{"code":405,"Mauvaise version de base de donnée."}}';
					echo generateErrorCode($datas);
					
					$datas = null;
					$datas['code'] = 406;
					$datas['desc'] = 'Le code 406 indique que l\'opération que vous souhaitez effectuer n\'est pas autorisée.<br/> Par exemple : voter ou signaler deux fois une même citation ou commentaire.';
					$datas['json'] = '{"status":{"code":406,"message":"Operation non autorisée."}}';
					echo generateErrorCode($datas);
				?>
			</div>
		</section>

		<section id="about" class="page">
			<div class="content">
				<h1>About</h1>
				
				<p>CroudQuotes et MonProgramme2012 ont été développés par <a href="https://twitter.com/loicknuchel" target="_blanck">@loicknuchel</a>.</p>
				
				<footer>
					<p id="copy">L'ensemble du contenu est <a href="https://github.com/loicknuchel/MonProgramme2012">publié</a> sous license <a href="http://fr.wikipedia.org/wiki/Beerware" target="_blanck">BeerWare</a></p>
				</footer>
			</div>
		</section>

    </section>
	
	<div id="contactable" class="FV_contactable"></div>
	
	<script src="../js/libs/jquery-1.7.min.js"></script>
	<script src="../js/libs/contactable.1.3/jquery.validate.pack.js"></script>
	<script src="../js/libs/contactable.1.3/jquery.contactable.js"></script>
	<script src="../js/strings.js"></script>
	<script src="../js/contactable.js"></script>
	<script src="../js/form_verification.js"></script>
	<script src="../js/forms.js"></script>
	<script src="./faq.js"></script>
	<?php
		// Design pris du site : http://lesscss.org/
	?>
	
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>