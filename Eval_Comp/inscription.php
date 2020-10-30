<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsNotLogged(); ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container bg-dark my-5 p-5">
        <h1>Créer un compte</h1>
        <form method="POST" id="inscription">
        <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="prenomHelp">
            </div>    
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp">
            </div>
            <div class="form-group">
                <label for="prenom">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>
            <button id="send-data" class="btn btn-primary mt-3">Inscription</button>
        </form>
        <div class="alert alert-info my-5 d-none" role="alert" id="notification"></div>
        <div class="bg-dark text-white my-5 p-2 border border-white">Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></div>
    </div>
<script>
        $('#inscription').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitement-inscription.php',
            data: {
                'nom': $('#nom').val(),
                'prenom': $('#prenom').val(),
                'mdp': $('#mdp').val(),
                'email': $('#email').val()
            },
            dataType: 'text',
            success: function(data) {
                $('#notification').text(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            }
        });
        });
</script>
<?php require_once('footer.php'); ?>