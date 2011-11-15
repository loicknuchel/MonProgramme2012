<?php
	//declare our assets 
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subject']) && isset($_POST['title'])){
		$name = stripcslashes($_POST['name']);
		$emailAddr = stripcslashes($_POST['email']);
		$comment = stripcslashes($_POST['message']);
		$subject = stripcslashes($_POST['subject']).' '.stripcslashes($_POST['title']);	
		$contactMessage =  
			"Message:
			$comment 

			Name: $name
			E-mail: $emailAddr

			Sending IP:$_SERVER[REMOTE_ADDR]
			Sending Script: $_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]";
			
			//send the email 
			$headers ='From: "'.$name.'"<'.$emailAddr.'>'.'\n';
			$headers .='Reply-To: '.$emailAddr.''.'\n';
			$headers .='Content-Type: text; charset="utf-8"'.'\n';
			$headers .='Content-Transfer-Encoding: 8bit'; 
			
			if(mail('loicknuchel+webmastermp2012@gmail.com', $subject, $contactMessage, $headers)){
				echo('success'); //return success callback
			}
			else{
				echo('fail');
			}
	}
	else{
		echo('fail');
	}
?>