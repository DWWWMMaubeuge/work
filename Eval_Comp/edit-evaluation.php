<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdmin(); ?>
<?php include('matieres.php'); ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Formation DWM / Auto-évaluation </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container bg-dark my-5 p-5">
        <h1 class="text-center my-5">Modifications des compétences</h1>

        <form class="text-center" method="POST" id="activer">
            <h2 class='text-center my-4'>Activation d'une compétence</h2>
            <?= getDisabledComps('ONcomp'); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Activer</button>
            <div id="confirmation"></div>
        </form>

        <form class="text-center" method="POST" id="desactiver">
            <h2 class='text-center my-4'>Desactivation d'une compétence</h2>
            <?= getEnabledComps('OFFcomp'); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Désactiver</button>
            <div id="confirmation"></div>
        </form>

        <form class="text-center" method="POST" id="ajout">
            <h2 class='text-center my-4'>Ajout d'une compétence</h2>
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
    <script>
        $('#activer').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitement-editcomps.php',
            data: {
                'ON': $('#ONcomp').val()
            },
            dataType: 'text',
            success: function(data) {
                $('#notification').html(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
                // setTimeout( function() {
                //     window.location.replace("index.php");
                // }, 5000)
                
            }
        });
        });

        $('#desactiver').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitement-editcomps.php',
            data: {
                'OFF': $('#OFFcomp').val()
            },
            dataType: 'text',
            success: function(data) {
                $('#notification').html(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
                // setTimeout( function() {
                //     window.location.replace("index.php");
                // }, 5000)
                
            }
        });
        });

        $('#ajout').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitement-editcomps.php',
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
                //     window.location.replace("index.php");
                // }, 5000)
                
            }
        });
        });
    </script>
    <?php require_once('footer.php'); ?>