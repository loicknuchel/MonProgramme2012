<?php

function getAntiSpamQuestion(){
	$antiSpam = getAntiSpam();
	$question = null;
	$question['id'] = rand(0, $antiSpam['maxIndex']);
	$question['ask'] = $antiSpam[$question['id']]['ask'];
	return $question;
}

function checkAntiSpamAnswer($id, $answer){
	$antiSpam = getAntiSpam();
	if($id != null && $answer != null && $antiSpam[$id]['answer'] == trim(strtolower($answer))){
		return true;
	}
	return false;
}

// private
function getAntiSpam(){
	$antiSpam = null;
	$antiSpam['maxIndex'] = 59;
	/*
	$antiSpam[0]['ask'] = '';
	$antiSpam[0]['answer'] = '';
	$antiSpam[1]['ask'] = '';
	$antiSpam[1]['answer'] = '';
	$antiSpam[2]['ask'] = '';
	$antiSpam[2]['answer'] = '';
	$antiSpam[3]['ask'] = '';
	$antiSpam[3]['answer'] = '';
	$antiSpam[4]['ask'] = '';
	$antiSpam[4]['answer'] = '';
	$antiSpam[5]['ask'] = '';
	$antiSpam[5]['answer'] = '';
	$antiSpam[6]['ask'] = '';
	$antiSpam[6]['answer'] = '';
	$antiSpam[7]['ask'] = '';
	$antiSpam[7]['answer'] = '';
	$antiSpam[8]['ask'] = '';
	$antiSpam[8]['answer'] = '';
	$antiSpam[9]['ask'] = '';
	$antiSpam[9]['answer'] = '';
	*/
	
	$antiSpam[0]['ask'] = 'De quelle couleur est le soleil ?';
	$antiSpam[0]['answer'] = 'jaune';
	$antiSpam[1]['ask'] = 'De quelle couleur est le lait ?';
	$antiSpam[1]['answer'] = 'blanc';
	$antiSpam[2]['ask'] = 'De quelle couleur est le ciel ?';
	$antiSpam[2]['answer'] = 'bleu';
	$antiSpam[3]['ask'] = 'De quelle couleur est le sang ?';
	$antiSpam[3]['answer'] = 'rouge';
	$antiSpam[4]['ask'] = 'De quelle couleur est une banane ?';
	$antiSpam[4]['answer'] = 'jaune';
	$antiSpam[5]['ask'] = 'De quelle couleur est le goudron ?';
	$antiSpam[5]['answer'] = 'noir';
	$antiSpam[6]['ask'] = 'De quelle couleur est la mer ?';
	$antiSpam[6]['answer'] = 'bleue';
	$antiSpam[7]['ask'] = 'De quelle couleur est un citron ?';
	$antiSpam[7]['answer'] = 'jaune';
	$antiSpam[8]['ask'] = 'De quelle couleur est la viande ?';
	$antiSpam[8]['answer'] = 'rouge';
	$antiSpam[9]['ask'] = 'De quelle couleur est un concombre ?';
	$antiSpam[9]['answer'] = 'vert';
	
	$antiSpam[10]['ask'] = '(3 * 4) + 8 = ';
	$antiSpam[10]['answer'] = '20';
	$antiSpam[11]['ask'] = '3 + 4 + 5 = ';
	$antiSpam[11]['answer'] = '12';
	$antiSpam[12]['ask'] = '(5 - (2 + 3)) * 42 = ';
	$antiSpam[12]['answer'] = '0';
	$antiSpam[13]['ask'] = '12 + 30 = ';
	$antiSpam[13]['answer'] = '42';
	$antiSpam[14]['ask'] = '(512 / 512) * 5 = ';
	$antiSpam[14]['answer'] = '5';
	$antiSpam[15]['ask'] = '8 - 8 + 2 = ';
	$antiSpam[15]['answer'] = '2';
	$antiSpam[16]['ask'] = '5 * 4 * 5 =';
	$antiSpam[16]['answer'] = '100';
	$antiSpam[17]['ask'] = '5 * (1 + 2) = ';
	$antiSpam[17]['answer'] = '15';
	$antiSpam[18]['ask'] = '1 + 0 + 1 + 0 + 1 + 0 = ';
	$antiSpam[18]['answer'] = '3';
	$antiSpam[19]['ask'] = '2 * (4 - 2) = ';
	$antiSpam[19]['answer'] = '4';
	
	$antiSpam[20]['ask'] = 'Les arbres sont-ils des plantes ?';
	$antiSpam[20]['answer'] = 'oui';
	$antiSpam[21]['ask'] = 'Peut-on monter en bas ?';
	$antiSpam[21]['answer'] = 'non';
	$antiSpam[22]['ask'] = 'Le PS est-il un parti politique ?';
	$antiSpam[22]['answer'] = 'oui';
	$antiSpam[23]['ask'] = 'Les enfants sont-ils plus grands que les adultes ?';
	$antiSpam[23]['answer'] = 'non';
	$antiSpam[24]['ask'] = 'L\'UMP est-il un parti politique ?';
	$antiSpam[24]['answer'] = 'oui';
	$antiSpam[25]['ask'] = 'Peut-on manger une casserole ?';
	$antiSpam[25]['answer'] = 'non';
	$antiSpam[26]['ask'] = 'Les pommes sont-elles comestibles ?';
	$antiSpam[26]['answer'] = 'oui';
	$antiSpam[27]['ask'] = 'Les voitures vont-elles sous l\'eau ?';
	$antiSpam[27]['answer'] = 'non';
	$antiSpam[28]['ask'] = 'Y a-t-il des escaliers dans un immeuble ?';
	$antiSpam[28]['answer'] = 'oui';
	$antiSpam[29]['ask'] = 'Est-ce que le feu ça mouille ?';
	$antiSpam[29]['answer'] = 'non';
	
	$antiSpam[30]['ask'] = 'La réponse est kilucru';
	$antiSpam[30]['answer'] = 'kilucru';
	$antiSpam[31]['ask'] = 'Veuillez saisir le mot ordinateur';
	$antiSpam[31]['answer'] = 'ordinateur';
	$antiSpam[32]['ask'] = 'Ecrivez chaise';
	$antiSpam[32]['answer'] = 'chaise';
	$antiSpam[33]['ask'] = 'Veuillez écrire imprimante s\'il vous plait';
	$antiSpam[33]['answer'] = 'imprimante';
	$antiSpam[34]['ask'] = 'Inscrivez les lettres mplsteek';
	$antiSpam[34]['answer'] = 'mplsteek';
	$antiSpam[35]['ask'] = 'La réponse est porte';
	$antiSpam[35]['answer'] = 'porte';
	$antiSpam[36]['ask'] = 'Veillez saisir le mot lunette';
	$antiSpam[36]['answer'] = 'lunette';
	$antiSpam[37]['ask'] = 'Ecrivez lampe';
	$antiSpam[37]['answer'] = 'lampe';
	$antiSpam[38]['ask'] = 'Veuillez écrire mobilette s\'il vous plait';
	$antiSpam[38]['answer'] = 'mobilette';
	$antiSpam[39]['ask'] = 'Inscrivez les lettres hyehdls';
	$antiSpam[39]['answer'] = 'hyehdls';
	
	$antiSpam[40]['ask'] = 'De quelle couleur est un lit orange ?';
	$antiSpam[40]['answer'] = 'orange';
	$antiSpam[41]['ask'] = 'De quelle couleur est un tabouret gris ?';
	$antiSpam[41]['answer'] = 'gris';
	$antiSpam[42]['ask'] = 'De quelle couleur est un bureau marron ?';
	$antiSpam[42]['answer'] = 'marron';
	$antiSpam[43]['ask'] = 'De quelle couleur est une souris verte ?';
	$antiSpam[43]['answer'] = 'verte';
	$antiSpam[44]['ask'] = 'De quelle couleur est une règle violette ?';
	$antiSpam[44]['answer'] = 'violette';
	$antiSpam[45]['ask'] = 'De quelle couleur est une voiture bleue ?';
	$antiSpam[45]['answer'] = 'bleue';
	$antiSpam[46]['ask'] = 'De quelle couleur est un livre vert ?';
	$antiSpam[46]['answer'] = 'vert';
	$antiSpam[47]['ask'] = 'De quelle couleur est un cheval blanc ?';
	$antiSpam[47]['answer'] = 'blanc';
	$antiSpam[48]['ask'] = 'De quelle couleur est un stylo rouge ?';
	$antiSpam[48]['answer'] = 'rouge';
	$antiSpam[49]['ask'] = 'De quelle couleur est un chat noir ?';
	$antiSpam[49]['answer'] = 'noir';
	
	$antiSpam[50]['ask'] = '0 * 5236 + 5 = ';
	$antiSpam[50]['answer'] = '5';
	$antiSpam[51]['ask'] = '125 * 53 * 0 = ';
	$antiSpam[51]['answer'] = '0';
	$antiSpam[52]['ask'] = '45 - 45 + 9 = ';
	$antiSpam[52]['answer'] = '9';
	$antiSpam[53]['ask'] = '9 - (3 * 3) + 2 = ';
	$antiSpam[53]['answer'] = '2';
	$antiSpam[54]['ask'] = '(2 * 6) - 2 = ';
	$antiSpam[54]['answer'] = '10';
	$antiSpam[55]['ask'] = '10 * 10 = ';
	$antiSpam[55]['answer'] = '100';
	$antiSpam[56]['ask'] = '5860 / 10 = ';
	$antiSpam[56]['answer'] = '586';
	$antiSpam[57]['ask'] = '42 + 42 = ';
	$antiSpam[57]['answer'] = '84';
	$antiSpam[58]['ask'] = '7 + 7 - 7 = ';
	$antiSpam[58]['answer'] = '7';
	$antiSpam[59]['ask'] = '69 - 9 = ';
	$antiSpam[59]['answer'] = '60';
	
	return $antiSpam;
}

?>