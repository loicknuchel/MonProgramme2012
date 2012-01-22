<?php

function sendCommentForm($usr){
	if(isset($_POST['comment']) && isset($_POST['type']) && isset($_POST['id']) && isset($_POST['antiSpam']) && isset($_POST['antiSpamRep'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			
			$result = api_call('POST', $usr['api_url'].'comment.php', array(
				'key'=>$usr['key'],
				'type'=>isset($_POST['type']) ? $_POST['type'] : null,
				'id'=>isset($_POST['id']) ? $_POST['id'] : null,
				'comment'=>isset($_POST['comment']) ? $_POST['comment'] : null,
				'pub'=>isset($_POST['pseudo']) ? $_POST['pseudo'] : null,
				'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
				'site'=>isset($_POST['site']) ? $_POST['site'] : null,
				'avis'=>isset($_POST['avis']) ? $_POST['avis'] : null
			));
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				api_call('POST', $usr['api_url'].'suivi.php', array(
					'key'=>$usr['key'],
					'type'=>isset($_POST['type']) ? $_POST['type'] : null,
					'id'=>isset($_POST['id']) ? $_POST['id'] : null,
					'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
					'action'=>'follow',
					'name'=>isset($_POST['pseudo']) ? $_POST['pseudo'] : null
				), false);
			}
			
			// si on donne son avis sur une proposition dans un commentaire (pour ou contre), on vote alors pour cette proposition
			if(isset($_POST['avis']) && ($_POST['avis'] == 'pour' || $_POST['avis'] == 'contre') && isset($_POST['type']) && $_POST['type'] == 'quote'){
				api_call('POST', $usr['api_url'].'quote.php', array(
					'key'=>$usr['key'],
					'quoteid'=>isset($_POST['id']) ? $_POST['id'] : null,
					'vote'=> ($_POST['avis'] == 'contre') ? 'down' : 'up'
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

function generateCommentForm($usr, $postResult, $actionPage, $anchor, $type, $id, $rel_to_root = './'){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']), false);
	$app = null;
	$app['params']['size']['comment'] = isset($app_params['response']['textMaxSize']['comment']) ? $app_params['response']['textMaxSize']['comment'] : null;
	$app['params']['size']['publisher'] = isset($app_params['response']['textMaxSize']['publisher']) ? $app_params['response']['textMaxSize']['publisher'] : null;
	$app['params']['size']['mail'] = isset($app_params['response']['textMaxSize']['mail']) ? $app_params['response']['textMaxSize']['mail'] : null;
	$app['params']['size']['site'] = isset($app_params['response']['textMaxSize']['site']) ? $app_params['response']['textMaxSize']['site'] : null;
	
	$captchaError = '';
	if(isset($postResult) && $postResult['status']['code'] == 200){
		$pseudo = null;$mail = null;$site = null;$comment = null;$avis = null;
	}
	else{
		if(isset($postResult) && $postResult == 500){$captchaError = '<div style="border: #C00 1px solid; background: #FEE; padding: 10px;">Erreur dans la captcha antispam !!</div><br/>';}
		$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
		$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
		$site = isset($_POST['site']) ? $_POST['site'] : null;
		$comment = isset($_POST['comment']) ? $_POST['comment'] : null;
		$avis = isset($_POST['avis']) ? $_POST['avis'] : null;
	}
	
	$antiSpam = getAntiSpamQuestion();
	$html = '<div class="leave_comment" id="leave_comment">
		<form method="POST" action="'.$actionPage.$anchor.'" class="FV_comment">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<input type="hidden" name="type" value="'.$type.'" />
			<input type="hidden" name="id" value="'.$id.'" />
			<div class="meta_info">
				<label class="placeholder_fb">Pseudo * :</label><input class="FV_required FV_length" type="text" name="pseudo" placeholder="Pseudo" value="'.$pseudo.'" maxsize="'.$app['params']['size']['publisher'].'" /><br/>
				<label class="placeholder_fb">Mail :</label><input class="FV_mail FV_length" type="text" name="mail" placeholder="Mail" value="'.$mail.'" maxsize="'.$app['params']['size']['mail'].'" /><br/>
				<label class="placeholder_fb">Site web :</label><input class="FV_length" type="text" name="site" placeholder="Site web" value="'.$site.'" maxsize="'.$app['params']['size']['site'].'" /><br/>
			</div>
			<div class="no_meta_info">
				<div class="datas">
					Commenter en tant que : <span class="pseudo"></span><br/>
					<span class="mail"></span> <span class="site"></span>
				</div>
				<div class="modify">
					<a href="#">Modifier</a>
				</div>
				<div class="clear"></div>
			</div>
			<label class="placeholder_fb">Votre réaction * :</label>
			<textarea class="FV_required FV_length expandable" name="comment" placeholder="Votre réaction" maxsize="'.$app['params']['size']['comment'].'">'.$comment.'</textarea>
			<div class="switch">
				<input type="radio" id="avis_sans" name="avis" value=""'; if($avis != 2 && $avis != 3){$html .= ' checked';} $html .= ' />
				<label for="avis_sans"'; if($avis != 2 && $avis != 3){$html .= ' class="selected"';} $html .= '>Mitigé</label>
				<input type="radio" id="avis_pour" name="avis" value="pour"'; if($avis == 2){$html .= ' checked';} $html .= ' />
				<label for="avis_pour" class="hovergreen'; if($avis == 2){$html .= ' selected';} $html .= '">Pour</label>
				<input type="radio" id="avis_contre" name="avis" value="contre"'; if($avis == 3){$html .= ' checked';} $html .= ' />
				<label for="avis_contre" class="hoverred'; if($avis == 3){$html .= ' selected';} $html .= '">Contre</label>
				<div class="clear"></div>
			</div>
			<div class="suivi">
				<input type="checkbox" name="suivi" id="suivi" /><label for="suivi">Recevoir une notification de réponse aux commentaires par email</label>
			</div>
			<div class="antiSpam">
				<span style="font-weight: bold;">Anti-spam :</span> '.$antiSpam['ask'].' <input class="FV_required" type="text" name="antiSpamRep" placeholder="Anti-Spam" />
			</div>
			<div style="text-align: center;"><input type="submit" value="Réagir !"/></div>
			<div class="clearfix"></div>
		</form>
	</div>';
	return $html;
}

?>