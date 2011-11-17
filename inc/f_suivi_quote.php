<?php
	$rel_to_root = '../';
	include './server_link.php';
	
	$quote_id = isset($_GET['quote_id']) ? $_GET['quote_id'] : 0;
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title></title>
	<style>
		#fancybox-content h1 {
			text-align: center;
		}
		#fancybox-content p {
			margin-top: 20px;
		}
		#newForm input[type="text"] {
			display: inline;
			color: #222;
			background: white;
			height: 15px;
			padding: 2px 2px;
			margin: 0px;
			margin-bottom: 3px;
			-webkit-border-radius: 0px;
			-moz-border-radius: 0px;
			border-radius: 0px;
		}
		#newForm #quote_id {
			width: 25px;
		}
		#newForm .elts {
			margin-left: 20px;
			margin-bottom: 10px;
			line-height: 25px;
		}
		#newForm .elts input[type="checkbox"] {
			margin-bottom: 6px;
			margin-right: 5px;
		}
		#newForm button {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="text" id="newForm">
		<form>
			Suivre la proposition #<input type="text" name="quote_id" id="quote_id" placeholder="id" /> et recevoir une notification des nouveaux commentaires par mail<br/>
			<div class="elts">
				<!--<input type="checkbox" name="new_comments" id="new_comments" checked="checked" /><label for="new_comments">les nouveaux commentaires</label><br/>
				<input type="checkbox" name="new_votes" id="new_votes" /><label for="new_votes">les nouveaux votes</label><br/>
				<input type="checkbox" name="new_reports" id="new_reports" /><label for="new_reports">les nouveaux signalements</label><br/> height: 25px à ajouter par ligne sur la fancybox... -->
			</div>
			Votre mail : <input type="text" name="mail" id="mail" placeholder="toto@exemple.com" class="FV_required FV_mail" /><br/>
			<button type="submit" class="send">Confirmer le suivi</button> ou 
			<button type="submit" class="see">Voir vos suivis</button>
		</form>
	</div>
	
	
	
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.7.js"%3E%3C/script%3E'))</script>
	
	<script src="js/utils.js"></script>
	<script src="js/form_verification.js"></script>
	
	<script>
		$(function(){
			$('#newForm form .send').click(function(){
				var quote_id_field = $('#newForm form #quote_id');
				var mail_field = $('#newForm form #mail');
				var sendForm = true;
				if(quote_id_field.val() == '' || quote_id_field.val() == null){
					alert(s_form_verification.field+' "'+quote_id_field.attr('placeholder')+'" '+s_form_verification.required);
					quote_id_field.addClass('FV_error');
					quote_id_field.next().addClass('FV_error');
					sendForm = false;
				}
				if(mail_field.val() == '' || mail_field.val() == null){
					alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.required);
					mail_field.addClass('FV_error');
					mail_field.next().addClass('FV_error');
					sendForm = false;
				}
				
				if(sendForm == true){
					var quote_id = quote_id_field.val();
					var mail = mail_field.val();
					if(quote_id != '' && mail != ''){
						sendSuiviQuote(quote_id, mail, meth);
					}
				}
				return false;
			});
			
			$('#newForm form .see').click(function(){
				var mail_field = $('#newForm form #mail');
				var sendForm = true;
				if(mail_field.val() == '' || mail_field.val() == null){
					alert(s_form_verification.field+' "'+mail_field.attr('placeholder')+'" '+s_form_verification.required);
					mail_field.addClass('FV_error');
					mail_field.next().addClass('FV_error');
					sendForm = false;
				}
				
				if(sendForm == true){
					var mail = mail_field.val();
					if(mail != ''){
						displaySuivis(mail, meth);
					}
				}
				return false;
			});
			
			
			
			function sendSuiviQuote(quote_id, mail, meth){
				if(meth == 'local'){
					var url = base_url+'suivi.php';
					$.post(url, { mail: mail, type: 'quote', id: quote_id, action: 'follow', key: api_key, noheaders: 1 },
					function(data) {
						successCall(jQuery.parseJSON(data), quote_id, mail);
					});
				}
				else{
					var url = base_url+'suivi.php?mail='+mail+'&type=quote&id='+quote_id+'&action=follow&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
					$.ajax({
						url: url,
						success: function(data) {
							successCall(data, quote_id, mail);
						},
						dataType: 'jsonp'
					});
				}
				
				function successCall(obj, quote_id, mail){
					if(obj != null && obj['status']['code'] == 200){
						displayInfo('success', "Votre suivi a été pris en compte.");
						$('#newForm').html('Votre demande de suivi a été prise en compte.<br/>La liste des éléments que vous suivez est ici : <a href="#" class="suivis">Vos suivis</a><br/><br/>Vous pouvez fermer cette fenêtre.');
						$('.suivis').click(function(){
							displaySuivis(mail, meth);
						});
						$('#newForm').css('margin', '30px');
					}
					else{
						var errno = '';
						if(obj != null){errno = ' ('+obj['status']['code']+') ';}
						
						displayInfo('error', 'Une erreur est survenue lors de l\'enregistrement du suivi'+errno);
					}
				}
				
				return false;
			}
			
			function displaySuivis(mail, meth){
				if(meth == 'local'){
					var url = base_url+'suivi.php';
					$.get(url, { mail: mail, key: api_key, noheaders: 1 },
					function(data) {
						successCall(jQuery.parseJSON(data));
					});
				}
				else{
					var url = base_url+'suivi.php?mail='+mail+'&key='+api_key+'&noheaders=1&format=jsonp&callback=?';
					$.ajax({
						url: url,
						success: function(data) {
							successCall(data);
						},
						dataType: 'jsonp'
					});
				}
				
				function successCall(obj){
					if(obj != null && obj['status']['code'] == 200){
						var page = 'L\'adresse "'+obj['response']['mail']+'" est abonnée à ces éléments :<ul>';
						if(obj['response']['suivis']['site'] != null){
							page += '<li>Mises a jour du site</li>';
						}
						if(obj['response']['suivis']['page'] != null){
							page += '<li>Pages :<ul>';
							for(var i=0; i<obj['response']['suivis']['page'].length; i++){
								page += '<li><a href="./page.php?id='+obj['response']['suivis']['page'][i]+'">page '+obj['response']['suivis']['page'][i]+'</a></li>';
							}
							page += '</ul></li>';
						}
						if(obj['response']['suivis']['quote'] != null){
							page += '<li>Propositions :<ul>';
							for(var i=0; i<obj['response']['suivis']['quote'].length; i++){
								page += '<li>proposition <a href="./quote.php?id='+obj['response']['suivis']['quote'][i]+'">#'+obj['response']['suivis']['quote'][i]+'</a></li>';
							}
							page += '</ul></li>';
						}
						if(obj['response']['suivis']['comment'] != null){
							page += '<li>Commentaires :<ul>';
							for(var i=0; i<obj['response']['suivis']['comment'].length; i++){
								page += '<li>commentaire '+obj['response']['suivis']['comment'][i]+'</li>';
							}
							page += '</ul></li>';
						}
						page += '</ul>';
						
						$('#newForm').html(page);
						$('#newForm').css('margin', '0px');
					}
					else if(obj != null && obj['status']['code'] == 404){
						$('#newForm').html('Vous ne suivez aucune proposition.');
						$('#newForm').css('margin', '30px');
						$('#newForm').css('margin-top', '40px');
					}
					else{
						var errno = '';
						if(obj != null){errno = ' ('+obj['status']['code']+') ';}
						
						displayInfo('error', 'Une erreur est survenue lors de la récupération de vos suivis'+errno);
					}
				}
			}
		});
	</script>
</body>
</html>