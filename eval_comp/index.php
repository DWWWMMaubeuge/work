<?php require_once('config/pdo-connect.php'); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Accueil'); ?>
<?php require_once('config/navbar.php'); ?>
<!-- Contenu de base de l'accueil -->
<div class="container-fluid banner mt-5 p-5" id="top">
    <div class="row">
        <div class="col-md-8 offset-md-2 info">
            <h1 class="text-center">DWM Rousies</h1>
            <p class="text-center">
                Bienvenue sur le site des développeurs full-stack de Maubeuge.
            </p>
            <button class="btn btn-md text-center" id="myButton" onclick="showDescription()">En savoir plus</button>
        </div>
    </div>
</div>
<!-- Contenu supplémentaire qui s'affiche si la fonction ShowDescription est déclenchée par un clic de l'utilisateur sur le bouton En savoir plus -->
<div class="container-fluid banner2 d-none" id="learnmore">
    <div class="row">
        <div class="col-md-8 col-sm-8 text-center offset-md-2 offset-sm-2 bg-dark opacity-4 rounded info2">
            <div class="my-5 my-5-sm">
                <h2 id="description">Qui sommes nous ?</h2>
                <p>Nous sommes les apprenants de la formation développeur web de l'AFPA de Rousies et nous sommes actuellement en train de passer notre titre professionnel de développeur web.</p>
            </div>
            <div class="my-5">
                <h2>Quel est le but de ce site ?</h2>
                <p>L'objectif principal de ce projet était de créer une plateforme où chacun peut évaluer ses compétences par rapport à sa formation. Les formateurs peuvent modifier leur formation à leur guise, en ajoutant ou supprimant des compétences par exemple. Mais ce site a également un second rôle qui est de montrer ce dont nous sommes capables lors de la réalisation de projet.</p>
            </div>
            <div class="my-5">
                <button class="btn btn-danger btn-md text-center" id="myButton" onclick="closeDescription()">Fermer</button>
            </div>
        </div>
    </div>
</div>
<!-- Lien vers le script de l'index -->
<script src="scripts/index.js"></script>
<?php require_once('config/footer.php'); ?>