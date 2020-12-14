<?php

function Entete($titre)
{
echo $str =<<<ENT

	<!DOCTYPE html>
	<html class="index">
	<head>
		<meta charset="UTF-8"/>
		<title>$titre</title>
		<meta name="description" content="Découvrez le cabinet de psychologie ODC Conseil à Maubeuge. Psychologie pour particuliers ou conseils en entreprise, votre psychologue intervient." />
		<meta name="robots" content="index,follow">
		<meta name="google-site-verification" content="A8jhDjEOXov69I_oxmbwwvmQ32pQBBPDUepOxnhE5IE" />
			<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=false;">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" /> 
	<link rel="stylesheet" href="/ressources/css/thickbox.css" />
	<link rel="stylesheet" href="/ressources/20121001/css/fancybox/jquery.fancybox.css" media="screen" />
	<link rel="stylesheet" href="css/style.css" media="screen" />
	<link rel="stylesheet" href="/ressources/v2.0.3/css/styleiecheck.css" media="screen" />
	<link rel="stylesheet" href="css/owl.carousel.css" media="screen" />
	<link rel="stylesheet" href="css/owl.theme.css" media="screen" />
	<link href="https://fonts.googleapis.com/css?family=Kreon:300,700|Source+Sans+Pro:300,700" rel="stylesheet">
	<script src="/ressources/20121001/js/jquery.min.js"></script>
	<link rel="alternate" type="application/rss+xml" title="Actualités de odc-conseil.fr" href="/rss.xml"/><script rel="preload" type="text/javascript" src="/ressources/js/newsletter.js" as="script"></script>
	<link rel="stylesheet" type="text/css" href="css/css_actualites.css" media="screen" />
	<!--[if lt IE 9]>
	<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="/ressources/rwd.v1.1/js/respond.min.js"></script>
	<link rel="stylesheet" href="css/style_ie.css" media="screen" />
	<![endif]-->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150833838-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-150833838-1');
	</script>
	</head>
	<body class="index-page">
				<section id="container">
			<header>
	<span class='nav'>Menu</span>
	<div class='top_bar'><ul><li class="firstLi"><a class="selected" href="index.php">Accueil</a></li><li class="firstLi"><a href="cabinet-psychologue-maubeuge.php">ODC Conseil</a></li><li class="firstLi"><a href="liens-utiles.php">Liens utiles </a></li><li class="firstLi"><a href="actualites_al.html">Actualités</a></li><li class="firstLi"><a href="contact.php">Contact</a></li><li class="firstLi"><a href="plan.php">Plan d'accès</a></li></ul></div>	
	<section>
				<a href="/" class="logo">
			<img src="images/logo.png" alt="Psychologue Maubeuge - logo ODC Conseil" />
			<span class="baseline">Cabinet de Psychologie</span>
		</a>
		<div class="container-infos">
			<div class="adresse-header">
				<span class="titre-header">Où trouver le cabinet ?</span>
				<span>208 Rue de Maubeuge <br>
				59131 ROUSIES</span>
				<p class="bouton-light"><a href="plan.php">Voir le plan d'accès</a></p>
			</div>
			<div class="contact_header">
									<a data-phone="tel:06 11 57 62 84" href="#" class="tel"><span class="titre-header">Comment me contacter ?</span><span class="num-tel">06 11 57 62 84</span>Du lundi au vendredi de 8h à 19h<br>Le samedi de 8h à 12h</a>
								<p class="bouton-principal">
					<a href="rappel-telephonique.php" data-fancybox-type="iframe" rel="lightbox2">Demandez à être rappelé</a>
				</p>
				<a id="facebook" href="https://www.facebook.com/psychologuemaubeuge/" target="_blank"><img src="images/fb.png" alt="Psychologue Maubeuge"></a>
			</div>
		</div>    
	</section>
ENT;
}

?>