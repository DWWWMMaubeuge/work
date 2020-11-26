<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); // Vérification si l'utilisateur est connecté ?>
<?php userIsAdminOrSuperAdmin(); // Vérification si l'utilisateur est un admin ou un superadmin ?>
<?php include('../config/head.php'); ?>
<?= myHeader('Accueil administration'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <h1 class="text-center m-5">Accueil <?php if($infos['Formateur'] == TRUE && $infos['Administrateur'] == FALSE) { ?> formateur <?php } elseif($infos['Administrateur'] == TRUE) { ?> Administrateur <?php } ?></h1>
    <div class="my-5 w-50 mx-auto text-center">
        
        <!--Espace formateur qui s'affiche si l'utilisateur est administrateur-->
        
        <!-- Si le formateur a une session de formation active: -->
        <?php if($infos['SESSION'] != 0) { ?>
            
            <!-- Affichage du lien pour modifier sa session -->
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="edit-evaluation.php"><i class="fas fa-wrench"></i> Editer ma session de formation</a>
            </div>
            
        <?php } ?>
        
        <!-- Si le formateur n'a pas de session active et qu'il n'est pas SuperAdministrateur: -->
        <?php if($infos['SESSION'] == 0) { ?>
            
            <!-- Affichage d'un message d'avertissement -->
            <div class="text-center text-warning my-5 bg-dark my-5 p-5 opacity-4" role="alert">
                Vous n'avez pas de session de formation active !
            </div>
        
        <?php } ?>
        
        <!--Espace SuperAdmin qui ne s'affiche que si l'utilisateur est un Administrateur-->
        
        <!-- Si l'utilisateur est un SuperAdmin-->
        <?php if($infos['Administrateur'] != 0) { ?>
            
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="edit-formations.php"><i class="fas fa-plus-circle"></i> Ajouter ou supprimer une formation</a>
            </div>
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="createsession.php"><i class="fas fa-plus-circle"></i> Créer une session de formation</a>
            </div>
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="edit-status.php"><i class="fas fa-plus-circle"></i> Modifier les permissions d'un membre</a>
            </div>
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="invitations.php"><i class="fas fa-envelope"></i> Inviter des utilisateurs dans une session de formation</a>
            </div>
            
        <?php } ?>
        
    </div>
</div>
<?php require_once('../config/footer.php'); ?>