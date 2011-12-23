<?php

function generateSelectionForm($usr){
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']), false);
	$app = null;
	$app['params']['size']['selection'] = isset($app_params['response']['textMaxSize']['selection']) ? $app_params['response']['textMaxSize']['selection'] : null;
	
	$reponse = api_call('GET', $usr['api_url'].'selection.php', array('key'=>$usr['key']), false);
	$selections = isset($reponse['response']['selections']) ? $reponse['response']['selections'] : null;
	
	$name = isset($_POST['name']) ? $_POST['name'] : null;
	$html = '
	<table style="width: 600px; margin: 10px auto -20px;">
		<tr><td>
			<form method="POST" class="new_selection">
				<div class="show_more_datas">Créer sélection</div>
				<div class="more_datas">
					<input class="FV_length small" type="text" name="name" placeholder="Nom de la sélection" value="'.$name.'" maxsize="'.$app['params']['size']['selection'].'" /><br/>
					<input class="small" type="text" name="pass" placeholder="Créer mot de passe" /><br/>
					<input type="submit" class="send" value="Créer sélection" />
				</div>
			</form>
		</td><td>';
			if($selections != null){
				$html .= '
				<form method="POST" class="add_to_selection">
					<div class="show_more_datas">Ajouter à une sélection</div>
					<div class="more_datas">
						<select class="FV_required" name="sel" placeholder="Sélection">
							<option></option>'; 
								foreach($selections as $key => $value){
									$html .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
								}
							$html .= '
						</select><br/>
						<input class="FV_required small" type="text" name="pass" placeholder="Saisir mot de passe" /><br/>
						<input type="submit" class="send" value="Ajouter à cette sélection" />
					</div>
				</form>';
			}
		$html .= '
		</td></tr>
	</table>';
	return $html;
}

?>