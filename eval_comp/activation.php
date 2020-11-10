<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsNotLogged(); ?>
<?php checkActivationParams(); ?>
<?php

$q = $bdd->prepare('SELECT EMAIL FROM Inscriptions WHERE SECURE_KEY = :key');
$q->bindParam(':key', $_GET['account'], PDO::PARAM_INT);
$q->execute();

$account = $q->fetch();

?>
<?php include('config/head.php'); ?>
<?= myHeader('Activation'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid banner3 mt-5 p-5" id="top">
    <h1 class="text-center m-5">Activation du compte</h1>
    <form class="mx-auto" method="POST" id="activation">
        <div class="form-group w-50 mx-auto text-center">
            <div class="m-5">
                <label for="pseudo">Pseudo</label>
                <input type="text" placeholder="example@example.com" class="form-control" name="pseudo" id="pseudo" autocomplete="off" aria-describedby="pseudoHelp" required>
            </div>
            <div class="m-5">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="off" aria-describedby="passwordHelp" required>
            </div>
            <input type="hidden" value="<?= $account['EMAIL']; ?>" name="email" id="email" readonly required>
            <button id="send-data" class="btn btn-primary mx-auto text-center">Activer mon compte</button>
        </div>
    </form>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
<script src="scripts/activation.js"></script>
<?php require_once('config/footer.php'); ?>