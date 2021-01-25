<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsNotLogged(); // Vérification si l'utilisateur n'est pas connecté ?>
<?php checkSecureKeyGetParam(); // Vérification du paramètre passée dans l'url ?>
<?php include('../config/captcha.php'); ?>
<?php

// Récupération de toutes les infos de l'inscription de l'utilisateur selon la secure_key qu'il a passé en paramètre.
$getAccountInfos = $bdd->prepare('SELECT * FROM Membres WHERE Secure_key = :key');
$getAccountInfos->bindParam(':key', $_GET['account'], PDO::PARAM_INT);
$getAccountInfos->execute();

$countResult = $getAccountInfos->rowCount();

if($countResult == 0) {
    
    header('Location: ../index.php');
    exit();
    
}

$account = $getAccountInfos->fetch();

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Reinitilisation du mot de passe'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid banner3 mt-5 p-5" id="top">
    <h1 class="text-center m-5">Réinitialisation du mot de passe</h1>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
    <!-- Début du formulaire d'inscription -->
    <form class="mx-auto" method="POST" id="passwordReset">
        <div class="form-group w-50 mx-auto text-center">
            <!--Champ nouveau password-->
            <div class="m-5">
                <label for="newpassword">Mot de passe</label>
                <input type="password" class="form-control" name="newpassword" id="newpassword" autocomplete="off" aria-describedby="mdpHelp" required>
            </div>
            <!-- Container du captcha généré-->
            <div class="m-5">
                <div>
                    <img class="m-5" src="captcha.png" />
                </div>
                <label for="captcha">Veuillez recopier le code ci-dessus</label>
                <input type="text" class="form-control" name="captcha" id="captcha" autocomplete="off" aria-describedby="captchaHelp" required>
            </div>
            <!-- Stockage des infos récupéré via la requête dans des champs cachée qui seront utilisé pour le traitement de l'inscription -->
            <input type="hidden" value="<?= $account['Email']; ?>" name="email" id="email" readonly required >
            <button id="send-data" class="btn btn-primary mx-auto text-center">Changer mon mot de passe</button>
        </div>
    </form>
<!-- Lien vers le script ajax qui gère le formulaire -->
<script src="../scripts/passwordreset.js"></script>
<?php require_once('../config/footer.php'); ?>