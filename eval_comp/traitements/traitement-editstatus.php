<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site et si ce membre est un Administrateur
if(isset($_SESSION['id']) && $infos['Administrateur'] == TRUE) {
    
    // Si un pseudo est selectionné par un Administrateur et est passé par Ajax
    if(isset($_POST['Pseudo'])) {
        
        //Selection du status du membre sur le site
        $getStatusMember = $bdd->prepare('SELECT Administrateur, Formateur FROM Membres WHERE Pseudo = :pseudo');
        $getStatusMember->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
        $getStatusMember->execute();
        $countQuery = $getStatusMember->rowCount();
        
        // Comptage des résultats
        if($countQuery = 1) {
            
            // Récupération du status et stockage dans une variable
            $result = $getStatusMember->fetch();
            
            $response = "<div class='form-group my-5' id='superAdminStatus'>";
                $response .= "<label class='col-12' for='superAdmin'>SuperAdministrateur</label>";
                $response .= "<select name='superAdmin' id='superAdmin'>";
                    $response .= "<option value='0' ";
                    $response .= $result['Administrateur'] == 0 ? "selected" : "";
                    $response .= ">Non</option>";
                    $response .= "<option value='1' ";
                    $response .= $result['Administrateur'] == 1 ? "selected" : "";
                    $response .= ">Oui</option>";
                $response .= " </select>";
            $response .= "</div>";
            $response .= "<div class='form-group my-5' id='adminStatus'>";
                $response .= "<label class='col-12' for='admin'>Administrateur</label>";
                $response .= "<select name='admin' id='admin'>";
                $response .= "<option value='0' ";
                $response .= $result['Formateur'] == 0 ? "selected" : "";
                $response .= ">Non</option>";
                $response .= "<option value='1' ";
                $response .= $result['Formateur'] == 1 ? "selected" : "";
                $response .= ">Oui</option>";
                $response .= "</select>";
            $response .= "</div>";
            
            $feedback = $response;
            
            
        } else {
            
            $feedback = "Aucun membre avec ce pseudo existe dans la base de donnée !";
        
        }
        
    }

    if(isset($_POST['Membre']) && isset($_POST['Administrateur']) && isset($_POST['Formateur'])) {
        
        // Stockages des status dans des variables
        $superadmin = intval($_POST['Administrateur']);
        $admin = intval($_POST['Formateur']);
        
        // Mise à jour des status du membres selon les nouveaux paramètres
        $updatemember = $bdd->prepare('UPDATE Membres SET Administrateur = :administrateur, Formateur = :formateur WHERE Pseudo = :pseudo');
        $updatemember->bindParam(':administrateur', $superadmin, PDO::PARAM_BOOL);
        $updatemember->bindParam(':formateur', $admin, PDO::PARAM_BOOL);
        $updatemember->bindParam(':pseudo', $_POST['Membre'], PDO::PARAM_STR);
        $updatemember->execute();
        
        $feedback = "Les paramètres du compte de cet utilisateur ont bien été changés !";
        
    }
    
    // Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
        
        echo $feedback;
        
    }
    
}

?>