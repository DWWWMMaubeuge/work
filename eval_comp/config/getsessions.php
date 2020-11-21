<?php

include('pdo-connect.php');

if(isset($_POST['idformation'])) {
    
    GLOBAL $bdd;
    
    $selectsessions = $bdd->prepare('SELECT * FROM Sessions LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Sessions.STATUS = TRUE AND Sessions.ID_FORMATION = :formation ORDER BY ID_SESSION');
    $selectsessions->bindParam(':formation', $_POST['idformation'], PDO::PARAM_INT);
    $selectsessions->execute();
    $countsession = $selectsessions->rowCount();
    
    if($countsession != 0) {
        
        echo "<select name='idsession' id='idsession'>";
        while($session = $selectsessions->fetch()) {
            
            echo "<option value=' " . $session['ID_SESSION'] . "'>" . $session['FORMATION'] . " du " . $session['DATE_DEBUT'] . " au " . $session['DATE_FIN'] . " - " . $session['EMPLACEMENT'] . "</option>";
        
            
        }
        
        echo "</select>";
        
    } else {
        
        echo "<span class='text-danger' id='idsession'>Aucune session programmée pour cette formation !</span>";
        
    }
    
}

?>