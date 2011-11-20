<?php

function sendCommentForm(&$usr, $server_path){
	if(isset($_POST['comment'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			$comment_params = null;
			$comment_params['type'] = isset($_POST['type']) ? $_POST['type'] : null;
			$comment_params['id'] = isset($_POST['id']) ? $_POST['id'] : null;
			$comment_params['pub'] = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
			$comment_params['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
			$comment_params['site'] = isset($_POST['site']) ? $_POST['site'] : null;
			$comment_params['comment'] = isset($_POST['comment']) ? $_POST['comment'] : null;
			$comment_params['noheaders'] = 1;
			
			$commentJson = apiNewComment($usr, $comment_params, $server_path);
			$json = json_decode($commentJson, true);
			
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				$suivi_params = null;
				$suivi_params['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
				$suivi_params['type'] = isset($_POST['type']) ? $_POST['type'] : null;
				$suivi_params['id'] = isset($_POST['id']) ? $_POST['id'] : null;
				$suivi_params['action'] = 'follow';
				$suivi_params['noheaders'] = 1;
				apiUpdateSuivi($usr, $suivi_params, $server_path);
			}
			
			return $json;
		}
		else{
			return 500;
		}
	}
	return null;
}

function generateCommentForm($usr, $server_path, $postResult, $actionPage, $type, $id){
	$params = null;
	$params['noheaders'] = 1;
	$params_json = apiGetParams($usr, $params, $server_path);
	$app_params = json_decode($params_json, true);
	$app = null;
	$app['params']['size']['comment'] = isset($app_params['response']['textMaxSize']['comment']) ? $app_params['response']['textMaxSize']['comment'] : null;
	$app['params']['size']['publisher'] = isset($app_params['response']['textMaxSize']['publisher']) ? $app_params['response']['textMaxSize']['publisher'] : null;
	$app['params']['size']['mail'] = isset($app_params['response']['textMaxSize']['mail']) ? $app_params['response']['textMaxSize']['mail'] : null;
	$app['params']['size']['site'] = isset($app_params['response']['textMaxSize']['site']) ? $app_params['response']['textMaxSize']['site'] : null;
	
	$captchaError = '';
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$pseudo = null;$mail = null;$site = null;$comment = null;
	}
	else{
		if(isset($postResult) && $postResult == 500){$captchaError = '<div style="border: #C00 1px solid; background: #FEE; padding: 10px;">Erreur dans la captcha antispam !!</div><br/>';}
		$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
		$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
		$site = isset($_POST['site']) ? $_POST['site'] : null;
		$comment = isset($_POST['comment']) ? $_POST['comment'] : null;
	}
	
	$antiSpam = getAntiSpamQuestion();
	$html = '<div class="leave_comment" id="leave_comment">
		<form method="POST" action="'.$actionPage.'#comment_block" class="FV_comment">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<input type="hidden" name="type" value="'.$type.'" />
			<input type="hidden" name="id" value="'.$id.'" />
			<input class="FV_required FV_length" type="text" name="pseudo" placeholder="Pseudo" value="'.$pseudo.'" maxsize="'.$app['params']['size']['publisher'].'" /><br/>
			<input class="FV_mail FV_length" type="text" name="mail" placeholder="Mail" value="'.$mail.'" maxsize="'.$app['params']['size']['mail'].'" /><br/>
			<input class="FV_length" type="text" name="site" placeholder="Site web" value="'.$site.'" maxsize="'.$app['params']['size']['site'].'" /><br/>
			<textarea class="FV_required FV_length" name="comment" placeholder="Votre réaction" maxsize="'.$app['params']['size']['comment'].'">'.$comment.'</textarea><br/>
			<input type="checkbox" name="suivi" id="suivi" /><label for="suivi">Recevoir une notification de réponse aux commentaires par email</label><br/>
			<span style="font-weight: bold;">Anti-spam :</span> '.$antiSpam['ask'].' <input class="FV_required" name="antiSpamRep" placeholder="Anti-Spam" /><br/><br/>
			<div style="text-align: center;"><input type="submit" value="Réagir !"/></div>
			<div class="clearfix"></div>
		</form>
	</div>';
	return $html;
}

function sendQuoteForm(&$usr, $server_path){
	if(isset($_POST['quote'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			$quote_params['quote'] = isset($_POST['quote']) ? $_POST['quote'] : null;
			$quote_params['src'] = isset($_POST['src']) ? $_POST['src'] : null;
			$quote_params['ctx'] = isset($_POST['ctx']) ? $_POST['ctx'] : null;
			$quote_params['expl'] = isset($_POST['expl']) ? $_POST['expl'] : null;
			$quote_params['auth'] = isset($_POST['auth']) ? $_POST['auth'] : null;
			$quote_params['pub'] = isset($_POST['pub']) ? $_POST['pub'] : null;
			$quote_params['pubinfo'] = isset($_POST['pubinfo']) ? $_POST['pubinfo'] : null;
			$quote_params['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
			$quote_params['site'] = isset($_POST['site']) ? $_POST['site'] : null;
			$quote_params['cat'] = isset($_POST['cat']) ? $_POST['cat'] : null;
			$quote_params['noheaders'] = 1;
			
			$quoteJson = apiNewQuote($usr, $quote_params, $server_path);
			$json = json_decode($quoteJson, true);
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				$suivi_params = null;
				$suivi_params['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
				$suivi_params['quoteid'] = isset($json['response']['id']) ? $json['response']['id'] : null;
				$suivi_params['newcomments'] = 1;
				$suivi_params['noheaders'] = 1;
				apiUpdateSuivi($usr, $suivi_params, $server_path);
			}
			
			return $json;
		}
		else{
			return 500;
		}
	}
	return null;
}

function generateQuoteForm($usr, $server_path, $postResult, $categories, $rel_to_root = './'){
	$params = null;
	$params['noheaders'] = 1;
	$params_json = apiGetParams($usr, $params, $server_path);
	$app_params = json_decode($params_json, true);
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
			Partagez vos propositions pour la campagne presidentielle 2012 :
		</div>
		<form method="POST" class="FV_quote">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<div class="textareaquote">
				<textarea class="FV_required FV_length" name="quote" placeholder="Votre proposition" maxsize="'.$app['params']['size']['quote'].'">'.$quote.'</textarea>
			</div>
			<div class="important_data">
				<p>Explications :</p>
				<textarea class="FV_length" name="expl" placeholder="Développez votre idée ici..." maxsize="'.$app['params']['size']['explanation'].'">'.$expl.'</textarea><br/>
				<br/>
				<p>Sujet de la proposition : </p><select name="cat">
				<option></option>';
					if($categories != null){
						foreach($categories as $key => $value){
							if($value['id'] == $cat){$html .= '<option value="'.$value['id'].'" selected="selected">'.$value['name'].'</option>';}
							else{$html .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';}
						}
					}
				$html .= '</select>
				<a href="#"><img class="create_category" src="'.$rel_to_root.'themes/main/img/forms/new_category.png" title="Créer un nouveau sujet" /></a>
			</div>
			<br/>
			<div class="show_facultative_data"><a href="#"><script>document.write(s_form.new_quote.show_facultative_fields);</script></a></div>
			<div class="facultative_data">
				<p>Contexte de la proposition :</p>
				<textarea class="FV_length" name="ctx" placeholder="Décrivez ici dans quel contexte vous est venue cette proposition" maxsize="'.$app['params']['size']['context'].'">'.$ctx.'</textarea><br/>
				<p>Si cette proposition est inspirée d\'une source, vous pouvez la mettre ici :</p>
				<input class="FV_length" type="text" name="src" placeholder="Source" value="'.$src.'" maxsize="'.$app['params']['size']['source'].'" style="width: 400px;" /><br/>
				<p>Si la proposition n\'est pas de vous, vous pouvez mettre ici son auteur initial :</p>
				<input class="FV_length" type="text" name="auth" placeholder="Auteur initial" value="'.$auth.'" maxsize="'.$app['params']['size']['author'].'" /><br/>
				<p>Votre nom (ou pseudo) :</p>
				<input class="FV_length" type="text" name="pub" placeholder="Auteur" value="'.$pub.'" maxsize="'.$app['params']['size']['publisher'].'" /><br/>
				<p>Quelques informations sur vous (si elles sont pertinentes pour la proposition) :</p>
				<textarea class="FV_length" name="pubinfo" placeholder="Informations pertinentes sur vous..." maxsize="'.$app['params']['size']['publisher_info'].'">'.$pubinfo.'</textarea><br/>
				<p>Votre adresse mail (elle ne sera communiquée sous aucun prétexte mais pourra servir à prouver que vous êtes bien l\'auteur de la proposition et à regrouper toutes vos propositions) :</p>
				<input class="FV_length FV_mail" type="text" name="mail" placeholder="Mail" value="'.$mail.'" maxsize="'.$app['params']['size']['mail'].'" /><br/>
				<p>Votre site web (ou un site web que vous appréciez) :</p>
				<input class="FV_length" type="text" name="site" placeholder="Site web" value="'.$site.'" maxsize="'.$app['params']['size']['site'].'" /><br/>
			</div>
			<input type="checkbox" name="suivi" id="suivi" /><label for="suivi">Recevoir une notification de commentaires par email</label><br/>
			<span style="font-weight: bold;">Anti-spam :</span> '.$antiSpam['ask'].' <input class="FV_required" name="antiSpamRep" placeholder="Anti-Spam" /><br/><br/>
			<div style="text-align: center;"><input type="submit" value="Envoyer" /></div>
		</form>
	</div>';
	return $html;
}

function generateSelectionForm($usr, $server_path, $postResult){
	$params = null;
	$params['noheaders'] = 1;
	$params_json = apiGetParams($usr, $params, $server_path);
	$app_params = json_decode($params_json, true);
	$app = null;
	$app['params']['size']['selection'] = isset($app_params['response']['textMaxSize']['selection']) ? $app_params['response']['textMaxSize']['selection'] : null;
	
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$name = null;
	}
	else{
		$name = isset($_POST['name']) ? $_POST['name'] : null;
	}
	
	$html = '<div class="new_selection">
		<a href="#">Enregistrer dans une sélection</a>
		<form method="POST">
			<input class="FV_length" type="text" name="name" placeholder="Nom de la sélection" value="'.$name.'" maxsize="'.$app['params']['size']['selection'].'" /></span>
			<button type="submit" class="send">Enregistrer</button>
			<button type="submit" class="cancel">Annuler</button>
		</form>
	</div>';
	
	return $html;
}

function generateNewCategoryForm($usr, $server_path, $postResult){

}

?>