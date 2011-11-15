<?php

function generateFooter(){
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
	
	return $html;
}

/* http://fortysevenmedia.com/ sample footer
*************************************************************************************************************************************************
****************************************************************** CSS FOOTER  ******************************************************************
**************************************************** DESIGN FROM http://fortysevenmedia.com/ ****************************************************
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

*************************************************************************************************************************************************
****************************************************************** HTML FOOTER ******************************************************************
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
*/

?>