<?php

function Footer()
{
    echo $str = <<<FOO

    <!-- ==============================================
    MAP
    =============================================== -->
<section id="map">

    <div id="gmap"></div>

</section>
    <!-- ==============================================
    FOOTER
    =============================================== -->

<footer id="main-footer" class="add-padding bg-color3 border-top-color2">

    <div class="container">

        <ul class="social-links text-center">
            <li><a href="https://www.facebook.com/psychologuemaubeuge/"><i class="fa fa-facebook fa-fw"></i></a></li>
        </ul>

        <p class="text-center">&copy; 2021 - Odile Dessailly-Coste, Psychologue et Consultante en organisation sur Maubeuge et en Région Hauts de France - Tous droits réservés</p>
        <p class="text-center">Adresse : 208 Rue de Maubeuge 59131 ROUSIES</p>
        <p>
            <center>
                <div class="btn btn-color3"><a style="text-decoration: none; color: white;" href="tel:0611576284"><i class="fa fa-phone"></i> 06 11 57 62 84</a></div>
            </center>
        </p>


    </div>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "MedicalOrganization",
            "image": "",
            "name": "Odile Dessailly-Coste",
            "logo": "images/logos/logo.png",
            "description": "Odile Dessailly-Coste, votre psychologue et consultante en organisation sur Maubeuge et en Région Hauts de France.",
            "url": "https:",
            "sameAs": [
                "https://plus.google.com/118416677873362998638"
            ],
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "06 11 57 62 84",
                "contactType": "Customer Service",
                "email": "contact@odc-conseil.fr",
                "contactOption": "",
                "areaServed": "Rousies",
                "availableLanguage": "French"
            },
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "France",
                "addressLocality": "Rousies",
                "postalCode": "59131",
                "streetAddress": "208 Rue de Maubeuge"
            }
        }
    </script>

</footer>

<!-- ==============================================
    SCRIPTS
    =============================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!--<script>
    window.jQuery || document.write('<script src="js/libs/jquery-1.9.1.min.js">\x3C/script>')
</script>-->

<script src="js/libs/bootstrap.min.js"></script>
<script src="js/jquery.scrollto.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/jquery.masonry.min.js"></script>
<script src="js/jquery.flexslider.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/twitterFetcher_min.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true&key=AIzaSyC1RgA-ywO6EqRt4KbQ7rQA1WOgZ892hDw"></script>
<script src="js/contact.js"></script>
<script src="js/scripts.js"></script>

<script>
    var mapPoint = {
        'lat': 50.268406,
        'lng': 3.981879,
        'zoom': 15,
        'infoText': '<p>208 Rue De Maubeuge\
                            <br/>59131\
                            <br/>ROUSIES</p>',
        'linkText': 'Voir sur Google Maps',
        'mapAddress': '208 Rue de Maubeuge, 59131 Rousies',
        'icon': 'images/pin-red.png' <!--from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com-->
    };


    if ($(window).scrollTop() < ($(window).height() - 50)) {
        $('#main-nav').removeClass('scrolled');
    } else {
        $('#main-nav').addClass('scrolled');
    }

    $.backstretch([
        "images/echanges-pratiques.jpg",
    ], {
        duration: 3000,
        fade: 750
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() < ($(window).height() - 50)) {
            $('#main-nav4').removeClass('scrolled');
        } else {
            $('#main-nav4').addClass('scrolled');
        }
    });
</script>

</body>

</html>
FOO;
}