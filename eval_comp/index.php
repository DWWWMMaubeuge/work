<?php require_once('config/pdo-connect.php'); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Accueil'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid banner" id="top">
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
<div class="container-fluid banner2 mt-5 d-none" id="learnmore">
    <div class="row" id="description">
        <div class="col-md-8 text-center offset-md-2 bg-dark opacity-4 rounded info2">
            <div class="my-5">
                <h2>Qui sommes nous ?</h2>
                <p>Nous sommes les apprenants de la formation développeur web de l'AFPA de Rousies et nous sommes actuellement en train de passer notre titre professionnel de développeur web.</p>
            </div>
            <div class="my-5">
                <h2>Quel est le but de ce site ?</h2>
                <p>L'objectif principal de ce projet était de créer une plateforme où chacun peut créer son propre profil et évaluer ses compétences. Il permet également de voir le niveau des autres. Et notre prof peut insérer de nouvelles compétences et éditer celles qui sont déjà présentes. Mais ce site a également un second rôle qui est de montrer ce dont nous sommes capables lors de la réalisation de projet.</p>
            </div>
            <div class="my-5">
                <button class="btn btn-danger btn-md text-center" id="myButton" onclick="closeDescription()">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    function showDescription() {

        let content = document.getElementById('learnmore');
        
        content.className = "container-fluid banner2 mt-5";
        $('html, body').animate({
            scrollTop: $("#description").offset().top
        }, 2000);

    }

    function closeDescription() {

        let content = document.getElementById('learnmore');
        $('html, body').animate({
            scrollTop: $("#top").offset().top
        }, 2000);
        setTimeout(function(){ content.className = "container-fluid banner2 my-5 d-none"; }, 2000);

    }

</script>
<?php require_once('config/footer.php'); ?>