<?php

function orNull(&$val){
	return isset($val) ? $val : null;
}

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

function UrlToShortLink($text) {
	$linkPattern = '#(http|ftp|https)://(\w+:{0,1}\w*@)?((\d+\.\d+\.\d+\.\d+)|(([\w-]+\.)+([a-z,A-Z][\w-]*)))(:[1-9][0-9]*)?(/([\w-./:%+@&=]+[\w- ./?:;%+@&=]*)?)?(\#([^\s\,;:)}\]]*))?#i';
	//$linkReplace = '<a href="$0" title="$0" target="_blanck">$3$9$11</a>';
	
	//$comment = preg_replace($linkPattern, $linkReplace, $comment);
	$text = preg_replace_callback($linkPattern, 'reduceLink', $text);
	/* Fonctions anonymes : supportées en PHP 5.3 mais sur le serveur : PHP 5.2 !!!
	$comment = preg_replace_callback($linkPattern, function ($match) {
		$disp = orNull($match[3]).orNull($match[9]).orNull($match[11]);
		$disp = (strlen($disp) > 70) ? substr($disp, 0, 30).'…'.substr($disp, -20) : $disp;
		return '<a href="'.orNull($match[0]).'" title="'.orNull($match[0]).'" target="_blanck">'.$disp.'</a>';
	}, $comment);*/
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
	
	$comment = UrlToShortLink($comment);
	
	$comment = preg_replace($endLinePattern, $endLineReplace, $comment);
	
	return $comment;
}

// private
function reduceLink($match){
	$disp = orNull($match[3]).orNull($match[9]).orNull($match[11]);
	$disp = (strlen($disp) > 70) ? substr($disp, 0, 30).'…'.substr($disp, -20) : $disp;
	return '<a href="'.orNull($match[0]).'" title="'.orNull($match[0]).'" target="_blanck">'.$disp.'</a>';
}



?>