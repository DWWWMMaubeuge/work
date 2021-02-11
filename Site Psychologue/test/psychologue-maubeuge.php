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
            <nav id="fil_ariane"><strong>Vous &ecirc;tes ici :</strong> <a href="index.php">Accueil</a> &gt; Psychologie
            </nav>
            <h1>Accompagnement psychologique à Maubeuge - Individuel et en groupe</h1>
            <div>
                <p>La psychologie peut être définie comme la <strong>science du comportement et des processus mentaux</strong>. Elle est à la fois une discipline et un domaine de pratiques.</p>
                <p><strong>Odile Dessailly-Coste,</strong> <strong>votre <a href="Parcours.php">psychologue à Maubeuge</a></strong> en <strong>Sambre Avesnois</strong>, propose différentes formes d’<strong>accompagnement</strong> pour vous permettre d’accéder à un <strong>mieux-être</strong>.</p>
                <img class="imgRight" src="images/psychologue.jpg" title="Accompagnement psychologique à Maubeuge" alt="Accompagnement psychologique à Maubeuge" loading="lazy" width="400" height="267" />
                <h2>Soutien psychologique</h2>
                <p>Le <strong>soutien psychologique</strong> apporte une écoute active et aide le patient à comprendre la crise qu’il traverse ou la souffrance qu’il rencontre (suite à une séparation, un deuil, une maladie…)</p>
                <h2> Psychothérapie </h2>
                <p>La <strong>psychothérapie</strong> traite les <strong><a href="troubles-psychiques.php">troubles psychiques</a></strong> par l’apprentissage progressif de comportements adaptés et la modification de pensées dysfonctionnelles</p>
                <h2>Groupe de parole</h2>
                <p>Le <strong>groupe de parole</strong> est un moment d’échanges entre des personnes confrontées à une même problématique (alcool, cancer, deuil, éducation…). Ce lieu permet aux participants de rompre l’isolement, de partager
                    des expériences, des émotions, et contribue à se libérer de la souffrance</p>
                <h2>Groupe d’affirmation de soi</h2>
                <p>Le <strong>groupe d’affirmation de soi </strong>permet aux participants de développer des compétences relationnelles en apprenant à se faire respecter tout en respectant les autres (exprimer une demande, savoir dire "Non", répondre
                    à une critique...) </p>
                <p>La pratique d’Odile Dessailly-Coste s’appuie sur les techniques issues des <strong><a href="therapie-comportementale-cognitive.php">thérapies comportementales et cognitives</a> </strong>TCC et de la psychologie positive qui consiste à renforcer
                    les émotions positives, à porter l’attention sur ce qui va bien et à développer et entretenir les facteurs de bien-être.</p>
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