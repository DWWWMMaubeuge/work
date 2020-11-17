<?php include('../config/comps.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdmin(); ?>
<?php

$req = $bdd->query('SELECT * FROM Formations');

?>

<?php include('../config/head.php'); ?>
<?= myHeader('Edition de compétences'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h2 class="text-center my-5">Modifications des compétences</h2>
        <form class="text-center" method="POST" id="activerComp">
            <h3 class='text-center my-4'>Activation d'une compétence</h3>
            <?= getDisabledComps($infos['ID_FORMATION']); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Activer</button>
            <div id="confirmation"></div>
        </form>
        <form class="text-center" method="POST" id="desactiverComp">
            <h3 class='text-center my-4'>Desactivation d'une compétence</h3>
            <?= getEnabledComps($infos['ID_FORMATION']); ?>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Désactiver</button>
            <div id="confirmation"></div>
        </form>
        <h2 class="text-center my-5">Ajout d'une compétence</h3>
        <form class="text-center" method="POST" id="ajoutComp">
            <div class="form-group my-3">
                <label for="add">Nom de la compétence</label>
                <input type="text" class="form-control w-25 mx-auto" name="nomcompetence" id="add" aria-describedby="nomHelp">
            </div>
            <input type="hidden" readonly name="formation" id="formation" value="<?= $infos['ID_FORMATION']; ?>">
            <div class="form-group my-3">
                <label for="isactivated">La compétence doit-elle être activé ?</label>
                <select name="isactivated" id="is-activated">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
            <div id="confirmation"></div>
        </form>
        <h2 class='text-center my-5'>Changer la date de la session</h3>
        <form class="text-center" method="POST" id="dates">
            <div class="form-group my-3">
                <label for="add">Date de début</label>
                <input type="date" class="form-control w-25 mx-auto" name="datedebut" id="datedebut" aria-describedby="nomHelp">
            </div>
            <div class="form-group my-3">
                <label for="add">Date de fin</label>
                <input type="date" class="form-control w-25 mx-auto" name="datefin" id="datefin" aria-describedby="nomHelp">
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Modifier</button>
            <div id="confirmation"></div>
        </form>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
    </div>
</div>
<script src="../scripts/editeval.js"></script>
<?php require_once('../config/footer.php'); ?>