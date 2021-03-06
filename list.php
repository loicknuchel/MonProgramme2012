<?php
	$rel_to_root = './';
	include $rel_to_root.'inc/server_link.php';
	
	$p = isset($_GET['p']) ? $_GET['p'] : null;
	$category = isset($_GET['cat']) ? $_GET['cat'] : null;
	$selection = isset($_GET['sel']) ? $_GET['sel'] : null;
	$quoteids = isset($_GET['quoteids']) ? $_GET['quoteids'] : null;
	$type = isset($_GET['type']) ? $_GET['type'] : null;
	
		 if($type == 'top'		 	){$datas = array('key'=>$usr['key'],'list'=>'top',							'p'=>$p, 'selections'=>1);	$title='Meilleures propositions';	$pagerLink = 'list.php?type=top&p=';}
	else if($type == 'lasts'	 	){$datas = array('key'=>$usr['key'],'list'=>'lasts',						'p'=>$p, 'selections'=>1);	$title='Dernières propositions';	$pagerLink = 'list.php?type=lasts&p=';}
	else if($type == 'topcomment'	){$datas = array('key'=>$usr['key'],'list'=>'topcomment',					'p'=>$p, 'selections'=>1);	$title='Les plus commentées';		$pagerLink = 'list.php?type=topcomment&p=';}
	else if($type == 'lastactivity'	){$datas = array('key'=>$usr['key'],'list'=>'lastactivity',					'p'=>$p, 'selections'=>1);	$title='Les dernières activités';	$pagerLink = 'list.php?type=lastactivity&p=';}
	else if($type == 'category'	 	){$datas = array('key'=>$usr['key'],'list'=>'category','cat'=>$category,	'p'=>$p, 'selections'=>1);	$title='Sujet : ';					$pagerLink = 'list.php?type=category&cat='.$category.'&p=';}
	else if($type == 'selection' 	){$datas = array('key'=>$usr['key'],'list'=>'selection','sel'=>$selection,	'p'=>$p, 'selections'=>1);	$title='Programme de ';				$pagerLink = 'list.php?type=selection&sel='.$selection.'&p=';}
	else if($type == 'favoris'	 	){$datas = array('key'=>$usr['key'],'list'=>'custom','quoteids'=>$quoteids		   , 'selections'=>1);	$title='Favoris';					}
	else if($type == 'selected'	 	){$datas = array('key'=>$usr['key'],'list'=>'custom','quoteids'=>$quoteids		   , 'selections'=>1);	$title='Sélection';					}
	else{
		header('Location: 404.php');   
		exit;
	}
	
	$result = api_call('GET', $usr['api_url'].'quote_list.php', $datas, true);
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
	
	$page_title = isset($p) ? ' | p'.$p : '';
	echo generateHead($title.$page_title, $jsEnv); 
?>
<body>
	<?php echo generateHeader($usr); ?>
	
	<div id="main">
		<div class="wrapper">
			<?php
				if($type == 'category'			){ 	echo "<div class=\"category_disclaimer\">Sujet : ".str_replace('é', 'e', $cat_name)."</div>"; }
				else if($type == 'selection'	){ 	echo "<div class=\"category_disclaimer\"><span class=\"sel_id\" style=\"display: none;\">".$sel_id."</span> Programme de ".str_replace('é', 'e', $sel_name)."</div>"; }
				else if($type == 'selected'		){ 	echo '<div id="quotelist_selected">'; echo generateSelectionForm($usr); }
				else if($type == 'top'			){ 	echo "<div class=\"category_disclaimer\">Propositions les plus populaires</div>"; }
				else if($type == 'lasts'		){ 	echo "<div class=\"category_disclaimer\">Les dernieres propositions</div>"; }
				else if($type == 'topcomment'	){ 	echo "<div class=\"category_disclaimer\">Propositions les plus commentees</div>"; }
				else if($type == 'lastactivity'	){	echo "<div class=\"category_disclaimer\">Propositions avec une activite recente</div>"; }
				else if($type == 'favoris'		){ 	echo "<div class=\"category_disclaimer\">Propositions dans les favoris</div>"; }
				
				
				if($type == 'selection'){	$quote_style = 'selection';}
				else{						$quote_style = '';}
				
				$quotes = isset($result['response']['quotes']) ? $result['response']['quotes'] : null;
				
				if($quotes != null){
					foreach($quotes as $key => $quote){
						echo generateQuoteBlock($quote, $quote_style);
					}
				}
				
				if($type != 'favoris' && $type != 'selected'){
					$total_quote_pages = isset($result['response']['total_quote_pages']) ? $result['response']['total_quote_pages'] : null;
					$current_quote_page = isset($result['response']['current_quote_page']) ? $result['response']['current_quote_page'] : null;
					if($total_quote_pages > 1){
						echo generateQuotePager($total_quote_pages, $current_quote_page, $pagerLink);
					}
				}
				
				
				if($type == 'selection'){
					$commentResult = sendCommentForm($usr);
					
					$result = api_call('GET', $usr['api_url'].'comment.php', array('key'=>$usr['key'],'type'=>'selection','id'=>$sel_id,'p'=>isset($_GET['pc']) ? $_GET['pc'] : null));
					$comments = isset($result['response']['comments']) ? $result['response']['comments'] : null;
					
					if($result['response']['nbcomments'] > 0){
						$total_comment_pages = isset($result['response']['total_comment_pages']) ? $result['response']['total_comment_pages'] : null;
						$current_comment_page = isset($result['response']['current_comment_page']) ? $result['response']['current_comment_page'] : null;
						
						if($total_comment_pages > 1){
							echo generateCommentPager($total_comment_pages, $current_comment_page, 'list.php?type=selection&sel='.$selection.'&p='.$p.'&pc=', '#comment_block');
						}
						echo generateCommentsBlock($comments, $rel_to_root);
						if($total_comment_pages > 1){
							echo generateCommentPager($total_comment_pages, $current_comment_page, 'list.php?type=selection&sel='.$selection.'&p='.$p.'&pc=', '#comment_block');
						}
					}
					
					$lastPage = isset($total_comment_pages) ? $total_comment_pages+1 : 1;
					echo generateCommentForm($usr, $commentResult, 'list.php?type=selection&sel='.$selection.'&p='.$p.'&pc=', '#comment_block', 'selection', $sel_id);
				}
				
				
				if($type == 'selected'){ echo '</div>'; }
			?>
		</div>
	</div>
	
	<?php echo generateFooter(); ?>
	
	<?php echo generateScriptsJs(); ?>
	
	<?php 
		include $rel_to_root.'fragments/endPage.php';
		echo generateEndPage(); 
	?>
</body>
</html>
