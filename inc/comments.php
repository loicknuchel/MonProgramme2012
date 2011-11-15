<?php

function generateCommentsBlock($comments, $rel_to_root = './'){
	$html = '<div class="comments" id="comment_block">';
		foreach($comments as $key => $comment){
			$html .=  generateComment($comment, $rel_to_root);
		}
	$html .= '</div>';
	return $html;
}

function generateComment($comment, $rel_to_root = './'){
	if(isset($comment['site']) && $comment['site'] != ''){$pseudo = '<a href="'.$comment['site'].'" target="_blanck">'.$comment['publisher'].'</a>';}
	else{$pseudo = $comment['publisher'];}
	
	$vote = $comment['up'] - $comment['down'];
	
	if($comment['reported'] == 1){ $text = '<script>document.write(s_comment.deleted);</script>'; }
	else{ 
		$text = nl2br(UrlToShortLink($comment['comment']));
		$text = str_replace('[quote]', '<div class="quoted_comment">', $text, $cptStart);
		$text = str_replace('[/quote]', '</div>', $text, $cptEnd);
		if($cptStart != $cptEnd){$text = str_replace('[/quote]', '', str_replace('[quote]', '', nl2br($comment['comment'])));}
	}
	
	$html = '<div class="comment" id="comment_'.$comment['id'].'">
		<div class="comment_header">
			<span class="comment_no">'.$comment['id'].'</span><span class="comment_pseudo">'.$pseudo.'</span><span class="comment_date">, le '.$comment['post_date'].' :</span>';
		if($comment['reported'] != 1){
			$html .= '
			<div class="comment_vote">
				<a href="#" title="commentaire pertinent"><div class="thumb_up"></div></a>
				<a href="#" title="commentaire sans intérêt"><div class="thumb_down"></div></a>
				<span class="val">(<span>'.$vote.'</span>)</span>
			</div>
			<div class="reponse">
				<a href="#" title="répondre à ce commentaire"><img src="'.$rel_to_root.'img/comments/citer.gif" /></a>
			</div>
			<div class="clear"></div>
			<div class="comment_report"><a href="#" title="signaler ce commentaire"><img src="'.$rel_to_root.'img/comments/report.png" /></a></div>';
		}
		$html .= '</div>
		<div class="comment_text">'.$text.'</div>
	</div>';
	return $html;
}
/*
function generateCommentPages($commentDatas){
	if($commentDatas['total_comment_pages'] > 1){
		$html = '<div class="comment_pages">';
		
		if($commentDatas['current_comment_page'] != 1){
			$html .= '<span class="page"><a href="#"><<</a></span> ';
		}
		
		for($i=1; $i<=$commentDatas['total_comment_pages']; $i++){
			if($i == $commentDatas['current_comment_page']){
				$html .= '<span class="cur_page">'.$i.'</span> ';
			}
			else{
				$html .= '<span class="page"><a href="#">'.$i.'</a></span> ';
			}
		}
		
		if($commentDatas['current_comment_page'] != $commentDatas['total_comment_pages']){
			$html .= '<span class="page"><a href="#">>></a></span> ';
		}
		
		$html .= '</div>';
		
		return $html;
	}
	else{
		return '';
	}
}*/

function generateCommentPager($nbPages, $current, $baseUrl){
	$widthPager = 4;
	
	$html = '<div class="comment_pager">';
	// previous
	if($current == 1){$html .= '<span>< Précédent</span> | ';}
	else{$prev = $current-1; $html .= '<a href="'.$baseUrl.''.$prev.'#comment_block">< Précédent</a> | ';}
	
	// first
	if($current - $widthPager - 1 == 1){
		$html .= '<a href="'.$baseUrl.'1#comment_block">1</a> | ';
	}
	else if($current - $widthPager > 1){
		$html .= '<a href="'.$baseUrl.'1#comment_block">1</a> | ... | ';
	}
	
	// middle
	for($i=$current-$widthPager; $i<=$current+$widthPager; $i++){
		if($i == $current){
			$html .= '<strong class="med">'.$i.'</strong> | ';
		}
		else if($i > 0 && $i <= $nbPages){
			$html .= '<a href="'.$baseUrl.''.$i.'#comment_block">'.$i.'</a> | ';
		}
	}
	
	// last
	if($current + $widthPager + 1 == $nbPages){
		$html .= '<a href="'.$baseUrl.''.$nbPages.'#comment_block">'.$nbPages.'</a> | ';
	}
	else if($current + $widthPager < $nbPages){
		$html .= '... | <a href="'.$baseUrl.''.$nbPages.'#comment_block">'.$nbPages.'</a> | ';
	}
	
	// next
	if($current == $nbPages){$html .= '<span>Suivant ></span>';}
	else{$next = $current+1; $html .= '<a href="'.$baseUrl.''.$next.'#comment_block">Suivant ></a>';}
	
	$html .= '</div>';
	return $html;
}

?>