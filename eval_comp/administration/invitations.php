<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsSuperAdmin(); ?>
<?php

$q = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Invitations'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <h1 class="text-center m-5">Inviter des utilisateurs</h1>
    <form class="mx-auto" method="POST" id="invitations">
        <div class="form-group w-50 mx-auto text-center">
            <div class="form-group my-5">
                <label for="formation">Selectionner la formation</label>
                <select name="formation" id="idformation">
                    <option value=""></option>
                    <?php while($formation = $q->fetch()) { ?>
                        <option value="<?= $formation['ID_FORMATION']; ?>"><?= $formation['FORMATION']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div><label for="email">Insérer la(les) adresse(s) email à inviter</label></div>
            <div><small>Si vous insérer plusieurs adresses, veuillez les séparer d'un espace.</small></div>
            <div class="mt-3"><textarea class="form-control" id="emails" name="emails" rows="10" cols="100"></textarea></div>
            <button id="send-data" class="btn btn-primary mx-auto my-5 text-center">Inscription</button>
        </div>
    </form>
    <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
</div>
<script src="../scripts/invitations.js"></script>
<?php require_once('../config/footer.php'); ?>