<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$params = null;
	$params['list'] = 'custom';
	$params['quoteids'] = isset($_GET['quoteids']) ? $_GET['quoteids'] : null;
	$params['noheaders'] = 1;
	$json = apiGetQuoteListByCustom($usr, $params, $server_path);
	$result = json_decode($json, true);
	$status_code = isset($result['status']['code']) ? $result['status']['code'] : null;
	if($status_code != 200){
		header('Location: 404.php');   
		exit;
	}
	
	// TODO : faire une boucle while pour récupérer toutes les sélections et non pas juste la première page...
	$params = null;
	$params['noheaders'] = 1;
	$selections_json = apiGetSelections($usr, $params, $server_path);
	$selections = json_decode($selections_json, true);
	if(isset($selections['response']['selections'])){
		$sel = null;
		$ind = 0;
		foreach($selections['response']['selections'] as $key => $value){
			$sel[$ind]['id'] = $value['id'];
			$sel[$ind]['name'] = $value['name'];
			$ind++;
		}
	}
?>

<?php echo generateHead(' - Sélection', $jsEnv); ?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				if(isset($_GET['fav']) && $_GET['fav'] == 1){} 					// page des favoris
				else{echo generateSelectionForm($usr, $server_path, null);} 	// page de la sélection locale
				
				$quotes = isset($result['response']['quotes']) ? $result['response']['quotes'] : null;
				
				if($quotes != null){
					foreach($quotes as $key => $quote){
						echo generateQuoteBlock($quote);
					}
				}
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	
	<!--
	TODO : ajouter le FV_valinarray dans form_verification.js
		Le tableau serait mis au format json dans un attribut data-array du champ par exemple...
	<script>
		$(function(){
			var sel = new Array();
			<?php
				if($sel != null){
					foreach($sel as $key => $value){
						echo '
						sel['.$key.'] = "'.$value['name'].'";';
					}
				}
			?>
			
			function setErrorClass(input, sel){
				if(in_array(sel, input.val()) == true){
					input.addClass('FV_error');
					input.next().addClass('FV_error');
				}
				else{
					input.removeClass('FV_error');
					input.next().removeClass('FV_error');
				}
			}
			
			$('#new_selection form input[name="name"]').focus(function(){
				$(this).keyup(function(event){
					setErrorClass($(this), sel);
				});
				$(this).keydown(function(event){
					setErrorClass($(this), sel);
				});
			});
			
			$('#new_selection form').submit(function(){
				var newSel = $(this).find('input[name="name"]').val();
				if(newSel != '' && newSel.length < $(this).find('input[name="name"]').attr('maxsize') && in_array(sel, $(this).find('input[name="name"]').val()) == false){
					
				}
				else{
					if(in_array(sel, $(this).find('input[name="name"]').val()) == true){
						alert("Cette sélection existe déjà !");
					}
				}
				return false;
			});
		});
	</script>
	-->
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>