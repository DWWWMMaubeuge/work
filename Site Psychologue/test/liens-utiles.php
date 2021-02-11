<?php
include "Entete.php";
include "navbar.php";
include "Footer.php";
include "Contact.php";
Entete("Psychologue Maubeuge – Cabinet de psychologie ODC Conseil Hautmont");
?>


<body data-spy="scroll" data-target="#main-nav" data-offset="200">

    <!--=== PAGE PRELOADER ===-->
    <div id="page-loader"><span class="page-loader-gif"></span></div>

    <?php
    NavBar2();
    ?>
    <?php
    NavBar5();
    ?>
    <span class='nav3'></span>
    <?php
    NavBar3();
    ?>

    <section id="article" class="add-padding" style="padding-bottom:0;">
        <div class="container">
            <nav id="fil_ariane"><strong>Vous &ecirc;tes ici :</strong> <a href="index.php">Accueil</a> &gt; Liens utiles
            </nav>
            <h1>Liens utiles sur la psychologie et le stress au travail</h1>
            <div>
                <p>ODC Conseil, <a href="Parcours.php"><strong>cabinet de psychologie et de conseil en entreprise à Maubeuge</strong></a> et intervenant en <strong>Région des Hauts de France</strong>, vous suggère de consulter certains liens
                    pouvant être utiles dans votre <strong>démarche de développement</strong> individuel ou collectif.</p>
                <h2>Liens utiles sur le stress au travail</h2>
                <h3>Ministère du travail, de l’emploi et de la formation professionnelle</h3>
                <p>Lien provenant du ministère du travail, de l’emploi et de la formation professionnelle consacré aux Risques psychosociaux</p>
                <p><strong><a href="http://travail-emploi.gouv.fr/sante-au-travail/prevention-des-risques/risques-psychosociaux/">http://travail-emploi.gouv.fr/sante-au-travail/prevention-des-risques/risques-psychosociaux/</a></strong>
                </p>
                <h3>INRS</h3>
                <p>L’<strong>INRS</strong> est un organisme public de référence dans le domaine de la santé au travail et de la prévention des risques professionnels. Son site propose des <strong>informations et ressources documentaires utiles</strong> pour
                    les entreprises et les CHSCT.</p>
                <p><strong><a href="http://www.inrs.fr/">www.inrs.fr</a></strong>
                </p>
                <h2>Liens utiles sur la thérapie individuelle et les troubles psychiques</h2>
                <h3>AFTCC</h3>
                <p>L’<strong>AFTCC</strong> Association française de thérapies comportementale et cognitive vous informe sur les associations de patients et vous propose une liste de recommandations bibliographiques (partie « Clinique/Recherche »)</p>
                <p><strong><a href="http://www.aftcc.org/">www.aftcc.org</a></strong>
                </p>
                <h3>Étoile bipolaire</h3>
                <p>L’<strong>Etoile bipolaire</strong> est une association lilloise ayant pour but d’aider les personnes souffrant de troubles bipolaires et les proches.</p>
                <p><strong><a href="http://etoilebipolaire.nordblogs.com/">http://etoilebipolaire.nordblogs.com/</a></strong>
                </p>
                <h3>Pleine conscience &amp; psychologie positive</h3>
                <p>La <strong>Pleine conscience</strong> et la <strong>psychologie positive</strong>, articles de Christophe André présentant ces deux pratiques.</p>
                <p><strong><a href="http://www.association-mindfulness.org/docs/C_Andr_PleineCs.pdf">http://www.association-mindfulness.org/docs/C_Andr_PleineCs.pdf</a></strong>
                </p>
                <p><strong><a href="http://christopheandre.com/WP/wp-content/uploads/Bonheur-et-malheur.-CP-03-2014.pdf">http://christopheandre.com/WP/wp-content/uploads/Bonheur-et-malheur.-CP-03-2014.pdf</a></strong>
                </p>
            </div>
            <div class="share">
                <ul>
                    <li><a target="_blank" href="https://www.facebook.com/psychologuemaubeuge/"><i class="fa fa-fw fa-facebook"></i></a></li>
                </ul>
            </div>
            <div class="author">
                <hr>
                <div class="avatar-area">
                    <img src="images/odile dessailly-coste z.png" class="img-responsive img-circle">
                </div>
                <div class="author-area">
                    <b>Odile Dessailly-Coste</b>
                    <p>Odile Dessailly-Coste, Psychologue et Consultante en organisation sur Maubeuge et en Région Hauts de France</p>
                </div>
            </div>
        </div>
    </section>

    <?php
    Contact();
    Footer();
    ?>