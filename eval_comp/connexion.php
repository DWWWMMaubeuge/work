<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsNotLogged(); ?>
<?php include('config/head.php'); ?>
<?php require_once('traitements/traitement-connexion.php'); ?>
<?= myHeader('Inscription'); ?>
<?php require_once('config/navbar.php'); ?>
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
    <?php if(isset($feedback)) { ?> <div class="alert alert-info my-5 text-center" role="alert" id="notification"><?= $feedback; ?></div><?php } ?>
    <div class="bg-dark text-white my-5 p-2 border border-white text-center">Vous n'avez pas encore de compte ? <a href="inscription.php">Créer un compte</a></div>
</div>
<?php require_once('config/footer.php'); ?>