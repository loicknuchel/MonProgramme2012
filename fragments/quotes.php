<?php
function generateQuoteBlock($quote, $editable = false){
	if(isset($quote['category']) && $quote['category'] != ''){$category = '<a href="list.php?type=category&cat='.$quote['category_id'].'">'.$quote['category'].'</a>';}
	else{$category = "inclassable";}
	
	
	$pubinfo = $quote['publisher_info'] != '' ? ' title="'.$quote['publisher_info'].'"' : '';
	$pub = $quote['publisher'] != '' ? ($quote['site'] != '' ? ' par <a href="'.$quote['site'].'"'.$pubinfo.' target="_blanck">'.$quote['publisher'].'</a>.' : ' par <span'.$pubinfo.'>'.$quote['publisher'].'</span>.') : '.';
	//$cat = $quote['category'] != '' ? ' dans la catégorie <a href="category.php?cat='.$quote['category'].'">'.$quote['category'].'</a>' : '';
	$cat = '';
	$auth = $quote['author'] != '' ? 'Elle a été inspirée par '.$quote['author'].'.' : '';
	$ctx = $quote['context'] != '' ? '<br/>'.nl2br(UrlToShortLink($quote['context'])).'<br/>' : '';
	//$expl = $quote['explanation'] != '' ? '<br/>'.nl2br($quote['explanation']).'<br/>' : '';
	$expl = '';
	$desc = $quote['explanation'] != '' ? '<div class="quote_desc">'.nl2br(UrlToShortLink($quote['explanation'])).'</div>' : '';
	$src = $quote['source'] != '' ? '<br/>['.UrlToShortLink($quote['source']).']<br/>' : '';
	$accordReaction = ($quote['total_comments'] > 1) ? 's' : '';
	$accordPetition = ($quote['total_signatures'] > 1) ? 's' : '';
	
	$more_infos = 'Proposition publiée le '.$quote['post_date'].''.$pub.' '.$cat.' '.$auth.'<br/>'.$ctx.''.$expl.''.$src.'';
	
	if($editable == true && $desc != ''){
		$desc = '<div class="quote_desc">
			'.nl2br(UrlToShortLink($quote['explanation'])).'
		</div>';
	}
	
	$html = '<div class="quote '.$quote['id'].'">
			<div class="quote_header">
				<div class="quote_number">
					<a href="quote.php?id='.$quote['id'].'">#<span>'.$quote['id'].'</span></a>
				</div>
				<div class="options">
					<ul>
						<li><a href="#" class="favoris"><script>document.write(s_quote.favoris.item.notselected);</script></a></li>
						<li><a href="#" class="suivi">Suivre cette proposition</a></li>
						<!--<li><a href="#" class="category">Proposer un sujet</a></li>-->
						<li><a href="#" class="report">Signaler</a></li>
					</ul>
				</div>
			</div>
			<div class="quote_content">
				<div class="quote_text">
					'.nl2br(UrlToShortLink($quote['quote'])).'
				</div>
				'.$desc.'
				<div class="quote_social">
					<a href="https://twitter.com/share?text='.twittFormat($quote['quote'], 'http://mp2012.lkws.fr/?q='.$quote['id']).'&via=monprogramme&url=" target="_blanck" class="twitter"></a>
				</div>
			</div>
			<div class="quote_footer">
				<div class="quote_actions">
					<ul>
						<li class="select"><script>document.write(s_quote.selection.item.notselected);</script></li>
						<li>'.generateVoteBar($quote['up'], $quote['down']).'</li>
						<li><a href="quote.php?id='.$quote['id'].'#commentContainer">'.$quote['total_comments'].' réaction'.$accordReaction.'</a></li>
						<li><a href="quote.php?id='.$quote['id'].'#petitionContainer">'.$quote['total_signatures'].' signtaire'.$accordPetition.'</a></li>
						<li class="category">'.$category.'</li>
					</ul>
				</div>
				<div class="more"><a href="#"><script>document.write(s_quote.meta.expand);</script></a></div>
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