<?php
function generateSelectionBlock($selections){
	$html = '
	<div class="selection_list">';
	if(isset($selections) && $selections != null){
		foreach($selections as $key => $selection){
			$html .= '<p>La sélection "'.$selection['name'].'" a été postée le '.$selection['post_date'].' (<a href="list.php?type=selection&sel='.$selection['id'].'">voir</a>)</p>';
		}
	}
	else{
		$html .= '
		<p>
			Aucune sélection enregistée.
		</p>';
	}
	$html .= '
		<p>
			Utilisez le "&#9734; sélectionner" dans les propositions pour créer votre propre sélection.
		</p>
	</div>';
	return $html;
}
?>