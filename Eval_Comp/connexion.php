<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsNotLogged(); ?>
<?php require_once('traitement-connexion.php'); ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container bg-dark my-5 p-5">
        <h1>Se connecter</h1>
        <form method="POST" id="connexion">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp">
            </div>
            <button id="send-data" class="btn btn-primary mt-3">Connexion</button>
        </form>
        <?php if(isset($feedback)) { ?> <div class="alert alert-info my-5" role="alert" id="notification"><?= $feedback; ?></div><?php } ?>
        <div class="bg-dark text-white my-5 p-2 border border-white">Vous n'avez pas encore de compte ? <a href="inscription.php">Créer un compte</a></div>
    </div>
<?php require_once('footer.php'); ?>