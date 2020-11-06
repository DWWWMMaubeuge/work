<?php require_once('config/pdo-connect.php'); ?>
<?php require_once('config/verifications.php'); ?>
<?php userIsLogged(); ?>
<?php

$req = $bdd->prepare('SELECT *
FROM Matieres m LEFT JOIN
     (SELECT r.*,
             ROW_NUMBER() OVER (PARTITION BY id_Matiere, id_user ORDER BY TIME_OF_INSERTION DESC) as seqnum
      FROM Resultats r
      WHERE r.ID_USER = :ID_USER 
     ) r
     ON m.id = r.ID_MATIERE AND
        seqnum = 1
WHERE Active = TRUE AND ID_Formation = :formation;');
$req->bindParam(':ID_USER', $_SESSION['id'], PDO::PARAM_INT);
$req->bindParam(':formation', $infos['ID_FORMATION'], PDO::PARAM_INT);
$req->execute();

$skills = [];

while( $data = $req->fetch()) {

    array_push( $skills, [ $data['id'], $data['Nom'], $data['RESULTAT'] ] );

}
?>
<?php include('config/head.php'); ?>
<?php include('config/formwidget.php'); ?>
<?= myHeader('Auto-evaluation'); ?>
<script>
    
    function MAJ_Value( id_skill, value, iduser )
    {
      var xhttp = new XMLHttpRequest();
      
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) 
        {
            let confirmation = document.getElementById('confirmation');

            confirmation.className = "alert alert-info my-5 text-center"
            confirmation.innerHTML = "Note modifié avec succès !";
        }
      };

      xhttp.open("GET", "traitements/traitement-evaluation.php?idSkill="+id_skill+"&valSkill="+value+"&iduser="+iduser, true);
      xhttp.send();

    }   
</script>
<?php require_once('config/navbar.php'); ?>
<div class="container-fluid p-5 mt-5 banner3">
    <div class="container bg-dark my-5 p-5 opacity-4">
        <form class="text-center m-5" method="POST" id="evaluation">
            <h1 class='text-center my-4'>Auto-évaluation</h1>
            <?= setAllWidgetValue( $skills ); ?>
            <div class="alert alert-info my-5 d-none text-center" role="alert" id="confirmation"></div>
        </form>
        <?= checkAdminForComps(); ?>
    </div>
</div>
<?php require_once('config/footer.php'); ?>