<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site et si ce membre est un SuperAdmin
if(isset($_SESSION['id']) && $infos['SuperAdmin'] == TRUE) {
    
    // Si un pseudo est selectionné par un SuperAdmin et passé par Ajax
    if(isset($_POST['Pseudo'])) {
        
        //Selection du status du membre sur le site
        $getStatusMember = $bdd->prepare('SELECT SuperAdmin, Admin FROM Membres WHERE Pseudo = :pseudo');
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
                    $response .= $result['SuperAdmin'] == 0 ? "selected" : "";
                    $response .= ">Non</option>";
                    $response .= "<option value='1' ";
                    $response .= $result['SuperAdmin'] == 1 ? "selected" : "";
                    $response .= ">Oui</option>";
                $response .= " </select>";
            $response .= "</div>";
            $response .= "<div class='form-group my-5' id='adminStatus'>";
                $response .= "<label class='col-12' for='admin'>Administrateur</label>";
                $response .= "<select name='admin' id='admin'>";
                $response .= "<option value='0' ";
                $response .= $result['Admin'] == 0 ? "selected" : "";
                $response .= ">Non</option>";
                $response .= "<option value='1' ";
                $response .= $result['Admin'] == 1 ? "selected" : "";
                $response .= ">Oui</option>";
                $response .= "</select>";
            $response .= "</div>";
            
            $feedback = $response;
            
            
        } else {
            
            $feedback = "Aucun membre avec ce pseudo existe dans la base de donnée !";
        
        }
        
    }

    if(isset($_POST['Membre']) && isset($_POST['SuperAdmin']) && isset($_POST['Admin'])) {
        
        // Stockages des status dans des variables
        $superadmin = intval($_POST['SuperAdmin']);
        $admin = intval($_POST['Admin']);
        
        // Mise à jour des status du membres selon les nouveaux paramètres
        $updatemember = $bdd->prepare('UPDATE Membres SET SuperAdmin = :superadmin, Admin = :admin WHERE Pseudo = :pseudo');
        $updatemember->bindParam(':superadmin', $superadmin, PDO::PARAM_BOOL);
        $updatemember->bindParam(':admin', $admin, PDO::PARAM_BOOL);
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