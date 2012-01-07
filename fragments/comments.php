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
	
	if($comment['reported'] == 1){ $text = '<div class="reported"></div>'; }
	else{ $text = commentToHtmlFormat($comment['comment']); }
	
	if($comment['avis'] == "pour"){$avis = ' <span class="label light '.$comment['avis'].'">'.$comment['avis'].'</span> ';}
	else if($comment['avis'] == "contre"){$avis = ' <span class="label light '.$comment['avis'].'">'.$comment['avis'].'</span> ';}
	else{$avis = ' <span class="label light neutre">Mitigé</span> ';}
	
	$html = '
	<div class="comment" id="comment_'.$comment['id'].'">
		<div class="comment_header">
			<span class="comment_no">'.$comment['id'].'</span>'.$avis.'<span class="comment_pseudo">'.$pseudo.'</span><span class="comment_time">'.$comment['post_timestamp'].'</span><span class="comment_date">, le <span>'.$comment['post_date'].'</span> :</span>';
		if($comment['reported'] != 1){
			$html .= '
			<div class="comment_vote">
				<span class="thumb_up" title="commentaire pertinent"></span>
				<span class="thumb_down" title="commentaire sans intérêt"></span>
				<span class="val">(<span>'.$vote.'</span>)</span>
			</div>
			<div class="reponse" title="répondre à ce commentaire"></div>
			<div class="comment_report" title="signaler ce commentaire"></div>';
		}
		$html .= '</div>
		<div class="comment_text">'.$text.'</div>
	</div>';
	return $html;
}

?>