<?php

function generateHeader($rel_to_root = './'){
	$html = '
	<a href="#" class="supportus"><img src="'.$rel_to_root.'themes/main/img/header/supportus.png" style="position: absolute; top: 0; right: 0; z-index: 1000;" /></a>
	<div id="info">C\'est la classe info...</div>
	
	<div id="header">
		<div class="wrapper">
			<div class="title">
				<div class="disclaimer" style="bottom: 0px; right: 10px; font-size: 10px;">
					<span style="font-style: italic;">"Le monde ne sera pas détruit par ceux qui font le mal,<br/>
					<span onclick="displayInfo(\'info\', \'Voici le message...\');">mais</span> <span onclick="displayInfo(\'success\', \'Voici le message...\');">par</span> <span onclick="displayInfo(\'warning\', \'Voici le message...\');">ceux</span> <span onclick="displayInfo(\'error\', \'Voici le message...\');">qui</span> <span onclick="displayInfo(\'debug\', \'Voici le message...\');">les</span> regardent sans rien faire."</span><br/>
					<a href="http://www.maphilo.net/citations_albert-einstein-147.html" target="_blanck" style="float: right;">Einstein</a> 
				</div>
				<h1><a href="'.$rel_to_root.'">Mon Programme 2012</a></h1>
			</div>
			<ul class="topnav">
				<li><a href="'.$rel_to_root.'quote.php?id=random">Aléatoire</a></li>
				<li>
					<a href="#" class="topnavtitle">Classées</a>
					<ul class="subnav">
						<li><a href="'.$rel_to_root.'top.php">Top votes</a></li>
						<li><a href="'.$rel_to_root.'topcomment.php">Top réactions</a></li>
						<li><a href="'.$rel_to_root.'lasts.php">Dernières</a></li>
						<!--<li><a href="'.$rel_to_root.'lastcomments.php">Dernières réactions</a></li>-->
						<li class="favoris"><a href="#">Favoris</a></li>
					</ul>
					<span></span>
				</li>
				<!--<li><a href="'.$rel_to_root.'allselections.php">Sélections</a></li>-->
				<li><a href="'.$rel_to_root.'new.php">Nouvelle proposition</a></li>
				<li><a href="'.$rel_to_root.'info/projet.php">Le projet</a></li>
				<!--<li><a href="'.$rel_to_root.'info/events.php">Evènements</a></li>-->
				<!--<li>
					<a href="#" class="topnavtitle">Articles</a>
					<ul class="subnav">
						<li><a href="'.$rel_to_root.'info/bibliographie.php">Bibliographie</a></li>
						<li><a href="'.$rel_to_root.'info/le-vote-electronique.php">Vote électronique</a></li>
						<li><a href="'.$rel_to_root.'info/combat_de_mots.php">Combat de mots</a></li>
					</ul>
					<span></span>
				</li>-->
				<!--<li><a href="'.$rel_to_root.'info/discutions.php">Chat</a></li>-->
				<li><a href="'.$rel_to_root.'info/faq.php">F.A.Q.</a></li>
				<li class="selection"><a href="#">&#9733; <div></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>';
	return $html;
}

?>