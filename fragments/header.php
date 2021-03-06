<?php

function generateHeader($usr, $rel_to_root = './'){
	$cat = null;
	if($usr != null){
		$categories = api_call('GET', $usr['api_url'].'category.php', array('key'=>$usr['key'], 'p'=>'all') );
		if(isset($categories['response']['categories'])){
			$ind = 0;
			foreach($categories['response']['categories'] as $key => $value){
				$cat[$ind]['id'] = $value['id'];
				$cat[$ind]['name'] = $value['name'];
				$cat[$ind]['nbquotes'] = $value['nbquotes'];
				$ind++;
			}
		}
	}
	
	
	if(getStatus() == "LOCAL" || getStatus() == "DEV"){
		$title = getStatus().': '.getService();
	} else if(getStatus() == "PROD"){
		$title = 'Mon Programme 2012';
	} else{
		$title = 'ERREUR DE STATUS !!!';
	}
	
	$html = '
	<a href="#" class="supportus"><img src="'.$rel_to_root.'themes/main/img/header/supportus.png" style="position: absolute; top: 0; right: 0; z-index: 1000;" /></a>
	<div id="info">C\'est la classe info...</div>
	
	<div id="header">
		<div class="wrapper">
			<div class="title">
				<div class="disclaimer" style="bottom: 0px; right: 10px; font-size: 10px;">
					<span style="font-style: italic;">"Le monde ne sera pas détruit par ceux qui font le mal,<br/>
					mais par ceux qui les regardent sans rien faire."</span><br/>
					<a href="http://www.maphilo.net/citations_albert-einstein-147.html" target="_blanck" style="float: right;">Einstein</a> 
				</div>
				<h1><a href="'.$rel_to_root.'">'.$title.'</a></h1>
			</div>
			<ul class="topnav">
				<li><a href="'.$rel_to_root.'quote.php?id=random">Aléatoire</a></li>
				<li>
					<a href="#" class="topnavtitle">Propositions</a>
					<ul class="subnav">
						<li><a href="'.$rel_to_root.'list.php?type=top">Populaires</a></li>
						<li><a href="'.$rel_to_root.'list.php?type=topcomment">Commentées</a></li>
						<li><a href="'.$rel_to_root.'list.php?type=lastactivity">Dernières activités</a></li>
						<li><a href="'.$rel_to_root.'list.php?type=lasts">Dernières</a></li>
						<li class="favoris"><a href="'.$rel_to_root.'list.php?type=favoris">Favoris</a></li>
					</ul>
					<span></span>
				</li>
				<li><a href="'.$rel_to_root.'programmes.php">Programmes</a></li>
				<li><a href="'.$rel_to_root.'new.php">Nouvelle proposition</a></li>';
				
			if($cat != null){
					$html .= '
				<li>
					<a href="#" class="topnavtitle">Sujets</a>
					<ul class="subnav">';
					foreach($cat as $key => $value){
						if($value['nbquotes'] > 0){$html .= '<li><a href="'.$rel_to_root.'list.php?type=category&cat='.$value['id'].'">'.$value['name'].' ('.$value['nbquotes'].')</a></li>';}
					}
					$html .= '
					</ul>
					<span></span>
				</li>';
			}
			
				$html .= '<li><a href="'.$rel_to_root.'articles/projet.php">Le projet</a></li>
				<!--<li><a href="'.$rel_to_root.'articles/events.php">Evènements</a></li>-->
				<!--<li>
					<a href="#" class="topnavtitle">Articles</a>
					<ul class="subnav">
						<li><a href="'.$rel_to_root.'articles/bibliographie.php">Bibliographie</a></li>
						<li><a href="'.$rel_to_root.'articles/le-vote-electronique.php">Vote électronique</a></li>
						<li><a href="'.$rel_to_root.'articles/combat_de_mots.php">Combat de mots</a></li>
					</ul>
					<span></span>
				</li>-->
				<!--<li><a href="'.$rel_to_root.'articles/discutions.php">Chat</a></li>-->
				<li><a href="'.$rel_to_root.'articles/faq.php">F.A.Q.</a></li>
				<li class="selection"><a href="#">&#9733; <div></div></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>';
	return $html;
}

?>