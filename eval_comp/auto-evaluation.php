<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php

if($infos['Admin'] == TRUE) {
    
    header('Location: ../index.php');
    exit();
    
}

$alluseresultats = $bdd->prepare('SELECT *
FROM Matieres m LEFT JOIN
     (SELECT r.*,
             ROW_NUMBER() OVER (PARTITION BY id_Matiere, id_user ORDER BY TIME_OF_INSERTION DESC) as seqnum
      FROM Resultats r
      WHERE r.ID_USER = :ID_USER 
      AND r.ID_SESSION = :session
     ) r
     ON m.id = r.ID_MATIERE AND
        seqnum = 1
WHERE Active = TRUE AND m.ID_Formation = :formation AND m.ID_Session = :sessioncomps;');
$alluseresultats->bindParam(':ID_USER', $_SESSION['id'], PDO::PARAM_INT);
$alluseresultats->bindParam(':session', $infos['SESSION'], PDO::PARAM_INT);
$alluseresultats->bindParam(':formation', $infos['ID_FORMATION'], PDO::PARAM_INT);
$alluseresultats->bindParam(':sessioncomps', $infos['SESSION'], PDO::PARAM_INT);
$alluseresultats->execute();

$countresultats = $alluseresultats->rowCount();

if($countresultats !== 0) {

    $skills = [];

    while( $data = $alluseresultats->fetch()) {

        array_push( $skills, [ $data['id'], $data['Nom'], $data['RESULTAT'] ] );

    }
    
}
?>
<?php include('config/head.php'); ?>
<?php include('config/formwidget.php'); ?>
<?= myHeader('Auto-evaluation'); ?>
<script src="scripts/autoeval.js"></script>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <?php if($countresultats !== 0) { ?>
            <form class="text-center m-5" method="POST" id="evaluation">
                <h1 class='text-center my-5'>Auto-évaluation du mois de <?= ucfirst(strtolower($mois)); ?></h1>
                <?= setAllWidgetValue( $skills ); ?>
                <div class="alert alert-info my-5 d-none text-center" role="alert" id="confirmation"></div>
            </form>
        <?php } else { ?>
            <h1 class="text-center text-warning my-5">L'auto-évaluation n'est pas disponible pour le moment !</h1>
        <?php } ?>
    </div>
</div>
<?php require_once('config/footer.php'); ?>