<?php include('config/comps.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdmin(); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Edition de compétences'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h2 class="text-center my-5">Modifications des compétences</h2>
        <form class="text-center" method="POST" id="activerComp">
            <h3 class='text-center my-4'>Activation d'une compétence</h3>
            <?= getDisabledComps('ONcomp'); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Activer</button>
            <div id="confirmation"></div>
        </form>
        <form class="text-center" method="POST" id="desactiverComp">
            <h3 class='text-center my-4'>Desactivation d'une compétence</h3>
            <?= getEnabledComps('OFFcomp'); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Désactiver</button>
            <div id="confirmation"></div>
        </form>
        <h2 class="text-center my-5">Ajout d'une compétence</h3>
        <form class="text-center" method="POST" id="ajoutComp">
            <div class="form-group my-3">
                <label for="add">Nom de la compétence</label>
                <input type="text" class="form-control w-25 mx-auto" name="nomcompetence" id="add" aria-describedby="nomHelp">
            </div>
            <div class="form-group my-3">
                <label for="categorie">Catégorie</label>
                <input type="text" class="form-control w-25 mx-auto" name="categoriecompetence" id="categorie" aria-describedby="nomHelp">
            </div>
            <div class="form-group my-3">
                <label for="isactivated">La compétence doit-elle être activé ?</label>
                <select name="isactivated" id="is-activated">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
            <div id="confirmation"></div>
        </form>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
    </div>
</div>
<script>
    $('#activerComp').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'traitements/traitement-editcomps.php',
        data: {
            'ON': $('#ONcomp').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
    });
    });

    $('#desactiverComp').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'traitements/traitement-editcomps.php',
        data: {
            'OFF': $('#OFFcomp').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
    });
    });

    $('#ajoutComp').submit(function(e) {
        e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'traitements/traitement-editcomps.php',
        data: {
            'ADD': $('#add').val(),
            'CATEGORIE': $('#categorie').val(),
            'ACTIVE': $('#is-activated').val()
        },
        dataType: 'text',
        success: function(data) {
            $('#notification').html(data);
            $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            // setTimeout( function() {
            //     window.location.replace("accueil.php");
            // }, 5000)
            
        }
    });
    });
</script>
<?php require_once('config/footer.php'); ?>