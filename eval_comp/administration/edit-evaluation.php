<?php include('../config/comps.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?>
<?php userIsAdmin(); // Vérification si l'utilisateur est un admin ?>
<?php include('../config/head.php'); ?>
<?= myHeader('Edition de compétences'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <h2 class="text-center my-5">Modifications des compétences</h2>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
        <!-- Formulaire d'activation d'une compétence -->
        <form class="text-center" method="POST" id="activerComp">
            <h3 class='text-center my-4'>Activation d'une compétence</h3>
            <?= getComps($infos['ID_FORMATION'], $infos['SESSION'], 0); ?>
            <input type="hidden" value="<?= $infos['SESSION']; ?>" name="session" id="session" required readonly>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Activer</button>
        </form>
        <!-- Formulaire de désactivation d'une compétence -->
        <form class="text-center" method="POST" id="desactiverComp">
            <h3 class='text-center my-4'>Desactivation d'une compétence</h3>
            <?= getComps($infos['ID_FORMATION'], $infos['SESSION'], 1); ?>
            <input type="hidden" value="<?= $infos['SESSION']; ?>" name="session" id="session" required readonly>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Désactiver</button>
        </form>
        <h2 class="text-center my-5">Ajout d'une compétence</h3>
        <!-- Formulaire d'ajout d'une compétence -->
        <form class="text-center" method="POST" id="ajoutComp">
            <div class="form-group my-3">
                <label for="add">Nom de la compétence</label>
                <input type="text" class="form-control w-25 mx-auto" name="nomcompetence" id="add" aria-describedby="nomHelp">
            </div>
            <input type="hidden" readonly name="formation" id="formation" value="<?= $infos['ID_FORMATION']; ?>">
            <input type="hidden" value="<?= $infos['SESSION']; ?>" name="session" id="session" required readonly>
            <div class="form-group my-3">
                <label for="isactivated">La compétence doit-elle être activé ?</label>
                <select name="isactivated" id="is-activated">
                    <option value="Oui">Oui</option>
                    <option value="Non">Non</option>
                </select>
            </div>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Ajouter</button>
        </form>
        <h2 class='text-center my-5'>Changer la date de la session</h3>
        <!-- Formulaire de changement des dates de la session-->
        <form class="text-center" method="POST" id="dates">
            <div class="form-group my-3">
                <label for="add">Date de début</label>
                <input type="date" class="form-control w-25 mx-auto" name="datedebut" id="datedebut" aria-describedby="nomHelp">
            </div>
            <div class="form-group my-3">
                <label for="add">Date de fin</label>
                <input type="date" class="form-control w-25 mx-auto" name="datefin" id="datefin" aria-describedby="nomHelp">
            </div>
            <!-- Stockage de l'id de la session à modifier dans un champ caché pour le traitement PHP/SQL -->
            <input type="hidden" value="<?= $infos['SESSION']; ?>" name="session" id="session" required readonly>
            <button id="send-data" class="btn btn-primary mt-2 mb-3 text-center">Modifier</button>
        </form>
    </div>
</div>
<!-- Lien vers le script ajax qui gère chaque formulaires -->
<script src="../scripts/editeval.js"></script>
<?php require_once('../config/footer.php'); ?>