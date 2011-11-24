<?php
	$rel_to_root = isset($rel_to_root) ? $rel_to_root : './'; 				// 		chemin relatif de la page courante vers la racine de MonProgramme2012
	
	$private_keys['test'] 				= 'b1551c0e7dad8c4b29b80edd846d99c7b69c4c46';
	$private_keys['monprogramme2012'] 	= '4739040f4981a4aa9973043f63e5e5ef4312d8f1';
	$private_keys['themaps12'] 			= '7f0a84b7946b290c1aac7a2c6bc6b2f13787a4a1';
	
	$status_site 						= "LOCAL";							// TODO : mettre LOCAL, DEV ou PROD															<= ICI
	$bdd_site							= "test";							// TODO : mettre test, monprogramme2012 ou themaps12										<= ICI
	
	
	
	$usr = null;
	$api_rel_path = 'api/1.0/';												// 		chemin relatif de la racine de CroudQuotes vers l'API
	if($status_site == "LOCAL"){
		$server_path = $rel_to_root.'../lkws_croudquotes/';					// lien de la page courante vers la racine de CroudQuotes
		$server_uri = 'http://localhost/lkws_croudquotes/';					// url du serveur
		$usr['site_url'] = 'http://localhost/lkws_monprogramme2012/';		// url du site
		$usr['key'] = $private_keys[$bdd_site];								// clé pour se connecter à l'API
	}
	else if($status_site == "DEV"){
		$server_path = $rel_to_root.'../lkws_croudquotes/';					// lien de la page courante vers la racine de CroudQuotes
		$server_uri = 'http://dev.lkws.fr/lkws_croudquotes/';				// url du serveur
		$usr['site_url'] = 'http://dev.lkws.fr/lkws_monprogramme2012/';		// url du site
		$usr['key'] = $private_keys[$bdd_site];								// clé pour se connecter à l'API
	}
	else if($status_site == "PROD"){
		$server_path = $rel_to_root.'../lkws_croudquotes/';					// lien de la page courante vers la racine de CroudQuotes
		$server_uri = 'http://croudquotes.lkws.fr/';						// url du serveur
		$usr['site_url'] = 'http://monprogramme2012.lkws.fr/';				// url du site
		$usr['key'] = $private_keys['monprogramme2012'];					// clé pour se connecter à l'API
	}
	unset($private_keys);
	$usr['api_url'] = $server_uri.$api_rel_path;							// url de l'API
											
	$api_path = $server_path.$api_rel_path;									// lien de la page courante vers l'API
	$rel = $server_path;
	include_once $server_path.'filtres/filtre.php';
	include_once $server_path.'api/fonc/getCategory.php';
	include_once $server_path.'api/fonc/getComments.php';
	include_once $server_path.'api/fonc/getQuote.php';
	include_once $server_path.'api/fonc/getQuoteList.php';
	include_once $server_path.'api/fonc/getParams.php';
	include_once $server_path.'api/fonc/getSelection.php';
	include_once $server_path.'api/fonc/postComment.php';
	include_once $server_path.'api/fonc/postQuote.php';
	include_once $server_path.'api/fonc/postSuivi.php';
	
	
	$serv_result = filtre($usr, 'client'); // exit if incorrect
	if($serv_result != null){
		if($serv_result == 401){header('Location: '.$rel_to_root.'404.php');} // clé incorrecte
		else if($serv_result == 402){header('Location: '.$rel_to_root.'402.php');} // trop de requêtes
		else{header('Location: '.$rel_to_root.'404.php');}
		exit;
	}
	else{
		$jsEnv = '
		<script>
			// meth indique si les requêtes sont faites sur le même domaine ou en cross-domain. Valeures possibles : \'local\' ou \'cross-domain\'
			var meth = \'cross-domain\';
			var base_url = \''.$usr['api_url'].'\';
			var api_key = \''.$usr['key'].'\';
			var rel_to_root = \''.$rel_to_root.'\';
			var welcome_fancybox_enabled = false;
		</script>';
	}
	
	include_once $rel_to_root.'inc/antispam.php';
	include_once $rel_to_root.'inc/conventions.php';
	include_once $rel_to_root.'inc/utils.php';
	include_once $rel_to_root.'inc/head.php';
	include_once $rel_to_root.'inc/header.php';
	include_once $rel_to_root.'inc/quote.php';
	include_once $rel_to_root.'inc/comments.php';
	include_once $rel_to_root.'inc/forms.php';
	include_once $rel_to_root.'inc/footer.php';
	include_once $rel_to_root.'inc/scripts.php';
	include_once $rel_to_root.'inc/selection.php';
	include_once $rel_to_root.'utils/twitter.php';
?>