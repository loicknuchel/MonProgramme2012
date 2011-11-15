<?php

function generateScriptsJs($rel_to_root = './'){
	$html = '
	<div id="contactable" class="FV_contactable"></div>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape(\'%3Cscript src="'.$rel_to_root.'js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E\'))</script>
	
	<script src="'.$rel_to_root.'js/libs/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="'.$rel_to_root.'js/libs/contactable.1.3/jquery.validate.pack.js"></script>
	<script src="'.$rel_to_root.'js/libs/contactable.1.3/jquery.contactable.js"></script>
	
	<script src="'.$rel_to_root.'js/fancybox.js"></script>
	<script src="'.$rel_to_root.'js/contactable.js"></script>
	
	<script src="'.$rel_to_root.'js/utils.js"></script>
	<script src="'.$rel_to_root.'js/form_verification.js"></script>
	<script src="'.$rel_to_root.'js/forms.js"></script>
	<script src="'.$rel_to_root.'js/menu.js"></script>
	<script src="'.$rel_to_root.'js/quote.js"></script>
	<script src="'.$rel_to_root.'js/comment.js"></script>
	<script src="'.$rel_to_root.'js/selection.js"></script>
	<script src="'.$rel_to_root.'js/script.js"></script>
	
	<!--[if lt IE 7 ]>
	<script src="'.$rel_to_root.'js/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix(\'img, .png_bg\');</script>
	<![endif]-->';
	return $html;
}

?>