<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?>
<?php userIsSuperAdmin(); // Vérification si l'utilisateur est un superadmin ?>
<?php

// Récupération des infos de chaque formations
$selectformations = $bdd->query('SELECT * FROM Formations ORDER BY FORMATION');

?>
<?php include('../config/head.php'); ?>
<?= myHeader('Invitations'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h1 class="text-center m-5">Inviter des utilisateurs</h1>
        <div class="alert alert-light my-5 d-none text-center" role="alert" id="notification"></div>
        <!-- Formulaire d'envoi d'invitation-->
        <form class="mx-auto" method="POST" id="ajoututilisateurs">
            <div class="form-group w-50 mx-auto text-center">
                <!-- Selection de la formation -->
                <div class="form-group my-5">
                    <label class="col-12" for="idformation">Selectionnez la formation</label>
                    <select name="idformation" id="idformation" onchange="getSessions()">
                        <option value=""></option>
                        <!-- Affichage des données des formations dans des balises options -->
                        <?php while($formation = $selectformations->fetch()) { ?>
                            <option value="<?= $formation['ID_FORMATION']; ?>"><?= $formation['FORMATION']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Selection de la session dans laquelle inviter le/les utilisateur(s) -->
                 <div class="d-none form-group my-5" id="selectsession">
                    <label class="col-12" for="idsession">Selectionnez la session</label>
                    <select name="idsession" id="idsession">
                        <option value=""></option>
                        <!-- Les sessions à affichées sont gérés par ajax, selon la formation qui est selectionnée -->
                    </select>
                </div>
                <!-- Selection du role des utilisateurs à inviter -->
                <div class="form-group my-5">
                    <label for="role">Selectionnez le rôle</label>
                    <select name="role" id="role">
                        <option value=""></option>
                        <option value="Stagiaire">Stagiaire</option>
                        <option value="Formateur">Formateur</option>
                    </select>
                </div>
                <!-- Insertion des adresses e-mails à inviter -->
                <div><label for="email">Insérez la(les) adresse(s) email à inviter</label></div>
                <div class="mt-3"><textarea class="form-control" id="emails" name="emails" rows="10" cols="100"></textarea></div>
                <button id="send-data" class="btn btn-primary mx-auto my-5 text-center">Inscription</button>
            </div>
        </form>
    </div>
</div>
<!-- Lien vers le script ajax qui gère le formulaire -->
<script src="../scripts/ajoututilisateurs.js"></script>
<?php require_once('../config/footer.php'); ?>