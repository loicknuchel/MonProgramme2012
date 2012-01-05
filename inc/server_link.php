<?php
	$rel_to_root = isset($rel_to_root) ? $rel_to_root : './'; 				// 		chemin relatif de la page courante vers la racine de MonProgramme2012
	
	include_once $rel_to_root.'private_datas/keys.php';
	$private_keys = getPrivateKeys();
	
	
	function getStatus(){ return "LOCAL"; }									// TODO : mettre LOCAL, DEV ou PROD															<= ICI
	function getService(){ return "test"; }									// TODO : mettre test, mp2012 ou ps12														<= ICI
	
	
	$usr = null;
	if(getStatus() == "LOCAL"){
		$server_uri = 'http://localhost/lkws_croudquotes/';					// url du serveur
		$usr['site_url'] = 'http://localhost/lkws_monprogramme2012/';		// url du site
		$usr['key'] = $private_keys[getService()];								// clé pour se connecter à l'API
	}
	else if(getStatus() == "DEV"){
		$server_uri = 'http://dev.lkws.fr/lkws_croudquotes/';				// url du serveur
		$usr['site_url'] = 'http://dev.lkws.fr/lkws_monprogramme2012/';		// url du site
		$usr['key'] = $private_keys[getService()];								// clé pour se connecter à l'API
	}
	else if(getStatus() == "PROD"){
		$server_uri = 'http://croudquotes.lkws.fr/';						// url du serveur
		$usr['site_url'] = 'http://monprogramme2012.lkws.fr/';				// url du site
		$usr['key'] = $private_keys['mp2012'];								// clé pour se connecter à l'API
	}
	unset($private_keys);
	$usr['api_url'] = $server_uri.'api/1.0/';								// url de l'API
	
	$jsEnv = '
	<script>
		// meth indique si les requêtes sont faites sur le même domaine ou en cross-domain. Valeures possibles : \'local\' ou \'cross-domain\'
		var meth = \'cross-domain\';
		var base_url = \''.$usr['api_url'].'\';
		var api_key = \''.$usr['key'].'\';
		var rel_to_root = \''.$rel_to_root.'\';
		var welcome_fancybox_enabled = false;
	</script>';
	
	include_once $rel_to_root.'utils/api_call.php';
	
	include_once $rel_to_root.'inc/antispam.php';
	include_once $rel_to_root.'inc/conventions.php';
	
	include_once $rel_to_root.'fragments/utils.php';
	include_once $rel_to_root.'fragments/head.php';
	include_once $rel_to_root.'fragments/header.php';
	include_once $rel_to_root.'fragments/quotes.php';
	include_once $rel_to_root.'fragments/comments.php';
	include_once $rel_to_root.'fragments/petitions.php';
	include_once $rel_to_root.'fragments/pagers.php';
	include_once $rel_to_root.'fragments/quote_form.php';
	include_once $rel_to_root.'fragments/rephrase_form.php';
	include_once $rel_to_root.'fragments/comment_form.php';
	include_once $rel_to_root.'fragments/petition_form.php';
	include_once $rel_to_root.'fragments/selection_form.php';
	include_once $rel_to_root.'fragments/footer.php';
	include_once $rel_to_root.'fragments/scripts.php';
	include_once $rel_to_root.'fragments/selection.php';
	
	//include_once $rel_to_root.'utils/twitter.php';
?>