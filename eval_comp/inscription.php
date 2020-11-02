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
    <script src="https://kit.fontawesome.com/747acc35b5.js" crossorigin="anonymous"></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container bg-dark my-5 p-5">
        <h1>Créer un compte</h1>
        <form method="POST" id="inscription">
        <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="prenomHelp" required>
            </div> 
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="prenomHelp" required>
            </div>    
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="nomHelp" required>
            </div>
            <div class="form-group">
            <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="telfixe">N° de téléphone fixe (Optionnel)</label>
                <input type="text" class="form-control" name="telfixe" id="telfixe">
            </div>
            <div class="form-group">
                <label for="telmobile">N° de téléphone mobile (Optionnel)</label>
                <input type="text" class="form-control" name="telmobile" id="telmobile">
            </div>
            <div class="form-group">
                <label for="peudogit">Pseudo Github</label>
                <input type="text" class="form-control" name="peudogit" id="pseudogit" required>
            </div>
            <div class="form-group">
                <label for="liensite">Lien site personnel (Optionnel)</label>
                <input type="url" class="form-control" name="liensite" id="liensite">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" required>
            </div>
            <button id="send-data" class="btn btn-primary mt-3">Inscription</button>
        </form>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>    
    </div>
<script>
        $('#inscription').submit(function(e) {
            e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'traitement-inscription.php',
            data: {
                'pseudo': $('#pseudo').val(),
                'nom': $('#nom').val(),
                'prenom': $('#prenom').val(),
                'mdp': $('#mdp').val(),
                'email': $('#email').val(),
                'telfixe': $('#telfixe').val(),
                'telmobile': $('#telmobile').val(),
                'pseudogit': $('#pseudogit').val(),
                'liensite': $('#liensite').val()
            },
            dataType: 'html',
            success: function(data) {
                $('#notification').html(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
            }
        });
        });
</script>
<?php require_once('footer.php'); ?>