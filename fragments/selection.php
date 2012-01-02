<?php
function generateSelectionBlock($selections){
	$html = '
	<div class="selection_list">';
	if(isset($selections) && $selections != null){
		$html .= '<p>Programmes publiés :<br/><br/>';
		$first = true;
		foreach($selections as $key => $selection){
			if($first == true){$first = false;} else{$html .= ', ';}
			$html .= '<a href="list.php?type=selection&sel='.$selection['id'].'">'.$selection['name'].'</a> ('.$selection['nbquotes'].' propositions)';
		}
		$html .= '</p>';
	}
	else{
		$html .= '
		<p>
			Aucun programme enregisté.
		</p>';
	}
	$html .= '<br/>
		<p>
			Utilisez le "&#9734; Ajouter au programme" des propositions pour créer votre propre programme !
		</p>
	</div>';
	return $html;
}
?>