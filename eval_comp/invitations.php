<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdmin(); ?>
<?php include('config/head.php'); ?>
<?= myHeader('Invitations'); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <h1 class="text-center m-5">Envoyer une invitation</h1>
    <form class="mx-auto" method="POST" id="invitations">
        <div class="form-group w-50 mx-auto text-center">
            <div><label for="email">Insérer la(les) adresse(s) email à inviter sur le site</label></div>
            <div><small>Si vous insérer plusieurs adresses, veuillez les séparer d'un espace.</small></div>
            <div class="mt-5"><textarea class="form-control" id="emails" name="emails" rows="10" cols="100"></textarea></div>
            <button id="send-data" class="btn btn-primary mx-auto my-5 text-center">Inscription</button>
        </div>
    </form>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
</div>
<script src="scripts/invitations.js"></script>
<?php require_once('config/footer.php'); ?>