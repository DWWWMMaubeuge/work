<?php

include('../config/pdo-connect.php');

if(isset($_POST['Admin']) && !empty($_POST['Admin'])) {
    
    $admin = 1;
    $updatemember = $bdd->prepare('UPDATE Membres SET Admin = :admin WHERE Pseudo = :pseudo');
    $updatemember->bindParam(':admin', $admin, PDO::PARAM_INT);
    $updatemember->bindParam(':pseudo', $_POST['Admin'], PDO::PARAM_STR);
    $updatemember->execute();
    
    $feedback = "Le compte a bien été passé en administrateur !";
    
}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}


?>