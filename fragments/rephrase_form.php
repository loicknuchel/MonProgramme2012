<?php
/*
SELECT q.`post_date`, q.`publisher`, q.`site`, q.`content` AS quote, e.`content` AS expl
		FROM cq1_4_history q
			LEFT OUTER JOIN cq1_4_history e ON q.service_id=e.service_id AND q.elt_type=e.elt_type AND q.elt_id=e.elt_id AND q.post_date=e.post_date
		WHERE q.`service_id`=1 AND q.`elt_type`=2 AND q.elt_id=24 AND q.`elt_field`=20 AND e.`elt_field`=21
		*/

function sendRephraseForm($usr, $rel_to_root = './'){
	if(isset($_POST['quoteid']) && isset($_POST['quote']) && isset($_POST['expl'])){
		if(checkAntiSpamAnswer(isset($_POST['antiSpam']) ? $_POST['antiSpam'] : null, isset($_POST['antiSpamRep']) ? $_POST['antiSpamRep'] : null)){
			$result = api_call('POST', $usr['api_url'].'quote.php', array(
				'key'=>$usr['key'],
				'quoteid'=>isset($_POST['quoteid']) ? $_POST['quoteid'] : null,
				'quote'=>isset($_POST['quote']) ? $_POST['quote'] : null,
				'expl'=>isset($_POST['expl']) ? $_POST['expl'] : null,
				'pub'=>isset($_POST['pseudo']) ? $_POST['pseudo'] : null,
				'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
				'site'=>isset($_POST['site']) ? $_POST['site'] : null
			));
			
			if(isset($_POST['suivi']) && $_POST['suivi'] == true){
				api_call('POST', $usr['api_url'].'suivi.php', array(
					'key'=>$usr['key'],
					'type'=>'quote',
					'id'=>isset($_POST['quoteid']) ? $_POST['quoteid'] : null,
					'mail'=>isset($_POST['mail']) ? $_POST['mail'] : null,
					'action'=>'follow',
					'name'=>isset($_POST['pseudo']) ? $_POST['pseudo'] : null
				), false);
			}
			
			
			if($result['status']['code'] == 200){
				$id = isset($_POST['quoteid']) ? $_POST['quoteid'] : null;
				header('Location: quote.php?id='.$id);
				exit;
			}
			
			return $result;
		}
		else{
			return 500;
		}
	}
	return null;
}

function generateRephraseForm($usr, $postResult, $result, $rel_to_root = './'){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']));
	$app = null;
	$app['params']['size']['quote'] = isset($app_params['response']['textMaxSize']['quote']) ? $app_params['response']['textMaxSize']['quote'] : null;
	$app['params']['size']['explanation'] = isset($app_params['response']['textMaxSize']['explanation']) ? $app_params['response']['textMaxSize']['explanation'] : null;
	$app['params']['size']['publisher'] = isset($app_params['response']['textMaxSize']['publisher']) ? $app_params['response']['textMaxSize']['publisher'] : null;
	$app['params']['size']['mail'] = isset($app_params['response']['textMaxSize']['mail']) ? $app_params['response']['textMaxSize']['mail'] : null;
	$app['params']['size']['site'] = isset($app_params['response']['textMaxSize']['site']) ? $app_params['response']['textMaxSize']['site'] : null;
	
	$quoteHistorique = ''; $explHistorique = '';
	foreach($result['rephrase'] as $key => $value){
		$publisher = isset($value['publisher']) && $value['publisher'] != '' ? 
						(isset($value['site']) && $value['site'] != '' ? 'par <a target="_blanck" href="'.$value['site'].'">'.$value['publisher'].'</a>' : 'par '.$value['publisher']) : '';
		//$publisher = $value['publisher'].' / '.$value['site'];
		$quoteHistorique = '<tr><td><span>le '.$value['post_date'].'</span><br/>'.$publisher.'</td><td><pre>'.$value['quote'].'</pre></td></tr>'.$quoteHistorique;
		$explHistorique = '<tr><td><span>le '.$value['post_date'].'</span><br/>'.$publisher.'</td><td><pre>'.$value['explanation'].'</pre></td></tr>'.$explHistorique;
	}
	$quoteHistorique = '<table>'.$quoteHistorique.'</table>';
	$explHistorique = '<table>'.$explHistorique.'</table>';
	
	$captchaError = '';
	if(isset($postResult) && $postResult == 500){$captchaError = '<div style="border: #C00 1px solid; background: #FEE; padding: 10px;">Erreur dans la captcha antispam !!</div><br/>';}
	$quote = isset($_POST['quote']) ? $_POST['quote'] : $result['quote'];
	$expl = isset($_POST['expl']) ? $_POST['expl'] : $result['explanation'];
	$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
	$mail = isset($_POST['mail']) ? $_POST['mail'] : null;
	$site = isset($_POST['site']) ? $_POST['site'] : null;
	
	$antiSpam = getAntiSpamQuestion();
	$html = '<div class="rephrase_quote">
		<div class="disclaimer">
			
		</div>
		<form method="POST" class="FV_rephrase">
			'.$captchaError.'
			<input type="hidden" name="antiSpam" value="'.$antiSpam['id'].'" />
			<input type="hidden" name="quoteid" value="'.$result['id'].'" />
			
			<div class="historique">
				<h1>Historique de la proposition #'.$result['id'].' :</h1>
				'.$quoteHistorique.'
				<textarea class="FV_required FV_length small" name="quote" placeholder="Reformulez la proposition ici" maxsize="'.$app['params']['size']['quote'].'">'.$quote.'</textarea>
			</div>
			<div class="historique">
				<h1>Historique des explications :</h1>
				'.$explHistorique.'
				<textarea class="FV_length expandable large" name="expl" placeholder="Reformulez l\'explication de la proposition ici" maxsize="'.$app['params']['size']['explanation'].'">'.$expl.'</textarea>
			</div>
			
			<input class="FV_required FV_length" type="text" name="pseudo" placeholder="Pseudo" value="'.$pseudo.'" maxsize="'.$app['params']['size']['publisher'].'" /><br/>
			<input class="FV_required FV_mail FV_length" type="text" name="mail" placeholder="Mail" value="'.$mail.'" maxsize="'.$app['params']['size']['mail'].'" /><br/>
			<input class="FV_length" type="text" name="site" placeholder="Site web" value="'.$site.'" maxsize="'.$app['params']['size']['site'].'" /><br/>
			
			<div class="suivi">
				<input type="checkbox" name="suivi" id="suivi" /><label for="suivi">Recevoir par email une notification pour les mises à jour de cette proposition</label>
			</div>
			<div class="antiSpam">
				<span style="font-weight: bold;">Anti-spam :</span> '.$antiSpam['ask'].' <input class="FV_required" type="text" name="antiSpamRep" placeholder="Anti-Spam" />
			</div>
			<br/>
			<a href="'.$rel_to_root.'quote.php?id='.$result['id'].'" class="button" style="float: left;"> <= Retour à la proposition</a> <div style="text-align: center;"><input type="submit" value="Reformuler la proposition !" /></div>
			<div class="clear"></div>
		</form>
	</div>';
	
	return $html;
}

?>