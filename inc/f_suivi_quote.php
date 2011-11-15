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
			Suivre la proposition #<input type="text" name="quote_id" id="quote_id" placeholder="id" class="FV_required" /> et recevoir une notification par mail pour :<br/>
			<div class="elts">
				<input type="checkbox" name="new_comments" id="new_comments" checked="checked" /><label for="new_comments">les nouveaux commentaires</label><br/>
				<!--<input type="checkbox" name="new_votes" id="new_votes" /><label for="new_votes">les nouveaux votes</label><br/>
				<input type="checkbox" name="new_reports" id="new_reports" /><label for="new_reports">les nouveaux signalements</label><br/> height: 25px à ajouter par ligne sur la fancybox... -->
			</div>
			Votre mail : <input type="text" name="mail" id="mail" placeholder="toto@exemple.com" class="FV_required FV_mail" /><br/>
			<button type="submit" class="styled_button grey">Confirmer suivi</button>
		</form>
	</div>
	
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	
	<script src="js/utils.js"></script>
	<script src="js/form_verification.js"></script>
	
	<script>
		$(function(){
			FV_Form_Verification('#newForm ');
			
			$('#newForm form').submit(function(){
				var quote_id = $(this).find('#quote_id').val();
				var mail = $(this).find('#mail').val();
				if($(this).find('#new_comments').attr('checked') == true){var new_coms = 1;}
				else{var new_coms = 0;}
				if(quote_id != '' && mail != ''){
					sendSuivi(quote_id, mail, new_coms, meth);
				}
				return false;
			});
			
			
			function sendSuivi(quote_id, mail, new_coms, meth){
				if(meth == 'local'){
					var url = base_url+'suivi.php';
					$.post(url, { quoteid: quote_id, mail: mail, newcomments: new_coms, key: api_key, noheaders: 1 },
					function(data) {
						successCall(jQuery.parseJSON(data), quote_id, mail, new_coms);
					});
				}
				else{
					var url = base_url+'suivi.php?quoteid='+quote_id+'&mail='+mail+'&newcomments='+new_coms+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
					$.ajax({
						url: url,
						success: function(data) {
							successCall(data, quote_id, mail, new_coms);
						},
						dataType: 'jsonp'
					});
				}
				
				function successCall(obj, quote_id, mail, new_coms){
					if(obj != null && obj['status']['code'] == 200){
						displayInfo('info', "Votre suivi a été pris en compte.");
						if(new_coms == 1){ var phrase = 'Votre demande de suivi a été prise en compte.'; }
						else{ var phrase = 'Votre demande d\'arrêt de suivi a été prise en compte.'; }
						$('#newForm').html(phrase+'<br/>La liste des propositions que vous suivez est ici : <a href="#" class="suivis">Vos suivis</a><br/><br/>Vous pouvez fermer cette fenêtre.');
						$('.suivis').click(function(){
							displaySuivis(mail);
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
			
			function displaySuivis(mail){
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
						var page = 'L\'adresse "'+obj['response']['mail']+'" est abonnée aux propositions :<ul>';
						for(var i=0; i<obj['response']['suivis'].length; i++){
							page += '<li>proposition <a href="./quote.php?id='+obj['response']['suivis'][i]['quote_id']+'">#'+obj['response']['suivis'][i]['quote_id']+'</a></li>';
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