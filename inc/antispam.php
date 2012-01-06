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
	$antiSpam['maxIndex'] = 79;
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
	
	$antiSpam[30]['ask'] = '0 * 5236 + 5 = ';
	$antiSpam[30]['answer'] = '5';
	$antiSpam[31]['ask'] = '125 * 53 * 0 = ';
	$antiSpam[31]['answer'] = '0';
	$antiSpam[32]['ask'] = '45 - 45 + 9 = ';
	$antiSpam[32]['answer'] = '9';
	$antiSpam[33]['ask'] = '9 - (3 * 3) + 2 = ';
	$antiSpam[33]['answer'] = '2';
	$antiSpam[34]['ask'] = '(2 * 6) - 2 = ';
	$antiSpam[34]['answer'] = '10';
	$antiSpam[35]['ask'] = '10 * 10 = ';
	$antiSpam[35]['answer'] = '100';
	$antiSpam[36]['ask'] = '5860 / 10 = ';
	$antiSpam[36]['answer'] = '586';
	$antiSpam[37]['ask'] = '42 + 42 = ';
	$antiSpam[37]['answer'] = '84';
	$antiSpam[38]['ask'] = '7 + 7 - 7 = ';
	$antiSpam[38]['answer'] = '7';
	$antiSpam[39]['ask'] = '69 - 9 = ';
	$antiSpam[39]['answer'] = '60';
	
	$antiSpam[40]['ask'] = 'La réponse est kilucru';
	$antiSpam[40]['answer'] = 'kilucru';
	$antiSpam[41]['ask'] = 'Veuillez saisir le mot ordinateur';
	$antiSpam[41]['answer'] = 'ordinateur';
	$antiSpam[42]['ask'] = 'Ecrivez chaise';
	$antiSpam[42]['answer'] = 'chaise';
	$antiSpam[43]['ask'] = 'Veuillez écrire imprimante s\'il vous plait';
	$antiSpam[43]['answer'] = 'imprimante';
	$antiSpam[44]['ask'] = 'Inscrivez les lettres mplsteek';
	$antiSpam[44]['answer'] = 'mplsteek';
	$antiSpam[45]['ask'] = 'La réponse est porte';
	$antiSpam[45]['answer'] = 'porte';
	$antiSpam[46]['ask'] = 'Veillez saisir le mot lunette';
	$antiSpam[46]['answer'] = 'lunette';
	$antiSpam[47]['ask'] = 'Ecrivez lampe';
	$antiSpam[47]['answer'] = 'lampe';
	$antiSpam[48]['ask'] = 'Veuillez écrire mobilette s\'il vous plait';
	$antiSpam[48]['answer'] = 'mobilette';
	$antiSpam[49]['ask'] = 'Inscrivez les lettres hyehdls';
	$antiSpam[49]['answer'] = 'hyehdls';
	
	$antiSpam[50]['ask'] = '21 + 21 = ';
	$antiSpam[50]['answer'] = '42';
	$antiSpam[51]['ask'] = '(20 + 1) * 2 = ';
	$antiSpam[51]['answer'] = '42';
	$antiSpam[52]['ask'] = '1300 + 37 = ';
	$antiSpam[52]['answer'] = '1337';
	$antiSpam[53]['ask'] = '123 - 123 = ';
	$antiSpam[53]['answer'] = '0';
	$antiSpam[54]['ask'] = '(152 / 152) + 12 = ';
	$antiSpam[54]['answer'] = '13';
	$antiSpam[55]['ask'] = '101010 - 100000 = ';
	$antiSpam[55]['answer'] = '1010';
	$antiSpam[56]['ask'] = '999 + 1 = ';
	$antiSpam[56]['answer'] = '1000';
	$antiSpam[57]['ask'] = '1000 + 300 + 30 + 7 = ';
	$antiSpam[57]['answer'] = '1337';
	$antiSpam[58]['ask'] = '(15 * 1) - 1 = ';
	$antiSpam[58]['answer'] = '14';
	$antiSpam[59]['ask'] = '(48 / 48) * (53 / 53) = ';
	$antiSpam[59]['answer'] = '1';
	
	$antiSpam[60]['ask'] = 'De quelle couleur est un lit orange ?';
	$antiSpam[60]['answer'] = 'orange';
	$antiSpam[61]['ask'] = 'De quelle couleur est un tabouret gris ?';
	$antiSpam[61]['answer'] = 'gris';
	$antiSpam[62]['ask'] = 'De quelle couleur est un bureau marron ?';
	$antiSpam[62]['answer'] = 'marron';
	$antiSpam[63]['ask'] = 'De quelle couleur est une souris verte ?';
	$antiSpam[63]['answer'] = 'verte';
	$antiSpam[64]['ask'] = 'De quelle couleur est une règle violette ?';
	$antiSpam[64]['answer'] = 'violette';
	$antiSpam[65]['ask'] = 'De quelle couleur est une voiture bleue ?';
	$antiSpam[65]['answer'] = 'bleue';
	$antiSpam[66]['ask'] = 'De quelle couleur est un livre vert ?';
	$antiSpam[66]['answer'] = 'vert';
	$antiSpam[67]['ask'] = 'De quelle couleur est un cheval blanc ?';
	$antiSpam[67]['answer'] = 'blanc';
	$antiSpam[68]['ask'] = 'De quelle couleur est un stylo rouge ?';
	$antiSpam[68]['answer'] = 'rouge';
	$antiSpam[69]['ask'] = 'De quelle couleur est un chat noir ?';
	$antiSpam[69]['answer'] = 'noir';
	
	$antiSpam[70]['ask'] = '0 - 5 + 10 = ';
	$antiSpam[70]['answer'] = '5';
	$antiSpam[71]['ask'] = '0 + 0 = ';
	$antiSpam[71]['answer'] = '0';
	$antiSpam[72]['ask'] = '(1 + 1) * 1 = ';
	$antiSpam[72]['answer'] = '2';
	$antiSpam[73]['ask'] = '(2 + 3) * 2 = ';
	$antiSpam[73]['answer'] = '10';
	$antiSpam[74]['ask'] = '2 + (3 * 2) = ';
	$antiSpam[74]['answer'] = '8';
	$antiSpam[75]['ask'] = '128 - 17 = ';
	$antiSpam[75]['answer'] = '111';
	$antiSpam[76]['ask'] = '100 + 100 = ';
	$antiSpam[76]['answer'] = '200';
	$antiSpam[77]['ask'] = '100 - 50 + 25 = ';
	$antiSpam[77]['answer'] = '75';
	$antiSpam[78]['ask'] = '(45 * 2) / 9 =';
	$antiSpam[78]['answer'] = '10';
	$antiSpam[79]['ask'] = '(1 * 12) + 0 = ';
	$antiSpam[79]['answer'] = '12';
	
	$antiSpam[80]['ask'] = 'Combient font trois plus trois ?';
	$antiSpam[80]['answer'] = '6';
	$antiSpam[81]['ask'] = 'Que donnent six moins deux ?';
	$antiSpam[81]['answer'] = '4';
	$antiSpam[82]['ask'] = 'Deux fois deux = ';
	$antiSpam[82]['answer'] = '4';
	$antiSpam[83]['ask'] = 'Trois plus cinq moins deux = ';
	$antiSpam[83]['answer'] = '6';
	$antiSpam[84]['ask'] = 'Combient donne un fois un ?';
	$antiSpam[84]['answer'] = '1';
	$antiSpam[85]['ask'] = '';
	$antiSpam[85]['answer'] = '';
	$antiSpam[86]['ask'] = '';
	$antiSpam[86]['answer'] = '';
	$antiSpam[87]['ask'] = '';
	$antiSpam[87]['answer'] = '';
	$antiSpam[88]['ask'] = '';
	$antiSpam[88]['answer'] = '';
	$antiSpam[89]['ask'] = '';
	$antiSpam[89]['answer'] = '';
	
	return $antiSpam;
}

?>