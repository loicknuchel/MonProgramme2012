<?php

function generateSelectionForm($usr, $server_path, $postResult){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']));
	$app = null;
	$app['params']['size']['selection'] = isset($app_params['response']['textMaxSize']['selection']) ? $app_params['response']['textMaxSize']['selection'] : null;
	
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$name = null;
	}
	else{
		$name = isset($_POST['name']) ? $_POST['name'] : null;
	}
	
	$html = '<div class="new_selection" style="margin: 10px 0px -20px 20px;">
		<a href="#">Enregistrer dans une sélection</a>
		<form method="POST" style="display: inline-block; visibility: hidden; margin-left: 20px;">
			<input class="FV_length small" type="text" name="name" placeholder="Nom de la sélection" value="'.$name.'" maxsize="'.$app['params']['size']['selection'].'" />
			<button type="submit" class="send">Enregistrer</button>
			<button type="submit" class="cancel">Annuler</button>
		</form>
	</div>';
	
	return $html;
}

?>