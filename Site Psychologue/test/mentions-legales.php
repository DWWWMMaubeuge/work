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

            <h1>Mentions Légales</h1>
            <div><br>
                <p>Nom du site : www.odc-conseil.fr<br>
                    Directeur de la publication : Mme Dessailly Coste Odile<br>
                    Email : contact@odc-conseil.fr<br><br>

                    Adresse : 208 Rue de Maubeuge<br>
                    59131 - ROUSIES<br>
                    Tél : 06.11.57.62.84<br>
                    Forme juridique : Profession libérale<br>
                    Raison sociale : MME ODILE DESSAILLY COSTE<br>
                    SIRET : 52109194200024<br>
                    TVA Intracommunautaire : FR</p><br>
                <h3>POLITIQUE DE CONFIDENTIALITE</h3><br>
                <p>Toute représentation totale ou partielle de ce site par quelque procédé que ce soit,<br>
                    sans l'autorisation expresse de l'exploitant du site Internet est interdite et constituerait<br>
                    une contrefaçon sanctionnée par les article L 335-2 et suivants du Code de la propriété intellectuelle.</p><br><br>
                <p>Les marques de l'exploitant du site Internet et de ses partenaires, ainsi que les logos figurant sur le<br>
                    site sont des éléments protégés par les dispositions du droit de la propriété intellectuelle et ne<br>
                    peuvent faire l'objet, sans consentement du Directeur de la publication, d'aucune reproduction ni<br>
                    représentation partielle ou totale.</p><br><br>
                <p>Le présent site est réalisé par Kolakowski Alex - alex.kolakowski@outlook.fr</p><br><br><br><br>
            </div>

    </section>

    <?php
    Contact();
    Footer();
    ?>