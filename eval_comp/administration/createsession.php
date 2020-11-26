<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérifications si l'utilisateur est connecté ?>
<?php userIsSuperAdmin(); // Vérifications si l'utilisateur est un Administrateur ?>
<?php

// Récupération des détails de toutes les formations existantes
$selectformations = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Invitations'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h1 class="text-center m-5">Créer une session de formation</h1>
        <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
        <form class="mx-auto" method="POST" id="addsession">
            <div class="form-group w-50 mx-auto text-center">
                <div class="form-group mt-5">
                    <label class="col-12" for="formation">Selectionnez la formation de la session</label>
                    <select name="formation" id="formation">
                        <option value=""></option>
                        <!-- Affichage des données des formations dans des balises options -->
                        <?php while($formation = $selectformations->fetch()) { ?>
                            <option value="<?= $formation['ID_FORMATION']; ?>"><?= $formation['FORMATION']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Selection de la date de début de la session à créer -->
                 <div class="form-group mt-5">
                    <label class="col-12" for="debut">Selectionnez la date de début</label>
                    <input type="date" name="debut" id="debut" required>
                </div>
                <!-- Selection de la date de fin de la session à créer -->
                <div class="form-group mt-5">
                    <label class="col-12" for="fin">Selectionnez la date de fin</label>
                    <input type="date" name="fin" id="fin" required>
                </div>
                <!-- Insertion de l'emplacement de la session à créer -->
                <div class="form-group my-5">
                    <label class="col-12" for="emplacement">Insérez le lieu de la formation</label>
                    <input type="text" name="emplacement" id="emplacement" required>
                </div>
                <button id="send-data" class="btn btn-primary mx-auto text-center">Inscription</button>
            </div>
        </form>
    </div>
</div>
<!-- Lien vers le script ajax qui gère le formulaire de création de session -->
<script src="../scripts/createsession.js"></script>
<?php require_once('../config/footer.php'); ?>