<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsNotLogged(); ?>
<?php checkActivationParams(); ?>
<?php include('../config/captcha.php'); ?>
<?php

$selectaccountinscription = $bdd->prepare('SELECT * FROM Inscriptions WHERE SECURE_KEY = :key');
$selectaccountinscription->bindParam(':key', $_GET['account'], PDO::PARAM_INT);
$selectaccountinscription->execute();

$account = $selectaccountinscription->fetch();

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Activation'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid banner3 mt-5 p-5" id="top">
    <h1 class="text-center m-5">Activation du compte</h1>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
    <form class="mx-auto" method="POST" id="activation">
        <div class="form-group w-50 mx-auto text-center">
            <div class="m-5">
                <label for="pseudo">Pseudo</label>
                <input type="text" placeholder="example@example.com" class="form-control" name="pseudo" id="pseudo" autocomplete="off" aria-describedby="pseudoHelp" required>
            </div>
            <div class="m-5">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" autocomplete="off" aria-describedby="mdpHelp" required>
            </div>
            <div class="m-5">
                <div>
                    <img class="m-5" src="captcha.png" />
                </div>
                <label for="captcha">Veuillez recopier le code ci-dessus</label>
                <input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" aria-describedby="captchaHelp" required>
            </div>
            <input type="hidden" value="<?= $account['EMAIL']; ?>" name="email" id="email" readonly required >
            <input type="hidden" value="<?= $account['ID_FORMATION']; ?>" name="formation" id="formation" readonly required>
            <input type="hidden" value="<?= $account['SESSION_NUMBER']; ?>" name="session" id="session" readonly required>
            <input type="hidden" value="<?= $account['ROLE']; ?>" name="role" id="role" readonly required>
            <button id="send-data" class="btn btn-primary mx-auto text-center">Activer mon compte</button>
        </div>
    </form>
<script src="../scripts/activation.js"></script>
<?php require_once('../config/footer.php'); ?>