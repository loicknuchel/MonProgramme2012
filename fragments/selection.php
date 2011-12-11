<?php
function generateSelectionList($selections){
	$html = '<div class="selection_list">';
	foreach($selections as $key => $selection){
		$html .= '<p>La sélection "'.$selection['name'].'" a été postée le '.$selection['post_date'].' (<a href="list.php?type=selection&sel='.$selection['id'].'">voir</a>)</p>';
	}
	$html .= '</div>';
	return $html;
}
?>