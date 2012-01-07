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

function commentToHtmlFormat2($comment){
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

function commentToHtmlFormat($comment){
	$modificateur = 'i';
	
	$startBlockPattern_nameDate = '#([\s\r\n ]*)?\[quote( name="([^"]*)")( date="([a-zA-Z0-9 à/:]*)")( time="([0-9]*)")?( comment="([0-9]*)")?\]([\s\r\n ]*)?#'.$modificateur;
	$startBlockPattern_name = '#([\s\r\n ]*)?\[quote( name="([^"]*)")( time="([0-9]*)")?( comment="([0-9]*)")?\]([\s\r\n ]*)?#'.$modificateur;
	$startBlockPattern_date = '#([\s\r\n ]*)?\[quote( date="([a-zA-Z0-9 à/:]*)")( time="([0-9]*)")?( comment="([0-9]*)")?\]([\s\r\n ]*)?#'.$modificateur;
	$startBlockPattern_none = '#([\s\r\n ]*)?\[quote( time="([0-9]*)")?( comment="([0-9]*)")?\]([\s\r\n ]*)?#'.$modificateur;
	$startBlockReplace_nameDate = '<div class="quoted_comment"><div class="ref"><span class="name">$3</span>, le <span class="date">$5</span> :<span class="time">$7</span><span class="comment">$9</span></div>';
	$startBlockReplace_name = '<div class="quoted_comment"><div class="ref"><span class="name">$3</span> :<span class="time">$5</span><span class="comment">$7</span></div>';
	$startBlockReplace_date = '<div class="quoted_comment"><div class="ref">le <span class="date">$3</span> :<span class="time">$5</span><span class="comment">$7</span></div>';
	$startBlockReplace_none = '<div class="quoted_comment"><div class="ref"><span class="time">$3</span><span class="comment">$5</span></div>';
	
	$endBlockPattern = '#([\s\r\n ]*)?\[/quote\]([\s\r\n ]*)?#'.$modificateur;
	$endBlockReplace = '</div>';
	
	$linkPattern = '#(http|ftp|https)://(\w+:{0,1}\w*@)?((\d+\.\d+\.\d+\.\d+)|(([\w-]+\.)+([a-z,A-Z][\w-]*)))(:[1-9][0-9]*)?(/([\w-./:%+@&=]+[\w- ./?:%+@&=]*)?)?(\#([^\s\.,;:)}\]]*))?#'.$modificateur;
	$linkReplace = '<a href="$0" title="$0" target="_blanck">$3$9$11</a>';
	
	$endLinePattern = '#[\r\n]#'.$modificateur;
	$endLineReplace = '<br />';
	
	
	$tmp = 0;
	$count = 0;
	$comment = preg_replace($startBlockPattern_nameDate,	$startBlockReplace_nameDate,	$comment, -1, $tmp); $count += $tmp;
	$comment = preg_replace($startBlockPattern_name, 		$startBlockReplace_name, 		$comment, -1, $tmp); $count += $tmp;
	$comment = preg_replace($startBlockPattern_date, 		$startBlockReplace_date, 		$comment, -1, $tmp); $count += $tmp;
	$comment = preg_replace($startBlockPattern_none, 		$startBlockReplace_none, 		$comment, -1, $tmp); $count += $tmp;
	$comment = preg_replace($endBlockPattern, $endBlockReplace, $comment, $count, $tmp);
	if($count > $tmp){ // plus de début que de fins
		for($i=0; $i<($count - $tmp); $i++){
			$comment .= '</div>';
		}
	}
	
	$comment = preg_replace($linkPattern, $linkReplace, $comment);
	
	$comment = preg_replace($endLinePattern, $endLineReplace, $comment);
	
	return $comment;
}



?>