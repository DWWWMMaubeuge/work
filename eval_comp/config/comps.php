<?php

include('../config/pdo-connect.php'); // Insertion du fichier de connexion à la bdd
    
if(isset($_SESSION['id']) && $infos['Admin'] == TRUE) {
        
    // Fonction récuperant les compétences selon la formation active, la session active où est inscrit l'utilisateur et le status des compétences demandées
    function getComps($idformation, $idsession, $status) { 
    
        GLOBAL $bdd;
    
        // Récuperation des compétences selon les paramètres passés dans la fonction
        $allcomps = $bdd->prepare('SELECT * FROM Matieres WHERE ID_Formation = :formation AND ID_SESSION = :session AND Active = :status ORDER BY Nom');
        $allcomps->bindParam(':formation', $idformation, PDO::PARAM_INT);
        $allcomps->bindParam(':session', $idsession, PDO::PARAM_INT);
        $allcomps->bindParam(':status', $status, PDO::PARAM_BOOL);
        $allcomps->execute();
        
        // Si $status vaut true alors on crée un select qui proposera toutes les compétences active
        if($status == 1) {
            echo "<div class='form-group'>";
            echo "<label for='matiere'>Selectionner une compétence</label>";
            echo "<select class='ml-3' name='matiere' id='disableComp'>";
            echo "<option selected='selected'></option>";
            while($comps = $allcomps->fetch() ){
        
                //Création de chaque option dans le select selon les compétences active récupérées
                echo "<option value='". $comps['Nom'] . "'>". $comps['Nom'] . "</option>";
        
            }
            
            echo "</select>";
            echo "</div>";
        
        // Dans le cas contraire on créera un select avec toutes les compétences inactives
        } elseif($status == 0) {
            
            echo "<div class='form-group'>";
            echo "<label for='matiere'>Selectionner une compétence</label>";
            echo "<select class='ml-3'name='matiere' id='enableComp'>";
            echo "<option selected='selected'></option>";
            while($comps = $allcomps->fetch() ){
                
                echo "<option value='". $comps['Nom'] . "'>". $comps['Nom'] . "</option>";
                
            }
            echo "</select>";
            echo "</div>";
            
        }
    
    }

}

?>