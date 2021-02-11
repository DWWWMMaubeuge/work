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



    <?php
    Contact();
    Footer();
    ?>