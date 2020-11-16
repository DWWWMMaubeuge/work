<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php

if(!isset($_GET['pseudo']) OR empty($_GET['pseudo'])) {

    header('location: accueil.php');
    exit();

}

$q = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Formations ON Options.FORMATION = Formations.ID_FORMATION  LEFT JOIN Sessions ON Options.FORMATION = Sessions.ID_SESSION WHERE Membres.Pseudo = :pseudo');
$q->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
$q->execute();
$check = $q->rowCount();

if($check = 0) {

    header('location: accueil.php');
    exit();
    
}

$user = $q->fetch();

$moisquery = substr($mois, 0, 3);

$q = $bdd->prepare('SELECT *
FROM Matieres m LEFT JOIN
     (SELECT r.*,
             ROW_NUMBER() OVER (PARTITION BY id_Matiere, id_user ORDER BY TIME_OF_INSERTION DESC) as seqnum
      FROM Resultats r
      WHERE r.ID_USER = :user
      AND MOIS = :mois
     ) r
     ON m.id = r.ID_MATIERE AND
        seqnum = 1
WHERE Active = TRUE AND ID_Formation = :formation;');
$q->bindParam(':user', $user['ID'], PDO::PARAM_INT);
$q->bindParam(':formation', $user['ID_FORMATION'], PDO::PARAM_INT);
$q->bindParam(':mois', $moisquery, PDO::PARAM_STR);
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
                                    <?php if($user['Admin'] != 1) { ?><h2 class="text-primary"><?= $user['Pseudo']?></h2><?php } else { ?> <h2 class="text-danger"><?= $user['Pseudo']?> <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($user['Github']) OR !empty($user['Site'])) { ?>
                        <div class="card mt-3">
                            <ul class="bg-dark list-group list-group-flush">
                                <?php if(!empty($user['Github'])) { ?>
                                    <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <i class="fab fa-github" title="Lien Github"></i><a class="text-white"href="https://github.com/<?= $user['Github']; ?>"><?= $user['Github']; ?></a>
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
                    <div class="card mb-3">
                        <div class="card-body text-dark">
                            <?php if($user['HIDDEN'] == FALSE) { ?>
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
                            <?php } ?>
                            <?php if($user['HIDDEN'] == FALSE) { ?>
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
                            <?php } ?>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Formation</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php if($user['ID_FORMATION'] == 0) { echo "Non renseigné !"; } else { echo $user['FORMATION'] . " ( session du " . dateConvert($user['DATE_DEBUT']) . " au " . dateConvert($user['DATE_FIN']) . ")"; } ?>
                                </div>
                            </div>
                            <hr>
                            <?php if($user['HIDDEN'] == FALSE) { ?>
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
                            <?php } ?>
                            <?php if($user['HIDDEN'] == FALSE) { ?>
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
                            <?php } ?>
                        </div>
                    </div>
                    <?php if($user['Admin'] != 1) { ?>
                        <div class="row gutters-sm">
                            <div class="col-sm-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-dark">
                                        <?php if($count == 0) { ?>
                                            <div class="alert alert-danger text-center my-2" role="alert">
                                                Aucune compétences évaluées pour le moment !
                                            </div>
                                        <?php } else { ?>
                                        <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Auto-évaluation du mois de <?= strtolower($mois); ?></i></h6>
                                            <?php foreach($resultats as $resultat) { ?>
                                                <?php if($resultat['Active'] == TRUE) { ?>
                                                    <small><?= $resultat['Nom']; ?></small>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('config/footer.php'); ?>
<?php print_r($user); ?>