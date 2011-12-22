<?php
	$rel_to_root = '../';
	include $rel_to_root.'inc/server_link.php';
	
	// TODO : faire une boucle while pour récupérer toutes les catégories et non pas juste la première page...
	$categories = api_call('GET', $usr['api_url'].'category.php', array('key'=>$usr['key']), false);
	$cat = null;
	if(isset($categories['response']['categories'])){
		$ind = 0;
		foreach($categories['response']['categories'] as $key => $value){
			$cat[$ind]['id'] = $value['id'];
			$cat[$ind]['name'] = $value['name'];
			$ind++;
		}
	}
	
	$app_params = api_call('GET', $usr['api_url'].'params.php', array('key'=>$usr['key']), false);
	$app = null;
	$app['params']['size']['category'] = isset($app_params['response']['textMaxSize']['category']) ? $app_params['response']['textMaxSize']['category'] : null;
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
		Nom du nouveau sujet :<br/>
		<form>
			<input class="FV_length FV_required" type="text" name="category" placeholder="Votre sujet" maxsize="<?php echo $app['params']['size']['category']; ?>" /><br/>
			<button type="submit">Ajouter sujet</button>
		</form>
	</div>
	
	
	<!--
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	
	<script src="js/utils.js"></script>
	<script src="js/form_verification.js"></script>-->
			
	<script>
		$(function(){
			FV_Form_Verification('#newForm ');
			
			var cat = new Array();
			<?php
				if(isset($cat) && $cat != null){
					foreach($cat as $key => $value){
						echo '
						cat['.$key.'] = "'.$value['name'].'";';
					}
				}
			?>
			
			function setErrorClass(input, cat){
				if(in_array(cat, input.val()) == true){
					input.addClass('FV_error');
					input.next().addClass('FV_error');
				}
				else{
					input.removeClass('FV_error');
					input.next().removeClass('FV_error');
				}
			}
			$('#newForm form input[name="category"]').focus(function(){
				$(this).keyup(function(event){
					setErrorClass($(this), cat);
				});
				$(this).keydown(function(event){
					setErrorClass($(this), cat);
				});
			});
			
			$('#newForm form').submit(function(){
				var newCat = $(this).find('input[name="category"]').val();
				if(newCat != '' && newCat.length < <?php echo $app['params']['size']['category']; ?> && in_array(cat, newCat) == false){
					sendNewCategory(newCat, meth);
				}
				else{
					if(in_array(cat, newCat) == true){
						alert("Ce sujet existe déjà !");
					}
				}
				return false;
			});
			
			
			function sendNewCategory(category_name, meth){
				if(meth == 'local'){
					var url = base_url+'category.php';
					$.post(url, { cat: category_name, key: api_key, noheaders: 1 },
					function(data) {
						successCall(jQuery.parseJSON(data), category_name);
					});
				}
				else{
					var url = base_url+'category.php?cat='+category_name+'&key='+api_key+'&noheaders=1&meth=post&format=jsonp&callback=?';
					$.ajax({
						url: url,
						success: function(data) {
							successCall(data, category_name);
						},
						dataType: 'jsonp'
					});
				}
				
				function successCall(data, category_name){
					obj = data;
					if(obj != null && obj['status']['code'] == 200){
						displayInfo('info', "Sujet créé.");
						successAddCategory(obj['response']['id'], category_name);
					}
					else{
						var errno = '';
						if(obj != null){errno = '('+obj['status']['code']+') ';}
						
						displayInfo('error', "Une erreur "+errno+"est survenue lors de l'ajout du sujet.");
					}
				}
				
				function successAddCategory(category_id, category_name){
					$('.new_quote form .important_data select').html($('.new_quote form .important_data select').html() + '<option value="'+category_id+'">'+category_name+'</option>');
					$('.new_quote form .important_data select').val(category_id);
					$('#newForm').html('Le sujet a bien été ajouté.<br/>Vous pouvez fermer cette popup.');
					$('#newForm').css('margin-top', '25px');
				}
				
				return false;
			}
		});
	</script>
</body>
</html>