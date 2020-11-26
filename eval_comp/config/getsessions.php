<?php

include('pdo-connect.php');
    
    if(isset($_SESSION['id']) && $infos['Administrateur'] == TRUE) {
        
        if(isset($_POST['idformation'])) {
            
            GLOBAL $bdd;
            
            // Selection de toutes les sessions de formations qui appartiennent à la formation envoyées par le javascript du formulaire d'invitations d'utilisateurs dans une formation
            $selectsessions = $bdd->prepare('SELECT * FROM Sessions LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Sessions.STATUS = TRUE AND Sessions.ID_FORMATION = :formation ORDER BY ID_SESSION');
            $selectsessions->bindParam(':formation', $_POST['idformation'], PDO::PARAM_INT);
            $selectsessions->execute();
            // Comptage du nombre de résultats
            $countsession = $selectsessions->rowCount();
            
            if($countsession != 0) {
                
                // Création d'un select si le nombre de session existante est différent de 0
                echo "<select name='idsession' id='idsession'>";
                while($session = $selectsessions->fetch()) {
                    
                    // Création d'une option dans le select pour chaque session trouvée dans la base de données.
                    echo "<option value=' " . $session['ID_SESSION'] . "'>" . $session['FORMATION'] . " du " . $session['DATE_DEBUT'] . " au " . $session['DATE_FIN'] . " - " . $session['EMPLACEMENT'] . "</option>";
                
                }
                
                echo "</select>";
                
            } else {
                
                // Sinon on affiche un message d'erreur si aucune session n'est trouvée
                echo "<span class='text-danger' id='idsession'>Aucune session programmée pour cette formation !</span>";
                
            }
            
        }
        
    }

?>