<?php
function generateQuoteBlock($quote, $style = ''){
	
	if($style == 'expanded'){
		$originalQuote = $quote['quote'] != $quote['origin_quote'] ? '<div class="original">'.nl2br(UrlToShortLink($quote['origin_quote'])).'</div>' : '';
		$originalExpl = $quote['explanation'] != $quote['origin_explanation'] ? '<div class="original">'.nl2br(UrlToShortLink($quote['origin_explanation'])).'</div>' : '';
	}
	else{$originalQuote = ''; $originalExpl = '';}
	
	if($style == 'selection'){ 	$remFromSelection = '<li><a href="#" class="selectRem">Supprimer de la sélection</a></li>'; }
	else { 						$remFromSelection = ''; }
	
	
	$pubinfo = $quote['publisher_info'] != '' ? ' title="'.$quote['publisher_info'].'"' : '';
	$pub = $quote['publisher'] != '' ? ($quote['site'] != '' ? ' par <a href="'.$quote['site'].'"'.$pubinfo.' target="_blanck">'.$quote['publisher'].'</a>.' : ' par <span'.$pubinfo.'>'.$quote['publisher'].'</span>.') : '.';
	$category = $quote['category'] != '' ? '<a href="list.php?type=category&cat='.$quote['category_id'].'">'.$quote['category'].'</a>' : "inclassable";
	$auth = $quote['author'] != '' ? ' Elle a été inspirée par '.$quote['author'].'.' : '';
	$ctx = $quote['context'] != '' ? '<br/>'.nl2br(UrlToShortLink($quote['context'])).'<br/>' : '';
	$expl = $quote['explanation'] != '' || ($quote['origin_explanation'] != '' && $style == 'expanded') ? '<div class="quote_desc">'.nl2br(UrlToShortLink($quote['explanation'])).$originalExpl.'</div>' : '';
	$src = $quote['source'] != '' ? '<br/>['.UrlToShortLink($quote['source']).']<br/>' : '';
	$accordReaction = ($quote['total_comments'] > 1) ? 's' : '';
	$accordPetition = ($quote['total_signatures'] > 1) ? 's' : '';
	
	$more_infos = 'Proposition publiée le '.$quote['post_date'].$pub.$auth.'<br/>'.$ctx.$src.'';
	
	$html = '<div class="quote '.$quote['id'].'">
			<div class="quote_header">
				<div class="quote_number">
					<a href="quote.php?id='.$quote['id'].'">#<span>'.$quote['id'].'</span></a>
				</div>
				<div class="options">
					<ul>
						'.$remFromSelection.'
						<li><a href="#" class="favoris"></a></li>
						<li><a href="#" class="suivi">Suivre cette proposition</a></li>
						<li><a href="rephrase.php?id='.$quote['id'].'" class="rephrase">Reformuler la proposition</a></li>
						<!--<li><a href="#" class="category">Proposer un sujet</a></li>-->
						<li><a href="#" class="report">Signaler</a></li>
					</ul>
				</div>
			</div>
			<div class="quote_content">
				<div class="quote_text">
					'.nl2br(UrlToShortLink($quote['quote'])).'
					'.$originalQuote.'
				</div>
				'.$expl.'
				<div class="quote_social">
					<a href="https://twitter.com/share?text='.twittFormat($quote['quote'], 'http://mp2012.lkws.fr/?q='.$quote['id']).'&via=monprogramme&url=" target="_blanck" class="twitter"></a>
				</div>
			</div>
			<div class="quote_footer">
				<div class="quote_actions">
					<ul>
						<li class="select"></li>
						<li>'.generateVoteBar($quote['up'], $quote['down']).'</li>
						<li><a href="quote.php?id='.$quote['id'].'#commentContainer">'.$quote['total_comments'].' réaction'.$accordReaction.'</a></li>
						<li><a href="quote.php?id='.$quote['id'].'#petitionContainer">'.$quote['total_signatures'].' signtaire'.$accordPetition.'</a></li>
						<li class="category">'.$category.'</li>
					</ul>
				</div>
				<div class="more"><a href="#"></a></div>
				<div class="clear"></div>
			</div>
			<div class="quote_expand">'.$more_infos.'</div>
		</div>';
		return $html;
}

function generateVoteBar($voteUp, $voteDown){
	if($voteUp + $voteDown > 0){
		$up = ceil(($voteUp / ($voteUp + $voteDown)) * 100);
		$down = 100 - $up;
	}
	else{
		$up = 0;
		$down = 0;
	}
	
	$html = '<ul>
		<li><a href="#" class="thumb_up">(+)</a> <span class="val_up">'.$voteUp.'</span></li>
		<li>
			<div class="votebar">
			  <div class="votebar-up" style="width: '.$up.'%;"></div>
			  <div class="votebar-down" style="width: '.$down.'%;"></div>
			</div>
		</li>
		<li><span class="val_down">'.$voteDown.'</span> <a href="#" class="thumb_down">(-)</a></li>
	</ul>';
	return $html;
}

?>