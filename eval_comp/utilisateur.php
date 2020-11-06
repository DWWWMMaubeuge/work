<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php

if(!isset($_GET['pseudo']) OR empty($_GET['pseudo'])) {

    header('location: accueil.php');
    exit();

}

$q = $bdd->prepare('SELECT * FROM Membres JOIN Options ON Membres.ID = Options.ID WHERE Membres.Pseudo = :pseudo');
$q->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
$q->execute();
$check = $q->rowCount();

if($check = 0) {

    header('location: accueil.php');
    exit();
    
}

$user = $q->fetch();

$q = $bdd->prepare('SELECT * FROM Resultats JOIN Matieres ON Resultats.ID_MATIERE = Matieres.id WHERE ID_USER = :user ORDER BY Matieres.id');
$q->bindParam(':user', $user['ID'], PDO::PARAM_INT);
$q->execute();
$count = $q->rowCount();

$resultats = $q->fetchAll();

?>
<?php include('config/head.php'); ?>
<?php include('config/formwidget.php'); ?>
<?= myHeader('Profil de ' . $user['Pseudo']); ?>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="m-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="images/avatars/<?= $user['Avatar']; ?>" alt="avatar" class="rounded-circle" width="150">
                                <div class="mt-3 col-sm-12">
                                    <h2 class="text-dark"><?= $user['Pseudo']?></h2> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($user['Github']) OR !empty($user['Site'])) { ?>
                        <div class="card mt-3">
                            <ul class="bg-dark list-group list-group-flush">
                                <?php if(!empty($user['Github'])) { ?>
                                    <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <i class="fab fa-github" title="Lien Github"></i><a class="text-white"href="https://github.com/<?= $user['Github']; ?>"><?= $infos['Github']; ?></a>
                                    </li>
                                <?php } ?>
                                <?php if(!empty($user['Site'])) { ?>
                                    <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <i class="fas fa-link" title="Lien site personnel"></i><a class="text-white" href="<?= $user['Site']; ?>" target="_blank">Site personnel</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <?php if($user['HIDDEN'] == FALSE) { ?>
                        <?php if(!empty($user['Prenom']) OR !empty($user['Nom']) OR !empty($user['Fixe'] OR !empty($user['Mobile']) )) { ?>
                            <div class="card mb-3">
                                <div class="card-body text-dark">
                                    <?php if(!empty($user['Prenom'])) { ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Prénom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $infos['Prenom']?>
                                            </div>
                                        </div>  
                                    <hr>
                                    <?php } ?>
                                    <?php if(!empty($user['Nom'])) { ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Nom</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $user['Nom']?>
                                            </div>
                                        </div>
                                    <hr>
                                    <?php } ?>
                                    <?php if(!empty($user['Fixe'])) { ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Téléphone fixe</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?= $user['Fixe']; ?>
                                            </div>
                                        </div>
                                    <hr>
                                    <?php } ?>
                                    <?php if(!empty($user['Mobile'])) { ?>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Téléphone mobile</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                    <?= $user['Mobile']; ?>
                                            </div>
                                        </div>
                                <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-dark">
                                    <?php if($count == 0) { ?>
                                        <div class="alert alert-danger text-center my-2" role="alert">
                                            Aucune compétences évaluées pour le moment !
                                        </div>
                                    <?php } else { ?>
                                    <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Compétences</i></h6>
                                        <?php foreach($resultats as $resultat) { ?>
                                            <?php if($resultat['Active'] == TRUE) { ?>
                                                <small><?= $resultat['Nom']; ?> : <?= $resultat['RESULTAT']; ?></small>
                                                <div class="progress mb-3" style="height: 5px">
                                                <div class="progress-bar" role="progressbar" style="width: <?= ($resultat['RESULTAT']); ?>0%" aria-valuemin="0" aria-valuemax="10"></div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('config/footer.php'); ?>