<?php
function generateQuoteBlock($quote, $editable = false){
	if(isset($quote['category']) && $quote['category'] != ''){$category = '<a href="category.php?cat='.$quote['category_id'].'">'.$quote['category'].'</a>';}
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
	
	$more_infos = 'Proposition publiée le '.$quote['post_date'].''.$pub.' '.$cat.' '.$auth.'<br/>'.$ctx.''.$expl.''.$src.'';
	
	if($editable == true && $desc != ''){
		$desc = '<div class="quote_desc">
			'.nl2br(UrlToShortLink($quote['explanation'])).'
		</div>';
	}
	
	$html = '<div class="quote '.$quote['id'].'">
			<div class="quote_header">
				<span class="quote_number"><a href="quote.php?id='.$quote['id'].'">#<span>'.$quote['id'].'</span></a></span>
				<span class="options">
					<ul>
						<li><a href="#" class="favoris"><script>document.write(s_quote.favoris.item.notselected);</script></a></li>
						<li><a href="#" class="suivi">Suivre cette proposition</a></li>
						<!--<li><a href="#" class="category">Proposer un sujet</a></li>-->
						<li><a href="#" class="report">Signaler</a></li>
					</ul>
				</span>
			</div>
			<div class="quote_block">
				<div class="quote_content">
					<div class="quote_text">
						'.nl2br(UrlToShortLink($quote['quote'])).'
					</div>
					'.$desc.'
					<div class="quote_social">
						<a href="https://twitter.com/share?text='.twittFormat($quote['quote'], 'http://mp2012.lkws.fr/?q='.$quote['id']).'&via=monprogramme&url=" target="_blanck" class="twitter">
							<img src="" title="ReTweet" style="height: 14px; margin-top: 5px;">
						</a>
					</div>
				</div>
				<div class="quote_meta">
					<div class="quote_actions">
						<ul>
							<li class="select"><script>document.write(s_quote.selection.item.notselected);</script></li>
							<li><a href="#" class="thumb_up">(+)</a> <span class="val_up">'.$quote['up'].'</span> / <a href="#" class="thumb_down">(-)</a> <span class="val_down">'.$quote['down'].'</span></li>
							<li><a href="quote.php?id='.$quote['id'].'">'.$quote['total_comments'].' réaction'.$accordReaction.'</a></li>
							<li class="category">'.$category.'</li>
						</ul>
					</div>
					<div class="more"><a href="#"><script>document.write(s_quote.meta.expand);</script></a></div>
					<div class="clear"></div>
				</div>
				<div class="quote_expand">'.$more_infos.'</div>
			</div>
		</div>';
		return $html;
}

function generateQuotePager($nbPages, $current, $baseUrl){
	$widthPager = 4;
	
	$html = '<div class="quote_pager">';
	// previous
	if($current == 1){$html .= '<span>< Précédent</span> <b></b> ';}
	else{$prev = $current-1; $html .= '<a href="'.$baseUrl.''.$prev.'">< Précédent</a> <b></b> ';}
	
	// first
	if($current - $widthPager - 1 == 1){
		$html .= '<a href="'.$baseUrl.'1">1</a> <b></b> ';
	}
	else if($current - $widthPager > 1){
		$html .= '<a href="'.$baseUrl.'1">1</a> <b></b> ... <b></b> ';
	}
	
	// middle
	for($i=$current-$widthPager; $i<=$current+$widthPager; $i++){
		if($i == $current){
			$html .= '<strong class="med">'.$i.'</strong> <b></b> ';
		}
		else if($i > 0 && $i <= $nbPages){
			$html .= '<a href="'.$baseUrl.''.$i.'">'.$i.'</a> <b></b> ';
		}
	}
	
	// last
	if($current + $widthPager + 1 == $nbPages){
		$html .= '<a href="'.$baseUrl.''.$nbPages.'">'.$nbPages.'</a> <b></b> ';
	}
	else if($current + $widthPager < $nbPages){
		$html .= '... <b></b> <a href="'.$baseUrl.''.$nbPages.'">'.$nbPages.'</a> <b></b> ';
	}
	
	// next
	if($current == $nbPages){$html .= '<span>Suivant ></span>';}
	else{$next = $current+1; $html .= '<a href="'.$baseUrl.''.$next.'">Suivant ></a>';}
	
	$html .= '</div>';
	return $html;
}

?>