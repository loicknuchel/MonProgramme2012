<?php

function generateFooter($rel_to_root = './'){
	$html = '<div id="footerWrapper">
				<div id="footer">
					<form id="formMailList" action="" method="post">
						<fieldset>
							<legend>Suivi d\'activité</legend>
							<div>Restez informés des dernières réformes proposées</div>
							<label for="formMailListEmail">Entrez votre adresse mail</label>
							<input type="text" id="formMailListEmail" name="cm-nnfd-nnfd" placeholder="Entrez votre adresse mail">
							<input type="submit" id="formMailListSubmit" name="submit" value="Submit">
						</fieldset>
					</form>
					<dl class="first">
						<dt>Actions citoyennes</dt>
						<dd><a target="_blanck" href="http://www.nosdeputes.fr/" title="Recensement des députés et de leurs activités parlementaires.">Nos Députés</a></dd>
						<dd><a target="_blanck" href="http://www.nossenateurs.fr/" title="Recensement des sénateurs et de leurs activités.">Nos Sénateurs</a></dd>
						<dd><a target="_blanck" href="http://memopol2.lqdn.fr/" title="Recensement des députés européens et de leurs activités.">Political Memory</a></dd>
						<dd><a target="_blanck" href="http://politique.slate.fr/" title="Annuaire des personnalités qui feront les élections en 2012.">Wikipol</a></dd>
						<dd><a target="_blanck" href="http://www.2012memepaspeur.net/" title="Un site \'je veux\'/\'je ne veux pas\' sur les élections 2012.">2012 même pas peur !</a></dd>
						<!--
						<dd><a target="_blanck" href="http://www.regardscitoyens.org/" title="Association ayant pour but de regrouper des informations sur nos institutions.">Regards Citoyens</a></dd>
						<dd><a target="_blanck" href="http://mon-depute.fr/" title="Informations sur les députés">Mon Député</a></dd>
						<dd><a target="_blanck" href="http://politiko.fr/" title="Site de débat sur la primaire du PS">Politiko</a></dd>
						-->
						<dd>...</dd>
						<dd><a href="'.$rel_to_root.'info/actions.php">Et beaucoup d\'autres</a></dd>
					</dl>
					<dl class="tight">
						<dt>Penseurs</dt>
						<dd><a target="_blanck" href="http://tvbruits.org/spip.php?article981" title="Militant pour l\'éducation populaire. Conférences gesticulées sur la culture.">Franck Lepage</a></dd>
						<dd><a target="_blanck" href="http://etienne.chouard.free.fr/Europe/tirage_au_sort.php" title="Penseur de la démocratie et de nos institutions. Parle aussi de création monétaire et de tirage au sort.">Etienne Chouard</a></dd>
						<dd><a target="_blanck" href="http://www.youtube.com/watch?v=PuZgkL5BEBk" title="Présentation des nouvelles monnaies et de l\'importance de la création monétaire.">Jean-François Noubel</a></dd>
						<dd><a target="_blanck" href="http://www.dailymotion.com/video/xh1foy_conference-bernard-friot-de-l-emploi-a-la-qualification_news" title="Discussions sur la retraite, l\'investissement et l\'économie.">Bernard Friot</a></dd>
						<dd><a target="_blanck" href="http://www.dailymotion.com/video/x5njza_le-choix-de-la-defaite-annie-lacroi_news" title="Historienne">Annie Lacroix-Riz</a></dd>
					</dl>
					<dl class="tight">
						<dt>Journaux</dt>
						<dd><a target="_blanck" href="http://reflets.info/" title="Site d\'informations créé par des \'geeks\'.">Reflets.info</a></dd>
						<dd><a target="_blanck" href="http://bugbrother.blog.lemonde.fr" title="Blog sur la surveillance et la répression.">Bug Brother</a></dd>
						<dd><a target="_blanck" href="http://owni.fr/" title="Site journalistique de qualité sur le numérique.">Owni</a></dd>
						<dd><a target="_blanck" href="http://www.slate.fr/" title="Site journalistique généraliste et de qualité.">Slate</a></dd>
						<dd><a target="_blanck" href="http://actualutte.info/" title="Site d\'actualités">Actualutte</a></dd>
					</dl>
					<dl class="last">
						<dt>Plus d\'informations</dt>
						<!--
						<dd><a href="faq.php">FAQ</a></dd>
						<dd><a href="http://quotes.lkws.fr/api/1.0/doc/api_architecture.txt">API doc</a></dd>
						-->
						<dd><a href="'.$rel_to_root.'info/projet.php">Objectifs du site</a></dd>
						<dd class="deep"><a href="'.$rel_to_root.'info/faq.php">FAQ</a></dd>
						<dt>Sites de citations</dt>
						<dd><a target="_blanck" href="http://pourquoijevoteoupas.eu/">Pourquoi Je Vote Ou Pas</a></dd>
						<dd><a target="_blanck" href="http://pourquoijepirate.fr/">Pourquoi Je Pirate</a></dd>
						<dd><a target="_blanck" href="http://www.paspeurdhadopi.fr/">Pas Peur D\'HADOPI</a></dd>
					</dl>
					<div id="footerSub">
						<p>
							<a href="#" class="footer_link">Proposer un nouveau lien pour le pied de page</a>
						</p>
						<h3>
							<a href="http://twitter.com/share" 
								class="twitter-share-button" 
								data-text="#mp2012 Construisez et partagez votre programme électoral 2012" 
								data-count="horizontal" 
								data-via="monprogramme" 
								data-url="http://monprogramme2012.lkws.fr/" 
								data-lang="fr">Tweeter</a>
							<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
							
							<a href="https://twitter.com/monprogramme" 
								class="twitter-follow-button" 
								data-show-count="false" 
								data-lang="fr">Suivre @monprogramme</a>
							<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
						</h3>
					</div>
				</div><!--end footer-->
			</div>';
	
	return $html;
}

/* initial footer
*************************************************************************************************************************************************
****************************************************************** HTML FOOTER ******************************************************************
************************************************************ DESIGN du site au début ************************************************************
*************************************************************************************************************************************************
$html = '<div id="footer">
		<div id="footer-pat">
			<div id="header-end">
				<div id="footer-top"></div>
			</div>
			<div id="footer-bot">
				<ul>
					<li>
						<ul>
							<li>Initiatives citoyennes :</li>
							<li><a target="_blanck" href="http://www.2012memepaspeur.net/" title="Un site \'je veux\'/\'je ne veux pas\' sur les élections 2012.">2012 même pas peur !</a></li>
							<li><a target="_blanck" href="http://politiko.fr/" title="Site de débat sur la primaire du PS">Politiko</a></li>
							<li><a target="_blanck" href="http://www.regardscitoyens.org/" title="Association ayant pour but de regrouper des informations sur nos institutions.">Regards Citoyens</a></li>
							<li><a target="_blanck" href="http://www.nosdeputes.fr/" title="Recensement des députés et de leurs activités.">Nos Députés</a></li>
							<li><a target="_blanck" href="http://memopol2.lqdn.fr/" title="Recensement des députés européens et de leurs activités.">Political Memory</a></li>
							<li><a target="_blanck" href="http://politique.slate.fr/" title="Annuaire des personnalités qui feront les élections en 2012.">Wikipol</a></li>
						</ul>
					</li>
					<li>
						<ul>
							<li>Réflexions :</li>
							<li><a target="_blanck" href="http://tvbruits.org/spip.php?article981" title="Militant pour l\'éducation populaire. Conférences gesticulées sur la culture.">Franck Lepage</a></li>
							<li><a target="_blanck" href="http://etienne.chouard.free.fr/Europe/tirage_au_sort.php" title="Penseur de la démocratie et de nos institutions. Parle aussi de création monétaire et de tirage au sort.">Etienne Chouard</a></li>
							<li><a target="_blanck" href="http://www.youtube.com/watch?v=PuZgkL5BEBk" title="Présentation des nouvelles monnaies et de l\'importance de la création monétaire.">Jean-François Noubel</a></li>
							<li><a target="_blanck" href="http://www.dailymotion.com/video/xh1foy_conference-bernard-friot-de-l-emploi-a-la-qualification_news" title="Discussions sur la retraite, l\'investissement et l\'économie.">Bernard Friot</a></li>
							<li><a target="_blanck" href="http://www.dailymotion.com/video/x5njza_le-choix-de-la-defaite-annie-lacroi_news" title="Historienne">Annie Lacroix-Riz</a></li>
						</ul>
					</li>
					<li>
						<ul>
							<li>Sites journalistiques :</li>
							<li><a target="_blanck" href="http://reflets.info/" title="Site d\'informations créé par des \'geeks\'.">Reflets.info</a></li>
							<li><a target="_blanck" href="http://actualutte.info/" title="Site d\'actualités">Actualutte</a></li>
							<li><a target="_blanck" href="http://owni.fr/" title="Site journalistique de qualité sur le numérique.">Owni</a></li>
							<li><a target="_blanck" href="http://bugbrother.blog.lemonde.fr" title="Blog sur la surveillance et la répression.">Bug Brother</a></li>
							<li><a target="_blanck" href="http://www.slate.fr/" title="Site journalistique généraliste et de qualité.">Slate</a></li>
						</ul>
					</li>
					<!--<li>
						<ul>
							<li><a target="_blanck" href="http://pourquoijepirate.fr/">Pourquoi Je Pirate</a></li>
							<li><a target="_blanck" href="http://www.paspeurdhadopi.fr/">Pas Peur D\'HADOPI</a></li>
						</ul>
					</li>-->
					<!--<li>
						<ul>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="http://quotes.lkws.fr/api/1.0/doc/api_architecture.txt">API doc</a></li>
							<li><a href="http://quotes.lkws.fr/docs/TODO.txt">TODO</a></li>
							<li><a href="http://quotes.lkws.fr/docs/sites_connexes.txt">sites amis</a></li>
							
						</ul>
					</li>-->
					<li>
						<a href="http://twitter.com/share" 
							class="twitter-share-button" 
							data-text="#mp2012 Construisez et partagez votre programme électoral 2012" 
							data-count="vertical" 
							data-via="monprogramme" 
							data-url="http://monprogramme2012.lkws.fr/" 
							data-lang="fr">Tweeter</a>
						<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
					</li>
				</ul>
				<div class="clearfix"></div>
				<br/><br/>
				<a href="#" class="footer_link">Proposer un nouveau lien pour le pied de page</a>
			</div>
		</div>
	</div>';

*************************************************************************************************************************************************
****************************************************************** CSS FOOTER  ******************************************************************
*************************************************************************************************************************************************
#footer {
	background-color: #1DCAC0;
	margin-top: 30px;
}
#footer-pat {
	background: url('./img/footer/texture.png') top left repeat;
}
#header-end {
	position: relative;
	width: 100%;
	overflow: hidden;
}
#footer-top {
	background: url('./img/footer/footer-top.png') top left repeat-x;
	width: 100%;
	height: 18px;
}
#footer-bot {
	height: 300px;
	width: 820px;
	padding: 20px 0px 20px 0px;
	margin: auto;
}
#footer-bot ul {
	margin: 0px;
	padding: 0px;
}
#footer-bot ul li {
	float: left;
	list-style-type: none;
	margin: 0px;
	padding: 0px;
}
#footer-bot ul li ul {
	margin: 0px 30px;
	padding: 0px;
}
#footer-bot ul li ul a {
	color: #C10000;
	text-decoration: none;
	font-size: 14px;
	line-height: 22px;
}
#footer-bot ul li ul a:hover {
	text-decoration: underline;
}
#footer-bot ul li ul:first-child {
	line-height: 30px;
}
#footer-bot ul li ul li {
	float: none;
	border: none;
	list-style-type:circle;
	list-style-position:inside;
}
#footer-bot ul li ul li:first-child{
	list-style-type:none;
}
*/


/* http://www.proxgo.com/ sample footer
*************************************************************************************************************************************************
****************************************************************** HTML FOOTER ******************************************************************
****************************************************** DESIGN FROM http://www.proxgo.com/  ******************************************************
*************************************************************************************************************************************************
$html = '<div id="footerWrapper">
				<div id="footer">
					<form id="formMailList" action="" method="post">
						<fieldset>
							<legend>Email Sign-up</legend>
							<div>Stay up-to-date with the latest products and announcements from XGO.</div>
							<label for="formMailListEmail">Enter Email Address</label>
							<input type="text" id="formMailListEmail" name="cm-nnfd-nnfd" placeholder="Enter Email Address">
							<input type="submit" id="formMailListSubmit" name="submit" value="Submit">
						</fieldset>
					</form>
					<dl class="first">
						<dt>Actions citoyennes</dt>
						<dd><a target="_blanck" href="http://www.nosdeputes.fr/" title="Recensement des députés et de leurs activités parlementaires.">Nos Députés</a></dd>
						<dd><a target="_blanck" href="http://www.nossenateurs.fr/" title="Recensement des sénateurs et de leurs activités.">Nos Sénateurs</a></dd>
						<dd><a target="_blanck" href="http://www.regardscitoyens.org/" title="Association ayant pour but de regrouper des informations sur nos institutions.">Regards Citoyens</a></dd>
						<dd><a target="_blanck" href="http://memopol2.lqdn.fr/" title="Recensement des députés européens et de leurs activités.">Political Memory</a></dd>
						<dd><a target="_blanck" href="http://mon-depute.fr/" title="Informations sur les députés">Mon Député</a></dd>
						<dd><a target="_blanck" href="http://politique.slate.fr/" title="Annuaire des personnalités qui feront les élections en 2012.">Wikipol</a></dd>
						<dd><a target="_blanck" href="http://www.2012memepaspeur.net/" title="Un site \'je veux\'/\'je ne veux pas\' sur les élections 2012.">2012 même pas peur !</a></dd>
						<dd><a target="_blanck" href="http://politiko.fr/" title="Site de débat sur la primaire du PS">Politiko</a></dd>
					</dl>
					<dl class="tight">
						<dt>Penseurs</dt>
						<dd><a target="_blanck" href="http://tvbruits.org/spip.php?article981" title="Militant pour l\'éducation populaire. Conférences gesticulées sur la culture.">Franck Lepage</a></dd>
						<dd><a target="_blanck" href="http://etienne.chouard.free.fr/Europe/tirage_au_sort.php" title="Penseur de la démocratie et de nos institutions. Parle aussi de création monétaire et de tirage au sort.">Etienne Chouard</a></dd>
						<dd><a target="_blanck" href="http://www.youtube.com/watch?v=PuZgkL5BEBk" title="Présentation des nouvelles monnaies et de l\'importance de la création monétaire.">Jean-François Noubel</a></dd>
						<dd><a target="_blanck" href="http://www.dailymotion.com/video/xh1foy_conference-bernard-friot-de-l-emploi-a-la-qualification_news" title="Discussions sur la retraite, l\'investissement et l\'économie.">Bernard Friot</a></dd>
						<dd><a target="_blanck" href="http://www.dailymotion.com/video/x5njza_le-choix-de-la-defaite-annie-lacroi_news" title="Historienne">Annie Lacroix-Riz</a></dd>
					</dl>
					<dl class="tight">
						<dt>Journaux</dt>
						<dd><a target="_blanck" href="http://reflets.info/" title="Site d\'informations créé par des \'geeks\'.">Reflets.info</a></dd>
						<dd><a target="_blanck" href="http://bugbrother.blog.lemonde.fr" title="Blog sur la surveillance et la répression.">Bug Brother</a></dd>
						<dd><a target="_blanck" href="http://owni.fr/" title="Site journalistique de qualité sur le numérique.">Owni</a></dd>
						<dd><a target="_blanck" href="http://www.slate.fr/" title="Site journalistique généraliste et de qualité.">Slate</a></dd>
						<dd><a target="_blanck" href="http://actualutte.info/" title="Site d\'actualités">Actualutte</a></dd>
					</dl>
					<dl class="last">
						<dt>Plus d\'informations</dt>
						<!--
						<dd><a href="faq.php">FAQ</a></dd>
						<dd><a href="http://quotes.lkws.fr/api/1.0/doc/api_architecture.txt">API doc</a></dd>
						-->
						<dd><a href="'.$rel_to_root.'info/projet.php">Objectifs du site</a></dd>
						<dd class="deep"><a href="'.$rel_to_root.'info/faq.php">FAQ</a></dd>
						<dt>Sites similaires</dt>
						<dd><a target="_blanck" href="http://pourquoijepirate.fr/">Pourquoi Je Pirate</a></dd>
						<dd><a target="_blanck" href="http://www.paspeurdhadopi.fr/">Pas Peur D\'HADOPI</a></dd>
					</dl>
					<div id="footerSub">
						<p>
							<a href="#" class="footer_link">Proposer un nouveau lien pour le pied de page</a>
						</p>
						<h3>
							<a href="http://twitter.com/share" 
								class="twitter-share-button" 
								data-text="#mp2012 Construisez et partagez votre programme électoral 2012" 
								data-count="horizontal" 
								data-via="monprogramme" 
								data-url="http://monprogramme2012.lkws.fr/" 
								data-lang="fr">Tweeter</a>
							<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
							
							<a href="https://twitter.com/monprogramme" 
								class="twitter-follow-button" 
								data-show-count="false" 
								data-lang="fr">Suivre @monprogramme</a>
							<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
						</h3>
					</div>
				</div><!--end footer-->
			</div>';

*************************************************************************************************************************************************
****************************************************************** CSS FOOTER  ******************************************************************
*************************************************************************************************************************************************
#footerWrapper {
    background: url(./img/footer/bgFooter.jpg) center top repeat-x;
    height: 400px;
    min-width: 946px;
	margin-top: 50px;
}
#footer {
    margin: 0 auto;
    position: relative;
    background: url(./img/footer/bgLines.png) no-repeat;
    padding: 35px 20px 0;
    width: 906px;
	font-family: Arial, Helvetica, sans-serif;
    font-size: 70%;
    line-height: 1.6em;
    -moz-text-shadow: 0 1px 0 #fff;
    -webkit-text-shadow: 0 1px 0 #fff;
    text-shadow: 0 1px 0 #fff;
}
#footer legend, #footer dt {
    color: #8c8a8a;
    font-size: 1.4em;
    font-weight: bold;
}
#footer form div, #footer dd, #footer p {
    color: #9f9f9f;
    font-size: 1.2em;
}
#footer form div {
    line-height: 1.5em;
}
#footer dl {
    background: url(./img/footer/borderFooter.gif) repeat-y;
    float: left;
    padding-left: 18px;
    width: 145px;
}
#footer dl.first {
    margin-left: 25px;
}
#footer dl.tight {
    width: 136px;
}
#footer dl.last {
    width: 160px;
}
#footer dt {
    margin-bottom: 5px;
}
#footer dd {
    margin-bottom: 3px;
}
#footer dd.deep {
    margin-bottom: 18px;
}
#footer dd a {
    text-decoration: none;
}
#footer dd a, #footer p a {
    color: #9f9f9f;
}
#footer dd a:hover {
    text-decoration: underline;
}
#footer p a:hover {
    text-decoration: none;
}
#formMailList {
    float: left;
    width: 225px;
}
#formMailList legend, #footer dt {
    margin-bottom: 5px;
}
#formMailList div {
    margin-bottom: 15px;
}
#formMailList label {
    position: absolute;
    top: -999em;
}
#formMailListEmail {
    color: #8c8a8a;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1.2em;
    background: url(./img/footer/bgFormMailList.png) no-repeat;
    border: none;
    height: 17px;
    padding: 8px;
    width: 183px;
}
#formMailListEmail:focus {
    background: url(./img/footer/bgFormMailList.png) 0 -33px no-repeat;
}
#formMailListSubmit {
    background: url(./img/footer/buttonFormMailList.png) no-repeat;
    border: none;
    cursor: pointer;
    height: 21px;
    text-indent: -9999px;
    width: 13px;
	padding: 0px;
	vertical-align: baseline;
}
#formMailListSubmit:hover {
    background: url(./img/footer/buttonFormMailList.png) 0 -21px no-repeat;
}
#footerSub {
    clear: left;
    padding: 64px 0 0 175px;
}
#footerSub p {
    float: left;
    width: 290px;
}
#footerSub h3 {
    float: left;
    margin-right: 18px;
    padding-top: 1px;
}
*/


/* http://fortysevenmedia.com/ sample footer
*************************************************************************************************************************************************
****************************************************************** HTML FOOTER ******************************************************************
**************************************************** DESIGN FROM http://fortysevenmedia.com/ ****************************************************
*************************************************************************************************************************************************
$html = '<div id="footer">
	<div id="footercontainer">
		<div class="footercolumn"><img src="http://fortysevenmedia.com/images/footer_likewhatsee.png" alt="Like what you see?" width="240" height="35">
		<p>If you\'re ready to rock harder than your competition, get in touch with us today!</p>
		<a href="http://fortysevenmedia.com/contact/"><img src="http://fortysevenmedia.com/images/footer_contact.png" alt="Contact Us" width="200" height="35"></a></div>
		
		<div class="footercolumn footercolumn2">
		<h5 class="recentblog">Recent Blog Entries</h5>
		<ul>
			<li><a href="http://fortysevenmedia.com/blog/archives/up_a_wristband_to_get_your_butt_in_shape/">Up - A Wristband to Get Your…</a></li>
			<li><a href="http://fortysevenmedia.com/blog/archives/tkas_episode_31/">The Kick Awesome Show: Episode…</a></li>
			<li><a href="http://fortysevenmedia.com/blog/archives/nest_-_the_thermostat_you_actually_want_to_buy/">Nest - The Thermostat You Actually…</a></li>
			<li><a href="http://fortysevenmedia.com/blog/archives/gradient_app_-_a_fine_way_to_make_css3_gradients/">Gradient App - A Fine Way to…</a></li>
		</ul>	
		</div>
		<div class="footercolumn footercolumn2">
		<h5 class="recentweb">Recent Web Design</h5>
		<ul>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/firmex_web_build_out/#entry">Firmex Web Build Out</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/solid_food_media_web_design/#entry">Solid Food Media Web Design</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/yowza_web_design/#entry">Yowza!! Web Design</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/salesmanage_solutions_web_design/#entry">SalesManage Solutions Web Design</a></li>
		</ul>	
		</div>
		<div class="footercolumn footercolumn2">
		<h5 class="recentprint">Recent Print Design</h5>
		<ul>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/kingdom_landscapes_logo/#entry">Kingdom Landscapes Logo</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/kingdom_landscapes_identity/#entry">Kingdom Landscapes Identity</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/car_fairy_logo/#entry">Car Fairy Logo</a></li>
			<li><a href="http://fortysevenmedia.com/portfolio/archives/show_tell_sale_logo/#entry">Show &amp; Tell Sale Logo</a></li>
		</ul>	
		</div>
		<div class="utilitylinks">
			<span class="copyright">© 2011 FortySeven Media. All rights reserved.</span>
			<span class="utility"><span class="subscribe"><a href="http://feeds2.feedburner.com/47m">Subscribe</a></span> <span class="ee"><a href="http://www.expressionengine.com/index.php?affiliate=47m">Powered by ExpressionEngine</a></span><a href="http://validator.w3.org/check?uri=referer" title="Valid XHTML"><img src="http://fortysevenmedia.com/images/footer_xhtml.gif" alt="Valid XHTML"></a>&nbsp;&nbsp;<a href="http://jigsaw.w3.org/css-validator/check/referer" title="Valid CSS"><img src="http://fortysevenmedia.com/images/footer_css.gif" alt="Valid CSS"></a></span>
		</div>
	</div><!--End Footer Container-->
	</div>';

*************************************************************************************************************************************************
****************************************************************** CSS FOOTER  ******************************************************************
*************************************************************************************************************************************************
.clearfooter {
    height: 330px;
    clear: both;
}
#footer {
    height: 330px;
    width: 100%;
    min-width: 960px;
    background: #003842 url(http://fortysevenmedia.com/images/footer_bkg.jpg) repeat-x 0 top;
    position: relative;
}
#footercontainer {
    width: 920px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 50px;
    position: relative;
}
.footercolumn {
    width: 250px;
    float: left;
    display: inline;
}
.footercolumn p {
    margin-left: 7px;
    margin-right: 15px;
    margin-bottom: 30px;
    color: #fff;
    font-size: .9em;
}
.footercolumn2 {
    width: 190px;
    margin-left: 30px;
    display: inline;
}
.footercolumn h5.recentblog {
    background: url(http://fortysevenmedia.com/images/footer_recentblog.gif) no-repeat 0 3px;
    padding-left: 20px;
}
.footercolumn h5.recentweb {
    background: url(http://fortysevenmedia.com/images/footer_recentweb.gif) no-repeat 0 3px;
    padding-left: 20px;
}
.footercolumn h5.recentprint {
    background: url(http://fortysevenmedia.com/images/footer_recentprint.gif) no-repeat 0 5px;
    padding-left: 20px;
}
.footercolumn ul {
    list-style-type: none;
    float: left;
    font-size: .9em;
    line-height: 1.2em;
}
.footercolumn li a {
    color: #efdeaa;
    text-decoration: none;
    background: url(http://fortysevenmedia.com/images/arrowicon.gif) no-repeat 0 2px;
    padding-left: 18px;
    padding-bottom: 15px;
    display: block;
    width: 170px;
}
.footercolumn li a:hover {
    text-decoration: underline;
    color: #ffffff;
}
.utilitylinks {
    clear: both;
    padding-top: 12px;
    padding-bottom: 10px;
    float: left;
    width: 920px;
    position: relative;
}
.utilitylinks span.copyright {
    float: left;
    display: inline;
    color: #6c989d;
    font-family: Georgia, "Times New Roman", Times, serif;
    font-style: italic;
    font-weight: bold;
}
.utilitylinks span.utility {
    float: right;
    display: inline;
    font-size: .9em;
}
.utilitylinks span.utility a {
    color: #6c989d;
    text-decoration: none;
}
.utilitylinks span.utility a:hover {
    color: #d27972;
    text-decoration: underline;
}
.utilitylinks span.utility span.subscribe {
    float: left;
    background: url(http://fortysevenmedia.com/images/footer_rssicon.gif) no-repeat;
    padding-left: 22px;
    line-height: 1.5em;
    margin-right: 15px;
}
.utilitylinks span.utility span.ee {
    float: left;
    background: url(http://fortysevenmedia.com/images/footer_eeicon.gif) no-repeat;
    padding-left: 27px;
    line-height: 1.5em;
    margin-right: 15px;
}
*/

?>