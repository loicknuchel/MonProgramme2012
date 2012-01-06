<?php

function twittFormat($quote, $link){
	$twitt = str_replace('#', "%23", str_replace('"', "'", $quote));
	$max = 140 - strlen('#fr2012 #mp2012 http://mp2012.lkws.fr/?q=54 ');
	if(strlen($twitt) >= $max){
		$twitt = substr($twitt, 0, $max);
		$twitt .= '...';
	}
	$twitt = $twitt.' '.$link.' %23fr2012 %23mp2012';
	return $twitt;
}

function ShortUrl($matches) {
	//$limit = 30;
	//$link_displayed = (strlen($matches[0]) > $limit + 7) ? substr($matches[0], 7, floor($limit/2)).'…'.substr($matches[0], -floor($limit/2)) : $matches[0];
	
	//$link_displayed = str_replace("http://","",$matches[0]);
	$link_displayed = preg_replace('/(https?|ftp):\/\//','',$matches[0]);
	$link_displayed = (strlen($link_displayed) > 50) ? substr($link_displayed, 0, 20).'…'.substr($link_displayed, -20) : $link_displayed;
	
	
	return '<a href="'.$matches[0].'" title="'.$matches[0].'" target="_blanck">'.$link_displayed.'</a>';
}

function UrlToShortLink($text) {
	//Pattern to retrieve the url in the comment
	$pattern = '`((?:https?|ftp)://\S+?)(?=[[:punct:]]?(?:\s|\Z)|\Z)`'; 

	//Replacement of the pattern
	$text = preg_replace_callback($pattern, 'ShortUrl', $text);

	return $text;
}

function commentToHtmlFormat($comment){
/* TODO :
	link 																			=>	 <a href="link" title="link" target="_blanck">shortLink</a>
	\r\n 																			=>	 <br/>
	[quote]blabla[/quote] 															=>	 <div class="quoted_comment">blabla</div>
	[quote name="toto" date="lundi" time="timestamp" comment="id"]blabla[/quote] 	=>	 <div class="quoted_comment"><div class="ref">toto, le lundi</div>blabla</div>
*/
	
	$text = $comment;
	
	// link 																		=>	 <a href="link" title="link" target="_blanck">shortLink</a>
	$text = UrlToShortLink($text);
	
	// \r\n 																		=>	 <br/>
	$text = nl2br($text);
	
	// [quote]blabla[/quote] 														=>	 <div class="quoted_comment">blabla</div>
	$text = str_replace('[quote]', '<div class="quoted_comment">', $text, $cptStart);
	$text = str_replace('[/quote]', '</div>', $text, $cptEnd);
	if($cptStart != $cptEnd){$text = str_replace('[/quote]', '', str_replace('[quote]', '', nl2br($comment['comment'])));}
	
	// [quote name="toto" date="lundi" time="timestamp" comment="id"]blabla[/quote]	=>	 <div class="quoted_comment"><div class="ref">toto, le lundi</div>blabla</div>
	
	
	return $text;
}



?>