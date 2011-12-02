<?php
function generateSelectionList($selections){
	$html = '<div class="selection_list">';
	foreach($selections as $key => $selection){
		$html .= '<p>La sélection "'.$selection['name'].'" a été postée le '.$selection['post_date'].' (<a href="selection?sel='.$selection['id'].'">voir</a>)</p>';
	}
	$html .= '</div>';
	return $html;
}

function generateSelectionPager($nbPages, $current, $baseUrl){
	$widthPager = 4;
	
	$html = '<div class="selection_pager">';
	// previous
	if($current == 1){$html .= '<span>< Précédent</span> | ';}
	else{$prev = $current-1; $html .= '<a href="'.$baseUrl.''.$prev.'">< Précédent</a> | ';}
	
	// first
	if($current - $widthPager - 1 == 1){
		$html .= '<a href="'.$baseUrl.'1">1</a> | ';
	}
	else if($current - $widthPager > 1){
		$html .= '<a href="'.$baseUrl.'1">1</a> | ... | ';
	}
	
	// middle
	for($i=$current-$widthPager; $i<=$current+$widthPager; $i++){
		if($i == $current){
			$html .= '<strong class="med">'.$i.'</strong> | ';
		}
		else if($i > 0 && $i <= $nbPages){
			$html .= '<a href="'.$baseUrl.''.$i.'">'.$i.'</a> | ';
		}
	}
	
	// last
	if($current + $widthPager + 1 == $nbPages){
		$html .= '<a href="'.$baseUrl.''.$nbPages.'">'.$nbPages.'</a> | ';
	}
	else if($current + $widthPager < $nbPages){
		$html .= '... | <a href="'.$baseUrl.''.$nbPages.'">'.$nbPages.'</a> | ';
	}
	
	// next
	if($current == $nbPages){$html .= '<span>Suivant ></span>';}
	else{$next = $current+1; $html .= '<a href="'.$baseUrl.''.$next.'">Suivant ></a>';}
	
	$html .= '</div>';
	return $html;
}
?>