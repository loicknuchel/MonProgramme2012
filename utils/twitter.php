<?php
function postToTwitter($username,$password,$message){

    $host = "http://twitter.com/statuses/update.xml?status=".urlencode(stripslashes(urldecode($message)));

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $host);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));

    $result = curl_exec($ch);
    // Look at the returned header
    $resultArray = curl_getinfo($ch);

    curl_close($ch);

	/*
    if($resultArray['http_code'] == "200") {
          $twitter_status='Message envoyé ! <a href="http://twitter.com/'.$username.'">Voir sur le profil</a>'; }
    else $twitter_status = "Erreur, requete refusée (".$resultArray['http_code'].").";

    return $twitter_status;
	*/
	return $resultArray['http_code'];
}

function twitterKorben($quote){
	$out= "POST http://twitter.com/statuses/update.json HTTP/1.1\r\n ".
	"Host: twitter.com\r\n ".
	"Authorization: Basic ".base64_encode('monprogramme2012:@Dr4gmp2012;')."\r\n ".
	"Content-type: application/x-www-form-urlencoded\r\n ".
	"Content-length: ".strlen(" status=$quote ")."\r\n ".
	"Connection: Close\r\n\r\n ".
	"status=$quote ";

	$fp = fsockopen (‘twitter.com’, 80);
	fwrite ($fp, $out);
	fclose ($fp);
}

?>