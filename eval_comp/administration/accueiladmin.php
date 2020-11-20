<?php require_once('../config/pdo-connect.php'); ?>
<?php require_once('../config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php userIsAdminOrSuperAdmin(); ?>
<?php include('../config/head.php'); ?>
<?= myHeader('Accueil administration'); ?>
<?php require_once('../config/navbar.php'); ?>
<div class="container-fluid p-5 banner3 mt-5">
    <h1 class="text-center m-5">Accueil administrateur</h1>
    <div class="my-5 w-50 mx-auto text-center">
        <div class="my-5 p-5 bg-dark opacity-4">
            <a class="text-light" href="edit-evaluation.php"><i class="fas fa-wrench"></i> Editer les compétences de ma session de formation</a>
        </div>
        <?php if($infos['SuperAdmin'] != 0) { ?>
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="edit-status.php"><i class="fas fa-plus-circle"></i> Ajouter un formateur</a>
            </div>
            <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="invitations.php"><i class="fas fa-envelope"></i> Inviter des utilisateurs dans une session de formation</a>
            </div>
             <div class="my-5 p-5 bg-dark opacity-4">
                <a class="text-light" href="createsession.php"><i class="fas fa-plus-circle"></i> Créer une session de formation</a>
            </div>
        <?php } ?>
        
    </div>
</div>
<?php require_once('../config/footer.php'); ?>