<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?> 
<?php userIsSuperAdmin(); // Vérification si l'utilisateur est un superadmin ?>
<?php 

$getFormations = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Ajouter une formation'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
        <!-- Début du formulaire d'ajout de formation -->
        <form class="text-center" method="POST" id="ajoutformation">
            <h2 class="text-center my-5">Ajouter une formation</h2>
            <div class="form-group">
                <label class="col-12 mb-3" for="ajouter">Insérez le nom de la formation</label>
                <input type="text" id="nomformation" name="nomformation">
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
        </form>
        <!-- Début du formulaire de suppression d'une formation-->
        <form class="text-center" method="POST" id="ajoutformation">
            <h2 class="text-center my-5">Supprimer une formation</h2>
            <div class="form-group">
                <label class="col-12 mb-3" for="ajouter">Selectionner la formation à supprimer</label>
                <div id="test">
                <select id="deleteformation" name="deleteformation">
                    <option value=""></option>
                    <?php while($resultGet = $getFormations->fetch()) { ?>
                        <option value="<?= $resultGet['ID_FORMATION']; ?>"><?= $resultGet['FORMATION']; ?></option>
                    <?php } ?>
                </select>
                </div>
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
        </form>
    </div>
</div>
<!-- Lien vers le script ajax qui gère l'envoi des données des formulaire à la page de traitement php -->
<script src="../scripts/ajoutformation.js"></script>
<?php require_once('../config/footer.php'); ?>