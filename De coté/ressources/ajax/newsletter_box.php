<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <meta name="robots" content="noindex, nofollow">
            <link href="/css/style.css" type="text/css" rel="preload stylesheet" as="style" />
        <link href="/ressources/css/newsletter.css" rel="preload stylesheet" type="text/css" as="style"/>
<link rel="alternate" type="application/rss+xml" title="Actualités de odc-conseil.fr" href="/rss.xml"/><script rel="preload" type="text/javascript" src="/ressources/js/jquery.js" as="script"></script>
<script rel="preload" type="text/javascript" src="/ressources/js/newsletter.js" as="script"></script>
<script type="text/javascript">

    $('document').ready(function() {
        var aLink = $('<a>').attr('href', '/ressources/ajax/paquet_telecom.php')
                            .css('padding', '5px 20px')
                            .css('background', '#26292d')
                            .css('border-radius', '3px')
                            .css('display', 'inline-block')
                            .css('color', '#fff')
                            .css('margin', '0 10px')
                            .css('font-size', '16px')
                            .html('En&nbsp;savoir&nbsp;plus');
        if (jQuery().fancybox) {
            aLink = aLink.fancybox({
                autoSize : true,
                type : 'iframe'
            });
        } else {
            aLink = aLink.attr('target', '_BLANK');
        }

        if (window.parent.length == 0 || window.parent == window) {
            var container = $('body');
            if ($('#container').length > 0) {
                container = $('#container'); 
            }
            $('<div>')
                .attr('id', 'bandeau_cookie')
                .css('z-index', 1000)
                .css('display', 'block')
                .css('position', 'fixed')
                .css('bottom', 0)
                .css('left', 0)
                .css('width', '100%')
                .css('min-height', '20px')
                .css('font-size', '16px')
                .css('text-align', 'center')
                .css('background', 'rgba(35, 41, 47, 0.9)')
                .css('color', 'white')
                .css('padding', '10px')
                .css('-webkit-box-sizing', 'border-box')
                .css('-moz-box-sizing', 'border-box')
                .css('box-sizing', 'border-box')
                .append('<p style="font-size:16px;color:#fff;display: inline-block;">En continuant à naviguer sur ce site, vous acceptez l\'utilisation de cookies pour disposer de services adaptés à vos centres d\'intérêts. </p>',
                    aLink,
                    $('<span>').addClass('paquet_telecom_croix')
                               .css('padding', '5px 20px')
                               .css('background', '#e94e18')
                               .css('border-radius', '3px')
                               .css('display', 'inline-block')
                               .css('font-size', '16px')
                               .css('color', '#fff')
                               .css('margin', '0 10px')
                               .css('cursor','pointer')
                               .attr('title', 'Fermer cet avertissement')
                               .text('Accepter')
                ).prependTo(container);
        }

        if($('#bandeau_cookie').is(':visible')) {
            $('body').addClass('jsCookie');
            $('.action').css('bottom','80px');
        }

        $('.paquet_telecom_croix').click(function() {
            // Création d'un objet date
            var date = new Date();
            // Positionnement de la date dans 1 ans
            date.setTime(date.getTime()+(365 * 24 * 60 * 60 * 1000));
            document.cookie = 'paquet_telecom=1; expires=' + date.toGMTString() + '; path=/';
            $('#bandeau_cookie').hide();
            $('body').removeClass('jsCookie');
            $('.action').css('bottom','0px');
        });
    });
    
</script>
    <script type="text/javascript">
		function lien(lien){
			window.parent.location.href=lien;
		}
		function fermer(){
			parent.tb_remove();
		}
	</script>
</head>

<body class="fancy-box-body">
<div id="newsletter_iframe">
    <h1>Lettre <strong>d'information</strong> </h1>
    <h2 class="mots_importants" style="font-size: 15px">Vous abonner</h2>
    <p>Si vous souhaitez <strong>recevoir gratuitement et régulièrement</strong> dans votre boîte de messagerie
        des informations sur l'actualit&eacute; du site <strong>www.odc-conseil.fr</strong> <br />
        <strong>Veuillez indiquer votre courriel et valider.</strong><br />
    </p>

    <div style="margin-top:10px">
        <label for="input_newsletter" style="float:left">Inscription à la newsletter</label>
        <form id="form_newsletter" enctype="application/x-www-form-urlencoded" action="#" class="newsletter_popup" method="post">

<input type="text" name="input_newsletter" id="input_newsletter" value="" />

<input type="hidden" name="langue_newsletter" value="" id="langue_newsletter" />

<input type="submit" name="submit_newsletter" id="submit_newsletter" value="Inscription" class="submit_newsletter btn fluid primary" /></form>        <input type="button" id="js_submit" value="Inscription" style="display:none"/>
        <span id="mess_newsletter" class="errors"></span>
    </div>

    <p><br>
        <i>En soumettant ce formulaire j’accepte que les informations saisies soient exploitées dans
            le cadre de la gestion de la relation commerciale et d’envoi de newsletter
            d’offre commerciale et d’information qui peut en découler.</i>
        <br><br>
        <i>A tout moment, « vous disposez d'un droit d'accès, de modification, de rectification et
            de suppression des données qui vous concernent (article 34 de la loi « Informatique et Libertés » du 6 Janvier 1978).
            Vous pourrez donc modifier votre abonnement en cliquant sur le lien situé en bas de chaque newsletter.</i>
    </p>

    <p><strong>Nous vous remercions de votre confiance.</strong></p>
</div>
</body>
</html>
