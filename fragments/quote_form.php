<?php


function sendQuoteForm($usr){
	if(isset($_POST['quote'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			$result = api_call('POST', $usr['api_url'].'quote.php', array(
				'key'=>$usr['key'],
				'quote'=>isset($_POST['quote']) ? $_POST['quote'] : null,
				'src'=>isset($_POST['src']) ? $_POST['src'] : null,
				'ctx'=>isset($_POST['ctx']) ? $_POST['ctx'] : null,
				'expl'=>isset($_POST['expl']) ? $_POST['expl'] : null,
				'auth'=>isset($_POST['auth']) ? $_POST['auth'] : null,
				'pub'=>isset($_POST['pub']) ? $_POST['pub'] : null,
				'pubinfo'=>isset($_POST['pubinfo']) ? $_POST['pubinfo'] : null,
				'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
				'site'=>isset($_POST['site']) ? $_POST['site'] : null,
				'cat'=>isset($_POST['cat']) ? $_POST['cat'] : null
			));
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				api_call('POST', $usr['api_url'].'suivi.php', array(
					'key'=>$usr['key'],
					'type'=>'quote',
					'id'=>isset($result['response']['id']) ? $result['response']['id'] : null,
					'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
					'action'=>'follow',
					'name'=>isset($_POST['pub']) ? $_POST['pub'] : null,
					'info'=>isset($_POST['pubinfo']) ? $_POST['pubinfo'] : null
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

function generateQuoteForm($usr, $postResult, $categories, $rel_to_root = './'){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']), false);
	$app = null;
	$app['params']['size']['quote'] = isset($app_params['response']['textMaxSize']['quote']) ? $app_params['response']['textMaxSize']['quote'] : null;
	$app['params']['size']['source'] = isset($app_params['response']['textMaxSize']['source']) ? $app_params['response']['textMaxSize']['source'] : null;
	$app['params']['size']['context'] = isset($app_params['response']['textMaxSize']['context']) ? $app_params['response']['textMaxSize']['context'] : null;
	$app['params']['size']['explanation'] = isset($app_params['response']['textMaxSize']['explanation']) ? $app_params['response']['textMaxSize']['explanation'] : null;
	$app['params']['size']['author'] = isset($app_params['response']['textMaxSize']['author']) ? $app_params['response']['textMaxSize']['author'] : null;
	$app['params']['size']['publisher'] = isset($app_params['response']['textMaxSize']['publisher']) ? $app_params['response']['textMaxSize']['publisher'] : null;
	$app['params']['size']['publisher_info'] = isset($app_params['response']['textMaxSize']['publisher_info']) ? $app_params['response']['textMaxSize']['publisher_info'] : null;
	$app['params']['size']['mail'] = isset($app_params['response']['textMaxSize']['mail']) ? $app_params['response']['textMaxSize']['mail'] : null;
	$app['params']['size']['site'] = isset($app_params['response']['textMaxSize']['site']) ? $app_params['response']['textMaxSize']['site'] : null;
	$app['params']['size']['category'] = isset($app_params['response']['textMaxSize']['category']) ? $app_params['response']['textMaxSize']['category'] : null;
	
	$captchaError = '';
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$quote = null;$src = null;$ctx = null;$expl = null;$auth = null;$pub = null;$pubinfo = null;$mail = null;$site = null;$cat = null;
	}
	else{
		if(isset($postResult) && $postResult == 500){$captchaError = '<div style="border: #C00 1px solid; background: #FEE; padding: 10px;">Erreur dans la captcha antispam !!</div><br/>';}
		$quote = isset($_POST['quote']) ? $_POST['quote'] : null;
		$src = isset($_POST['src']) ? $_POST['src'] : null;
		$ctx = isset($_POST['ctx']) ? $_POST['ctx'] : null;
		$expl = isset($_POST['expl']) ? $_POST['expl'] : null;
		$auth = isset($_POST['auth']) ? $_POST['auth'] : null;
		$pub = isset($_POST['pub']) ? $_POST['pub'] : null;
		$pubinfo = isset($_POST['pubinfo']) ? $_POST['pubinfo'] : null;
		$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
		$site = isset($_POST['site']) ? $_POST['site'] : null;
		$cat = isset($_POST['cat']) ? $_POST['cat'] : null;
	}
	
	$antiSpam = getAntiSpamQuestion();
	$html = '<div class="new_quote">
		<div class="disclaimer">
			Que proposez vous pour 2012 ?
		</div>
		<form method="POST" class="FV_quote">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<div class="textareaquote">
				<textarea class="FV_required FV_length" name="quote" placeholder="Votre proposition" maxsize="'.$app['params']['size']['quote'].'">'.$quote.'</textarea>
			</div>
			<div class="important_data">
				<label class="block">Explications :</label>
				<textarea class="FV_length expandable labeled" name="expl" placeholder="Développez votre idée ici..." maxsize="'.$app['params']['size']['explanation'].'">'.$expl.'</textarea>
				<label class="block">Sujet de la proposition : </label>
				<select class="labeled" name="cat">
				<option></option>';
					if($categories != null){
						foreach($categories as $key => $value){
							if($value['id'] == $cat){$html .= '<option value="'.$value['id'].'" selected="selected">'.$value['name'].'</option>';}
							else{$html .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';}
						}
					}
				$html .= '</select>
				<a href="#"><img class="create_category" src="'.$rel_to_root.'themes/main/img/forms/new_category.png" title="Créer un nouveau sujet" /></a>
				<label class="block">Votre nom :</label>
				<input class="FV_length labeled" type="text" name="pub" placeholder="Auteur" value="'.$pub.'" maxsize="'.$app['params']['size']['publisher'].'" /><br/>
				<label class="block">Votre adresse mail (ne sera jamais communiquée) :</label>
				<input class="FV_length FV_mail labeled" type="text" name="mail" placeholder="Mail" value="'.$mail.'" maxsize="'.$app['params']['size']['mail'].'" /><br/>
				<label class="block">Votre site web :</label>
				<input class="FV_length labeled" type="text" name="site" placeholder="Site web" value="'.$site.'" maxsize="'.$app['params']['size']['site'].'" /><br/>
			</div>
			<div class="show_more_datas">Données complémentaires</div>
			<div class="more_datas">
				<label class="block">Contexte de la proposition :</label>
				<textarea class="FV_length labeled" name="ctx" placeholder="Dans quel contexte avez vous pensé à cette proposition ?" maxsize="'.$app['params']['size']['context'].'">'.$ctx.'</textarea>
				<label class="block">Source de cette proposition :</label>
				<input class="FV_length labeled" type="text" name="src" placeholder="Source" value="'.$src.'" maxsize="'.$app['params']['size']['source'].'" style="width: 400px;" /><br/>
				<label class="block">Personne à l\'origine de cette proposition :</label>
				<input class="FV_length labeled" type="text" name="auth" placeholder="Auteur initial" value="'.$auth.'" maxsize="'.$app['params']['size']['author'].'" /><br/>
				<label class="block">Quelques informations à propos vous :</label>
				<textarea class="FV_length labeled" name="pubinfo" placeholder="D\'autres informations pertinentes sur vous ?" maxsize="'.$app['params']['size']['publisher_info'].'">'.$pubinfo.'</textarea>
			</div>
			<div class="suivi">
				<input type="checkbox" name="suivi" id="suivi" /><label for="suivi">Recevoir une notification de réponse aux commentaires par email</label>
			</div>
			<div class="antiSpam">
				<span style="font-weight: bold;">Anti-spam :</span> '.$antiSpam['ask'].' <input class="FV_required" type="text" name="antiSpamRep" placeholder="Anti-Spam" />
			</div>
			<div style="text-align: center;"><input type="submit" value="Envoyer" /></div>
		</form>
	</div>';
	return $html;
}

?>