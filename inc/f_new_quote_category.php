<?php
	$rel_to_root = '../';
	include './server_link.php';
	
	$quote_id = isset($_GET['quote_id']) ? $_GET['quote_id'] : 0;
	
	// TODO : faire une boucle while pour récupérer toutes les catégories et non pas juste la première page...
	$params = null;
	$params['noheaders'] = 1;
	$categories_json = apiGetCategories($usr, $params, $server_path);
	$categories = json_decode($categories_json, true);
	if(isset($categories['response']['categories'])){
		$cat = null;
		$ind = 0;
		foreach($categories['response']['categories'] as $key => $value){
			$cat[$ind]['id'] = $value['id'];
			$cat[$ind]['name'] = $value['name'];
			$ind++;
		}
	}
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
	</style>
</head>
<body>
	<div class="text" id="newForm">
		Proposez le sujet qui vous semble le plus convenir à la proposition #<?php echo $quote_id; ?> :
		<form>
			<input type="hidden" name="quote_id" value="<?php echo $quote_id; ?>" />
			<select name="category" placeholder="catégorie" class="FV_required" style="margin-top: 20px;">
				<option></option>
				<?php
					if($cat != null){
						foreach($cat as $key => $value){
							echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
						}
					}
				?>
			</select>
			<span><!-- next : pour prendre le FV_error en cas de non sélection... --></span>
			<button type="submit" class="styled_button grey" style="margin-left: 20px; margin-top: 20px;">Valider sujet</button>
		</form>
	</div>
	
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	
	<script src="js/utils.js"></script>
	<script src="js/form_verification.js"></script>
	
	<script>
		$(function(){
			FV_Form_Verification('#newForm ');
			
			var cat = new Array();
			<?php
				if($cat != null){
					foreach($cat as $key => $value){
						echo '
						cat['.$key.'] = '.$value['id'].';';
					}
				}
			?>
			
			$('#newForm form').submit(function(){
				var updateCat = $(this).find('select').val();
				if(updateCat != '' && in_array(cat, updateCat) == true){
					sendUpdateCategory(<?php echo $quote_id; ?>, updateCat, meth);
				}
				else{
					alert('error\nin_array: '+in_array(cat, updateCat));
				}
				return false;
			});
			
			
			function sendUpdateCategory(quote_id, category_id, meth){
				alert('quote_id: '+quote_id+'\ncategory_id: '+category_id+'\nmeth: '+meth);
				if(meth == 'local'){
					var url = base_url+'quote.php';
					$.post(url, { quoteid: quote_id, cat: category_id, key: api_key, noheaders: 1 },
					function(data) {
						alert('toto');
						// successCall(jQuery.parseJSON(data), quote_id, category_id);
					});
				}
				else{
					var url = base_url+'quote.php?quoteid='+quote_id+'&cat='+category_id+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
					alert(url);
					$.ajax({
						url: url,
						success: function(data) {
							alert('toto');
							// alert(data['status']['code']);
							// successCall(data, quote_id, category_id);
						},
						dataType: 'jsonp'
					});
				}
				
				function successCall(data, quote_id, category_id){
					obj = data;
					if(obj != null && obj['status']['code'] == 200){
						if(category_id == obj['response']['category']['id']){
							displayInfo('info', "Votre sujet est maintenant celui de la proposition.");
							successUpdateCategory(quote_id, obj['response']['category']['id'], obj['response']['category']['name']);
						}
						else{
							displayInfo('info', "Votre sujet a bien été pris en comtpe.");
						}
					}
					else{
						var errno = '';
						if(obj != null){errno = '('+obj['status']['code']+') ';}
						
						displayInfo('error', "Une erreur "+errno+"est survenue lors de la mise à jour du sujet.");
					}
				}
				
				function successUpdateCategory(quote_id, category_id, category_name){
					var html_quote = $('.quote.'+quote_id+'');
					html_quote.css('background', 'red');
					html_quote.find('.quote_block .quote_meta .quote_actions .category').html('<a href="category.php?cat='+category_id+'">'+category_name+'</a>');
					/*$('.new_quote form .important_data select').html($('.new_quote form .important_data select').html() + '<option value="'+category_id+'">'+category_name+'</option>');
					$('.new_quote form .important_data select').val(category_id);*/
					$('#newForm').html('Le sujet a bien été pris en compte.<br/>Vous pouvez fermer cette popup.');
					$('#newForm').css('margin-top', '25px');
				}
				
				return false;
			}
		});
	</script>
</body>
</html>