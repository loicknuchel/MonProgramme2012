<?php

function generateCommentsBlock($comments, $rel_to_root = './'){
	$html = '<div class="comments" id="comment_block">';
		foreach($comments as $key => $comment){
			$html .= generateComment($comment, $rel_to_root);
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
	
	if($comment['avis'] == "pour"){$avis = ' <span class="label light '.$comment['avis'].'">'.$comment['avis'].'</span> ';}
	else if($comment['avis'] == "contre"){$avis = ' <span class="label light '.$comment['avis'].'">'.$comment['avis'].'</span> ';}
	else{$avis = ' <span class="label light neutre">Mitigé</span> ';}
	
	$html = '
	<div class="comment" id="comment_'.$comment['id'].'">
		<div class="comment_header">
			<span class="comment_no">'.$comment['id'].'</span>'.$avis.'<span class="comment_pseudo">'.$pseudo.'</span><span class="comment_date">, le '.$comment['post_date'].' :</span>';
		if($comment['reported'] != 1){
			$html .= '
			<div class="comment_vote">
				<span class="thumb_up" title="commentaire pertinent"></span>
				<span class="thumb_down" title="commentaire sans intérêt"></span>
				<span class="val">(<span>'.$vote.'</span>)</span>
			</div>
			<div class="reponse" title="répondre à ce commentaire"></div>
			<div class="clear"></div>
			<div class="comment_report" title="signaler ce commentaire"></div>';
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

function generateCommentPager($nbPages, $current, $baseUrl, $anchor){
	$widthPager = 4;
	
	$html = '<div class="comment_pager">';
	// previous
	if($current == 1){$html .= '<span>< Précédent</span> <b></b> ';}
	else{$prev = $current-1; $html .= '<a href="'.$baseUrl.''.$prev.$anchor.'">< Précédent</a> <b></b> ';}
	
	// first
	if($current - $widthPager - 1 == 1){
		$html .= '<a href="'.$baseUrl.'1'.$anchor.'">1</a> <b></b> ';
	}
	else if($current - $widthPager > 1){
		$html .= '<a href="'.$baseUrl.'1'.$anchor.'">1</a> <b></b> ... <b></b> ';
	}
	
	// middle
	for($i=$current-$widthPager; $i<=$current+$widthPager; $i++){
		if($i == $current){
			$html .= '<strong class="med">'.$i.'</strong> <b></b> ';
		}
		else if($i > 0 && $i <= $nbPages){
			$html .= '<a href="'.$baseUrl.''.$i.$anchor.'">'.$i.'</a> <b></b> ';
		}
	}
	
	// last
	if($current + $widthPager + 1 == $nbPages){
		$html .= '<a href="'.$baseUrl.''.$nbPages.$anchor.'">'.$nbPages.'</a> <b></b> ';
	}
	else if($current + $widthPager < $nbPages){
		$html .= '... <b></b> <a href="'.$baseUrl.''.$nbPages.$anchor.'">'.$nbPages.'</a> <b></b> ';
	}
	
	// next
	if($current == $nbPages){$html .= '<span>Suivant ></span>';}
	else{$next = $current+1; $html .= '<a href="'.$baseUrl.''.$next.$anchor.'">Suivant ></a>';}
	
	$html .= '</div>';
	return $html;
}

?>