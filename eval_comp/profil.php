<?php require_once('pdo-connect.php'); ?>
<?php 

$q = $bdd->prepare('SELECT * FROM Membres WHERE ID = :id');
$q->bindParam(':id', $_SESSION['id']);
$q->execute();

$infos = $q->fetch();

$q = $bdd->prepare('SELECT * FROM Resultats JOIN Matieres ON Resultats.ID_MATIERE = Matieres.id WHERE ID_USER = :user');
$q->bindParam(':user', $_SESSION['id']);
$q->execute();

$resultats = $q->fetchAll();

?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://kit.fontawesome.com/747acc35b5.js" crossorigin="anonymous"></script>
    <title>Formation DWM / Inscription </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="m-5">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h2 class="text-dark"><?= $infos['Pseudo']?></h2>
                                    <button class="btn btn-outline-primary">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="bg-dark list-group list-group-flush">
                            <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <i class="fab fa-github"></i><a class="text-white" href="https://github.com/<?= $infos['Github']; ?>"><?= $infos['Github']; ?></a>
                            </li>
                            <?php if(!empty($infos['Site'])) { ?>
                                <li class="bg-dark list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <i class="fas fa-link"></i><a class="text-white" href="<?= $infos['Site']; ?>">Site personnel</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body text-dark">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom complet</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $infos['Prenom'] . ' ' . $infos['Nom']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $infos['Email']; ?>
                                </div>
                            </div>
                            <?php if(!empty($infos['Fixe'])) { ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $infos['Fixe']; ?>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(!empty($infos['Mobile'])) { ?>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $infos['Mobile']; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-dark">
                                    <h6 class="d-flex w-100 align-items-center mb-3"><i class="material-icons text-info mr-2">Compétences</i></h6>
                                    <?php foreach($resultats as $resultat) { ?>
                                        <?php if($resultat['Active'] == TRUE) { ?>
                                            <small><?= $resultat['Nom']; ?> : <?php print($resultat['RESULTAT']); ?></small>
                                            <div class="progress mb-3" style="height: 5px">
                                            <div class="progress-bar" role="progressbar" style="width: <?php print($resultat['RESULTAT']); ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
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
    <?php require_once('footer.php'); ?>