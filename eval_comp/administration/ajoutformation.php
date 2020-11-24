<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?> 
<?php userIsSuperAdmin(); // Vérification si l'utilisateur est un superadmin ?>
<?php include('../config/head.php'); ?>
<?= myHeader('Ajouter une formation'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h2 class="text-center my-5">Ajouter une formation</h2>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
        <!-- Début du formulaire d'ajout de formation -->
        <form class="text-center" method="POST" id="ajoutformation">
            <div class="form-group">
                <label class="col-12 mb-3" for="ajouter">Insérez le nom de la formation</label>
                <input type="text" id="nomformation" name="nomformation">
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
        </form>
    </div>
</div>
<script src="../scripts/ajoutformation.js"></script>
<?php require_once('../config/footer.php'); ?>