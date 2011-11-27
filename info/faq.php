<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Mon Programme 2012 - FAQ</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						Ce site regroupe des <span>propositions de réformes</span> et des <span>sujets de débat</span> en vue de la campagne présidentielle 2012.<br/>
						Chaque proposition peut être <span>débattue</span> dans les commentaires et est classée par les votes qui lui sont attribués.
					</h3>
				</section>

				<section id="example">
					<p>Objectifs :</p>

<pre><code>Ce site a été conçu en partant du constat que la politique ne peut plus être laissée aux politiciens et aux lobbies.
L'objectif direct est que nous (citoyens) puissions <span class="string">reprendre la main sur la politique</span> par des actions concrêtes et collectives.
Il nous semble important de donner envie aux gens de s'intéresser à la politique en leur montrant que des initiatives existent et que les choses peuvent bouger.
D'autre part, si la communauté devient significative, ce site pourra servir de <span class="string">réservoir à idées</span> et à sujets de débats constructifs pour la campagne.

<span class="mixin">La campagne 2012 ne se fera pas sans nous !</span></code></pre>
					
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
					<a href="#" class="demande_sources">sources</a>
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
				<h1>Questions récurrentes</h1>
				
				<div class="question">
					<h2>Quel est le but ?</h2>
					<p>
						Le but de ce site est relativement simple. Il est de montrer, autant aux politiciens qu'aux autres citoyens, que les français s'intéressent à la politique et que leurs opinions comptent.<br/>
						Plutôt que chacun râle dans son salon, toujours sur la même chose, il est plus utile de venir en discuter, de s'organiser pour voir comment faire évoluer les choses et surtout de faire entendre ses opinions.<br/>
					</p>
					<ul>
						<li class="title">Les objectifs affichés ici sont :</li>
						<li>Agir pour ne plus être exclu de la vie politique</li>
						<li>Ne plus subir les sujets de débats des hommes politiques</li>
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
						Pour nous, l'anonymat et la liberté d'expression sont essentiels. Nous relevons donc des informations sur les connexions (adresse ip) uniquement dans un but de lutte anti-spam.<br/>
						Les données relevées ne seront transmises sous aucune condition à un tiers et pourront être détruites en cas de problème.<br/>
						Concernant les données publiées, elle sont accessibles à tous à travers ce site ainsi que l'API mise en place. Le contenu étant totalement libre, il peut être dupliqué (que ce soit avec l'API ou sur
						demande d'une copie de la base de donnée).<br/>
						<br/>
						Il n'y a aucun système d'autentification et donc personne qui puisse avoir des droits plus élevés que les autres.
					</p>
				</div>
				
				<div class="question">
					<h2>Technologies</h2>
					<p>
						Ce site a été développé entièrement en PHP avec MySQL.<br/>
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
					<h2><a href="#" class="comment_evolution">Evolution #11</a> : Suivre une proposition</h2>
					<p>S'inscrire au suivi pour une proposition nous tiens au courant par mail des activités de cette proposition (nouveaux commentaires, mises à jour, etc.)</p>
				</div>
				
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
					<h2><a href="#" class="comment_evolution">Evolution #9</a> : Créer une pétition pour chaque proposition</h2>
					<p>Cela permettrait de pouvoir donner plus de poids à une proposition que de simples votes. La pétition serait signée nominativement et serait ainsi importante pour donner du poids aux propositions.</p>
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
				$key_param['name'] = 'key'; 			$key_param['status'] = 'requis'; 			$key_param['use'] = "clé, publique ou privée, donnant accès à un service de l'API.";
				$quoteidget_param['name'] = 'quoteid'; 	$quoteidget_param['status'] = 'requis'; 	$quoteidget_param['use'] = "Id de la citation souhaitée. Peut aussi prendre la valeur <span class=\"val\">random</span> pour une citation au hasard.";
				$type_param['name'] = 'type';			$type_param['status'] = 'requis';			$type_param['use'] = "Valeurs possibles : <span class=\"val\">quote</span> ou <span class=\"val\">page</span>. désigne le type de ressource voulu.";
				$typesuivi_param['name'] = 'type';		$typesuivi_param['status'] = 'requis';		$typesuivi_param['use'] = "Valeurs possibles : <span class=\"val\">quote</span>, <span class=\"val\">page</span>, <span class=\"val\">site</span> ou <span class=\"val\">event</span>. désigne le type de ressource voulu.";
				$id_param['name'] = 'id'; 				$id_param['status'] = 'requis'; 			$id_param['use'] = "Id de la ressource souhaitée.";
				$p_comment_param['name'] = 'p'; 		$p_comment_param['status'] = 'optionnel'; 	$p_comment_param['use'] = "Numéro de la page de commentaires.";
				$p_quote_param['name'] = 'p'; 			$p_quote_param['status'] = 'optionnel'; 	$p_quote_param['use'] = "Numéro de la page de citations.";
/*4*/			$p_selection_param['name'] = 'p'; 		$p_selection_param['status'] = 'optionnel'; $p_selection_param['use'] = "Numéro de la page de sélections.";
				$p_category_param['name'] = 'p'; 		$p_category_param['status'] = 'optionnel';	$p_category_param['use'] = "Numéro de la page de catégories.";
				$nocomment_param['name'] = 'nocomment';	$nocomment_param['status'] = 'optionnel';	$nocomment_param['use'] = "Valeurs possibles : <span class=\"val\">1</span>. Les commentaires ne seront pas dans la réponse (pour alléger le trafic réseau).";
				$orderlist_param['name'] = 'list';		$orderlist_param['status'] = 'requis';		$orderlist_param['use'] = "Valeurs possibles : <span class=\"val\">top</span> (votes), <span class=\"val\">topcomment</span> (nombre de commentaires), <span class=\"val\">lasts</span> (date de publication). Les citations sont classées de manière décroissante selon les différents critères.";
				$cat_param['name'] = 'cat';				$cat_param['status'] = 'requis';			$cat_param['use'] = "Identifie une catégorie. Prend la valeur de l'id ou du nom de la catégorie.";
/*9*/			$sel_param['name'] = 'sel';				$sel_param['status'] = 'requis';			$sel_param['use'] = "Identifie une sélection. Prend la valeur de l'id ou du nom de la sélection.";
				$quoteids_param['name'] = 'quoteids';	$quoteids_param['status'] = 'requis';		$quoteids_param['use'] = "Fourni la liste de citations à partir de leurs id. Chaque id est un entier et est séparé des autres par un '/'.";
				
				// POST
				$quote_param['name'] = 'quote'; 			$quote_param['status'] = 'requis';				$quote_param['use'] = "Contenu de la nouvelle citation.";
				$explication_param['name'] = 'expl';		$explication_param['status'] = 'optionnel';		$explication_param['use'] = "Texte précisant la citation.";
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
				$name_param['name'] = 'info'; 				$name_param['status'] = 'optionnel';			$name_param['use'] = "Champ servant a communiquer le nom de la personne qui demande le suivit.";
				$info_param['name'] = 'info'; 				$info_param['status'] = 'optionnel';			$info_param['use'] = "Champ servant a communiquer des inforations supplémentaires sur la personne qui demande le suivit.";
				$comment_param['name'] = 'comment'; 		$comment_param['status'] = 'requis';			$comment_param['use'] = "Contenu du nouveau commentaire.";
				$commentid_param['name'] = 'commentid'; 	$commentid_param['status'] = 'requis';			$commentid_param['use'] = "Identifie un commentaire avec son id (entier).";
				$newsel_param['name'] = 'sel';				$newsel_param['status'] = 'optionnel';			$newsel_param['use'] = "Permet de donner un nom à la sélection à créer.";
/*29*/			$newcat_param['name'] = 'cat';				$newcat_param['status'] = 'requis';				$newcat_param['use'] = "Nom de la nouvelle catégorie à créer.";
				
				$mailsuivi_param['name'] = 'mail'; 			$mailsuivi_param['status'] = 'requis';			$mailsuivi_param['use'] = "Adresse mail où sont envoyés les mails du suivi.";
				$suiviaction_param['name'] = 'action'; 		$suiviaction_param['status'] = 'requis'; 		$suiviaction_param['use'] = "Valeurs possibles : <span class=\"val\">follow</span> ou <span class=\"val\">unfollow</span>. Indique l'action qui doit être effetuée lors de cet appel.";
				/*to delete*/$newcomments_param['name'] = 'newcomments'; $newcomments_param['status'] = 'requis'; 		$newcomments_param['use'] = "Booléen (0 ou 1) indiquant si l'adresse mail sera informée ou pas de l'arrivée de nouveaux commentaires sur la citation.";
				
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
							<h1>Citations</h1> <a href="#-API_ressources-comments">next</a>
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
					$params[2] = $p_comment_param;
					$params[3] = $nocomment_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote.php?key='.$APIdatas['public_key_test'].'&amp;quoteid=1';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"id":10,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Un accident de barbecue m a conduit aux urgences. Pour brûlure ? Non. Pour crise de rire tellement puissante que je me suis empalé la joue avec le bâton de ma brochette","source":"","context":"","explanation":"","author":"Anonyme","publisher":"","publisher_info":"","site":"","category":"vdm","category_id":"2","up":1,"down":1,"total_comments":3,"comments":[{"id":52,"post_timestamp":"1312036","post_date":"09/08/2011 à 22:12","publisher":"audrey","site":"","comment":"é\'r\"tr\"t","up":0,"down":0,"reported":0},{"id":53,"post_timestamp":"1312036","post_date":"09/08/2011 à 22:14","publisher":"hh","site":"","comment":"[quote]é\'r\"tr\"t[/quote]","up":0,"down":0,"reported":0},{"id":54,"post_timestamp":"1312036","post_date":"09/08/2011 à 22:14","publisher":"gogo","site":"","comment":"Ce commentaire a été modéré.","up":0,"down":0,"reported":1}],"nbcomments":3,"size_comment_page":20,"current_comment_page":1,"total_comment_pages":1},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list={order}';
					$ressource['use'] = "Retourne une page de citations par ordre de vote décroissant.";
					$params[0] = $key_param;		// 0
					$params[1] = $orderlist_param;
					$params[2] = $p_quote_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=top';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"quotes":[{"id":12,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"LOOOL","source":"","context":"","explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},{"id":13,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Que signifie lol? valeur absolue de zéro!","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0},{"id":14,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Il était une fois","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":0,"total_comments":0},{"id":15,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Hello","source":"","context":"","explanation":"","author":"tim","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},{"id":1,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Il est temps de travailler...","source":"","context":"","explanation":"Première quote !","author":"loic","publisher":"","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":1},{"id":17,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:27","quote":"même citation mais sans remplir le site...","source":"source","context":"context","explanation":"explanation","author":"author","publisher":"publisher","publisher_info":"Quelques informations...","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},{"id":16,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:16","quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","source":"Tiré d\'un article du monde...","context":"Pour faire un exemple de context : je cherche à customiser les méta infos","explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","author":"Mon cher nico !","publisher":"loic","publisher_info":"","site":"http://lkws.fr/cq/","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},{"id":7,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Quand un geek pense, il n oublie pas /* */ .","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":3,"total_comments":0}],"nbquotes":8,"size_quote_page":10,"current_quote_page":2,"total_quote_pages":2},"info":{"remaining_queries":38,"next_restart":30}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list=category&cat={cat_id|cat_name}';
					$ressource['use'] = "Retourne une page de citations de la catégorie voulue (par id ou par nom) par ordre de date de publication décroissante.";
					$params[0] = $key_param;		// 0
					$params[1]['name'] = 'list';		$params[1]['status'] = 'requis';		$params[1]['use'] = "Valeur : <span class=\"val\">category</span>";
					$params[2] = $cat_param;
					$params[3] = $p_quote_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=category&cat=3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"quotes":[{"id":24,"post_timestamp":"1312036","post_date":"16/08/2011 à 18:19","quote":"Nouvelle citation avec description....","source":"","context":"","explanation":"Voilà une super citation !!\n\nJe ne sais pas ce que vous en pensez mais moi je la trouve géniale. Je l\'ai entendue sur un forum informatique.\n\nTop non ?","author":"","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":1,"down":0,"total_comments":2},{"id":2,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","source":"","context":"","explanation":"","author":"georges","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":5,"down":1,"total_comments":0},{"id":7,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Quand un geek pense, il n oublie pas /* */ .","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":3,"total_comments":0},{"id":9,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Le comble du Geek est de s inscrire sur un réseau social.","source":"","context":"","explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0},{"id":11,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Windows, ou l art de prendre les gens pour de bêta-testeurs.","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":1,"down":0,"total_comments":0},{"id":13,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Que signifie lol? valeur absolue de zéro!","source":"","context":"","explanation":"","author":"loic","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":0,"down":0,"total_comments":0}],"nbquotes":6,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1,"category_id":3,"category_name":"geek"},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'quote_list.php?key={key}&list=selection&sel={sel_id|sel_name}';
					$ressource['use'] = "Retourne une page de citations d'une sélection voulue (par id ou par nom) par ordre de date de publication décroissante.";
					$params[0] = $key_param;		// 0
					$params[1]['name'] = 'list';		$params[1]['status'] = 'requis';		$params[1]['use'] = "Valeur : <span class=\"val\">selection</span>";
					$params[2] = $sel_param;
					$params[3] = $p_quote_param;
					$params[4] = $noheaders_param;
					$params[5] = $format_param;
					$params[6] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'quote_list.php?key='.$APIdatas['public_key_test'].'&list=selection&sel=2';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"quotes":[{"id":17,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:27","quote":"même citation mais sans remplir le site...","source":"source","context":"context","explanation":"explanation","author":"author","publisher":"publisher","publisher_info":"","site":"","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0},{"id":16,"post_timestamp":"1312036","post_date":"30/07/2011 à 20:16","quote":"Ma quote avec beaucoup d\'infos... C\'est génial non ???","source":"Tiré d\'un article du monde...","context":"Pour faire un exemple de context : je cherche à customiser les méta infos","explanation":"Ca sert un peu à rien... Mais bon, il faut quand même en mettre","author":"Mon cher nico !","publisher":"loic","publisher_info":"","site":"http://lkws.fr/cq/","category":"loic quotes","category_id":"1","up":0,"down":1,"total_comments":0}],"nbquotes":2,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1,"selection_id":2,"selection_name":"zetr"},"info":{"remaining_queries":39,"next_restart":60}}';
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
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"quotes":[{"id":15,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Hello","source":"","context":"","explanation":"","author":"tim","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},{"id":8,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Aujourd hui, cela fait trois mois que ma copine a ses règles. C est louche.","source":"","context":"","explanation":"","author":"fergie","publisher":"","publisher_info":"","site":"","category":"vdm","category_id":"2","up":1,"down":1,"total_comments":2},{"id":6,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"Biloute !","source":"","context":"","explanation":"","author":"lukas","publisher":"","publisher_info":"","site":"","category":"","category_id":"","up":0,"down":0,"total_comments":0},{"id":2,"post_timestamp":"1312036","post_date":"30/07/2011 à 16:27","quote":"\"Connexion à réseau non identifié (Nom du réseau: dlink)\"","source":"","context":"","explanation":"","author":"georges","publisher":"","publisher_info":"","site":"","category":"geek","category_id":"3","up":5,"down":1,"total_comments":0}],"nbquotes":4,"size_quote_page":10,"current_quote_page":1,"total_quote_pages":1},"info":{"remaining_queries":39,"next_restart":60}}';
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
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"action":"none"<span class="comment">Autre valeur : "deleted". C\'est l\'êtat de la citation après signalement.</span>},"info":{"remaining_queries":37,"next_restart":29}}';
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
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-comments">
					<tr class="title">
						<td colspan="2">
							<h1>Commentaires</h1> <a href="#-API_ressources-categories">next</a>
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
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"comments":[{"id":84,"post_timestamp":"1315086","post_date":"03/09/2011 à 23:43","publisher":"kas","site":"","comment":"Hello !","up":0,"down":0,"reported":0},{"id":85,"post_timestamp":"1315086","post_date":"03/09/2011 à 23:44","publisher":"kas","site":"","comment":"coucou","up":0,"down":0,"reported":0},{"id":108,"post_timestamp":"1315910","post_date":"13/09/2011 à 12:47","publisher":"leclown","site":"http://twitter.com/leclown","comment":"j\'adore! tiens je vais commander une pomme par internet","up":0,"down":0,"reported":0}],"nbcomments":3,"size_comment_page":20,"current_comment_page":1,"total_comment_pages":1},"info":{"remaining_queries":39,"next_restart":60}}';
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
					$params[6] = $noheaders_param;
					$params[7] = $format_param;
					$params[8] = $callback_param;
					$params[9] = $meth_param;
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
					$params[7] = $noheaders_param;
					$params[8] = $format_param;
					$params[9] = $callback_param;
					$params[10] = $meth_param;
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
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"action":"none"<span class="comment">Autre valeur : "deleted". C\'est l\'êtat de la citation après signalement.</span>},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					
					echo '</table>
					<table class="API_ressources" id="-API_ressources-categories">
					<tr class="title">
						<td colspan="2">
							<h1>Catégories</h1> <a href="#-API_ressources-selections">next</a>
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
							<h1>Sélections</h1> <a href="#-API_ressources-parameters">next</a>
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
					<table class="API_ressources" id="-API_ressources-parameters">
					<tr class="title">
						<td colspan="2">
							<h1>Paramètres</h1>
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
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'suivi.php?key={key}&mail={mail}';
					$ressource['use'] = "Retourne la liste des citations suivies par le mail donné.";
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
					$ressource['use'] = "Retourne la liste des mails qui suivent la ressource donnée.";
					$params[0] = $key_param;
					$params[1] = $typesuivi_param;
					$params[2] = $id_param;
					$params[3] = $noheaders_param;
					$params[4] = $format_param;
					$params[5] = $callback_param;
					$sample['methode'] = 'GET';
					$sample['requete'] = $APIdatas['base_url'].'suivi.php?key='.$APIdatas['public_key_test'].'&type=quote&id=3';
					$sample['reponse'] = '{"status":{"code":200,"message":"Success"},"response":{"elt":"event","id":"1","suivi":[{"name":"loic","info":"Informaticien et intéressé par la politique"},{"name":"toto","info":"artiste"},{"name":"yohan","info":""}],"total_suivis":7},"info":{"remaining_queries":39,"next_restart":60}}';
					echo generateAPIRessource($ressource, $params, $sample);
					
					
					$ressource= null; $params = null; $sample = null;
					$ressource['ressource'] = 'suivi.php?key={key}&mail={mail}&type={type}&id={id}&action={action}';
					$ressource['use'] = "Crée ou met a jour le suivi par l'adresse mail d'une ressource désignée par son type et son id.";
					$params[0] = $key_param;
					$params[1] = $mailsuivi_param;
					$params[2] = $typesuivi_param;
					$params[3] = $id_param;
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
					<!--<p>powered by <a href="http://cloudhead.io/toto">toto</a>, <a href="http://github.com/cloudhead/less.js">LESS</a> and <a href="http://github.com/cloudhead/hiless">hiless</a></p>-->
					<p id="copy">L'ensemble du contenu est <a href="http://croudquotes.lkws.fr/download" class="demande_sources">publié</a> sous license <a href="http://fr.wikipedia.org/wiki/Beerware" target="_blanck">BeerWare</a></p>
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
</body>
</html>