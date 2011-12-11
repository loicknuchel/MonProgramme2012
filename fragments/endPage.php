<?php

function generateEndPage(){
	$html = '<!-- Piwik --> 
<script type="text/javascript">
	var pkBaseURL = (("https:" == document.location.protocol) ? "https://monprogramme2012.lkws.fr/piwik_1.6/" : "http://monprogramme2012.lkws.fr/piwik_1.6/");
	document.write(unescape("%3Cscript src=\'" + pkBaseURL + "piwik.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
		piwikTracker.trackPageView();
		piwikTracker.enableLinkTracking();
	} catch( err ) {}
</script>
<noscript>
	<p><img src="http://monprogramme2012.lkws.fr/piwik_1.6/piwik.php?idsite=1" style="border:0" alt="" /></p>
</noscript>
<!-- End Piwik Tracking Code -->';
	return $html;
}
?>