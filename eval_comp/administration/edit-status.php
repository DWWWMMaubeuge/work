<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsSuperAdmin(); ?>
<?php

$allmembers = $bdd->query('SELECT Pseudo FROM Membres WHERE Admin != 1 ORDER BY Pseudo');

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Ajouter un admin'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h2 class="text-center my-5">Ajouter un formateur</h2>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
        <form class="text-center" method="POST" id="ajouteradmin">
            <div class="form-group">
                <label class="col-12 mb-3" for="ajouter">Selectionnez le membre à ajouter en tant que formateur</label>
                <select name="ajouteradmin" id="selectadmin">
                    <?php while($member = $allmembers->fetch()) { ?>
                        <option value="<?= $member['Pseudo']; ?>"><?= $member['Pseudo']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
        </form>
    </div>
</div>
<script src="../scripts/edit-status.js"></script>
<?php require_once('../config/footer.php'); ?>