<?phprequire_once(dirname(__FILE__) . '/config.php');?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">	<head>				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />		<meta name="Description" content="bearoot.fr est un site cr&eacute;eacute; par et pour les deacute;veloppeurs. Il constiste en la centralisation d'un maximum de ressources de qualiteacute; traitant du deacute;veloppement."/>		<meta name="Keywords" content="langages, plateformes, references"/>		<meta http-equiv="Content-Language" content="fr"/>		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />		<meta name="author" content="BEAROOT" />				<link rel="icon" type="image/png" href="favicon.png" /> 		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />				<title>BEAROOT.FR</title>						<link href="css/wijmo/jquery-wijmo.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijsuperpanel.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijmenu.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijtextbox.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijlist.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijdropdown.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijradio.css" rel="stylesheet" type="text/css" />		<link href="css/wijmo/jquery.wijmo.wijcheckbox.css" rel="stylesheet" type="text/css" />				<link href="css/wijmo/jquery-ui-1.8.16.custom.css" rel="stylesheet" type="text/css" />		<link rel="stylesheet/less" type="text/css" href="css/style.less" />						<script src="js/less.min.js" type="text/javascript"></script>		<script src="js/head.min.js" type="text/javascript"></script>				<!--[if lt IE 10]>			<script type="text/javascript" src="js/PIE.js"></script>			<script type="text/javascript">				$(function() {					$('*').each(function() {						PIE.attach(this);					});				});			</script>		<![endif]-->				<style>	.ui-autocomplete-category {		padding: .2em .4em 0;		margin: .8em 0 .2em;		font-size: 1.4em;		color: #fff;	}	</style>				<script type="text/javascript">			head.js(				"js/jquery-1.6.2.min.js",				"js/jquery-ui-1.8.16.custom.min.js",								"js/wijmo/jquery.wijmo.wijutil.min.js",				"js/wijmo/jquery.wijmo.wijsuperpanel.min.js",				"js/wijmo/jquery.wijmo.wijmenu.min.js",				"js/wijmo/jquery.wijmo.wijtextbox.min.js",				"js/wijmo/jquery.wijmo.wijlist.min.js",				"js/wijmo/jquery.wijmo.wijdropdown.min.js",				"js/wijmo/jquery.wijmo.wijradio.min.js",				"js/wijmo/jquery.wijmo.wijcheckbox.min.js",								"js/jquery.mousewheel.min.js",				"js/jquery.bgiframe-2.1.3-pre.js",				"js/jquery-sticky-footer.js",				/*"js/jwerty.js",				"js/jquery.caret.js",								"js/slider.js",				"js/binder.js",/*/				function() {					$.widget( "custom.catcomplete", $.ui.autocomplete, {						_renderMenu: function( ul, items ) {							var self = this,								currentCategory = "";							$.each( items, function( index, item ) {								if ( item.category != currentCategory ) {									ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );									currentCategory = item.category;								}								self._renderItem( ul, item );							});						}					});										$(function() {						$('button, .button').button();												$("#menuB").wijmenu();						$("#menuB").wijmenu("option", "showDelay", 200);												$('.ui-list').accordion({ event: "mouseover" });																		$('button.ui-button-prev').button({ icons: {primary:'ui-icon-circle-triangle-w'}, text: false });						$('button.ui-button-next').button({ icons: {primary:'ui-icon-circle-triangle-e'}, text: false });												$('button.ui-icon-search, .button.ui-icon-search').button({ icons: {primary:'ui-icon-search'} });						$('button.ui-icon-locked, .button.ui-icon-locked').button({ icons: {primary:'ui-icon-locked'} });						$('button.ui-icon-star, .button.ui-icon-star').button({ icons: {primary:'ui-icon-star'} });												$("input[type='text'], input[type='password'], textarea").wijtextbox();																		$.widget( "custom.catcomplete", $.ui.autocomplete, {							_renderMenu: function( ul, items ) {								var self = this,									currentCategory = "";								$.each( items, function( index, item ) {									if ( item.category != currentCategory ) {										ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );										currentCategory = item.category;									}									self._renderItem( ul, item );								});							}						});												$( "#search input[type='text']" ).catcomplete({							source: [									{										label: 'c++',										category: 'langage'									},{										label: 'java',										category: 'langage'									},{										label: 'php',										category: 'langage'									},{										label: 'coldfusion',										category: 'langage'									},{										label: 'javascript',										category: 'langage'									},{										label: 'asp',										category: 'langage'									},{										label: 'ruby',										category: 'langage'									},{										label: 'siteduzero',										category: 'site'									},{										label: 'lafermeduweb',										category: 'site'									},{										label: 'android',										category: 'mobile'									},{										label: 'iOS',										category: 'mobile'									},{										label: 'Ubuntu',										category: 'linux'									},{										label: 'Debian',										category: 'linux'									}								]						});												head.js("js/jwerty.js",								"js/jquery.caret.js",								"js/binder.js",								"js/slider.js",								function() {									slideInit();						});											});				}			);		</script>	</head>	<body>		<div id="header">			<div id="headerFilter">				<div class="centerContent">					<a href="#">						<div class="left">							<img id="logo" alt="logo du site bearoot" class="left top" src="img/logo-64.png"/>							<div id="slogan" class="left">								<h1>b e a r o o t <span class="hl">alpha</span></h1>								&ldquo;&nbsp;Par&nbsp;les&nbsp;developpeurs,&nbsp;pour&nbsp;les&nbsp;developpeurs.&nbsp;&rdquo;							</div>						</div>					</a>					<div class="right">						<div class="menuA">							<a href="#" class="item">Accueil</a>							<a href="#" class="item">Live</a>							<a href="#" class="item">Blog</a>							<a href="#" class="item">Feedback</a>						</div>						<hr class="clearSepRight" />						<div id="search">							<input type="text" title="Ctrl + Shift + F"/>&nbsp;							<button class="ui-icon-search">Rechercher</button>&nbsp;							<button class="ui-icon-locked">Login</button>&nbsp;							<button class="hl ui-icon-star">Inscription</button>						</div>					</div>										<hr class="clearSep"/>					<div class="top-menu">						<ul id="menuB">							<li><a href="#" class="first">Langage</a>								<ul>									<li><a href="#">Web</a></li>									<li><a href="#">Logiciel</a></li>									<li><a href="#">Script</a></li>								</ul>							</li>							<li><a href="#" class="first">Plateforme</a>								<ul>									<li><a href="#">UNIX</a>										<ul>											<li><a href="#">Linux</a></li>											<li><a href="#">BSB</a></li>											<li><a href="#">Mac</a></li>										</ul>									</li>									<li><a href="#">Windows</a></li>									<li><a href="#">Mobile</a></li>								</ul>							</li>							<li><a href="#" class="first">Logiciel</a>								<ul>									<li><a href="#">Browser</a></li>									<li><a href="#">IDE</a></li>								</ul>							</li>							<li><a href="#" class="first">Reference</a>								<ul>									<li><a href="#">Site</a></li>									<li><a href="#">Application</a></li>									<li><a href="#">Livre</a></li>									<li><a href="#">Tutoriel</a></li>								</ul>							</li>							<li><a href="#" class="first">Ressource</a>								<ul>									<li><a href="#">Framework</a></li>									<li><a href="#">Library</a></li>									<li><a href="#">API</a></li>									<li><a href="#">Plugin</a></li>								</ul>							</li>							<li><a href="#" class="first">Concept</a>								<ul>									<li><a href="#">Paradigme</a></li>									<li><a href="#">Methodologie</a></li>								</ul>							</li>							<li><a href="#" class="first">Securite</a>								<ul>									<li><a href="#">Antivirus</a></li>									<li><a href="#">Pentest</a></li>								</ul>							</li>						</ul>					</div>				</div>			</div>		</div>		<div id="content">			<div class="centerContent">				<div id="breadcrumb">					<a href="#" class="button hl">Plateformes</a>					<span class="sep">/</span>					<a href="#" class="button hl">UNIX</a>				</div>				<div id="contentFilter" class="ui-corner-all">				<button id="previous" class="ui-button-prev" onclick="slideLeft(this);" title="Ctrl + &larr;">&nbsp;</button>				<button id="next" class="ui-button-next" onclick="slideRight(this);" title="Ctrl + &rarr;">&nbsp;</button>					<div id="contentSlider">						<div id="category" class="ui-slide">							<h1 class="ui-state-hover ui-corner-all ui-header">Categories</h1>							<div class="ui-list">								<h3><a href="#">Langage</a></h3>								<div>desc</div>								<h3><a href="#">Plateforme</a></h3>								<div>desc</div>								<h3><a href="#">Logiciel</a></h3>								<div>desc</div>								<h3><a href="#">Reference</a></h3>								<div>desc</div>								<h3><a href="#">Ressource</a></h3>								<div>desc</div>								<h3><a href="#">Concept</a></h3>								<div>desc</div>								<h3><a href="#">Securite</a></h3>								<div>desc</div>							 </div>						</div>						<div id="demo" class="ui-slide">							<h1 class="ui-state-active ui-corner-all ui-header">S'inscrire</h1>							<table>								<tbody>									<tr>										<td>Email :</td>										<td><input type="text"/></td>									</tr>									<tr>										<td>Mot de passe :</td>										<td><input type="text"/></td>									</tr>									<tr>										<td></td>										<td><button class="hl">Participer maintenant</button></td>									</tr>								</tbody>							</table>						</div>						<div id="live" class="ui-slide">							<h1 class="ui-state-hover ui-corner-all ui-header">Demonstration</h1>							Des multitudes de fiches concernant des produits et des concepts traitant du d&eacute;veloppement &agrave; tous les niveaux sont r&eacute;pertori&eacute;es sur ce site.							<br/>							<button>Voir la demonstration</button>						</div>					</div>				</div>			</div>		</div>		<div id="footer">			<div id="footerFilter">				<div class="centerContent">					<div class="left">						copyright&nbsp;&nbsp;bearoot.fr&nbsp;&nbsp;2011					</div>					<div class="right">						<div class="menuA">							<a href="#" class="item">A propos</a>							<a href="#" class="item">Credits</a>							<a href="#" class="item">Feedback</a>						</div>					</div>					<hr class="clearSep"/>				</div>			</div>		</div>	</body></html>