<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); // On vérifie si l'utilisateur est connecté ?>
<?php

// Si l'utilisateur est un admin ou un superadmin on le renvoie vers l'accueil
if($infos['Admin'] == TRUE || $infos['SuperAdmin'] == TRUE) {
    
    header('Location: ../index.php');
    exit();
    
}

// Selection des compétences et de touts les résultats pour les compétences actives dans la base de données
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

// Comptage du nombre de résultats
$countresultats = $alluseresultats->rowCount();

// Si des résultats sont retournées:
if($countresultats !== 0) {
    
    // Initialisation d'un tableau skills
    $skills = [];

    // Insertion des données récupéré dans le tableau skills créé
    while( $data = $alluseresultats->fetch()) {

        array_push( $skills, [ $data['id'], $data['Nom'], $data['RESULTAT'] ] );

    }
    
}
?>
<?php include('config/head.php'); ?>
<?php include('config/formwidget.php'); ?>
<?= myHeader('Auto-evaluation'); ?>
<!-- Lien vers le script JQuery de l'auto-évaluation -->
<script src="scripts/autoeval.js"></script>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <!-- Si un ou des résultats ont été retournés par la requête SQL -->
        <?php if($countresultats !== 0) { ?>
            <!-- Début du formulaire d'auto-évaluation -->
            <form class="text-center m-5" method="POST" id="evaluation">
                <h1 class='text-center my-5'>Auto-évaluation du mois de <?= ucfirst(strtolower($mois)); ?></h1>
                <div class="alert alert-info my-5 d-none text-center" role="alert" id="confirmation"></div>
                <?= setAllWidgetValue( $skills ); ?>
            </form>
        <!-- Si il n'y a eu aucun résultat avec la requête SQL: -->
        <?php } else { ?>
            <!-- Affichage d'un message d'erreur en tant que titre-->
            <h1 class="text-center text-warning my-5">L'auto-évaluation n'est pas disponible pour le moment !</h1>
        <?php } ?>
    </div>
</div>
<?php require_once('config/footer.php'); ?>