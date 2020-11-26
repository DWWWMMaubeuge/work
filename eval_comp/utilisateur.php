<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php

// Si aucun pseudo n'est passé en paramètre dans l'url ou que le paramètre est vide:
if(!isset($_GET['pseudo']) OR empty($_GET['pseudo'])) {
    
    // L'utilisateur est redirigé vers l'accueil
    header('location: accueil.php');
    exit();

}

// Selection de toutes les infos de la cible selon son pseudo dans la base de données
$userinfos = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.Pseudo = :pseudo');
$userinfos->bindParam(':pseudo', $_GET['pseudo'], PDO::PARAM_STR);
$userinfos->execute();
// Comptage du nombre de résultats
$check = $userinfos->rowCount();

// Si aucun résultat n'est trouvé:
if($check = 0) {
    
    // Redirection de l'utilisateur vers l'accueil
    header('location: accueil.php');
    exit();
    
}

// Récuperation de toutes les données de la cible
$user = $userinfos->fetch();

// Stockage des 3 premières lettres du mois actuel dans une variable
$moisquery = substr($mois, 0, 3);

// Verification si l'utilisateur a une session de formation active:
if($user['SESSION'] != 0) {

    // Selection de touts les résultats pour les compétences actives et ou le mois du résultat, l'id de l'utilisateur et l'id de la session correspondent au mois actuel, l'id utilisateur de la cible et sa session active
    $resultats = $bdd->prepare('SELECT *
    FROM Matieres m LEFT JOIN
         (SELECT r.*,
                 ROW_NUMBER() OVER (PARTITION BY id_Matiere, id_user ORDER BY TIME_OF_INSERTION DESC) as seqnum
          FROM Resultats r
          WHERE r.ID_USER = :ID_USER 
          AND r.ID_SESSION = :sessionresultat
          AND r.MOIS = :mois
         ) r
         ON m.id = r.ID_MATIERE AND
            seqnum = 1
    WHERE Active = TRUE AND m.ID_Formation = :formation AND m.ID_Session = :session;');
    $resultats->bindParam(':ID_USER', $user['ID'], PDO::PARAM_INT);
    $resultats->bindParam(':session', $user['SESSION'], PDO::PARAM_INT);
    $resultats->bindParam(':sessionresultat', $user['SESSION'], PDO::PARAM_INT);
    $resultats->bindParam(':formation', $user['ID_FORMATION'], PDO::PARAM_INT);
    $resultats->bindParam(':mois', $moisquery, PDO::PARAM_STR);
    $resultats->execute();
    // Comptage du nombre de résultat
    $count = $resultats->rowCount();

}

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
                            <div class="d-flex text-dark flex-column align-items-center text-center">
                                <!-- Avatar -->
                                <img src="images/avatars/<?= $user['Avatar']; ?>" alt="avatar" class="rounded-circle" width="150">
                                <!-- Pseudo -->
                                <div class="mt-3 col-sm-12">
                                    <?php if($user['Formateur'] != 1 && $user['Administrateur'] != 1) { ?><h2 class="text-info"><?= $user['Pseudo']?></h2><?php } else { ?> <h2 class="text-danger"><?= $user['Pseudo']?> <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if(!empty($user['Github']) || !empty($user['Site'])) { ?> 
                        <div class="card mt-3">
                            <ul class="bg-dark list-group list-group-flush">
                                <!-- Github -->
                                <?php if(!empty($user['Github'])) { ?>
                                    <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                        <i class="fab fa-github" title="Lien Github"></i><a class="text-white"href="https://github.com/<?= $user['Github']; ?>"><?= $user['Github']; ?></a>
                                    </li>
                                <?php } ?>
                                <!-- Site personnel -->
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
                                    <!-- Prenom -->
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
                                    <!-- Nom -->
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
                            <?php if($infos['Administrateur'] != 0 || $infos['Formateur'] != 0) { ?>
                                <!-- Email -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?= $user['Email']; ?>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                            <div class="row">
                                <!-- Session de formation active -->
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Formation active</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php if($user['SESSION'] != 0) { ?>
                                    <?= $user['FORMATION']; ?> ( Session du <?= dateConvert($user['DATE_DEBUT']); ?> au <?= dateConvert($user['DATE_FIN']); ?> - <?= $user['EMPLACEMENT']; ?> )
                                <?php } else { ?>
                                Cet utilisateur n'a pas de formation active !
                                <?php } ?>
                                </div>
                            </div>
                            <hr>
                            <?php if($user['HIDDEN'] == FALSE) { ?>
                                <?php if(!empty($user['Fixe'])) { ?>
                                    <!-- Telephone fixe -->
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
                                    <!-- Telephone mobile -->
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
                    <!-- Auto évaluation pour le mois courant -->
                    <!-- Vérification si l'utilisateur n'est ni Formateur, ni Administrateur et qu'il a une session de formation active-->
                    <?php if($user['Formateur'] != 1 && $user['Administrateur'] != 1 && $user['SESSION'] != 0) { ?>
                        <div class="row gutters-sm">
                            <div class="col-sm-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-dark">
                                        <!-- Si aucun résultat n'est trouvé dans la base de données-->
                                        <?php if($count == 0) { ?>
                                            <!-- Affichage d'un message -->
                                            <div class="alert alert-danger text-center my-2" role="alert">
                                                Aucune compétences évaluées pour le moment !
                                            </div>
                                        <!-- Sinon: -->
                                        <?php } else { ?>
                                        <!-- Affichage du/des résultats -->
                                        <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Auto-évaluation du mois de <?= strtolower($mois); ?></i></h6>
                                            <?php while($resultat = $resultats->fetch()) { ?>
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