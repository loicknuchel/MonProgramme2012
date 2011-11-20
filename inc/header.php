<?php

function generateHeader($rel_to_root = './'){
	$html = '
	<a href="#" class="supportus"><img src="'.$rel_to_root.'themes/main/img/header/supportus.png" style="position: absolute; top: 0; right: 0; z-index: 1000;" /></a>
	<div id="info">C\'est la classe info...</div>
	
	<div id="header">
		<div class="wrapper">
			<div class="title">
				<!--
				<div class="disclaimer" style="margin-top: 0px; padding: 5px 0px; font-size: 9px;">
					Quand ils sont venus chercher les communistes,
					je n\'ai rien dit,<br/>
					je n\'étais pas communiste.<br/>
					Quand ils sont venus chercher les syndicalistes,
					je n\'ai rien dit,<br/>
					je n\'étais pas syndicaliste.<br/>
					Quand ils sont venus chercher les juifs,
					je n\'ai pas protesté,<br/>
					je n\'étais pas juif.<br/>
					Quand ils sont venus chercher les catholiques,
					je n\'ai pas protesté,<br/>
					je n\'étais pas catholique.<br/>
					Puis ils sont venus me chercher,
					et il ne restait personne pour protester.<br/>
					<a href="#">Martin Niemöller</a>
				</div>
				<div class="disclaimer" style="top: 81px; left: 640px; font-size: 10px;">
					Ce qui est simple est faux,<br/>
					ce qui ne l\'est pas est inutilisable.<br/>
					<a href="#">Paul Valéry</a> 
				</div>
				<div class="disclaimer" style="top: 81px; left: 500px; font-size: 10px;">
				-->
				<div class="disclaimer" style="bottom: 0px; right: 10px; font-size: 10px;">
					<span style="font-style: italic;">"Le monde ne sera pas détruit par ceux qui font le mal,<br/>
					<span onclick="displayInfo(\'info\', \'Voici le message...\');">mais</span> <span onclick="displayInfo(\'success\', \'Voici le message...\');">par</span> <span onclick="displayInfo(\'warning\', \'Voici le message...\');">ceux</span> <span onclick="displayInfo(\'error\', \'Voici le message...\');">qui</span> <span onclick="displayInfo(\'debug\', \'Voici le message...\');">les</span> regardent sans rien faire."</span><br/>
					<a href="http://www.maphilo.net/citations_albert-einstein-147.html" target="_blanck" style="float: right;">Einstein</a> 
				</div>
				<h1><a href="'.$rel_to_root.'">Mon Programme 2012</a></h1>
			</div>
			<ul class="topnav">
				<li><a href="'.$rel_to_root.'random.php">Aléatoire</a></li>
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
				<!--<li><a href="'.$rel_to_root.'info/discutions.php">Discutions</a></li>-->
				<li><a href="'.$rel_to_root.'info/faq.php">F.A.Q.</a></li>
				<li class="selection"><a href="#">&#9733; <div></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>';
	return $html;
}

?>