<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$p = isset($_GET['p']) ? $_GET['p'] : null;
	$category = isset($_GET['cat']) ? $_GET['cat'] : null;
	$selection = isset($_GET['sel']) ? $_GET['sel'] : null;
	$quoteids = isset($_GET['quoteids']) ? $_GET['quoteids'] : null;
	$type = isset($_GET['type']) ? $_GET['type'] : null;
	
		 if($type == 'top'		 	){$datas = array('key'=>$usr['key'],'list'=>'top',							'p'=>$p);	$title=' - Meilleures propositions';	$pagerLink = 'list.php?type=top&p=';}
	else if($type == 'lasts'	 	){$datas = array('key'=>$usr['key'],'list'=>'lasts',						'p'=>$p);	$title=' - Dernières propositions';		$pagerLink = 'list.php?type=lasts&p=';}
	else if($type == 'topcomment'	){$datas = array('key'=>$usr['key'],'list'=>'topcomment',					'p'=>$p);	$title=' - Les plus commentées';		$pagerLink = 'list.php?type=topcomment&p=';}
	else if($type == 'lastactivity'	){$datas = array('key'=>$usr['key'],'list'=>'lastactivity',					'p'=>$p);	$title=' - Les dernières activités';	$pagerLink = 'list.php?type=lastactivity&p=';}
	else if($type == 'category'	 	){$datas = array('key'=>$usr['key'],'list'=>'category','cat'=>$category,	'p'=>$p);	$title=' - Catégorie ';					$pagerLink = 'list.php?type=category&cat='.$category.'&p=';}
	else if($type == 'selection' 	){$datas = array('key'=>$usr['key'],'list'=>'selection','sel'=>$selection,	'p'=>$p);	$title=' - Sélection ';					$pagerLink = 'list.php?type=selection&sel='.$selection.'&p=';}
	else if($type == 'favoris'	 	){$datas = array('key'=>$usr['key'],'list'=>'custom','quoteids'=>$quoteids		   );	$title=' - Favoris';					}
	else if($type == 'custom'	 	){$datas = array('key'=>$usr['key'],'list'=>'custom','quoteids'=>$quoteids		   );	$title=' - Sélection';					}
	else{
		header('Location: 404.php');   
		exit;
	}
	
	$result = api_call('GET', $usr['api_url'].'quote_list.php', $datas);
?>

<?php 
	if($type == 'category'){
		$cat_name = isset($result['response']['category_name']) ? $result['response']['category_name'] : null;
		$cat_id = isset($result['response']['category_id']) ? $result['response']['category_id'] : null;
		$title .= $cat_name;
	}
	else if($type == 'selection'){
		$sel_name = isset($result['response']['selection_name']) ? $result['response']['selection_name'] : null;
		$sel_id = isset($result['response']['selection_id']) ? $result['response']['selection_id'] : null;
		$title .= $sel_name;
	}
	
	echo generateHead($title, $jsEnv); 
?>
<body>
	<?php echo generateHeader(); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				if($type == 'category'){ 		echo "<div class=\"category_disclaimer\">categorie : ".str_replace('é', 'e', $cat_name)."</div>"; }
				else if($type == 'selection'){ 	echo "<br/>sélection no <span class=\"sel_id\">".$sel_id."</span> : ".$sel_name."<br/>"; }
				else if($type == 'custom'){ 	echo generateSelectionForm($usr); }
				
				if($type == 'selection'){	$quote_style = 'selection';}
				else{						$quote_style = '';}
				
				$quotes = isset($result['response']['quotes']) ? $result['response']['quotes'] : null;
				
				if($quotes != null){
					foreach($quotes as $key => $quote){
						echo generateQuoteBlock($quote, $quote_style);
					}
				}
				
				if($type != 'favoris' && $type != 'custom'){
					$total_quote_pages = isset($result['response']['total_quote_pages']) ? $result['response']['total_quote_pages'] : null;
					$current_quote_page = isset($result['response']['current_quote_page']) ? $result['response']['current_quote_page'] : null;
					if($total_quote_pages > 1){
						echo generateQuotePager($total_quote_pages, $current_quote_page, $pagerLink);
					}
				}
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	
	<?php 
		if($type == 'custom'){
			// TODO : gérer la liste des possibilités de nom de sélection : cf local_selection.php
		}
	?>
	
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>
