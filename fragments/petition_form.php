<?php


function sendPetitionForm($usr){
	if(isset($_POST['mail']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['id']) && isset($_POST['antiSpam']) && isset($_POST['antiSpamRep'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			$result = api_call('POST', $usr['api_url'].'petition.php', array(
				'key'=>$usr['key'],
				'type'=>isset($_POST['type']) ? $_POST['type'] : null,
				'id'=>isset($_POST['id']) ? $_POST['id'] : null,
				'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
				'prenom'=>isset($_POST['prenom']) ? $_POST['prenom'] : null,
				'nom'=>isset($_POST['nom']) ? $_POST['nom'] : null,
				'genre'=>isset($_POST['genre']) ? $_POST['genre'] : null,
				'age'=>isset($_POST['age']) ? $_POST['age'] : null,
				'site'=>isset($_POST['site']) ? $_POST['site'] : null,
				'profession'=>isset($_POST['profession']) ? $_POST['profession'] : null,
				'zipcode'=>isset($_POST['zipcode']) ? $_POST['zipcode'] : null,
				'message'=>isset($_POST['sign_message']) ? $_POST['sign_message'] : null
			));
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
				$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
				api_call('POST', $usr['api_url'].'suivi.php', array(
					'key'=>$usr['key'],
					'type'=>isset($_POST['type']) ? $_POST['type'] : null,
					'id'=>isset($_POST['id']) ? $_POST['id'] : null,
					'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
					'action'=>'follow',
					'name'=>$prenom.' '.$nom,
					'info'=>isset($_POST['profession']) ? $_POST['profession'] : null
				), false);
			}
			
			// si on signe la pétition pour une proposition, on vote positivement pour elle
			if(isset($_POST['type']) && $_POST['type'] == 'quote'){
				api_call('POST', $usr['api_url'].'quote.php', array(
					'key'=>$usr['key'],
					'quoteid'=>isset($_POST['id']) ? $_POST['id'] : null,
					'vote'=>'up'
				), false);
			}
			
			return $result;
		}
		else{
			return 500;
		}
	}
	return null;
}

function generatePetitionForm($usr, $postResult, $actionPage, $anchor, $type, $id, $rel_to_root = './'){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']));
	$app = null;
	$app['params']['size']['prenom'] = isset($app_params['response']['textMaxSize']['prenom']) ? $app_params['response']['textMaxSize']['prenom'] : null;
	$app['params']['size']['nom'] = isset($app_params['response']['textMaxSize']['nom']) ? $app_params['response']['textMaxSize']['nom'] : null;
	$app['params']['size']['mail'] = isset($app_params['response']['textMaxSize']['mail']) ? $app_params['response']['textMaxSize']['mail'] : null;
	$app['params']['size']['site'] = isset($app_params['response']['textMaxSize']['site']) ? $app_params['response']['textMaxSize']['site'] : null;
	$app['params']['size']['profession'] = isset($app_params['response']['textMaxSize']['profession']) ? $app_params['response']['textMaxSize']['profession'] : null;
	$app['params']['size']['zipcode'] = isset($app_params['response']['textMaxSize']['zipcode']) ? $app_params['response']['textMaxSize']['zipcode'] : null;
	$app['params']['size']['sign_message'] = isset($app_params['response']['textMaxSize']['sign_message']) ? $app_params['response']['textMaxSize']['sign_message'] : null;
	
	$captchaError = '';
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$genre = null;$age = null;$prenom = null;$nom = null;$mail = null;$site = null;$profession = null;$zipcode = null;$sign_message = null;
	}
	else{
		if(isset($postResult) && $postResult == 500){$captchaError = '<div style="border: #C00 1px solid; background: #FEE; padding: 10px;">Erreur dans la captcha antispam !!</div><br/>';}
		$genre = isset($_POST['genre']) ? $_POST['genre'] : null;
		$age = isset($_POST['age']) ? $_POST['age'] : null;
		$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
		$nom = isset($_POST['nom']) ? $_POST['nom'] : null;
		$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
		$site = isset($_POST['site']) ? $_POST['site'] : null;
		$profession = isset($_POST['profession']) ? $_POST['profession'] : null;
		$zipcode = isset($_POST['zipcode']) ? $_POST['zipcode'] : null;
		$sign_message = isset($_POST['sign_message']) ? $_POST['sign_message'] : null;
	}
	
	$antiSpam = getAntiSpamQuestion();
	$html = '<div class="sign_quote" id="sign_quote" style="width: 600px; margin: auto; margin-top: 30px;">
		<form method="POST" action="'.$actionPage.$anchor.'" class="FV_petition">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<input type="hidden" name="type" value="'.$type.'" />
			<input type="hidden" name="id" value="'.$id.'" />
			
			<input class="FV_required FV_length" 			type="text" name="prenom" 		placeholder="Prénom" 		value="'.$prenom.'" 		maxsize="'.$app['params']['size']['prenom'].'" 		/><br/>
			<input class="FV_required FV_length" 			type="text" name="nom" 			placeholder="Nom" 			value="'.$nom.'" 			maxsize="'.$app['params']['size']['nom'].'" 		/><br/>
			<input class="FV_required FV_mail FV_length" 	type="text" name="mail" 		placeholder="Mail" 			value="'.$mail.'" 			maxsize="'.$app['params']['size']['mail'].'" 		/><br/>
			<input class="FV_length" 						type="text" name="site" 		placeholder="Site web" 		value="'.$site.'" 			maxsize="'.$app['params']['size']['site'].'" 		/><br/>
			<input class="FV_length" 						type="text" name="profession" 	placeholder="Profession" 	value="'.$profession.'" 	maxsize="'.$app['params']['size']['profession'].'" 	/><br/>
			
			<div class="show_more_datas">Données complémentaires</div>
			<div class="more_datas">
				<select name="genre">
					<option value="">Sexe</option>
					<option value="Mr"'; if($genre == 'Mr'){$html .= ' selected="selected"';} $html .= '>Mr</option>
					<option value="Mme"'; if($genre == 'Mme'){$html .= ' selected="selected"';} $html .= '>Mme</option>
				</select>
				<br/>
				<select name="age">
					<option value="">Age</option>
					<option value="1"'; if($age == '1'){$html .= ' selected="selected"';} $html .= '>0 à 18 ans</option>
					<option value="2"'; if($age == '2'){$html .= ' selected="selected"';} $html .= '>18 à 25 ans</option>
					<option value="3"'; if($age == '3'){$html .= ' selected="selected"';} $html .= '>25 à 50 ans</option>
					<option value="4"'; if($age == '4'){$html .= ' selected="selected"';} $html .= '>> à 50 ans</option>
				</select><br/>
				<input class="FV_length xsmall" type="text" name="zipcode" placeholder="Code postal" value="'.$zipcode.'" maxsize="'.$app['params']['size']['zipcode'].'" />
			</div>
			
			<textarea class="FV_length" name="sign_message" placeholder="Un petit commentaire..." maxsize="'.$app['params']['size']['sign_message'].'">'.$sign_message.'</textarea>
			
			<div class="suivi">
				<input type="checkbox" name="suivi" id="suivi"><label for="suivi">Recevoir une notification de réponse aux commentaires par email</label>
			</div>
			<div class="antiSpam">
				<span style="font-weight: bold;">Anti-spam :</span> Veuillez écrire imprimante s\'il vous plait <input class="FV_required" type="text" name="antiSpamRep" placeholder="Anti-Spam">
			</div>
			<div style="text-align: center;"><input type="submit" value="Signer la pétition !"/></div>
			<div class="clearfix"></div>
		</form>
	</div>';
	return $html;
}

?>