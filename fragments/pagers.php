<?php

function generateQuotePager($nbPages, $curPage, $baseUrl){
	return generatePager('quote_pager blue_pager', 4, $nbPages, $curPage, $baseUrl);
}

function generateCommentPager($nbPages, $curPage, $baseUrl, $anchor){
	return generatePager('comment_pager blue_pager', 4, $nbPages, $curPage, $baseUrl, $anchor);
}

function generatePetitionPager($nbPages, $curPage, $baseUrl, $anchor){
	return generatePager('petition_pager blue_pager', 4, $nbPages, $curPage, $baseUrl, $anchor);
}

function generateSelectionPager($nbPages, $curPage, $baseUrl){
	return generatePager('selection_pager red_pager', 4, $nbPages, $curPage, $baseUrl);
}


// private
function generatePager($pagerClass, $pagerWidth, $nbPages, $curPage, $baseUrl, $anchor = ''){
	if($curPage > $nbPages){$curPage = $nbPages;}
	
	$html = '<div class="'.$pagerClass.'">';
	// previous
	if($curPage == 1){$html .= '<span class="prev disabled"></span> <b></b> ';}
	else{$prev = $curPage-1; $html .= '<a class="prev" href="'.$baseUrl.$prev.$anchor.'"></a> <b></b> ';}
	
	// first
	if($curPage - $pagerWidth - 1 == 1){ $html .= '<a href="'.$baseUrl.'1'.$anchor.'">1</a> <b></b> '; }
	else if($curPage - $pagerWidth > 1){ $html .= '<a href="'.$baseUrl.'1'.$anchor.'">1</a> <b></b> <span class="cutted"></span> <b></b> '; }
	
	// middle
	for($i=$curPage-$pagerWidth; $i<=$curPage+$pagerWidth; $i++){
		if($i == $curPage){ $html .= '<span class="cur">'.$i.'</span> <b></b> '; }
		else if($i > 0 && $i <= $nbPages){ $html .= '<a href="'.$baseUrl.$i.$anchor.'">'.$i.'</a> <b></b> '; }
	}
	
	// last
	if($curPage + $pagerWidth + 1 == $nbPages){ $html .= '<a href="'.$baseUrl.$nbPages.$anchor.'">'.$nbPages.'</a> <b></b> '; }
	else if($curPage + $pagerWidth < $nbPages){ $html .= '<span class="cutted"></span> <b></b> <a href="'.$baseUrl.$nbPages.$anchor.'">'.$nbPages.'</a> <b></b> '; }
	
	// next
	if($curPage == $nbPages){$html .= '<span class="next disabled"></span>';}
	else{$next = $curPage+1; $html .= '<a class="next" href="'.$baseUrl.$next.$anchor.'"></a>';}
	
	$html .= '</div>';
	return $html;
}


?>